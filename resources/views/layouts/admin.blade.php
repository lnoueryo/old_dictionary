<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <!-- Scripts -->
         <!-- {{-- Laravel標準で用意されているJavascriptを読み込みます --}} -->
        <script src="{{ asset('js/ex01.js') }}" defer></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <!-- {{-- Laravel標準で用意されているCSSを読み込みます --}} -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- {{-- この章の後半で作成するCSSを読み込みます --}} -->
        <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    </head>

    <body>
        <div id="app">
        <div class="">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container">
                    <a class="navbar-brand" href="{{ route('home') }}"><h2>𒄀𒋏𒄊</h2></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}">User</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="{{ route('adminInbox') }}">Mail</a>
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
                                    <div class="top-right links">
                                        @auth
                                            <li class="nav-item dropdown">
                                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                    {{ Auth::user()->nickname }} <span class="caret"></span>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                    <a class="dropdown-item" href="{{ route('profile') }}">
                                                        {{ __('プロフィール') }}
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
                        <div class="form-group row">
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="cond_name" placeholder="単語を検索">
                            </div>
                            <div class="col-md-2">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                                <input type="submit" class="btn btn-primary" value="検索">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal js-modal">
                <div class="modal__bg js-modal-close">
                <div class="modal__content">
                    <p>ここにモーダルウィンドウで表示したいコンテンツを入れます。モーダルウィンドウを閉じる場合は下の「閉じる」をクリックするか、背景の黒い部分をクリックしても閉じることができます。</p>

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
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </body>
</html>
