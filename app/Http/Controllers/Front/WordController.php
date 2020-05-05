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
              // 以下を追記
      // Varidationを行う
      $this->validate($request, Name::$rules);
            $name = new Name;
            $form = $request->all();
              $path = $request->file('image')->store('public/image');
              $name->image_path = basename($path);

            unset($form['_token']);
            // フォームから送信されてきたimageを削除する
            unset($form['image']);
            // データベースに保存する
            $name->fill($form);
            $name->save();

        return redirect('front/word/add');
    }

}
