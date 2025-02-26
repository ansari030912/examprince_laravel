<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\ExamPrice;
use Illuminate\Routing\Controller;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $examId = $request->input('exam_id');
        $priceId = $request->input('price_id');

        // Check if item already exists in cart
        if (session()->has('cart.' . $examId)) {
            return redirect()->back()->with('error', 'This item is already in your cart!');
        }

        // Get the exam and price details
        $exam = Exam::findOrFail($examId);
        $price = ExamPrice::findOrFail($priceId);

        // Add to cart session
        session()->put('cart.' . $examId, [
            'exam_id' => $examId,
            'price_id' => $priceId,
            'title' => $exam->exam_title,
            'price' => $price->price,
            'bundle_type' => $price->title
        ]);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
}
