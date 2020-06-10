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
      $cond_user_country = $request->cond_user_country;
      $cond_user_gender = $request->cond_user_gender;

      if ($cond_user != '') {

          if ($cond_user_country !='') {

              if ($cond_user_gender !='') {
                  $userPosts = User::sortable()->where('country', $cond_user_country)->
                    where('gender', $cond_user_gender)->
                    where(function ($query) use ($cond_user) {
                        $query->where('name', 'like', '%' .$cond_user. '%')
                        ->orWhere('email', 'like', $cond_user. '%')
                        ->orWhere('nickname', 'like', $cond_user. '%');
                    })->get();

                } else {
                    $userPosts = User::sortable()->where('country', $cond_user_country)->
                        where(function ($query) use ($cond_user) {
                            $query->where('name', 'like', '%' .$cond_user. '%')
                            ->orWhere('email', 'like', $cond_user. '%')
                            ->orWhere('nickname', 'like', $cond_user. '%');
                        })->get();
                }
            }

          if ($cond_user_country =='') {

              if ($cond_user_gender !='') {
                  $userPosts = User::sortable()->
                    where('gender', $cond_user_gender)->
                    where(function ($query) use ($cond_user) {
                        $query->where('name', 'like', '%' .$cond_user. '%')
                        ->orWhere('email', 'like', $cond_user. '%')
                        ->orWhere('nickname', 'like', $cond_user. '%');
                    })->get();

                } else {
                    $userPosts = User::sortable()->where('country', $cond_user_country)->
                        where(function ($query) use ($cond_user) {
                            $query->where('name', 'like', '%' .$cond_user. '%')
                            ->orWhere('email', 'like', $cond_user. '%')
                            ->orWhere('nickname', 'like', $cond_user. '%');
                        })->get();
                }
            }




    }

    if ($cond_user == '') {

        if ($cond_user_country !='') {

            if ($cond_user_gender !='') {
                $userPosts = User::sortable()->where('country', $cond_user_country)->
                  where('gender', $cond_user_gender)->
                  get();

              } else {
                  $userPosts = User::sortable()->where('country', $cond_user_country)->
                      get();
              }
          }

        if ($cond_user_country =='') {

            if ($cond_user_gender !='') {
                $userPosts = User::sortable()->
                  where('gender', $cond_user_gender)->
                  get();

              } else {
                  $userPosts = User::sortable()->
                      get();
              }
          }
  }

  $cc = count($userPosts, COUNT_RECURSIVE);



        return view('admin.profile_index', ['cond_user_gender' =>$cond_user_gender,'cc' => $cc,'userPosts' => $userPosts, 'cond_user' => $cond_user, 'cond_user_country' => $cond_user_country]);
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

