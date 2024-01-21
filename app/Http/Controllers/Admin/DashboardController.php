<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        $products= DB::select("select p.name,p.image,datas.* from (select count(*) as count,product_id from orders group by product_id) datas
            join products p on p.id=datas.product_id order by datas.count desc");

        $orders =  DB::table('orders as o')
        ->join('products as p', 'p.id', '=', 'product_id')
        ->where('status',1)
        ->take(10)
        ->latest()
        ->get([
            'o.id',
            'o.qty',
            'o.phone_number',
            'o.address',
            'o.name as uname',
            'p.name',
            'p.image',
            'o.created_at'
        ]);

        return view('back.dashbaord.index',compact('products','orders'));
    }
}
