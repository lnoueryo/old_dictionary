<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Mail;
use Illuminate\Support\Facades\Auth;
use App\Events\Read;


class MailController extends Controller
{
    public $mail_reply;

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

        return view('front.inbox', ['mails' => $mails, 'user' => $user, 'cond_user' => $cond_user]);
  }
//   , 'cond_user' => $cond_user
    public function form()
    {
        return view('front.form');
    }

    public function ReplyForm(Request $request)
    {
        $mail = Mail::find($request->id);
        $user = User::find($mail->sender_id);

        return view('front.reply_form', ['user' => $user, 'mail' => $mail]);
    }

    public function send(Request $request)
    {
        $rules = [
            'receiver' => 'required|string',
            'message' => 'required'
        ];
        $this->validate($request, $rules);
        $user = User::where('nickname', $request->receiver)->first();
        if (empty($user)) {
          abort(404);
        }

        $contact = new Mail;
        $mail = $request->all();
        $contact->fill($mail);
        $contact->receiver_id = $user->id;
        $contact->save();

        return redirect()->route('front.contact.result');
    }

    public function result()
    {
        return view('front.contact.result');
    }

    public function delete(Request $request)
    {
        $mail = Mail::find($request->id);
        $mail->delete();
        return redirect('inbox/');
    }

    public function unread(Request $request)
    {
        $mail = Mail::find($request->id);
        $mail->read = false;
        $mail->save();
        return redirect('inbox/');
    }

    public function detail(Request $request)
    {
      $mail = Mail::find($request->id);
      event(new read($mail));

        return view('front.mail_detail', ['mail_form' => $mail]);
    }

    public function showProfile(Request $request)
    {
      $mail = Mail::find($request->id);
      $user = User::find($mail->sender_id);

        return view('front.show_profile', ['mail' => $mail, 'user' => $user]);
    }

    public function reply(Request $request)
    {
        $rules = [
            'receiver' => 'required|string',
            'message' => 'required'
        ];
        $this->validate($request, $rules);
        $user = User::where('nickname', $request->receiver)->first();
        if (empty($user)) {
          abort(404);
        }

        $contact = new Mail;
        $mail = $request->all();
        $contact->fill($mail);
        $contact->receiver_id = $user->id;
        $contact->save();

        return redirect()->route('front.contact.result');
    }
}

