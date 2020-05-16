<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Contact;
use Illuminate\Support\Facades\Mail;

class SampleController extends Controller
{
    // public function send()
    // {

    //     $data = array();
    //     $data['text'] = 'ここがメール本文です。';

    //     Mail::send(
    //         'emails/mail',
    //         $data,
    //         function($message) {
    //             $message
    //             ->to('popo62520908@gmail.com')
    //             ->subject('メールが届きました');
    //         }
    //     );

    //     return view('emails/send');
    // }
    public function form()
    {
        return view('front.contact.form');
    }




    public function send(Request $request)
{
    $rules = [
        'name' => 'required|string',
        'email' => 'required|email',
        'message' => 'required'
    ];
    $this->validate($request, $rules);

    $to = [
        ['email' => 'example@gmail.com', 'name' => 'Your Name']
    ];

    $data = $request->only('name', 'email', 'message');
    Mail::to($to)->send(new SampleNotification($data))
    ->subject('メールが届きました');

    return redirect()->route('front.contact.result');
}

public function result()
{
    return view('front.contact.result');
}
}
