<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CheckoutController extends Controller
{
    public function process(Request $request)
    {
        // Retrieve the JSON string from the request and decode it into a PHP array
        $cartData = json_decode($request->input('cartData'), true);

        // Now you have the array that was passed from localStorage.
        // You can process it as needed. For now, we'll simply return it in a JSON response.
        return response()->json([
            'message'  => 'Cart data received successfully!',
            'cartData' => $cartData,
        ]);
    }
}
