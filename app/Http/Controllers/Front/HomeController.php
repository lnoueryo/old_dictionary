<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Name;
use App\User;
use Auth;
use Hash;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        $posts = Name::all()->sortByDesc('updated_at');

        // if (count($posts) > 0) {
        //     $headline = $posts->shift();
        // } else {
        //     $headline = null;
        // }

        return view('front.home', ['posts' => $posts]);
    }

    public function profile()  {

        return view('front.profile');
    }

    public function edit(Request $request)
    {
        $user = User::find($request->id);
      if (empty($user)) {
        abort(404);
      }
      return view('front.edit', ['user_form' => $user]);
  }

  public function keyboard() {

      return view('virtualkeyboard');

  }

  public function showChangePasswordForm() {
    return view('auth.changePassword');
  }

  public function changePassword(Request $request) {
    //現在のパスワードが正しいかを調べる
    if(!(Hash::check($request->get('current-password'), Auth::user()->password))) {
        return redirect()->back()->with('change_password_error', '現在のパスワードが間違っています。');
    }

    //現在のパスワードと新しいパスワードが違っているかを調べる
    if(strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
        return redirect()->back()->with('change_password_error', '新しいパスワードが現在のパスワードと同じです。違うパスワードを設定してください。');
    }

    //パスワードのバリデーション。新しいパスワードは6文字以上、new-password_confirmationフィールドの値と一致しているかどうか。
    $validated_data = $request->validate([
        'current-password' => 'required',
        'new-password' => 'required|string|min:6|confirmed',
    ]);

    //パスワードを変更
    $user = Auth::user();
    $user->password = bcrypt($request->get('new-password'));
    $user->save();

    return redirect()->back()->with('change_password_success', 'パスワードを変更しました。');
    }

    // public function isVerify(Request $request) {

    //     $user = User::find(Auth::user()->id);
    //     $user->isVerify = '2';
    //     $user->save();
    //     return route('/home');
    // }

}
