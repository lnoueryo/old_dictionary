<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\validation\Rule;
use Socialite;
use Auth;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    protected $maxAttempts = 2;     // ログイン試行回数（回）
    protected $decayMinutes = 1;   // ログインロックタイム（分）

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = ('admin');

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => [
                'required', 'string',
                Rule::exists('users')->where( function ($query){
                    $query->where('isVerified', '2');
                })
            ],
            'password' => 'required|string',
            'captcha' => 'required|captcha',
        ],[
            $this->username(). '.exists' => '登録が完了していません'
        ]);

    }

    public function refreshCaptcha() {
        return captcha_img('math');
    }

}

