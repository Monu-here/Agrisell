<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Rate;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class productController extends Controller
{
    public function index($id, Request $request)
    {
        $info = getProductInfo($id);
        $product = $info->product;
        $gallerys = $info->gallerys;

        // $sort = $request->input('sort', 'all');

        // Fetch rates based on the sort parameter
        // $rates = $this->getSortedRates($product->id, $sort);

        // Fetch rates based on the sort parameter
        $rates = DB::table('rates')->where('product_id', $product->id)->get(['user', 'image', 'stars', 'review', 'created_at']);

        // Calculate $rate_value and other logic as needed
        $rate_sum = $rates->sum('stars');
        $rate_value = $rates->count() > 0 ? $rate_sum / $rates->count() : 0;

        // Return the view with sorted rates
        return view('front.product.product', compact('product', 'gallerys', 'rates', 'rate_value'));
    }

    // private function getSortedRates($productId, $sort)
    // {
    //     switch ($sort) {
    //         case 'all':
    //             return Rate::where('product_id', $productId)->get();
    //         case 'newest':
    //             return Rate::where('product_id', $productId)->latest()->get();
    //         case 'highest_rated':
    //             return Rate::where('product_id', $productId)->orderByDesc('stars')->get();
    //         case 'new_rates':
    //             return Rate::where('product_id', $productId)->where('created_at', '>', now()->subDays(7))->get();
    //         default:
    //             return Rate::where('product_id', $productId)->latest()->get();
    //     }
    // }


    public function share($id)
    {
        $info = getProductInfo($id);
        $product = $info->product;
        return view('front.product.share', compact('product'));
    }
}
