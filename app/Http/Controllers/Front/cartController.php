<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class cartController extends Controller
{
    public function index()
    {
        $products = DB::table('products')->get();
        return view('front.cart.cart' ,compact('products'));
    }
}
