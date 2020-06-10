<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/jkeyboard.css">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <script src="{{ asset('js/ex01.js') }}" defer></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css" integrity="sha256-jKV9n9bkk/CTP8zbtEtnKaKf+ehRovOYeKoyfthwbC8=" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js" integrity="sha256-CgvH7sz3tHhkiVKh05kSUgG97YtzYNnWt6OXcmYzqHY=" crossorigin="anonymous"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha256-WqU1JavFxSAMcLP2WIOI+GB2zWmShMI82mTpLDcqFUg=" crossorigin="anonymous"></script> -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/front.css') }}">
        {{-- <link rel="stylesheet" href="{{ asset('css/auth.css') }}"> --}}
        <link rel="stylesheet" href="{{ asset('css/cropper.css') }}">
        <link rel="stylesheet" href="{{ asset('css/contents/word.css') }}">
        <link rel="stylesheet" href="{{ asset('css/jkeyboard.css') }}">

<link  href="/path/to/cropper.css" rel="stylesheet">



    </head>
    <body>
        <div id="app">
        <div class="header">
            <nav class="navbar navbar-expand-lg main_nav">
                <div class="container">
                    @if(Auth::user()->admin == false)
                    <a class="navbar-brand" href="{{ route('home') }}"><h2>My Turn to Blab</h2></a>
                    @else
                    <a class="navbar-brand" href="{{ route('admin') }}"><h2 class="balloon3-right-btm">Blah Blah</h2></a>
                    @endif
                    {{-- 𒄀𒋏𒄊 --}}
                    <button class="navbar-toggler mt-3" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse mt-3" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto main_nav">
                            <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="{{ route('add') }}">Add</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="{{ route('categories') }}">Categories</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="{{ route('flashcard') }}">Flashcard</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact') }}">contact</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <div class="flex-center position-ref full-height">
                                @if (Route::has('login'))
                                    <div class="top-right links dropdown">
                                        @auth
                                            <li class="nav-item">
                                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                    @if(isset(Auth::user()->nickname))
                                                    {{ Auth::user()->nickname }}
                                                    @else
                                                    {{ Auth::user()->name }}
                                                    @endif
                                                </a>
                                                <div class="dropdown-menu inside" aria-labelledby="navbarDropdown">
                                                    <a class="dropdown-item" href="{{ route('profile') }}">
                                                        {{ __('プロフィール') }}
                                                    </a>
                                                    <a class="dropdown-item" href="{{ route('changePassword') }}">
                                                        {{ __('パスワード変更') }}
                                                    </a>
                                                    <a class="dropdown-item" href="{{ route('inbox') }}">
                                                        {{ __('メール') }}
                                                    </a>
                                                    <a class="dropdown-item" id="js-modal-open">
                                                        {{ __('ログアウト') }}
                                                    </a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>

                                                </div>
                                            </li>
                                            @else
                                                <a href="{{ route('login') }}">Login</a>
                                                @if (Route::has('register'))
                                                <a href="{{ route('register') }}">Register</a>
                                            @endif
                                        @endauth
                                    </div>
                                @endif
                            </div>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="searchbar col-md-12 p-2">
                <div class="col-md-8 offset-md-4">
                    <form action="{{ action('Front\WordController@index') }}" method="get">
                        <div class="form-group row  mt-3">
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="cond_name" placeholder="単語を検索">
                            </div>
                            <div class="col-md-2">
                                {{ csrf_field() }}
                                {{--  <input type="hidden" name="id" value="{{ Auth::user()->id }}">  --}}
                                <input type="submit" class="btn search" value="検索">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal js-modal">
                <div class="modal__bg js-modal-close">
                    <div class="modal__content">
                        <h5>ログアウトします。よろしいですか？</h5>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Yes
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <button class="js-modal-close btn btn-danger">
                                No
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    {{--  <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script src="js/ex01.js"></script>
    <script>
        $('#keyboard').jkeyboard({
          layout: "english",
          input: $('#search_field')
        });
    </script>  --}}
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </body>
</html>
