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
use App\Flashcard;

class WordController extends Controller
{
    public function index(Request $request)
    {

        $cond_name = $request->cond_name;
        if ($cond_name != '') {
            $posts = Name::where('name', 'like', '%' .$cond_name. '%')->
            orWhere('meaning', 'like', '%' .$cond_name. '%')->
            get();

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


        return redirect('/add');
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

      return redirect('/');
  }

  public function save(Request $request) {
    //   dd(null);
    $name = Name::find($request->id);
    $user = User::find(Auth::user()->id);
    $flashcards = Flashcard::where('user_id', $user->id)->where('name_id', $request->id)->get();


    $value = 0;
    $value1 = 2;
    $count = count($flashcards, COUNT_RECURSIVE);

    if($count == $value) {

        $flashcard = new Flashcard;
        $flashcard->name = $name->name;
        $flashcard->name_id = $name->id;
        $flashcard->language = $name->language;
        $flashcard->parts_of_speech = $name->parts_of_speech;
        $flashcard->phonetic_symbol = $name->phonetic_symbol;
        $flashcard->meaning = $name->meaning;
        $flashcard->image_path = $name->image_path;
        $flashcard->sound_path = $name->sound_path;
        $flashcard->user_id = $user->id;
        $flashcard->card_type = 1;
        $flashcard->next_day = Carbon::today();
        $flashcard->save();

        $flashcard2 = new Flashcard;
        $flashcard2->name = $name->name;
        $flashcard2->name_id = $name->id;
        $flashcard2->language = $name->language;
        $flashcard2->parts_of_speech = $name->parts_of_speech;
        $flashcard2->phonetic_symbol = $name->phonetic_symbol;
        $flashcard2->meaning = $name->meaning;
        $flashcard2->image_path = $name->image_path;
        $flashcard2->sound_path = $name->sound_path;
        $flashcard2->user_id = $user->id;
        $flashcard2->card_type = 2;
        $flashcard2->next_day = Carbon::today();
        $flashcard2->save();
    } elseif($count = $value1) {

        return redirect()->route('home');
    }


    return redirect('front/word/index/');
    // ->except(['id', 'user_id', 'created_at', 'updated_at'])
}

}
