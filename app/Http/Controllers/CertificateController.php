<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use TCPDF;
use TCPDF_FONTS;

class CertificateController extends Controller
{
    public function form()
    {
        return view('certificate.form');
    }

    public function generate(Request $request)
    {
        // Validate the incoming form data
        $data = $request->validate([
            'full_name' => 'required|string|max:255',
            'course'    => 'required|string|max:255',
            'director'  => 'required|string|max:255',
            'academy'   => 'required|string|max:255',
            'date'      => 'required|date',
        ]);

        // Create a clean filename by removing special characters
        $cleanName = preg_replace('/[^A-Za-z0-9]/', '_', $data['full_name']);
        $filename = "certificate_{$cleanName}_" . date('Ymd_His') . '.pdf';

        // Create new PDF document
        // Parameters: orientation ('P'=Portrait, 'L'=Landscape), unit ('mm'=millimeters), format ('A4'), unicode, encoding, diskcache
        $pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);

        // Disable default header and footer
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        // Set page margins: left, top, right (in mm)
        $pdf->SetMargins(15, 15, 15);

        // Disable automatic page breaks
        $pdf->SetAutoPageBreak(false, 0);

        // Add a new page
        $pdf->AddPage();

        // Get page dimensions (in mm)
        $pageW = $pdf->getPageWidth();  // Total page width
        $pageH = $pdf->getPageHeight(); // Total page height

        // Set background color and fill entire page
        // SetFillColor parameters: Red, Green, Blue (0-255)
        $pdf->SetFillColor(250, 248, 245); // Light cream color
        // Rect parameters: x, y, width, height, style ('F'=Fill, 'D'=Draw, 'DF'=Draw+Fill)
        $pdf->Rect(0, 0, $pageW, $pageH, 'F');

        // Draw elegant borders with multiple lines
        // SetLineStyle parameters: array with 'width' and 'color' [R,G,B]
        $pdf->SetLineStyle(['width' => 0.5, 'color' => [193, 161, 68]]); // Gold color
        $pdf->Rect(10, 10, $pageW - 20, $pageH - 20); // Outer border

        $pdf->SetLineStyle(['width' => 0.3, 'color' => [193, 161, 68]]); // Thinner line
        $pdf->Rect(12, 12, $pageW - 24, $pageH - 24); // Inner border

        // Add decorative corner elements
        $this->drawCornerDecorations($pdf, $pageW, $pageH);

        // Define content area (space for text and elements)
        $contentX = 25;        // Start X position (left margin)
        $contentW = $pageW - 50; // Content width (page width minus left+right margins)

        // Company logo in center top (smaller)
        $logo = public_path('images/logo.png');
        if (file_exists($logo)) {
            // Calculate center position: (page width - logo width) / 2
            $logoWidth = 45;
            $logoCenterX = ($pageW - $logoWidth) / 2;
            // Image parameters: (file_path, x_position, y_position, width, height, type, link, align, resize, dpi)
            $pdf->Image($logo, $logoCenterX, 25, $logoWidth, 0, '', '', '', false, 150);
        }

        // Main title "Certificate of Excellence"
        // SetFont parameters: family, style ('B'=Bold, 'I'=Italic, 'BI'=Bold+Italic), size
        $pdf->SetFont('helvetica', 'B', 28);
        // SetTextColor parameters: Red, Green, Blue (0-255)
        $pdf->SetTextColor(44, 62, 80); // Dark blue-gray
        // SetXY parameters: x_position, y_position
        $pdf->SetXY($contentX, 40);
        // Cell parameters: width, height, text, border, ln (0=right, 1=next line, 2=below), align ('L'=Left, 'C'=Center, 'R'=Right)
        $pdf->Cell($contentW, 15, 'Certificate of Excellence', 0, 1, 'C');

        // Decorative line under title
        $pdf->SetLineStyle(['width' => 0.8, 'color' => [193, 161, 68]]);
        $lineX = $contentX + ($contentW - 80) / 2; // Center the line
        // Line parameters: x1, y1, x2, y2
        $pdf->Line($lineX, 57, $lineX + 80, 57);

        // "Presented to" text
        $pdf->SetFont('helvetica', '', 14); // Regular font, size 14
        $pdf->SetTextColor(127, 140, 141); // Light gray
        $pdf->SetXY($contentX, 65);
        $pdf->Cell($contentW, 8, 'Presented to', 0, 1, 'C');

