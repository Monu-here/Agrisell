<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\logofooter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class logofootercontroller extends Controller
{

    public function add(Request $request)
    {
        if ($request->getMethod() == 'POST') {
            $logofooter = logofooter::first();
            if ($logofooter == null) {
                $logofooter = new logofooter();
            }

            if ($request->hasFile('image')) {
                $logofooter->image = $request->image->store('uploads/logofooter');
            }
            $logofooter->logotext = $request->logotext??"";
            $logofooter->short_desc = $request->short_desc??"";
            $logofooter->address = $request->address??"";
            $logofooter->email = $request->email??"";
            $logofooter->number = $request->number??"";
            $logofooter->fblink = $request->fblink??"";
            $logofooter->instalink = $request->instalink??"";
            $logofooter->yotubelink = $request->yotubelink??"";
            $logofooter->copyright = $request->copyright??"";
            $logofooter->thankyou = $request->thankyou??"";

            $logofooter->save();
            return redirect()->back();
        } else {
            $logofooter = logofooter::first();
            return view('back.logoFooter.add', compact('logofooter'));
        }
    }
}
