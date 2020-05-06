<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Name;
use App\History;
use Carbon\Carbon;

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

    public function edit(Request $request)
    {
        $name = Name::find($request->id);
        if (empty($name)) {
          abort(404);
        }
        return view('front.word.edit', ['name_form' => $name]);
    }


    public function update(Request $request)
    {

        $this->validate($request, Name::$rules);
          $name = Name::find($request->id);
          $name_form = $request->all();
          if ($request->remove == 'true') {
              $name_form['image_path'] = null;
          } elseif ($request->file('image')) {
              $path = $request->file('image')->store('public/image');
              $name_form['image_path'] = basename($path);
          } else {
              $name_form['image_path'] = $name->image_path;
          }

          unset($name_form['_token']);
          unset($name_form['image']);
          unset($name_form['remove']);
          $name->fill($name_form)->save();

        $history = new History;
        $history->name_id = $name->id;
        $history->edited_at = Carbon::now();
        $history->save();

        return redirect('front/word/add');
    }

}
