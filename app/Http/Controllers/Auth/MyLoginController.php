<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;

class MyLoginController extends Controller
{
    public function login(Request $request) {

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            $user = User::where('email', $request->email)->first();

            if($user->is_admin()) {
                return redirect()->route('admin');
            } else{
                return redirect()->route('home');
            }

        } else {
            return redirect()->back();
        }
    }
}
