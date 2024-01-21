<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\product;
use App\Models\Rate;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function review(Request $request)
    {
        $review = $request->input('review');
        $product_id = $request->input('product_id');
        $product_check = product::where('id', $product_id)->get();
        if ($product_check) {
            Review::create([
                'user_id' => Auth::user()->id,
                'product_id' => $product_id,
                'review' => $review,
            ]);
        }
        return redirect()->back()->with('message', 'Thank`s For Review');
    }
}
