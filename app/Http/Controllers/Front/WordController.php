<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Name;
use App\History;
use App\User;
use Carbon\Carbon;
use App\Events\SearchTimeCounter;
use App\Events\CreateWordTimeCounter;
use App\Events\EditWordTimeCounter;
use Illuminate\Support\Facades\Auth;

class WordController extends Controller
{
    public function index(Request $request)
    {

        $cond_name = $request->cond_name;
        if ($cond_name != '') {
            $posts = Name::where('name', 'like', '%' .$cond_name. '%')->get();

            } else {
                $posts = Name::all();

            }
            $user = User::find(Auth::user()->id);
            event(new SearchTimeCounter($user));



        return view('front.word.index', ['posts' => $posts, 'cond_name' => $cond_name]);

    }

    public function add() {
        return view('front.word.add');
    }


    public function create(Request $request) {


      $this->validate($request, Name::$rules);

            $name = new Name;
            $name->user_id = $request->id;

            $form = $request->all();



            if (isset($form['image'])) {
                $path = $request->file('image')->store('public/image');
                $name->image_path = basename($path);
              } else {
                  $name->image_path = null;
              }
            if (isset($form['sound'])) {
                $path = $request->file('sound')->store('public/sound');
                $name->sound_path = basename($path);
              } else {
                  $name->sound_path = null;
              }

            unset($form['_token']);
            unset($form['image']);
            unset($form['sound']);
            $name->fill($form);
            $name->save();

            $user = User::find($request->id);
            event(new CreateWordTimeCounter($user));


        return redirect('/keyboard');
    }

    public function edit(Request $request)
  {
      $name = Name::find($request->id);
      if (empty($name)) {
        abort(404);
      }
      return view('front.word.edit', ['name_form' => $name]);
  }

//   public function update(Request $request)
//   {


//       $this->validate($request, Name::$rules);
//         $name = Name::find($request->id);
//         $name_form = $request->all();

//         if (isset($name_form['image'])) {
//             $path = $request->file('image')->store('public/image');
//             $name->image_path = basename($path);
//             unset($name_form['image']);
//           } elseif (isset($request->remove)) {
//             $name->image_path = null;
//             unset($name_form['remove']);
//           }
//           unset($name_form['_token']);

//         $name->update($request->all());

//       $history = new History;
//       $history->name_id = $name->id;
//       $history->edited_at = Carbon::now();
//       $history->save();

//       $user = User::find($request->id);
//       event(new EditWordTimeCounter($user));



//       return direct('front/word/edit');
//   }

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

      return redirect('/');
  }
}
