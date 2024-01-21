<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    // public function index()
    // {
    //     $setting = DB::table('settings')->first();
    //     return view('back.setting.index', compact('settings'));
    // }

    public function add(Request $request)
    {
        if ($request->getMethod() == 'POST') {
            $setting = Setting::first();
            if ($setting == null) {
                $setting = new Setting();
            }
            $setting->nameplaceholder = $request->nameplaceholder;
            $setting->name = $request->name;
            $setting->numberplaceholder = $request->numberplaceholder;
            $setting->number = $request->number;
            $setting->addressplaceholder = $request->addressplaceholder;
            $setting->address = $request->address;
            $setting->qtyyplaceholder = $request->qtyyplaceholder;
            $setting->qtyy = $request->qtyy;
            $setting->btn = $request->btn;
            $setting->save();
            Cache::forget('order_modal_setting');
            return redirect()->back();
        } else {
            $settings = Setting::all();
            return view('back.setting.add', compact('settings'));
        }
    }

    public function del($setting)
    {
        DB::table('settings')->where('id', $setting)->delete();
        return redirect()->back();
    }
}
