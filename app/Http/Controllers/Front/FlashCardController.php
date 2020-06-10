<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use App\Flashcard;
use Illuminate\Support\Facades\Auth;


class FlashCardController extends Controller
{
    public $flashcards;

    public function index() {

        $user = User::find(Auth::user()->id);
            $german = Flashcard::where('language', 'ドイツ語')->get();
            $german_cards = Flashcard::where('next_day', '<=', Carbon::today())->where('language', 'ドイツ語')->where('user_id', $user->id)->get();
            $count = count($german_cards, COUNT_RECURSIVE);
            $english = Flashcard::where('language', '英語')->get();
            $english_cards = Flashcard::where('next_day', '<=', Carbon::today())->where('language', '英語')->where('user_id', $user->id)->get();
            $count_1 = count($english_cards, COUNT_RECURSIVE);

        return view('front.flashcard.index', ['count' => $count, 'count_1' => $count_1, 'german' => $german, 'english' => $english])->with('finish');

    }

    public function start() {

        $user = User::find(Auth::user()->id);
        $flashcard_get = FlashCard::where('next_day', '<=', Carbon::now())->where('user_id', $user->id)->get();
        if($flashcard_get->isEmpty()){
            $user = User::find(Auth::user()->id);
            $german = Flashcard::where('language', 'ドイツ語')->get();
            $german_cards = Flashcard::where('next_day', '<=', Carbon::today())->where('language', 'ドイツ語')->where('user_id', $user->id)->get();
            $count = count($german_cards, COUNT_RECURSIVE);
            $english = Flashcard::where('language', '英語')->get();
            $english_cards = Flashcard::where('next_day', '<=', Carbon::today())->where('language', '英語')->where('user_id', $user->id)->get();
            $count_1 = count($english_cards, COUNT_RECURSIVE);

        return view('front.flashcard.index', ['count' => $count, 'count_1' => $count_1, 'german' => $german, 'english' => $english])->with('finish');


        } else {
            // randomで出たレコードの数列公差を取得
            $flashcards = $flashcard_get->random(1);
            $flashcard = $flashcards->first();
            $coefficient = $flashcard->coefficient;

            // 公差と係数の積を求め、四捨五入
            $round_1 = round(1.15 * $coefficient);
            $round_2 = round(1.25 * $coefficient);
            $round_3 = round(1.8 * $coefficient);


            $today = Carbon::today();
            $now = Carbon::now();

            // "もう一度"に表示する次回の値
            $next = $now->addMinutes(3);
            $first = new Carbon($next);
            $second = new Carbon($now);
            $next_time = $first->diffInMinutes($second);

            // "難しい"に表示する次回の値
            $next_1 = Carbon::today()->addDays($round_1);
            $first_1 = new Carbon($next_1);
            $second_1 = new Carbon($today);
            $next_time_1 = $first_1->diffInDays($second_1);

            // "普通"に表示する次回の値
            $next_2 = Carbon::today()->addDays($round_2);
            $first_2 = new Carbon($next_2);
            $second_2 = new Carbon($today);
            $next_time_2 = $first_2->diffInDays($second_2);

            // "簡単"に表示する次回の値
            $next_3 = Carbon::today()->addDays($round_3);
            $first_3 = new Carbon($next_3);
            $second_3 = new Carbon($today);
            $next_time_3 = $first_3->diffInDays($second_3);

            return view('front.flashcard.game', ['flashcards' => $flashcards, 'next_time' => $next_time, 'next_time_1' => $next_time_1, 'next_time_2' => $next_time_2, 'next_time_3' => $next_time_3]);
        }
    }

    public function game(Request $request) {

        $flashcard = Flashcard::find($request->id);

        if ($request->fail) {
            $flashcard->next_day = Carbon::now()->addMinutes(3);
            if ($flashcard->coefficient/2 < 2) {
                $flashcard->coefficient = 2;
                $flashcard->save();
            } elseif ($flashcard->coefficient/2 >= 2){
                $flashcard->coefficient = $flashcard->coefficient/2;
                $flashcard->save();
            }

        }
        if ($request->hard) {
            $flashcard->coefficient = 1.15*$flashcard->coefficient;
            $round_1 = 1.15*$flashcard->coefficient;
            $flashcard->next_day = Carbon::today()->addDays($round_1);
            $flashcard->save();
        }
        if ($request->correct) {
            $flashcard->coefficient = 1.25*$flashcard->coefficient;
            $round_2 = 1.25*$flashcard->coefficient;
            $flashcard->next_day = Carbon::today()->addDays($round_2);
            $flashcard->save();
        }
        if ($request->easy) {
            $flashcard->coefficient = 1.8*$flashcard->coefficient;
            $round_2 = 1.8*$flashcard->coefficient;
            $flashcard->next_day = Carbon::today()->addDays($round_2);
            $flashcard->save();
        }

        return redirect('flashcard/start/');

    }

    public function search(Request $request)
    {

        $cond_flashcard = $request->cond_flashcard;

        if ($cond_flashcard != '') {

            $flashcards = Flashcard::where('user_id', Auth::user()->id)
            ->where(function ($query) use ($cond_flashcard) {
                $query->where('name', 'like', '%' .$cond_flashcard. '%')
                ->orWhere('meaning', 'like', $cond_flashcard. '%');
            })
            ->get();

            } else {

                $flashcards = Flashcard::where('user_id', Auth::user()->id)->get();

            }



        return view('front.flashcard.search', ['flashcards' => $flashcards, 'cond_flashcard' => $cond_flashcard]);

    }

}
