@extends('layouts.admin')

@section('title', 'ニュースの編集')

@section('content')
    <div class="container">
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
                    　　<input type="text" class="form-control" name="name" value="{{ $word_form->name }}">
                    　</div>
                    　<label class="col-md-1" for="language">言語</label>
                    　<div class="col-md-4">
                        <select type="text" class="form-control" id="language" name="language">
                        　<option value="{{ $word_form->language }}" selected>{{ $word_form->language }}</option>
                        　<option value="日本語">日本語</option>
                        　<option value="英語">英語</option>
                        　<option value="3">ドイツ語</option>
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
                    　　<input type="text" class="form-control" name="phonetic_symbol" value="{{ $word_form->phonetic_symbol }}" placeholder="仮想キーボード">
                    　</div>
                    　<label class="col-md-1" for="parts_of_speech">品詞</label>
                    　<div class="col-md-4">
                        <select class="form-control" id="parts of speech" name="parts_of_speech" value="{{ $word_form->parts_of_speech }}">
                        　<option value="{{ $word_form->parts_of_speech }}" selected>{{ $word_form->parts_of_speech }}</option>
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
                            <input type="text" class="form-control" name="meaning" value="{{ $word_form->meaning }}">
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
                    　<div class="col-md-4 offset-md-1">
                        <select class="form-control" id="genre" name="genre">
                        　<option value="1" selected="selected" disabled>ジャンル</option>
                        　<option value="2">健康</option>
                        　<option value="3">スポーツ</option>
                        　<option value="4">旅行</option>
                        　<option value="5">ゲーム</option>
                        　<option value="6">マンガ・アニメ</option>
                        　<option value="7">映画</option>
                        　<option value="8">食べ物</option>
                        　<option value="9">音楽</option>
                        </select>
                    　</div>
                    　<div class="col-md-4 offset-md-1">
                        <select class="form-control" id="genre2" name="genre2" style="display: none;">
                        　<option value="1" selected="selected" disabled>ジャンル</option>
                        　<option value="2" style="display: none;">バスケットボール</option>
                        　<option value="3" style="display: none;">サッカー</option>
                        　<option value="4" style="display: none;">野球</option>
                        　<option value="5" style="display: none;">ワンピース</option>
                        　<option value="6" style="display: none;">ナルト</option>
                        　<option value="7" style="display: none;">ワンパンチマン</option>
                        　<option value="8">食べ物</option>
                        　<option value="9">音楽</option>
                        </select>
                    　</div>
                    </div>
                    <div class="form-group row">
                    <label class="col-md-1" for="image_path">画像</label>
                        <div class="col-md-10">
                            <input type="file" id="myImage" accept="image/*" class="form-control-file" name="image" value="{{ $word_form->image_path }}">
                            {{ $word_form->image_path }}
                            <div class="form-group row">
                                <img id="preview" class="trim m-3" value="{{ $word_form->image_path }}">
                                <p class="m-1">※単語に関係のある画像を選択して下さい</p>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="form-group row">
                    <label class="col-md-1" for="sound_path">音声</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" accept="sound/*" name="sound" value="{{ $word_form->sound_path }}">
                            <audio id="audio" controls>
                            <source src="sound/*">
                            </audio><br>
                            <input type="button" value="play" onclick="audio_play()">
                            <input type="button" value="pause" onclick="audio_pause()">
                        </div>
                    </div> -->
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $word_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
                <div class="row mt-5">
                    <div class="col-md-4 mx-auto">
                        <h2>編集履歴</h2>
                        <ul class="list-group">
                            @if ($word_form->histories != NULL)
                                @foreach ($word_form->histories as $history)
                                    <li class="list-group-item">{{ $history->edited_at }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
