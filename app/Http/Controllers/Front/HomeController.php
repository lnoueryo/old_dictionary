<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Name;
use App\User;

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
}
