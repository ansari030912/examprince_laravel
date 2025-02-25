<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SingleCertificationsExamsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExamProviderController;

Route::get('/', [HomeController::class, 'index']);

// New route for exam providers
Route::get('/exam-providers', [ExamProviderController::class, 'index']);
Route::get('/exam-provider/{vendorPerma}', [ExamProviderController::class, 'getExamsByVendorPerma']);
Route::get('/vendor-exam-questions/{vendor_perma}/{cert_perma}', [SingleCertificationsExamsController::class, 'getSingleCertificationExams']);
Route::get('/test-engine-simulator', [HomeController::class, 'getBannerForTestEngine']);

// 404
