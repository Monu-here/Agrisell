<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class catogeryController extends Controller
{
    public function index()
    {
        $categories = DB::table('categories')->get();
        return view('back.category.index', compact('categories'));
    }
    public function add(Request $request)
    {
        if ($request->getMethod() == 'POST') {
            $category = new  category();
            $category->title = $request->title;
            $category->image = $request->image->store('uploads/category');
            $category->des = $request->des??"";
            $category->save();
            $this->clearCache();

            return redirect()->back()->with('message','Category Added Successfully');
        } else {

            return view('back.category.add');
        }
    }
    public function edit(Request $request, Category $category)
    {
        if ($request->getMethod() == 'POST') {
            $category->title = $request->title;
            $category->des = $request->des??"";

            if ($request->hasFile('image')) {
                $category->image = $request->image->store('uploads/category');
            }
            $category->save();
            $this->clearCache();
            return redirect()->back()->with('message','Category updated successfully.');
        } else {
            return view('back.category.edit', compact('category'));
        }
    }
    public function del($category)
    {
        DB::table('categories')->where('id', $category)->delete();
        $this->clearCache();
        return redirect()->back()->with('message','Category deleted successfully.');
    }

    public function clearCache()
    {
        $List = [
            'home_categories'
        ];
        foreach ($List as $key => $value) {
            Cache::forget($value);
        }
    }


}
