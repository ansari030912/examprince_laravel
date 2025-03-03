<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\HotExam;
use Illuminate\Http\Request;
use App\Models\SingleExam;
use App\Models\ExamPrice;
use App\Models\TeImage;
use App\Models\ExamTopic;
use App\Models\QuestionType;
use App\Models\ExamFaq;
use App\Models\Coupon;
use Illuminate\Support\Carbon;
use Illuminate\Routing\Controller;

// Import the Cookie facade
use Illuminate\Support\Facades\Cookie;

class ExamsPageController extends Controller
{
    public function show($vendor_perma, $exam_perma, Request $request)
    {
        // 1) Fetch exam
        $exam = SingleExam::where('exam_perma', $exam_perma)->first();
        if (!$exam) {
            return abort(404, 'Exam not found');
        }

        // 2) Build exam stats (unchanged)
        $examStats = [
            'exam_last_week_word_to_word' => $exam->exam_last_week_word_to_word ?? 0,
            'exam_last_week_average_score' => $exam->exam_last_week_average_score ?? 0,
            'exam_popularity' => rand(100000, 1200000),
            'exam_sales' => rand(5000, 35000),
        ];

        // 3) Fetch related data (unchanged)
        $banner = Banner::latest()->first();
        $weeklyExams = HotExam::where('type', 'week')->get();
        $monthlyExams = HotExam::where('type', 'month')->get();
        $decodedContent = html_entity_decode($exam->exam_article ?? '');

        // 4) Base exam details
        $examDetails = [
            'exam' => $exam,
            'examPrices' => ExamPrice::where('exam_id', $exam->exam_id)->get(),
            'teImages' => TeImage::where('exam_id', $exam->exam_id)->get(),
            'exam_topics' => ExamTopic::where('exam_id', $exam->exam_id)->get(),
            'exam_question_types' => QuestionType::where('exam_id', $exam->exam_id)->get(),
            'examFaqs' => ExamFaq::where('exam_id', $exam->exam_id)->get(),
            'examCerts' => json_decode($exam->exam_certs, true),
        ];

        // 5) Retrieve active coupons
        $coupons = Coupon::where('coupon_active', true)->get();
        // Our known "static" coupon. If you have more than one, use an array: e.g. ['MEGASALE','DEFAULTCOUPON']
        $staticCoupon = 'MEGASALE';

        // If no coupon is found, fallback to $staticCoupon
        $defaultCoupon = $coupons->firstWhere('coupon', $staticCoupon);
        $couponToApply = null;

        // A) Check if the user already has a cookie
        $cookieCouponCode = $request->cookie('coupon_code');
        if ($cookieCouponCode) {
            $cookieCoupon = $coupons->firstWhere('coupon', $cookieCouponCode);
            if ($cookieCoupon) {
                // It's valid => use that as our starting coupon
                $couponToApply = $cookieCoupon;
            }
        }

        // If no coupon yet, fallback to static
        if (!$couponToApply) {
            $couponToApply = $defaultCoupon;
        }

        // B) Check the ?ref=someCoupon param
        $refCouponCode = $request->query('ref');
        if ($refCouponCode) {
            // Check if it’s valid in DB
            $maybeCoupon = $coupons->firstWhere('coupon', $refCouponCode);
            if ($maybeCoupon) {
                // 1) If it is the "static" coupon, we DO NOT store in cookie
                //    But we *might* apply it if there's no other coupon to apply
                //    However, if the user already has a different cookie coupon, we won't overwrite it with static
                if ($refCouponCode === $staticCoupon) {
                    // If we currently have a different cookie coupon, keep that
                    // else if there's no coupon in cookieToApply, we apply the static
                    if (!$cookieCouponCode) {
                        $couponToApply = $maybeCoupon;
                    }
                    // no cookie overwrite, so do nothing else
                } else {
                    // 2) Non-static coupon
                    // If code is different from cookie, store it in the cookie
                    if ($cookieCouponCode !== $refCouponCode) {
                        $couponToApply = $maybeCoupon;
                        // Example: store for 30 days => 43200 minutes
                        Cookie::queue('coupon_code', $refCouponCode, 43200);
                    }
                    // If code is the same, do nothing => keeps original cookie expiration
                }
            }
            // else => invalid code => do nothing
        }

        // Now we have a final couponToApply
        $couponPercent = floatval($couponToApply->coupon_off ?? 0);

        // 6) Apply discount logic (same as before)
        $basePdf = floatval($exam->exam_pdf_price);
        $baseEte = floatval($exam->exam_ete_price);
        $baseSc = floatval($exam->exam_sc_price);

        $pdfDiscounted = round($basePdf * (1 - $couponPercent / 100), 2);
        $eteDiscounted = round($baseEte * (1 - $couponPercent / 100), 2);
        $scDiscounted = round($baseSc * (1 - $couponPercent / 100), 2);

        // 7) Rebuild examPrices array
        $updatedExamPrices = [];

        foreach ($examDetails['examPrices'] as $item) {
            $type = $item->type;
            $title = $item->title;
            $cart = $item->cart;

            $fullPriceFloat = 0.0;
            $finalPriceFloat = 0.0;
            $offValue = 0;

            switch ($type) {
                case 1: // PDF
                    $fullPriceFloat = $basePdf;
                    $finalPriceFloat = $pdfDiscounted;
                    $offValue = (int) $couponPercent;
                    break;
                case 2: // ETE
                    $fullPriceFloat = $baseEte;
                    $finalPriceFloat = $eteDiscounted;
                    $offValue = (int) $couponPercent;
                    break;
                case 3: // SC
                    $fullPriceFloat = $baseSc;
                    $finalPriceFloat = $scDiscounted;
                    $offValue = (int) $couponPercent;
                    break;
                case 5: // PDF + ETE
                    $sumDiscounted = $pdfDiscounted + $eteDiscounted;
                    $fullPriceFloat = $sumDiscounted;
                    $finalPriceFloat = round($sumDiscounted * 0.70, 2);
                    $offValue = (int) ($couponPercent + 30);
                    break;
                case 6: // PDF + ETE + SC
                    $sumDiscounted = $pdfDiscounted + $eteDiscounted + $scDiscounted;
                    $fullPriceFloat = $sumDiscounted;
                    $finalPriceFloat = round($sumDiscounted * 0.70, 2);
                    $offValue = (int) ($couponPercent + 30);
                    break;
                default:
                    $originalFull = floatval($item->full_price);
                    $discounted = round($originalFull * (1 - ($couponPercent / 100)), 2);
                    $fullPriceFloat = $originalFull;
                    $finalPriceFloat = $discounted;
                    $offValue = (int) $couponPercent;
                    break;
            }

            $updatedExamPrices[] = (object) [
                'id' => $item->id,
                'type' => $type,
                'title' => $title,
                'cart' => $cart,
                'full_price' => number_format($fullPriceFloat, 2),
                'price' => number_format($finalPriceFloat, 2),
                'off' => $offValue,
            ];
        }

        $examDetails['examPrices'] = $updatedExamPrices;


        // decode exam_alternate if it's stored as JSON
        $exam->exam_alternate = json_decode($exam->exam_alternate, true);


        $exam->exam_training_course = json_decode($exam->exam_training_course, true);
        // 9) Return view
        return view('single_exam', compact(
            'examDetails',
            'banner',
            'monthlyExams',
            'weeklyExams',
            'examStats',
            'decodedContent'
        ));
    }

}
