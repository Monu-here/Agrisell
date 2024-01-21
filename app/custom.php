<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

function getFooterSetting()
{
    return DB::table('logofooters')->first();
}
function getLogoSetting()
{
    return DB::table('logofooters')->first();
}
function getOrderSetting()
{
    return Cache::rememberForever('order_modal_setting',function(){

        return DB::table('settings')->first();
    });
}

function getProductInfo($id){
    return Cache::rememberForever('product_info_'.$id, function ()use($id) {
        return (object)[
            'product' => DB::table('products as p')->where('id', $id)->first(),
            'gallerys'=> DB::table('galleries')->where('product_id', $id)->get(['image', 'type', 'video_link'])
        ];
    });
}

function clearProductInfo($id){
    Cache::forget('product_info_'.$id);
}

function getthankyouSetting()
{
    return DB::table('logofooters')->first();
}

function vasset($path)
{
    return asset($path) . "?v=" . config('share.version');
}

function getAgo($timestamp)
{
    $carbonDate = Carbon::parse($timestamp);
    return $carbonDate->diffForHumans();
}

function getOptions($option)
{
    if ($option != null && $option != "") {
        $data = explode('|', $option);
        $options = [];
        foreach ($data as $d) {
            $data1 = explode(":", $d);
            $options[$data1[0]] = explode(",", $data1[1]);
        }
        return $options;
    }
    return [];
}




// function isMain(){
//     $mainEmails=explode(",",env('main_email',''));
//     return in_array( Auth::user()->email,$mainEmails);
// }
