<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Word;
use App\History;
use Carbon\Carbon;

class WordController extends Controller
{
    public function home(Request $request)
    {
       $posts = Word::all()->sortByDesc('updated_at');

       if (count($posts) > 0) {
        $headline = $posts->shift();
        } else {
            $headline = null;
        }

        return view('word.home', ['headline' => $headline, 'posts' => $posts]);
    }

    public function add()
  {
      return view('word.add');
  }

  public function create(Request $request)
  {
    $this->validate($request, Word::$rules);

        $word = new Word;
        $form = $request->all();

        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $word->image_path = basename($path);
          } else {
              $word->image_path = null;
          }

        // if (isset($form['sound'])) {
        //     $path = $request->file('sound')->store('public/sound');
        //     $word->sound_path = basename($path);
        // } else {
        //     $word->sound_path = null;
        // }

          unset($form['_token']);
          // フォームから送信されてきたimageを削除する
          unset($form['image']);
          $word->fill($form);
          $word->save();

          return redirect('/add');
  }


}

