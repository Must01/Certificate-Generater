<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CertificateController;

// Redirect '/' to '/certificate'
Route::redirect('/', '/certificate');

Route::get('/', function () {
    return view('home');
})->name('certificate.home');

Route::get('/contact', function () {
    return view('contact');
})->name('certificate.contact');


Route::get('/generate', [CertificateController::class, 'form'])->name('certificate.form');
Route::post('/certificate', [CertificateController::class, 'generate'])->name('certificate.generate');
