<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExamProviderController;

Route::get('/', function () {
    return view('welcome');
});

// New route for exam providers
Route::get('/exam-providers', [ExamProviderController::class, 'index']);
Route::get('/exam-provider/{vendorPerma}', [ExamProviderController::class, 'getExamsByVendorPerma']);