        // Recipient name in decorative box
        // Ln parameters: height (move cursor down)
        $pdf->Ln(5);
        $nameBoxX = $contentX + ($contentW - 180) / 2; // Center the name box
        $nameBoxY = $pdf->GetY(); // Get current Y position

        // Name background box
        $pdf->SetFillColor(255, 255, 255); // White background
        $pdf->SetLineStyle(['width' => 0.5, 'color' => [193, 161, 68]]);
        // RoundedRect parameters: x, y, width, height, radius, round_corner, style, border_style, fill_color
        $pdf->RoundedRect($nameBoxX, $nameBoxY, 180, 20, 2, '1111', 'DF');

        // Load custom script font if available
        $scriptFontPath = public_path('fonts/ImperialScript-Regular.ttf');
        if (file_exists($scriptFontPath)) {
            // Add custom font to TCPDF
            TCPDF_FONTS::addTTFfont($scriptFontPath, 'TrueTypeUnicode', '', 96);
            $pdf->SetFont('imperialscript', '', 32);
        } else {
            // Fallback to built-in font with italic style
            $pdf->SetFont('helvetica', 'BI', 24);
        }

        $pdf->SetTextColor(39, 174, 96); // Green color
        $pdf->SetXY($nameBoxX, $nameBoxY + 3);
        $pdf->Cell(180, 14, $data['full_name'], 0, 1, 'C');

        // Achievement description
        $pdf->Ln(8);
        $pdf->SetFont('helvetica', '', 16);
        $pdf->SetTextColor(34, 49, 63); // Dark gray
        $pdf->SetX($contentX);
        $pdf->Cell($contentW, 8, 'For outstanding performance completing:', 0, 1, 'C');

        // Course name
        $pdf->Ln(3);
        $pdf->SetFont('helvetica', 'B', 18); // Bold, larger text
        $pdf->SetTextColor(44, 62, 80);
        $pdf->SetX($contentX);
        $pdf->Cell($contentW, 10, $data['course'], 0, 1, 'C');

        // Date
        $pdf->Ln(8);
        $pdf->SetFont('helvetica', 'I', 12); // Italic font
        $pdf->SetTextColor(127, 140, 141);
        $pdf->SetX($contentX);
        // Format date as "Month Day, Year"
        $pdf->Cell($contentW, 6, date('F j, Y', strtotime($data['date'])), 0, 1, 'C');

        // Award badge/seal (smaller)
        $badge = public_path('images/award.png');
        if (file_exists($badge)) {
            // Calculate center position for award badge
            $badgeWidth = 30; // Reduced from 50 to 35
            $badgeX = $contentX + ($contentW - $badgeWidth) / 2;
            $badgeY = $pdf->GetY() + 5;
            // Image parameters: (file_path, x_position, y_position, width, height, type, link, align, resize, dpi)
            $pdf->Image($badge, $badgeX, $badgeY, $badgeWidth, $badgeWidth);
            // Move cursor down by badge height + some spacing
            $pdf->Ln($badgeWidth + 5);
        } else {
            // Alternative: Draw a custom decorative seal if award image is not available
            $this->drawCustomSeal($pdf, $contentX + ($contentW - 50) / 2, $pdf->GetY() + 5);
            $pdf->Ln(55);
        }

        // Signature section
        $sigY = $pageH - 35; // Position from bottom of page

        // Left signature (Academy)
        $pdf->SetFont('helvetica', '', 11);
        $pdf->SetTextColor(127, 140, 141);
        $pdf->SetXY($contentX + 20, $sigY);
        // Create signature line with underscores
        $pdf->Cell(80, 4, str_repeat('_', 30), 0, 1, 'C');
        $pdf->SetXY($contentX + 20, $sigY + 5);
        $pdf->Cell(80, 6, $data['academy'] . ' Academy', 0, 1, 'C');

        // Right signature (Director)
        $pdf->SetXY($contentX + $contentW - 100, $sigY);
        $pdf->Cell(80, 4, str_repeat('_', 30), 0, 1, 'C');
        $pdf->SetXY($contentX + $contentW - 100, $sigY + 5);
        $pdf->Cell(80, 6, $data['director'], 0, 1, 'C');

