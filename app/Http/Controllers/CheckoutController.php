<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\SingleExam;
use App\Models\Coupon;

class CheckoutController extends Controller
{
    public function process(Request $request)
    {
        // Decode the JSON string from the request into an array.
        $cartData = json_decode($request->input('cartData'), true);

        // Retrieve coupon code from cookies (if exists) or use default 'MEGASALE'
        $couponCode = $request->cookie('coupon_code') ?? 'MEGASALE';

        // Look up the coupon in the coupons table where it is active.
        $coupon = Coupon::where('coupon', $couponCode)
            ->where('coupon_active', 1)
            ->first();
        $couponOff = $coupon ? (float) $coupon->coupon_off : 0;

        $processedCart = [];

        foreach ($cartData as $item) {
            // Check if exam_code exists in the cart item.
            if (!isset($item['exam_code'])) {
                // If not, leave the item unchanged.
                $processedCart[] = $item;
                continue;
            }

            // Find the exam from the single_exam table matching exam_code.
            $exam = SingleExam::where('exam_code', $item['exam_code'])->first();

            // If exam is not found, use the original item values.
            if (!$exam) {
                $processedCart[] = $item;
                continue;
            }

            // Get the individual prices from the exam record.
            $price_sc = (float) $exam->exam_sc_price;
            $price_ete = (float) $exam->exam_ete_price;
            $price_pdf = (float) $exam->exam_pdf_price;

            $fullPrice = 0;
            $discountedPrice = 0;
            $finalOff = $couponOff; // default discount percentage

            // Calculate full price and discounted price based on the cart item title.
            switch ($item['title']) {
                case 'Test Engine Only':
                    $fullPrice = $price_ete;
                    $discountedPrice = $fullPrice * (1 - $couponOff / 100);
                    break;

                case 'PDF Only':
                    $fullPrice = $price_pdf;
                    $discountedPrice = $fullPrice * (1 - $couponOff / 100);
                    break;

                case 'Training Course Only':
                    $fullPrice = $price_sc;
                    $discountedPrice = $fullPrice * (1 - $couponOff / 100);
                    break;

                case 'Full Premium Bundle':
                    // Sum all three prices.
                    $fullPrice = $price_sc + $price_ete + $price_pdf;
                    // Apply coupon discount then an additional 30% off.
                    $discountedPrice = ($fullPrice * (1 - $couponOff / 100)) * 0.70;
                    $finalOff = $couponOff + 30;
                    break;

                case 'PDF & Test Engine Bundle':
                    // Sum the PDF and Test Engine prices.
                    $fullPrice = $price_pdf + $price_ete;
                    $discountedPrice = ($fullPrice * (1 - $couponOff / 100)) * 0.70;
                    $finalOff = $couponOff + 30;
                    break;

                default:
                    // For any unexpected title, fallback to using existing values.
                    $fullPrice = isset($item['full_price']) ? (float) $item['full_price'] : 0;
                    $discountedPrice = isset($item['price']) ? (float) $item['price'] : 0;
                    break;
            }

            // Update the cart item with recalculated values.
            // Format prices as strings with two decimals.
            $item['full_price'] = number_format($fullPrice, 2, '.', '');
            $item['price'] = number_format($discountedPrice, 2, '.', '');
            $item['off'] = $finalOff;

            $processedCart[] = $item;
        }

        return response()->json([
            'message' => 'Cart data processed successfully!',
            'cartData' => $processedCart,
        ]);
    }
}
