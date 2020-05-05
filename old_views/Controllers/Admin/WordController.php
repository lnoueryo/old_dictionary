<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Word;
use App\History;
use Carbon\Carbon;

class WordController extends Controller
{

//     public function add()
//   {
//       return view('word.create');
//   }

//   public function create(Request $request)
//   {
//     $this->validate($request, Word::$rules);

//         $word = new Word;
//         $form = $request->all();

//         if (isset($form['image'])) {
//             $path = $request->file('image')->store('public/image');
//             $word->image_path = basename($path);
//           } else {
//             $word->image_path = null;
//           }

//           unset($form['_token']);
//           // フォームから送信されてきたimageを削除する
//           unset($form['image']);
//           $word->fill($form);
//           $word->save();

//           return redirect('word/create');
//   }

  public function index(Request $request)
  {
      $cond_title = $request->cond_title;
      if ($cond_title != '') {

          $posts = Word::where('title', $cond_title)->get();
      } else {

          $posts = Word::all();
      }
      return view('admin.word.index', ['posts' => $posts, 'cond_title' => $cond_title]);
  }

  public function edit(Request $request)
  {

      $word = Word::find($request->id);
      if (empty($word)) {
        abort(404);
      }
      return view('admin.word.edit', ['word_form' => $word]);
  }


  public function update(Request $request)
  {

      $this->validate($request, Word::$rules);
        $word = Word::find($request->id);
        $word_form = $request->all();
        if ($request->remove == 'true') {
            $word_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            $word_form['image_path'] = basename($path);
        } else {
            $word_form['image_path'] = $word->image_path;
        }

        unset($word_form['_token']);
        unset($word_form['image']);
        unset($word_form['remove']);
        $word->fill($word_form)->save();

      $history = new History;
      $history->word_id = $word->id;
      $history->edited_at = Carbon::now();
      $history->save();

      return redirect('admin/data');
  }

  public function delete(Request $request)
  {
      // 該当するNews Modelを取得
      $word = Word::find($request->id);
      // 削除する
      $word->delete();
      return redirect('admin/data');
  }

}

