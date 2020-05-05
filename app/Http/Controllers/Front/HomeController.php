<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Name;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        $posts = Name::all()->sortByDesc('updated_at');

        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }

        return view('front.home', ['headline' => $headline, 'posts' => $posts]);
    }
    
}
