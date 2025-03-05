<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NavControler;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SingleCertificationsExamsController;
use App\Http\Controllers\VideoTrainingCourseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExamProviderController;
use App\Http\Controllers\ExamsPageController;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;

Route::get('/set-login-cookie', function () {
    $loginResponse = [
        "is_active" => true,
        "is_logged_in" => true,
        "email" => "arbaz.abid@gmail.com",
        "message" => "Successfully logged in.",
        "name" => "Arbaz Abid",
        "_token" => "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIyMjc0NiIsInVuaXF1ZV9uYW1lIjoiMWI3NWJiYmQiLCJleHAiOjE3NDA2NTg2MDQsImlzcyI6IkR1bXBzQVBJSXNzdWVyIiwiYXVkIjoiRHVtcHNBUElVc2VycyJ9.Gd_zgIlZxtAI4CFu_6uMV-4BL8_4td6pl9leCM7fqd8"
    ];

    // Set cookie for 1 day (1440 minutes)
    return response("Login cookie set!")->cookie('loginResponse', json_encode($loginResponse), 1440);
});

Route::get('/', [HomeController::class, 'index']);

// New route for exam providers
Route::get('/exam-providers', [ExamProviderController::class, 'index']);
Route::get('/exam-provider/{vendorPerma}', [ExamProviderController::class, 'getExamsByVendorPerma']);
Route::get('/vendor-exam-questions/{vendor_perma}/{cert_perma}', [SingleCertificationsExamsController::class, 'getSingleCertificationExams']);
Route::get('/test-engine-simulator', [HomeController::class, 'getBannerForTestEngine']);
Route::get('/unlimited-access', [HomeController::class, 'getUnlimitedAccess']);

Route::get('/exam-questions/{vendor_perma}/{exam_perma}', [ExamsPageController::class, 'show']);
Route::get('/search', [SearchController::class, 'search'])->name('search');
// 404
// get login user
// Route::get('/get-login-response', [NavControler::class, 'getLoginResponse']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/video-courses', [VideoTrainingCourseController::class, 'index'])->name('video-courses');
;
Route::get('/training-course/{perma}', [VideoTrainingCourseController::class, 'show'])->name('training-course');
// Route::post('/add-to-cart/{perma}', [\App\Http\Controllers\CartController::class, 'add'])->name('add-to-cart');
Route::get('/faqs', [HomeController::class, 'getFaq']);
Route::get('/about', [HomeController::class, 'getAbout']);
Route::get('/refund-policy', [HomeController::class, 'getRefund']);
Route::get('/privacy-policy', [HomeController::class, 'getPrivacy']);
Route::get('/terms-and-conditions', [HomeController::class, 'getTermaCondition']);

// Auth Routes

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

Route::get('/get-client-ip', function (Request $request) {
    $clientIp = $request->header('cf-connecting-ip')
        ?? $request->header('x-forwarded-for')
        ?? $request->ip();
    return response()->json(['ip' => $clientIp], 200);
});


