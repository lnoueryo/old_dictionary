<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FlashCardController extends Controller
{
    public function flashcard()
    {
        return view('word.flashcard');
    }
}
