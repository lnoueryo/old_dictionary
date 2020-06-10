<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Illuminate\Support\Str;
use App\Events\Auth\UserActivationEmail;
class MyLoginController extends Controller
{
    public function login(Request $request) {

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            $user = User::where('email', $request->email)->first();

            if($user->isVerified == false) {
                Auth::guard()->logout();
                $user->token_activation = Str::randomNumber(6);
                $user->save();
                event(new UserActivationEmail($user));
                return view('auth.verification');
            }

            if($user->isVerified == 1) {
                return view('home');

            }

            if($user->is_admin() && $user->isVerified == 2) {
                return redirect()->route('admin');
            } else{
                return redirect()->route('home');
            }

        } else {
            return redirect()->back();
        }
    }
}
