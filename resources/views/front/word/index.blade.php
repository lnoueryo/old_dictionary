<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title></title>

        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/ex01.js') }}" defer></script>

        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css" integrity="sha256-jKV9n9bkk/CTP8zbtEtnKaKf+ehRovOYeKoyfthwbC8=" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js" integrity="sha256-CgvH7sz3tHhkiVKh05kSUgG97YtzYNnWt6OXcmYzqHY=" crossorigin="anonymous"></script>


        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/dictionary.css') }}">


    </head>
    <body>
        <div id="app">
        <div class="header">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container">
                    <a class="navbar-brand" href="{{ route('/') }}"><h2>𒄀𒋏𒄊</h2></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                            <a class="nav-link" href="{{ route('/') }}">Home</a>
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
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <div class="flex-center position-ref full-height">
                                @if (Route::has('login'))
                                    <div class="top-right links">
                                        @auth
                                            <li class="nav-item dropdown">
                                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                    {{ Auth::user()->name }} <span class="caret"></span>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                        {{ __('Logout') }}
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
                    <form action="{{ action('Front\HomeController@index') }}" method="get">
                        <div class="form-group row">
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="cond_title" placeholder="単語を検索">
                            </div>
                            <div class="col-md-2">
                                {{ csrf_field() }}
                                <input type="submit" class="btn btn-primary" value="検索">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
            <main class="py-4">
            <div class="col-8 offset-2">
            <div id="summary" class="mainBlock non-member hlt_SUMRY">
                <div class="addLmFdWr" id="addLmFdWrHdId">
                    <table class="summaryTbl">
                        <tbody>
                            <tr>
                                <td class="summaryL">
                                    <h1 title="giveとは 意味・読み方・使い方">
                                        <div>
                                            <span id="h1Query">{{ Str::limit($headline->name, 70) }}</span>
                                            <span id="h1Suffix"></span>
                                        </div>
                                        <div class="h1keywords"></div>
                                    </h1>
                                </td>
                                <td class="summaryC">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div id="ePsdQc"></div>
                                                    <i class="fa fa-volume-up contentTopAudioIcon">
                                                        <audio class="contentAudio" controls="controls" preload="none">
                                                            <source src="https://weblio.hs.llnwd.net/e7/img/dict/kenej/audio/S-A52BACC_E-A52D540.mp3" type="audio/mpeg">
                                                        </audio>
                                                    </i>
                                                </td>
                                                <td>
                                                    <div id="ePsdDl">
                                                        <a href="https://weblio.hs.llnwd.net/e7/img/dict/kenej/audio/S-A52BACC_E-A52D540.mp3" id="audioDownloadPlayUrl">
                                                        <i class="fa fa-play-circle"></i><br>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span>発音を聞く</span>
                                                </td>
                                                <td>
                                                    <span>プレーヤー再生</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td class="pin-icon-cell">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <i id="icon-pin-word" class="fa fa-thumb-tack fa-rotate-315" aria-hidden="true"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span>ピン留め</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td class="summaryR">
                                    <div class="error">追加できません(登録数上限)</div>
                                    <div class="commonBtn wlaBtnI" id="addUwl" data-encquery="give">
                                        <img src="https://weblio.hs.llnwd.net/e7/img/icons/addWordlist.png" alt="">
                                        <span class="gtm-addUwl-str">編集</span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="summaryM descriptionWrp">
                        <table>
                            <tbody>
                                <tr>
                                    <td>
                                        <b class="squareCircle description">主な意味</b>
                                    </td>
                                    <td class="content-explanation ej">{{ Str::limit($headline->meaning, 650) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="summaryM EGateCoreDataWrp">
                    <table>
                        <tbody>
                            <tr>
                                <td>
                                    <b class="squareCircle description">コア</b>
                                </td>
                                <td>
                                    <img src="{{ asset('storage/image/' . $headline->image_path) }}" alt="give01.jpg">
                                </td>
                                <td class="eGCoreDta">
                                    <p>自分のところから何かを出す</p>
                                    <span>自分のところに「取り込む」のがtake,そこから「出す」のがgive</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="summaryM">
                    <table>
                        <tbody>
                            <tr>
                                <td>
                                    <b class="squareCircle">音節</b>
                                </td>
                                <td>
                                    <span class="syllableEjje">give</span>
                                </td>
                                <td>
                                    <b class="squareCircle">発音記号・読み方</b>
                                </td>
                                <td>
                                    <div id="phoneticEjjeNavi">
                                        <div class="phoneticEjjeWrp">
                                            <span class="phoneticEjjeSym">/</span>
                                            <span class="phoneticEjjeDesc">gív</span>
                                            <span class="phoneticEjjeDc">(米国英語)</span>
                                            <span class="phoneticEjjeSym">/</span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


            <div class="container">
                <hr color="#c0c0c0">
                <div class="row">
                    <div class="headline col-md-10 mx-auto">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="caption mx-auto">
                                    <div class="image">
                                        <img src="{{ asset('storage/image/' . $headline->image_path) }}" class="front_trim">
                                    </div>
                                    <div class="title p-2">
                                        <h1>{{ Str::limit($headline->name, 70) }}</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <p class="body mx-auto">{{ Str::limit($headline->meaning, 650) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                        </main>
                    </div>
                    
                </body>
            </html>

