@extends('layouts.front')
<link rel="stylesheet" href="{{ asset('css/contents/word.css') }}">
@section('title', '登録済みニュースの一覧')

@section('content')
    <div class="container">
        <div class="col-md-8 offset-md-2">
            <div class="offset-md-1 mb-4">
                <h2></h2>
            </div>
            <div id="summary" class="mainBlock non-member hlt_SUMRY col-md-12">
                <div class="addLmFdWr" id="addLmFdWrHdId">
                    <table class="summaryTbl">
                        <div class="row">
                            <div class="col-md-10 offset-md-3">
                                <nav class="navbar navbar-expand-lg navbar-light">
                                    <a class="navbar-brand mr-5" href="#">デッキ</a>
                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                        <ul class="navbar-nav mr-auto">
                                            <li class="nav-item active">
                                            <a class="nav-link mr-5" href="{{ route('mycard') }}">検索 <span class="sr-only">(current)</span></a>
                                            </li>
                                            <li class="nav-item">
                                            <a class="nav-link" href="#">統計</a>
                                            </li>
                                            {{-- <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Dropdown
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                </div>
                                            </li> --}}
                                            {{-- <li class="nav-item">
                                            <a class="nav-link disabled" href="#">Disabled</a>
                                            </li> --}}
                                        </ul>
                                    </div>
                                </nav>
                                @if(!$german->isEmpty())
                                <div class="row">
                                    <div class="col-md-2">
                                        <p><input type="radio" class="mr-1 align-middle" name="language" value="0" checked>ドイツ語</p>
                                    </div>
                                    <div class="col-md-3">
                                        <p>本日の枚数</p>
                                    </div>
                                    <div class="col-md-2">
                                        <p>{{ $count }}</p>
                                    </div>
                                </div>
                                @endif
                                @if(!$english->isEmpty())
                                <div class="row">
                                    <div class="col-md-2">
                                        <p><input type="radio" class="mr-1 align-middle" name="language" value="1">英語</p>
                                    </div>
                                    <div class="col-md-3">
                                        <p>本日の枚数</p>
                                    </div>
                                    <div class="col-md-2">
                                        <p>{{ $count_1 }}</p>
                                    </div>
                                </div>
                                @endif
                                <div class="row">
                                    <div class="col-md-6">
                                        <a class="mt-3 ml-5 col-md-7 btn btn-green" href="{{ action('Front\FlashCardController@start') }}" method="get">スタート</a>
                                        {{-- <button class="float-right col-md-8 btn-warning" href="{{ action('Front\FlashCardController@game', ['practice_card' => $practice_card]) }}">スタート</button> --}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4 col-md-2">

                            </div>
                            <div class="col-sm-4 col-md-8">
                            </div>
                            <div class="col-sm-4 col-md-2"></div>
                          </div>

                        {{-- <tbody>
                            <tr>
                                <td class="summaryL">
                                    <h1 title="giveとは 意味・読み方・使い方">
                                        <div>
                                            <span id="h1Query"></span>
                                            <span id="h1Suffix"></span>
                                        </div>
                                        <div class="h1keywords"></div>
                                    </h1>
                                </td>
                                <td class="pt-3 pl-5">
                                    <table class="audio pt-3 pl-5">
                                        <tbody>
                                            <tr>
                                                <td class="pl-5">
                                                    <audio src="{{ asset('storage/sound/' . $name->sound_path) }}" class="pl-5" controls>
                                                        <source src="{{ asset('storage/sound/' . $name->sound_path) }}" type="audio/mpeg">
                                                    </audio>
                                                </td>
                                                <td>
                                                    <div id="edit" class="pt-3 pl-4">
                                                    <a href="{{ action('Front\WordController@edit', ['id' => $name->id]) }}" class="addUwl"><img src="{{ asset('icon/edit.png') }}"></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <!-- <td class="pin-icon-cell">
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
                                        <div>
                                            <a href="{{ action('Admin\WordController@edit', ['id' => $name->id]) }}"><img src="icon/edit.png"></a>
                                        </div>
                                    </div>
                                </td> -->
                            </tr>
                        </tbody>
                    </table>
                    <div class="summaryM descriptionWrp">
                        <table>
                            <tbody>
                                <tr>
                                    <td>
                                        <b class="squareCircle description">意味</b>
                                    </td>
                                    <td class="content-explanation ej">{{ Str::limit($name->meaning, 15) }}</td>
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
                                </td>
                                @if(isset($name->image_path))
                                <td class="eGCoreDta">
                                    <img src="{{ asset('storage/image/' . $name->image_path) }}" class="trim2">
                                </td>@endif
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="summaryM">
                    <table>
                        <tbody>
                            <tr>
                                    <b class="squareCircle">発音記号・読み方</b>
                                </td>
                                <td>
                                    <div id="phoneticEjjeNavi">
                                        <div class="phoneticEjjeWrp">
                                            <span class="phoneticEjjeDesc">{{ $name->phonetic_symbol }}</span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody> --}}
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
