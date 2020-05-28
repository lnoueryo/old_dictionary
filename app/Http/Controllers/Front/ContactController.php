<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\Contact;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function add()
    {
        return view('front.contact.add');
    }

    public function create()
    {
        return redirect('front/contact/add');
    }

    public function form()
    {
        return view('front.contact.form');
    }




    public function send(Request $request)
    {
        $rules = [
            // 'name' => 'required|string',
            'subject' => 'required',
            'email' => 'required|email',
            'body' => 'required'
        ];
        $this->validate($request, $rules);

        // $to = array('popo62520908@gmail.com', $request->email);
        $to = [
            ['email' => 'popo62520908@gmail.com']
        ];

        $data = $request->only('subject', 'email', 'body');
        Mail::to($to)->bcc($request->email)->send(new Contact($data));

        return redirect()->route('front.contact.result');
    }

    public function result()
    {
        return view('front.contact.result');
    }
}
// }
// , 'name' => '{{ $name }}' 'name',
