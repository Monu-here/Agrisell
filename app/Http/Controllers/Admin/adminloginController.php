<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminloginController extends Controller
{
    public function login(Request $request)
    {
        if ($request->getMethod() == 'POST') {
            $credentials = $request->only('email', 'password');
            $credentials['is_admin'] = 1;
            if (Auth::attempt($credentials)) {
                return redirect()->route('admin.index');
            } else {
                return redirect()->back()->with('error', 'Invalid User');
            }
        } else {
            return view('back.adminLogin.index');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('adminLogin.login')->with('message', 'Logout Successfully');
    }
}
