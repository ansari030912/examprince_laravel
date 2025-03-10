<?php

namespace App\Http\Controllers;

use Http;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\SingleExam;
use App\Models\Coupon;

class CheckoutController extends Controller
{
    public function applyCoupon(Request $request)
    {
        $couponCandidate = $request->input('coupon');

        // Check if the submitted coupon exists and is active.
        $coupon = Coupon::where('coupon', $couponCandidate)
            ->where('coupon_active', 1)
            ->first();

        if ($coupon) {
            return response()->json([
                'appliedCoupon' => $couponCandidate,
                'couponOff' => (float) $coupon->coupon_off,
                'message' => 'Coupon applied successfully!'
            ]);
        } else {
            // If not valid, fallback to a default coupon ("MEGASALE").
            $defaultCoupon = Coupon::where('coupon', 'MEGASALE')
                ->where('coupon_active', 1)
                ->first();
            return response()->json([
                'appliedCoupon' => 'MEGASALE',
                'couponOff' => $defaultCoupon ? (float) $defaultCoupon->coupon_off : 0,
                'message' => 'Coupon not valid.'
            ]);
        }
    }
    public function process(Request $request)
    {
        // Decode the JSON string from the request into an array.
        $cartData = json_decode($request->input('cartData'), true);

        // Determine the coupon code:
        // 1. Use request input if provided.
        // 2. Else, check if a coupon code exists in cookies.
        // 3. Otherwise, default to 'MEGASALE'.
        if ($request->has('coupon') && !empty($request->input('coupon'))) {
            $couponCode = $request->input('coupon');
        } elseif ($request->hasCookie('coupon_code')) {
            $couponCode = $request->cookie('coupon_code');
        } else {
            $couponCode = 'MEGASALE';
        }

        // Look up the coupon in the coupons table where it is active.
        $coupon = \App\Models\Coupon::where('coupon', $couponCode)
            ->where('coupon_active', 1)
            ->first();
        $couponOff = $coupon ? (float) $coupon->coupon_off : 0;

        $processedCart = [];

        // Loop through each item in the cart data.
        foreach ($cartData as $item) {
            // For items with title "1 Month (PDF)" or "1 Month (Test Engine)",
            // ignore any price in cartData and re-read the actual price from the unlimited_access table.
            if (
                isset($item['title']) &&
                ($item['title'] === '1 Month (PDF)' || $item['title'] === '1 Month (Test Engine)')
            ) {
                // Fetch the latest unlimited_access record.
                $unlimitedAccess = \App\Models\UnlimitedAccess::latest()->first();
                if ($unlimitedAccess) {
                    if ($item['title'] === '1 Month (PDF)') {
                        $fullPrice = (float) $unlimitedAccess->pdf_full_price;
                        $basePrice = (float) $unlimitedAccess->pdf_price;
                    } else { // "1 Month (Test Engine)"
                        $fullPrice = (float) $unlimitedAccess->te_full_price;
                        $basePrice = (float) $unlimitedAccess->te_price;
                    }
                    // Apply coupon discount on the actual base price from the table.
                    $discountedPrice = $basePrice * (1 - $couponOff / 100);
                    $finalOff = $couponOff;
                } else {
                    // Fallback: use values from cartData if unlimited_access record is not found.
                    $fullPrice = isset($item['full_price']) ? (float) $item['full_price'] : 0;
                    $discountedPrice = isset($item['price']) ? (float) $item['price'] : 0;
                    $finalOff = $couponOff;
                }

                $item['full_price'] = number_format($fullPrice, 2, '.', '');
                $item['price'] = number_format($discountedPrice, 2, '.', '');
                $item['off'] = $finalOff;
                $processedCart[] = $item;
                continue;
            }

            // For items that don't have an exam_code, just pass them through.
            if (!isset($item['exam_code'])) {
                $processedCart[] = $item;
                continue;
            }

            // Otherwise, process using the exam table.
            $exam = SingleExam::where('exam_code', $item['exam_code'])->first();

            // If exam is not found, use the original item values.
            if (!$exam) {
                $processedCart[] = $item;
                continue;
            }

            // Get prices from the exam record.
            $price_sc = (float) $exam->exam_sc_price;
            $price_ete = (float) $exam->exam_ete_price;
            $price_pdf = (float) $exam->exam_pdf_price;
            $fullPrice = 0;
            $discountedPrice = 0;
            $finalOff = $couponOff; // default coupon discount

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
                    $fullPrice = $price_sc + $price_ete + $price_pdf;
                    $discountedPrice = ($fullPrice * (1 - $couponOff / 100)) * 0.70;
                    $finalOff = $couponOff + 30;
                    break;
                case 'PDF & Test Engine Bundle':
                    $fullPrice = $price_pdf + $price_ete;
                    $discountedPrice = ($fullPrice * (1 - $couponOff / 100)) * 0.70;
                    $finalOff = $couponOff + 30;
                    break;
                default:
                    $fullPrice = isset($item['full_price']) ? (float) $item['full_price'] : 0;
                    $discountedPrice = isset($item['price']) ? (float) $item['price'] : 0;
                    break;
            }

            $item['full_price'] = number_format($fullPrice, 2, '.', '');
            $item['price'] = number_format($discountedPrice, 2, '.', '');
            $item['off'] = $finalOff;
            $processedCart[] = $item;
        }

        return response()->json([
            'message' => 'Cart data processed successfully!',
            'cartData' => $processedCart,
            'appliedCoupon' => $couponCode,
        ]);
    }



    public function checkout(Request $request)
    {
        // Validate incoming checkout data.
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'ip' => 'required|ip',
            'coupon' => 'required|string',
            'IsInvoice' => 'required|boolean',
            'invoice_perma' => 'nullable|string',
            'cart_items' => 'required|array'
        ]);

        try {
            // Call the external payment API using Laravel's HTTP client with your API key.
            $response = \Illuminate\Support\Facades\Http::withHeaders([
                'x-api-key' => 'b46279cb-13bb-4445-a6f9-6f252b61ae79'
            ])->post('https://certsgang.com/v1/payment', $validated);

            $apiResponse = $response->json();

            if (isset($apiResponse['success']) && $apiResponse['success'] === true) {
                return response()->json([
                    'success' => true,
                    'message' => 'We are redirecting you for payment to prepwise.',
                    'redirect_link' => $apiResponse['redirect_link']
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => $apiResponse['message'] ?? 'Payment initiation failed.'
                ], 500);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Exception: ' . $e->getMessage()
            ], 500);
        }
    }

}
