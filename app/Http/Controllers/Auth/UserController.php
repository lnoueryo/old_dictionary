<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Events\Auth\UserActivationEmail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class UserController extends Controller
{
    public function verification()
    {
        return view('auth.verification');
    }

    public function postVerification(Request $request)
    {
        $user = User::where('token_activation', $request->otp)->first();
        if($user==null){
            return redirect()->back()->withErrors('OTP//////');
        } else {
            $user->update([
                'isVerified' => true,
                'token_activation' => Str::randomNumber(6),
                ]);


                // ログイン
                $this->guard()->login($user);

            return view('home')->withSuccess('OTP//////');
        }
    }

    public function postResend(Request $request) {

        $this->validates($request);

        $user = User::where('email', $request->email)->first();

        if($user==null){
            return redirect()->back();
        } else {
            $user->token_activation = Str::randomNumber(6);
            $user->save();
            event(new UserActivationEmail($user));

        return redirect('verification')->with('email email email');
        }


    }

    public function validates(Request $request) {

        $this->validate($request, [
            'email' => 'required|email|exists:users,email'
        ], [
            'email.exists' => 'email mkj'
        ]);
    }

    protected function guard()
    {
        return Auth::guard();
    }
}
