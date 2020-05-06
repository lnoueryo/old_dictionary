<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Name;

class PracticeController extends Controller
{
    public function index(Request $request)
  {
      $cond_name = $request->cond_name;
      if ($cond_name != '') {
          $posts = Name::where('name', $cond_name)->get();
      } else {
          $posts = Name::all();
      }
      return view('practice', ['posts' => $posts, 'cond_name' => $cond_name]);
  }

  public function edit(Request $request)
  {
      $name = Name::find($request->id);
      if (empty($name)) {
        abort(404);
      }
      return view('practice.edit', ['name_form' => $name]);
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

      return redirect('admin/word');
  }

}
