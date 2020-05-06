@extends('layouts.front')

@section('title', '登録済みニュースの一覧')

@section('content')
    <div class="container">
        <!-- <div class="row">
            <h2>単語一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Front\WordController@add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\WordController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">タイトル</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_name" value={{ $cond_name }}>
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div> -->
        <!-- <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <td width="2%">ID</td>
                                <td width="10%">Name</td>
                                <td width="7%">Language</td>
                                <td width="10%">Phonetic symbol</td>
                                <td width="10%">Parts of speech</td>
                                <td width="15%">Meaning</td>
                                <td width="15%">Image_path</td>
                                <td width="10%">Sound_path</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $name)
                                <tr>
                                    <td>{{ $name->id }}</td>
                                    <td>{{ Str::limit($name->name, 15) }}</td>
                                    <td>{{ Str::limit($name->language, 15) }}</td>
                                    <td>{{ Str::limit($name->phonetic_symbol, 15) }}</td>
                                    <td>{{ Str::limit($name->parts_of_speech, 15) }}</td>
                                    <td>{{ Str::limit($name->meaning, 15) }}</td>
                                    <td><img src="{{ asset('storage/image/' . $name->image_path) }}" class="trim"></td>
                                    <td>{{ Str::limit($name->sound_path, 10) }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ action('Admin\WordController@edit', ['id' => $name->id]) }}">編集</a>
                                        </div>
                                        <div>
                                            <a href="{{ action('Admin\WordController@delete', ['id' => $name->id]) }}">削除</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> -->
        <div class="col-md-8 offset-md-2">
            <div id="summary" class="mainBlock non-member hlt_SUMRY col-md-12">
                <div class="addLmFdWr" id="addLmFdWrHdId">
                    <table class="summaryTbl">
                        <tbody>
                            <tr>
                                <td class="summaryL">
                                    <h1 title="giveとは 意味・読み方・使い方">
                                        <div>
                                            <span id="h1Query">{{ Str::limit($name->name, 15) }}</span>
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
                                                    <div id="ePsdQc">
                                                    <!-- <i class="fa fa-volume-up contentTopAudioIcon">
                                                        <audio class="contentAudio" controls="controls" preload="none">
                                                            <source src="https://weblio.hs.llnwd.net/e7/img/dict/kenej/audio/S-A52BACC_E-A52D540.mp3" type="audio/mpeg">
                                                        </audio>
                                                    </i> -->
                                                    </div>
                                                </td>
                                                <td>
                                                    <div id="ePsdDl">
                                                        <a href="https://weblio.hs.llnwd.net/e7/img/dict/kenej/audio/S-A52BACC_E-A52D540.mp3" id="audioDownloadPlayUrl">
                                                        <!-- <i class="fa fa-play-circle"></i><br> -->
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div id="add">
                                                        <a href="https://weblio.hs.llnwd.net/e7/img/dict/kenej/audio/S-A52BACC_E-A52D540.mp3" id="audioDownloadPlayUrl" class="addUwl">>
                                                        <img src="icon/play.png">
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div id="edit">
                                                    <a href="{{ action('Admin\WordController@edit', ['id' => $name->id]) }}" class="addUwl"><img src="icon/edit.png"></a>
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
                                                <td>
                                                    <span>プレーヤー再生</span>
                                                </td>
                                                <td>
                                                    <span>編集</span>
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
                                        <img src="https://weblio.hs.llnwd.net/e7/img/icons/addWordlist.png" alt="">
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
                                        <b class="squareCircle description">主な意味</b>
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
                                    <img src="{{ asset('storage/image/' . $name->image_path) }}">
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
    </div>
@endsection
