@extends('layouts.front')
<link rel="stylesheet" href="{{ asset('css/contents/word.css') }}">
@section('title', 'ニュースの編集')

@section('content')

        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>ニュース編集</h2>
                <form action="{{ action('Front\WordController@update') }}" method="post" enctype="multipart/form-data">
<div class="col-8 offset-2">
            <div id="summary" class="mainBlock non-member hlt_SUMRY">
                <div class="addLmFdWr" id="addLmFdWrHdId">
                    <table class="summaryTbl">
                        <tbody>
                            <tr>
                                <td class="summaryL">
                                    <h1 title="giveとは 意味・読み方・使い方">
                                        <div>
                                            <span id="h1Query">
                                            <div class="form-group row">
                                                <label class="col-md-4" for="name">単語</label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" name="name" value="{{ $name_form->name }}">
                                                </div>
                                            </span>
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
                                    <td class="content-explanation ej" for="meaning">
                                        <div class="form-group row">
                                            <div class="col-md-8 offset-md-2">
                                                <input type="text" class="form-control" name="meaning" value="{{ $name_form->meaning }}">
                                            </div>
                                        </div>
                                    </td>
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
                                    <img src="{{ asset('storage/image/' . $name_form->image_path) }}" alt="give01.jpg">
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
                    <label class="col-md-1" for="language">言語</label>
                    　<div class="col-md-4">
                        <select type="text" class="form-control" id="language" name="language">
                        　<option value="{{ $name_form->language }}" hidden>{{ $name_form->language }}</option>
                        　<option value="日本語">日本語</option>
                        　<option value="英語">英語</option>
                        　<option value="ドイツ語">ドイツ語</option>
                        　<option value="4">スペイン語</option>
                        　<option value="5">イタリア語</option>
                        　<option value="6">アラビア語</option>
                        　<option value="7">ロシア語</option>
                        　<option value="8">韓国語</option>
                        　<option value="9">中国語</option>
                        </select>
                    　</div>
                    <label class="col-md-1" for="phonetic_symbol">発音</label>
                    　<div class="col-md-4">
                    　　<input type="text" class="form-control" name="phonetic_symbol" value="{{ $name_form->phonetic_symbol }}" placeholder="仮想キーボード">
                    　</div>
                    　<label class="col-md-1" for="parts_of_speech">品詞</label>
                    　<div class="col-md-4">
                        <select class="form-control" id="parts_of_speech" name="parts_of_speech" value="{{ $name_form->parts_of_speech }}">
                        　<option value="{{ $name_form->parts_of_speech }}" hidden>{{ $name_form->parts_of_speech }}</option>
                        　<option value="動詞">動詞</option>
                        　<option value="名詞">名詞</option>
                        　<option value="形容詞">形容詞</option>
                        　<option value="副詞">副詞</option>
                        　<option value="前置詞">前置詞</option>
                        </select>
                    　</div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $name_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </div>
            </div>
        </div>

</form>
        </div>

    <!-- <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>ニュース編集</h2>
                <form action="{{ action('Admin\WordController@update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                    　<label class="col-md-1" for="name">単語</label>
                    　<div class="col-md-4">
                    　　<input type="text" class="form-control" name="name" value="{{ $name_form->name }}">
                    　</div>
                    　<label class="col-md-1" for="language">言語</label>
                    　<div class="col-md-4">
                        <select type="text" class="form-control" id="language" name="language">
                        　<option value="{{ $name_form->language }}" hidden>{{ $name_form->language }}</option>
                        　<option value="日本語">日本語</option>
                        　<option value="英語">英語</option>
                        　<option value="ドイツ語">ドイツ語</option>
                        　<option value="4">スペイン語</option>
                        　<option value="5">イタリア語</option>
                        　<option value="6">アラビア語</option>
                        　<option value="7">ロシア語</option>
                        　<option value="8">韓国語</option>
                        　<option value="9">中国語</option>
                        </select>
                    　</div>
                    </div>
                    <div class="form-group row">
                    　<label class="col-md-1" for="phonetic_symbol">発音</label>
                    　<div class="col-md-4">
                    　　<input type="text" class="form-control" name="phonetic_symbol" value="{{ $name_form->phonetic_symbol }}" placeholder="仮想キーボード">
                    　</div>
                    　<label class="col-md-1" for="parts_of_speech">品詞</label>
                    　<div class="col-md-4">
                        <select class="form-control" id="parts_of_speech" name="parts_of_speech" value="{{ $name_form->parts_of_speech }}">
                        　<option value="{{ $name_form->parts_of_speech }}" hidden>{{ $name_form->parts_of_speech }}</option>
                        　<option value="動詞">動詞</option>
                        　<option value="名詞">名詞</option>
                        　<option value="形容詞">形容詞</option>
                        　<option value="副詞">副詞</option>
                        　<option value="前置詞">前置詞</option>
                        </select>
                    　</div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-1" for="meaning">意味</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="meaning" value="{{ $name_form->meaning }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-1" for="example_sentence">例文</label>
                        <div class="col-md-9">
                            <div id="input_pluralBox">
                                <div id="input_plural">
                                    <input type="text" class="form-control" placeholder="jquery focusin add">
                                    <input type="button" value="＋" class="add pluralBtn btn-primary m-1">
                                    <input type="button" value="－" class="del pluralBtn btn-danger m-1">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-1" for="image_path">画像</label>
                        <div class="col-md-10">
                            <input type="file" id="image_path" accept="image/*" class="form-control-file" name="image">
                            <div class="form-group row">
                                <img id="preview" class="trim m-3" src="{{ asset('storage/image/' . $name_form->image_path) }}">
                                <p class="m-1">※単語に関係のある画像を選択して下さい</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $name_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
                <div class="row mt-5">
                    <div class="col-md-4 mx-auto">
                        <h2>編集履歴</h2>
                        <ul class="list-group">
                            @if ($name_form->histories != NULL)
                                @foreach ($name_form->histories as $history)
                                    <li class="list-group-item">{{ $history->edited_at }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
@endsection
