<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\UnlimitedAccess;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cookie;

class UnlimitedAccessController extends Controller
{
    public function index()
    {
        // 1. Load the latest unlimited-access row (local table)
        $unlimitedAccess = UnlimitedAccess::latest()->first();
        $banner = Banner::latest()->first();

        // 2. Default or actual prices
        $pdfPrice = $unlimitedAccess ? $unlimitedAccess->pdf_price : 0;
        $tePrice  = $unlimitedAccess ? $unlimitedAccess->te_price  : 0;

        // 3. Coupon from cookies or default to MEGASALE
        $coupon_code = Cookie::get('coupon_code') ?: 'MEGASALE';

        // 4. Attempt to load a valid coupon
        $couponOff = 0;
        $coupon = Coupon::where('coupon', $coupon_code)
                        ->where('coupon_active', 1)
                        ->first();

        // 5. If valid coupon, apply discount
        if ($coupon) {
            $couponOff   = (float)$coupon->coupon_off; // e.g. 25 => 25%
            $discountPct = (100 - $couponOff) / 100;   // e.g. 75% => 0.75

            $pdfPrice = round($pdfPrice * $discountPct, 2);
            $tePrice  = round($tePrice  * $discountPct, 2);
        }

        // 7. Pass discounted prices to the view
        return view('unlimited-access', [
            'unlimitedAccess' => $unlimitedAccess,
            'banner'          => $banner,
            'pdfPrice'        => $pdfPrice,
            'tePrice'         => $tePrice,
            'off'             => $couponOff, // e.g. 25
        ]);
    }
}
