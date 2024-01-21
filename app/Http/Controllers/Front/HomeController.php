<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {

        $sliders = Cache::rememberForever('home_sliders', function () {
            return DB::table('sliders')->get(['image', 'mobile_image', 'link']);
        });

        $products =  Cache::rememberForever('home_products', function () {
            return DB::table('products')->get(['id', 'image', 'name', 'sale_price', 'price', 'category_id', 'me_link','option']);
        });


        $categories =  Cache::rememberForever('home_categories', function () use ($products) {
            return DB::table("categories")
                ->whereIn('id', $products->pluck('category_id'))
                ->get(["id", "title", 'image']);
        });

        return view('front.home', compact('sliders', 'products', 'categories'));
    }
    public function product()
    {
        return view('front.Productindex');
    }
}
