<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\product;
use App\Models\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RateController extends Controller
{
    public function index()
    {
        $rates = Rate::with('product')->get();
        return view('back.rate.index', compact('rates'));
    }

    public function rateproduct(Request $request)
    {
        if ($request->getMethod() == "POST") {
            // dd($request->all());

            $star_rated = $request->input('product_rating');
            if ($request->hasFile('image')) {
                $image = $request->file('image')->store('uploads/rate');
            } else {
                $image = null; // or any default value you want to set
            }
            $user = $request->input('user');
            $reviews = $request->input('review');
            $product_id = $request->input('product_id');
            $product_check = product::where('id', $product_id)->get();
            if ($product_check) {
                Rate::create([
                    'user' => $user,
                    'product_id' => $product_id,
                    'stars' => $star_rated,
                    'review' => $reviews,
                    'image' => $image,
                ]);
            }
        }
        return redirect()->back()->with('message', 'Thank You For Rating');
    }

    public function rate($product_id)
    {
        $rateShow = Rate::where('product_id', $product_id)->get();

        return view('back.rate.show', compact('rateShow'));
    }
    public function del($rate)
    {
        DB::table('rates')->where('id', $rate)->delete();
        return redirect()->back();
    }
}
