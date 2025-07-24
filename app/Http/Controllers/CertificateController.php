<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use TCPDF;
use TCPDF_FONTS;

class CertificateController extends Controller
{
    public function form()
    {
        return view('form');
    }

    public function generate(Request $request)
    {
        // 1) Validate input
        $data = $request->validate([
            'full_name' => 'required|string|max:255',
            'course'    => 'required|string|max:255',
            'director'  => 'required|string|max:255',
            'academy'   => 'required|string|max:255',
            'date'      => 'required|date',
            'logo'      => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // 2) Handle logo upload temporarily
        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoFile = $request->file('logo');
            $logoName = 'temp_logo_' . time() . '.' . $logoFile->getClientOriginalExtension();
            $logoPath = $logoFile->storeAs('temp_logos', $logoName, 'public');
        }

        // 3) Pick & set locale
        $locale = Session::get('locale', config('app.locale', 'en'));
        App::setLocale($locale);

        // 4) Generate PDF
        $result = $locale === 'ar'
            ? $this->generateArabicPdf($data, $logoPath)
            : $this->generateEnglishPdf($data, $logoPath);

        // 5) Clean up temporary logo after PDF generation
        if ($logoPath && Storage::disk('public')->exists($logoPath)) {
            Storage::disk('public')->delete($logoPath);
        }

        return $result;
    }

    protected function generateEnglishPdf(array $data, $logoPath = null)
    {
        // Initialize PDF
        $pdf = new TCPDF('L','mm','A4',true,'UTF-8',false);
        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(false);
        $pdf->setRTL(false);

        // Common layout
        $this->commonPdfSetup($pdf, $logoPath);

        // Pull translations
        $t = fn($key) => __('app.'.$key);
        $certTitle      = $t('cert_title');
        $presentedTo    = $t('presented_to');
        $forOutstanding = $t('for_outstanding');
        $dateFormat     = $t('date_format');
        $academyLabel   = $t('academy_label', ['academy'=>$data['academy']]);

        // ENGLISH ALIGNMENTS
        $pageW   = $pdf->getPageWidth();
        $xCenter = $pageW / 2;
        $w       = 265;
        $xStart  = $xCenter - ($w / 2);

        // Logo handling - use custom logo if provided, otherwise use default
        if ($logoPath && Storage::disk('public')->exists($logoPath)) {
            $logoFullPath = storage_path('app/public/' . $logoPath);
            if (file_exists($logoFullPath)) {
                $pdf->Image($logoFullPath, ($w)/2, 20, 30, 0, '', '', '', false, 150);
            }
        } else {
            // Default logo
            $defaultLogo = public_path('images/logo.png');
            if (file_exists($defaultLogo)) {
                $pdf->Image($defaultLogo, ($w)/2, 20, 30, 0, '', '', '', false, 150);
            }
        }

        // Title (size 30)
        $pdf->SetFont('helvetica','B',30);
        $pdf->SetTextColor(44,62,80);
        $pdf->SetXY($xStart, 40);
        $pdf->Cell($w,20, $certTitle, 0,1,'C');

        // Underline
        $pdf->SetLineStyle(['width'=>0.8,'color'=>[193,161,68]]);
        $pdf->Line($xCenter-40, 65, $xCenter+40, 65);

        // Presented to
        $pdf->SetFont('helvetica','',14);
        $pdf->SetTextColor(127,140,141);
        $pdf->SetXY($xStart, 75);
        $pdf->Cell($w,8, $presentedTo, 0,1,'C');

        // Name box
        $pdf->Ln(5);
        $yName = $pdf->GetY();
        $pdf->SetFillColor(255,255,255);
        $pdf->SetLineStyle(['width'=>0.5,'color'=>[193,161,68]]);
        $pdf->RoundedRect($xCenter-90, $yName, 180, 25, 2, '1111','DF');

        // Name in script (size 32)
        $scriptPath = public_path('fonts/ImperialScript-Regular.ttf');
        if (file_exists($scriptPath)) {
            $fontScript = TCPDF_FONTS::addTTFfont($scriptPath,'TrueTypeUnicode','',96);
            $pdf->SetFont($fontScript,'',32,'',true);
        } else {
            $pdf->SetFont('helvetica','BI',28);
        }
        $pdf->SetTextColor(39,174,96);
        $pdf->SetXY($xCenter-90, $yName + 4);
        $pdf->Cell(180,16, $data['full_name'], 0,1,'C');

        // Achievement & course
        $pdf->Ln(8);
        $pdf->SetFont('helvetica','',16);
        $pdf->SetTextColor(34,49,63);
        $pdf->SetX($xStart);
        $pdf->Cell($w,8, $forOutstanding, 0,1,'C');
        $pdf->Ln(3);
        $pdf->SetFont('helvetica','B',18);
        $pdf->SetTextColor(44,62,80);
        $pdf->Cell($w,10, $data['course'], 0,1,'C');

        // Date
        $pdf->Ln(4);
        $pdf->SetFont('helvetica','I',12);
        $pdf->SetTextColor(127,140,141);
        $pdf->Cell($w,6, date($dateFormat, strtotime($data['date'])), 0,1,'C');

        // Award badge
        $pdf->Ln(2);
        $badgeW = 30;
        $yBadge = $pdf->GetY();
        $pdf->Image(public_path('images/award.png'),
            $xCenter - ($badgeW/2),
            $yBadge,
            $badgeW,
            $badgeW,
            '', '', '', false, 150
        );
        $pdf->SetY($yBadge + $badgeW + 8);

        // Signatures
        $this->addSignatures($pdf, $xStart, $w, $data['academy'], $data['director']);

        return $this->streamPdf($pdf, $data);
    }

    protected function generateArabicPdf(array $data, $logoPath = null)
    {
        // Initialize PDF
        $pdf = new TCPDF('L','mm','A4',true,'UTF-8',false);
        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(false);
        $pdf->setRTL(true);

        // Arabic font
        $arabicPath = public_path('fonts/Amiri-Regular.ttf');
        $arabicFont = TCPDF_FONTS::addTTFfont($arabicPath,'TrueTypeUnicode','',96);
        $pdf->SetFont($arabicFont,'',16,'',true);

        // Common layout
        $this->commonPdfSetup($pdf, $logoPath);

        // Pull translations
        $t = fn($key) => __('app.'.$key);
        $certTitle      = $t('cert_title');
        $presentedTo    = $t('presented_to');
        $forOutstanding = $t('for_outstanding');
        $dateFormat     = $t('date_format');
        $academyLabel   = $t('academy_label', ['academy'=>$data['academy']]);

        // ARABIC ALIGNMENTS
        $pageW   = $pdf->getPageWidth();
        $xCenter = $pageW / 2;
        $w       = 265;
        $xStart  = $xCenter - ($w / 2);

        // Logo handling - use custom logo if provided, otherwise use default
        if ($logoPath && Storage::disk('public')->exists($logoPath)) {
            $logoFullPath = storage_path('app/public/' . $logoPath);
            if (file_exists($logoFullPath)) {
                $pdf->Image($logoFullPath, ($w+40)/2, 20, 40, 0, '', '', '', false, 150);
            }
        } else {
            // Default logo
            $defaultLogo = public_path('images/logo.png');
            if (file_exists($defaultLogo)) {
                $pdf->Image($defaultLogo, ($w+40)/2, 20, 40, 0, '', '', '', false, 150);
            }
        }

        // Title (size 30)
        $pdf->SetFont($arabicFont,'B',30,'',true);
        $pdf->SetTextColor(44,62,80);
        $pdf->SetXY($xStart, 40);
        $pdf->Cell($w,20, $certTitle, 0,1,'C');

        // Underline
        $pdf->SetLineStyle(['width'=>0.8,'color'=>[193,161,68]]);
        $pdf->Line($xCenter-40, 65, $xCenter+40, 65);

        // Presented to
        $pdf->SetFont($arabicFont,'',14,'',true);
        $pdf->SetTextColor(127,140,141);
        $pdf->SetXY($xStart, 75);
        $pdf->Cell($w,8, $presentedTo, 0,1,'C');

        // Name box
        $pdf->Ln(5);
        $yName = $pdf->GetY();
        $pdf->SetFillColor(255,255,255);
        $pdf->SetLineStyle(['width'=>0.5,'color'=>[193,161,68]]);
        $pdf->RoundedRect($xCenter-90, $yName, 180, 25, 2, '1111','DF');

        // Name (size 28)
        $pdf->SetFont($arabicFont,'BI',28,'',true);
        $pdf->SetTextColor(39,174,96);
        $pdf->SetXY($xCenter-90, $yName + 4);
        $pdf->Cell(180,16, $data['full_name'], 0,1,'C');

        // Achievement & course
        $pdf->Ln(8);
        $pdf->SetFont($arabicFont,'',16,'',true);
        $pdf->SetTextColor(34,49,63);
        $pdf->SetX($xStart);
        $pdf->Cell($w,8, $forOutstanding, 0,1,'C');
        $pdf->Ln(3);
        $pdf->SetFont($arabicFont,'B',18,'',true);
        $pdf->SetTextColor(44,62,80);
        $pdf->Cell($w,10, $data['course'], 0,1,'C');

        // Date
        $pdf->Ln(4);
        $pdf->SetFont($arabicFont,'I',12,'',true);
        $pdf->SetTextColor(127,140,141);
        $pdf->Cell($w,6, date($dateFormat, strtotime($data['date'])), 0,1,'C');

        // Award badge
        $pdf->Ln(2);
        $badgeW = 30;
        $yBadge = $pdf->GetY();
        $pdf->Image(public_path('images/award.png'),
            $xCenter + 15,
            $yBadge,
            $badgeW,
            $badgeW,
            '', '', '', false, 150
        );
        $pdf->SetY($yBadge + $badgeW + 8);

        // Signatures (Arabic)
        $this->addSignaturesArabic($pdf, $xStart, $w, $data['academy'], $data['director']);

        return $this->streamPdf($pdf, $data);
    }

    protected function commonPdfSetup(TCPDF $pdf, $logoPath = null)
    {
        $pdf->SetMargins(15,15,15);
        $pdf->SetAutoPageBreak(false);
        $pdf->AddPage();

        $w = $pdf->getPageWidth();
        $h = $pdf->getPageHeight();

        // Background & borders
        $pdf->SetFillColor(250,248,245);
        $pdf->Rect(0,0,$w,$h,'F');
        $pdf->SetLineStyle(['width'=>0.5,'color'=>[193,161,68]]);
        $pdf->Rect(10,10,$w-20,$h-20);
        $pdf->SetLineStyle(['width'=>0.3,'color'=>[193,161,68]]);
        $pdf->Rect(12,12,$w-24,$h-24);

        // Corners
        $c = 15;
        foreach ([
            [10,10,10+$c,10],[10,10,10,10+$c],
            [$w-10,10,$w-10-$c,10],[$w-10,10,$w-10,10+$c],
            [10,$h-10,10+$c,$h-10],[10,$h-10,10,$h-10-$c],
            [$w-10,$h-10,$w-10-$c,$h-10],[$w-10,$h-10,$w-10,$h-10-$c],
        ] as $L) {
            $pdf->Line(...$L);
        }


    }

    protected function addSignatures(TCPDF $pdf, float $x, float $w, string $academyLabel, string $director)
    {
        $y = $pdf->getPageHeight() - 45;
        // Academy label (size 18)
        $pdf->SetFont('helvetica','',18);
        $pdf->SetTextColor(127,140,141);
        $pdf->SetXY($x, $y);
        $pdf->Cell(80,6, 'Academy', 0,1,'C');

        // Academy signature line
        $pdf->SetFont('helvetica','B',20);
        $pdf->SetXY($x, $y + 8);
        $pdf->Cell(80,6, $academyLabel, 0,1,'C');

        // Director label (size 18)
        $pdf->SetFont('helvetica','',18);
        $pdf->SetXY($x + ($w - 80), $y);
        $pdf->Cell(80,6, 'Director', 0,1,'C');

        // Director name (size 20)
        $pdf->SetFont('helvetica','B',20);
        $pdf->SetXY($x + ($w - 80), $y + 8);
        $pdf->Cell(80,6, $director, 0,1,'C');
    }

    protected function addSignaturesArabic(TCPDF $pdf, float $x, float $w, string $academyLabel, string $director)
    {
        $y = $pdf->getPageHeight() - 45;
        // Director label (size 18)
        $pdf->SetFont('', '', 18, '', true);
        $pdf->SetTextColor(127,140,141);
        $pdf->SetXY($x, $y);
        $pdf->Cell(80,6, 'مدير', 0,1,'C');

        // Director name (size 20)
        $pdf->SetFont('', 'B', 20, '', true);
        $pdf->SetXY($x, $y + 8);
        $pdf->Cell(80,6, $director, 0,1,'C');

        // Academy label (size 18)
        $pdf->SetFont('', '', 18, '', true);
        $pdf->SetXY($x + ($w - 80), $y);
        $pdf->Cell(80,6, 'أكاديمية', 0,1,'C');

        // Academy name (size 20)
        $pdf->SetFont('', 'B', 20, '', true);
        $pdf->SetXY($x + ($w - 80), $y + 8);
        $pdf->Cell(80,6, $academyLabel, 0,1,'C');
    }

    protected function streamPdf(TCPDF $pdf, array $data)
    {
        $file = 'certificate_'.preg_replace('/\W+/','_', $data['full_name'])
            . '_'.now()->format('Ymd_His').'.pdf';
        return response($pdf->Output($file,'D'), 200)
            ->header('Content-Type','application/pdf');
    }
}
