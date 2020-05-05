<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Name;

class WordController extends Controller
{
    public function index(Request $request)
    {
        $posts = Name::all()->sortByDesc('updated_at');

        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }

        return view('front.word.index', ['headline' => $headline, 'posts' => $posts]);
    }

    public function add() {
        return view('front.word.add');
    }

    public function create(Request $request) {

      $this->validate($request, Name::$rules);
            $name = new Name;
            $form = $request->all();

            if (isset($form['image'])) {
                $path = $request->file('image')->store('public/image');
                $name->image_path = basename($path);
              } else {
                  $name->image_path = null;
              }
            unset($form['_token']);
            unset($form['image']);
            $name->fill($form);
            $name->save();

        return redirect('front/word/add');
    }

}
