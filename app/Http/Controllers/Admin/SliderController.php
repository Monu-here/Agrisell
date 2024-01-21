<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class SliderController extends Controller
{

    public function add(Request $request)
    {
        if ($request->getMethod() == 'POST') {
            $slider = new Slider();
            $slider->image = $request->image->store('uploads/slider');
            $slider->mobile_image = $request->mobile_image->store('uploads/slider');
            $slider->link = $request->link??"";

            $slider->product_id =$request->product_id==-1?null:$request->product_id;
          
            $slider->save();
            $this->clearCache();
            return redirect()->back()->with('message','Slider added successfully');
        } else {
            $products = DB::table('products')->get(['id', 'name']);
            return view('back.slider.add', compact('products'));
        }
    }
    public function index()
    {
        $sliders = DB::table('sliders as s')
            ->select('s.product_id','s.image', 's.mobile_image', 's.link','s.id')->get();
        $products=DB::table('products')->whereIn('id',$sliders->pluck('product_id'))->get(['id','name'])->keyBy('id');

        foreach ($sliders as $key => &$slider) {
            if($slider->product_id!=null){
                $slider->product=$products[$slider->product_id];
            }else{
                $slider->product=null;
            }
        }
        return view('back.slider.index', compact('sliders'));
    }
    public function edit(Request $request, Slider  $slider)
    {
        if ($request->getMethod() == 'POST') {
            if ($request->hasFile('image')) {
                $slider->image = $request->image->store('uploads/slider');
            }
            if ($request->hasFile('mobile_image')) {
                $slider->mobile_image = $request->mobile_image->store('uploads/sliders');
            }
            $slider->link = $request->link??"";
            $slider->product_id = $request->product_id==-1?null:$request->product_id;
            $slider->btn_text = $request->btn_text??"";
            $slider->btn_padding = $request->btn_padding??"";
            $slider->btn_height = $request->btn_height??"";
            $slider->btn_bg_color = $request->btn_bg_color??"";
            $slider->btn_text_color = $request->btn_text_color??"";
            $slider->btn_border_radius = $request->btn_border_radius??"";
            $slider->btn_position = $request->btn_position??"";
            $slider->other = $request->other??"";
            $slider->save();
            $this->clearCache();
            return redirect()->back();
        } else {
            $products = DB::table('products')->get(['id', 'name']);
            return view('back.slider.edit', compact('slider', 'products'));
        }
    }
    public function del($slider)
    {
        DB::table('sliders')->where('id', $slider)->delete();
        $this->clearCache();
        return redirect()->back();
    }
    function clearCache()
    {
        $List = [
            'home_sliders'
        ];
        b:
        foreach ($List as $key => $value) {
            Cache::forget($value);
        }
    }
}