        // Add decorative elements around signatures
        $this->drawSignatureDecorations($pdf, $contentX, $sigY, $contentW);

        // Generate and return PDF
        // Generate and return PDF
        // Output parameters: filename, destination ('S'=String, 'D'=Download, 'F'=File, 'I'=Inline)
        return response($pdf->Output($filename, 'D'), 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', "attachment; filename=\"{$filename}\"");
    }
    private function drawCornerDecorations($pdf, $pageW, $pageH)
    {
        $pdf->SetLineStyle(['width' => 0.5, 'color' => [193, 161, 68]]);
        $cornerSize = 15;

        // Top-left corner
        $pdf->Line(15, 15, 15 + $cornerSize, 15);
        $pdf->Line(15, 15, 15, 15 + $cornerSize);

        // Top-right corner
        $pdf->Line($pageW - 15, 15, $pageW - 15 - $cornerSize, 15);
        $pdf->Line($pageW - 15, 15, $pageW - 15, 15 + $cornerSize);

        // Bottom-left corner
        $pdf->Line(15, $pageH - 15, 15 + $cornerSize, $pageH - 15);
        $pdf->Line(15, $pageH - 15, 15, $pageH - 15 - $cornerSize);

        // Bottom-right corner
        $pdf->Line($pageW - 15, $pageH - 15, $pageW - 15 - $cornerSize, $pageH - 15);
        $pdf->Line($pageW - 15, $pageH - 15, $pageW - 15, $pageH - 15 - $cornerSize);
    }

    private function drawCustomSeal($pdf, $x, $y)
    {
        // Draw a decorative seal if award image is not available
        $radius = 25;
        $centerX = $x + $radius;
        $centerY = $y + $radius;

        // Outer circle
        $pdf->SetFillColor(193, 161, 68);
        $pdf->SetLineStyle(['width' => 1, 'color' => [193, 161, 68]]);
        $pdf->Circle($centerX, $centerY, $radius, 0, 360, 'D');

        // Inner circle
        $pdf->SetFillColor(255, 255, 255);
        $pdf->Circle($centerX, $centerY, $radius - 3, 0, 360, 'DF');

        // Text in seal
        $pdf->SetFont('helvetica', 'B', 10);
        $pdf->SetTextColor(193, 161, 68);
        $pdf->SetXY($x, $centerY - 8);
        $pdf->Cell($radius * 2, 4, 'PREMIUM', 0, 1, 'C');
        $pdf->SetXY($x, $centerY - 2);
        $pdf->Cell($radius * 2, 4, 'AWARD', 0, 1, 'C');

        // Add some decorative stars
        $this->drawStar($pdf, $centerX - 15, $centerY - 15, 3);
        $this->drawStar($pdf, $centerX + 15, $centerY - 15, 3);
        $this->drawStar($pdf, $centerX, $centerY + 15, 3);
    }

    private function drawStar($pdf, $x, $y, $size)
    {
        $pdf->SetFillColor(193, 161, 68);
        $pdf->SetLineStyle(['width' => 0.3, 'color' => [193, 161, 68]]);

        // Simple star shape using lines
        $pdf->Line($x, $y - $size, $x, $y + $size);
        $pdf->Line($x - $size, $y, $x + $size, $y);
        $pdf->Line($x - $size * 0.7, $y - $size * 0.7, $x + $size * 0.7, $y + $size * 0.7);
        $pdf->Line($x + $size * 0.7, $y - $size * 0.7, $x - $size * 0.7, $y + $size * 0.7);
    }

    private function drawSignatureDecorations($pdf, $contentX, $sigY, $contentW)
    {
        $pdf->SetLineStyle(['width' => 0.3, 'color' => [193, 161, 68]]);

        // Small decorative elements near signatures
        $leftCenter = $contentX + 60;
        $rightCenter = $contentX + $contentW - 60;

        // Left decoration
        $pdf->Line($leftCenter - 10, $sigY - 5, $leftCenter + 10, $sigY - 5);
        $pdf->Line($leftCenter - 5, $sigY - 8, $leftCenter + 5, $sigY - 8);

        // Right decoration
        $pdf->Line($rightCenter - 10, $sigY - 5, $rightCenter + 10, $sigY - 5);
        $pdf->Line($rightCenter - 5, $sigY - 8, $rightCenter + 5, $sigY - 8);
    }
}
