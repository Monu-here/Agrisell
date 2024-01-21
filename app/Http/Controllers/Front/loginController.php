<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{
    public function login(Request $request)
    {
        if ($request->getMethod() == 'POST') {
            $request->validate([
                "email" => "email|required",
                "password" => "required",
            ]);
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('front.index')->with('message', 'Data added Successfully');
            } else {
                return redirect()->back()->with('error', 'Invalid credentials. Please try again.');
            }
        } else {
            return view('front.UserLogin.login');
        }
    }
    public function signup(Request $request)
    {
        if ($request->getMethod() == 'POST') {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            if (User::where('email', $request->email)->exists()) {
                return redirect()->back()->with('error', 'Email already exists.');
            }
            $user->save();
            return redirect()->back()->with('info', 'User created successfullyyyy');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.login')->with('info', 'Logout Successfully');
    }
}
