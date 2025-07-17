<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CertificateController;

Route::get('/certificate', [CertificateController::class, 'form'])->name('certificate.form');
Route::post('/certificate', [CertificateController::class, 'generate'])->name('certificate.generate');
