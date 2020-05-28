<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Memo;
use App\User;

class PracticeController extends Controller
{
    public function showPractice(Request $request)
    {
        $memos = Memo::get();
        return view("practice", ['memos' => $memos]);
    }

    public function showSubmit($id = 0)
    {
        if ($id != 0) {
            $memo = Memo::where('id', $id)->get()->first();
        } else {
            $memo = (object) ["id" => 0, "title" => "", "content" => ""];
        }
        return view("practice2", ['memo' => $memo]);
    }

    public function postSubmit(Request $request, $id = 0)
    {
        $title = $request->input('title');
        $content = $request->input('content');
        if ($id == 0) {
            Memo::create([
                'title' => $title,
                'content' => $content
            ]);
        } else {
            $memo = Memo::find($id);
            $memo->update([
                'title' => $title,
                'content' => $content
            ]);
        }
        return redirect('p');
    }

    public function deleteMemo($id)
{
    Memo::destroy($id);
    return redirect()->route('practice');
}



  public function show() {

      return view('front.edit');
  }

// これでも大丈夫
//   public function show($id) {
//       $user = User::find($id);
//       return view('front.edit', ['user'=>$user]);
//   }
}
