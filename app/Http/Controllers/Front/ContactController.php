<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

}
