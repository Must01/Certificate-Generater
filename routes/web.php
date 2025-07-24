<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CertificateController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

// Language switching route
Route::get('lang/{locale}', function ($locale) {
    session(['locale' => $locale]);
    App::setLocale($locale);
    return redirect()->back();
})->name('lang.switch');

// All routes with locale setting
Route::get('/', function () {
    $locale = session('locale', 'en');
    App::setLocale($locale);
    return view('home');
})->name('certificate.home');

Route::get('/contact', function () {
    $locale = session('locale', 'en');
    App::setLocale($locale);
    return view('contact');
})->name('certificate.contact');

Route::get('/generate', function () {
    $locale = session('locale', 'en');
    App::setLocale($locale);
    return app(CertificateController::class)->form();
})->name('certificate.form');

Route::post('/certificate', [CertificateController::class, 'generate'])->name('certificate.generate');
