<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\HotExam;
use App\Models\SingleTrainingCourse;
use App\Models\TrainingCourseVendor;
use App\Models\TrainingCourse;
use App\Models\Coupon;
use App\Models\Exam;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cookie;

class VideoTrainingCourseController extends Controller
{
    /**
     * Display training courses for all vendors.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $banner = Banner::latest()->first();

        $weeklyExams = HotExam::where('type', 'week')->get();
        $monthlyExams = HotExam::where('type', 'month')->get();

        // Retrieve all vendors with their associated courses.
        $vendors = TrainingCourseVendor::with('courses')->get();
        // Set the first vendor as the active vendor by default.
        $activeVendor = $vendors->first();

        return view('video_training_courses', compact('vendors', 'activeVendor', 'banner', 'monthlyExams', 'weeklyExams'));
    }

    /**
     * Display a single training course with coupon discount applied.
     *
     * @param string $perma
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function show($perma, Request $request)
    {
        $banner = Banner::latest()->first();

        $weeklyExams = HotExam::where('type', 'week')->get();
        $monthlyExams = HotExam::where('type', 'month')->get();

        // Retrieve the single training course with its sections and lectures.
        $course = SingleTrainingCourse::with('sections.lectures')
            ->where('perma', $perma)
            ->firstOrFail();

        // Get vendor details:
        // Use the same perma to search the training_courses table
        // and then use the vendor_id from that record to fetch vendor details.
        $trainingCourse = TrainingCourse::where('perma', $perma)->first();
        $vendor = null;
        if ($trainingCourse) {
            $vendor = TrainingCourseVendor::find($trainingCourse->vendor_id);
        }

        // Retrieve exam details using the course's exam_id.
        $exam = Exam::find($course->exam_id);

        // Retrieve active coupons.
        $coupons = Coupon::where('coupon_active', true)->get();
        $staticCoupon = 'MEGASALE'; // Known static coupon code.
        $defaultCoupon = $coupons->firstWhere('coupon', $staticCoupon);
        $couponToApply = null;

        // A) Check if user already has a coupon in a cookie.
        $cookieCouponCode = $request->cookie('coupon_code');
        if ($cookieCouponCode) {
            $cookieCoupon = $coupons->firstWhere('coupon', $cookieCouponCode);
            if ($cookieCoupon) {
                $couponToApply = $cookieCoupon;
            }
        }

        // If no coupon from cookie, fallback to the static default coupon.
        if (!$couponToApply) {
            $couponToApply = $defaultCoupon;
        }

        // B) Check for coupon code in the query string (?ref=someCoupon)
        $refCouponCode = $request->query('ref');
        if ($refCouponCode) {
            $maybeCoupon = $coupons->firstWhere('coupon', $refCouponCode);
            if ($maybeCoupon) {
                // For the static coupon, only override if no cookie coupon exists.
                if ($refCouponCode === $staticCoupon) {
                    if (!$cookieCouponCode) {
                        $couponToApply = $maybeCoupon;
                    }
                } else {
                    // For non-static coupon, if different from cookie, override and store in cookie.
                    if ($cookieCouponCode !== $refCouponCode) {
                        $couponToApply = $maybeCoupon;
                        // Store coupon code in cookie for 30 days (43200 minutes).
                        Cookie::queue('coupon_code', $refCouponCode, 43200);
                    }
                }
            }
        }

        // Apply discount logic on the training course price.
        $couponPercent = floatval($couponToApply->coupon_off ?? 0);
        $basePrice = floatval($course->price);
        $discountedPrice = round($basePrice * (1 - $couponPercent / 100), 2);
        $course->price = number_format($discountedPrice, 2);
        // Save the discount percentage so that it can be used later (e.g., for the cart).
        $course->off = $couponPercent;

        return view('single_video_course', compact('course', 'couponToApply', 'vendor', 'exam', 'banner', 'monthlyExams', 'weeklyExams'));
    }
}
