<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Name;
use App\History;
use Carbon\Carbon;

class WordController extends Controller
{

    public function edit(Request $request)
  {
      $name = Name::find($request->id);
      if (empty($name)) {
        abort(404);
      }
      return view('admin.word.edit', ['name_form' => $name]);
  }


  public function update(Request $request)
  {
      $this->validate($request, Name::$rules);
      $name = Name::find($request->id);
      $name_form = $request->all();
      if (isset($name_form['image'])) {
        $path = $request->file('image')->store('public/image');
        $name->image_path = basename($path);
        unset($name_form['image']);
      } elseif (isset($request->remove)) {
        $name->image_path = null;
        unset($news_form['remove']);
      }
      $name_form = $request->all();
      unset($name_form['_token']);

      $name->fill($name_form)->save();

      $history = new History;
      $history->name_id = $name->id;
      $history->edited_at = Carbon::now();
      $history->save();

      return redirect('admin/word');
  }

  public function delete(Request $request)
  {
      $name = Name::find($request->id);
      $name->delete();
      return redirect('admin/word/');
  }

    public function index(Request $request)
  {
      $cond_title = $request->cond_title;
      if ($cond_title != '') {
          $posts = Name::where('title', $cond_title)->get();
      } else {
          $posts = Name::all();
      }
      return view('admin.word.index', ['posts' => $posts, 'cond_title' => $cond_title]);
  }

}
