<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\DownloadHistoryController;
use App\Http\Controllers\ExamProviderSitemapController;
use App\Http\Controllers\ExamQuestionsSitemapController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LoginHistoryController;
use App\Http\Controllers\NavControler;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SingleCertificationsExamsController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\UnlimitedAccessController;
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
Route::get('/unlimited-access', [UnlimitedAccessController::class, 'index'])->name('unlimited.access');


Route::get('/exam-questions/{vendor_perma}/{exam_perma}', [ExamsPageController::class, 'show']);
Route::get('/search', [SearchController::class, 'search'])->name('search');
// 404
// get login user
// Route::get('/get-login-response', [NavControler::class, 'getLoginResponse']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/video-courses', [VideoTrainingCourseController::class, 'index'])->name('video-courses');
;
Route::get('/training-course/{perma}', [VideoTrainingCourseController::class, 'show'])->name('training-course');

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

Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotForm'])->name('forgot.form');
Route::post('/forgot-password', [ForgotPasswordController::class, 'forgot'])->name('forgot.submit');

Route::get('/reset-password', [ResetPasswordController::class, 'showResetForm'])->name('reset.form');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('reset.submit');

Route::get('/get-client-ip', function (Request $request) {
    $clientIp = $request->header('cf-connecting-ip')
        ?? $request->header('x-forwarded-for')
        ?? $request->ip();
    return response()->json(['ip' => $clientIp], 200);
});

// profile
Route::get('/profile/products', [ProductController::class, 'index'])->name('profile.products');
Route::get('/profile/download-history', [DownloadHistoryController::class, 'index'])->name('profile.download_history');
Route::get('/profile/login-history', [LoginHistoryController::class, 'index'])->name('profile.login_history');
Route::get('/profile/invoices', [InvoiceController::class, 'index'])->name('profile.invoices');
// profile setting
Route::get('/profile/settings', [SettingController::class, 'showSettings'])->name('profile.settings');
Route::post('/profile/settings', [SettingController::class, 'updatePassword'])->name('profile.update_password');


// GET route to display the checkout page.
Route::get('/cart', function () {
    return view('cart.checkout');
})->name('checkout');
Route::post('/cart/process', [CheckoutController::class, 'process'])->name('cart.process');
Route::post('/cart/coupon', [CheckoutController::class, 'applyCoupon'])->name('cart.coupon');
Route::post('/cart/checkout/payment', [CheckoutController::class, 'checkout'])->name('cart.checkout.payment');

// use App\Http\Controllers\ExamQuestionsSitemapController;


// sitemaps

Route::get('/sitemap.xml', [SitemapController::class, 'index']);
Route::get('/exam-questions-{page}/sitemap.xml', [SitemapController::class, 'examQuestions']);
Route::get('/exam-provider-{page}/sitemap.xml', [SitemapController::class, 'examProviders']);
Route::get('/vendor-exam-questions-{page}/sitemap.xml', [SitemapController::class, 'certificates']);
Route::get('training-course-{page}/sitemap.xml', [SitemapController::class, 'trainingCourses']);
