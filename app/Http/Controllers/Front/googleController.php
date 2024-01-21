<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class googleController extends Controller
{
    public function googlelogin(Request $request)
    {
        session(['redirect' => $request->urldata]);
        return Socialite::driver('google')->redirect();
    }

    public function callback(Request $request)
    {
        try {
            $user = Socialite::driver('google')->user();
            $email = $user->getEmail();
            $login_date = now();

            $is_user = User::where('email', $email)->first();

            if (!$is_user) {
                session(['info' => [
                    'name' => $user->getName(),
                    'email' => $email,
                    'password' => bcrypt($user->getName() . '@' . $user->getId()),
                    'gImage' => $user->getAvatar(),
                    'login_date' => $login_date,
                    'google_id' => $user->getId(),
                ]]);
                return redirect()->route('front.front.front.phone')->with('error', 'Phone number is required.');
            } else {
                // User exists, update their Google ID, image, and login date
                User::where('email', $email)->update([
                    'google_id' => $user->getId(),
                    'gImage' => $user->getAvatar(),
                    'login_date' => $login_date,
                ]);

                // Fetch the updated user from the database
                $updatedUser = User::where('email', $email)->first();

                // Log in the updated user
                Auth::loginUsingId($updatedUser->id, true);
                $redirect = session('redirect');
                Session::forget('redirect');
                Session::save();

                if ($redirect == null) {
                    return redirect()->route('front.index');
                } else {
                    return redirect($redirect);
                }
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function showPhoneNumberForm()
    {
        return view('front.phone');
    }

    public function phone(Request $request)
    {

        $info = session('info');
        $info['phone'] = $request->phone;
        $user = User::create($info);
        Auth::login($user, true);

        $redirect = session('redirect');
        Session::forget('info');
        Session::forget('redirect');
        Session::save();

        if ($redirect == null) {
            return redirect()->route('front.index');
        } else {
            return redirect($redirect);
        }
    }

    public function userLogout()
    {
        Auth::logout();
        return redirect()->route('front.index');
    }
}
