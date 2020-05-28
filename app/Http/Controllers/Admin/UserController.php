<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Mail;

class UserController extends Controller
{
    public function profile(Request $request)
  {
      $cond_user = $request->cond_user;
      if ($cond_user != '') {
          $userPosts = User::where('name', 'like', '%' .$cond_user. '%')
          ->orWhere('email', 'like',  $cond_user. '%')
          ->orWhere('country', 'like', '%' .$cond_user. '%')
          ->orWhere('nickname', 'like',  $cond_user. '%')->get();
      } else {
        $userPosts = User::all();
        $userPosts = User::sortable()->paginate(5);
      }

    //   if(Auth::user()->id == 21) {
    //     return view('admin.profile_index', ['userPosts' => $userPosts, 'cond_user' => $cond_user]);
    //   } else {
    //     return redirect()->back();
    //   }


        return view('admin.profile_index', ['userPosts' => $userPosts, 'cond_user' => $cond_user]);
  }



  public function delete(Request $request)
  {
      $user = User::find($request->id);
      $user->delete();
      return redirect('profile/user/');
  }

  public function detail(Request $request)
  {

      $user = User::find($request->id);
      if (empty($user)) {
        abort(404);
      }
      return view('admin.profile', ['user_form' => $user]);
  }

  public function edit(Request $request)
  {

      $user = User::find($request->id);
      if (empty($user)) {
        abort(404);
      }
      return view('admin.profile_edit', ['user_form' => $user]);
  }

  public function update(Request $request)
  {

    //   $this->validate($request, Name::$rules);
        $user = User::find($request->id);
        $user->update($request->all());

    return view('admin.profile', ['user_form' => $user]);
  }

  public function home()
  {
    return view('admin.home');
  }

  public function inbox(Request $request)
  {
      $user = Auth::user()->id;
      $cond_user = $request->cond_user;
      if ($cond_user != '') {
          $mails = Mail::where('sender', 'like', '%' .$cond_user. '%')
          ->orWhere('message', 'like',  $cond_user. '%')
          ->orWhere('created_at', 'like', '%' .$cond_user. '%')->get();
       } else {
        $mails = Mail::where('receiver_id', $user)->orderBy('created_at', 'DESC')->get();
      };

        return view('admin.inbox', ['mails' => $mails, 'cond_user' => $cond_user]);
  }

}

