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
                    　　<input type="text" class="form-control" name="name" value="{{ $name_form->name }}">
                    　</div>
                    　<label class="col-md-1" for="language">言語</label>
                    　<div class="col-md-4">
                        <select type="text" class="form-control" id="language" name="language">
                        　<option value="{{ $name_form->language }}" selected>{{ $name_form->language }}</option>
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
                        <select class="form-control" id="parts of speech" name="parts_of_speech" value="{{ $name_form->parts_of_speech }}">
                        　<option value="{{ $name_form->parts_of_speech }}" selected>{{ $name_form->parts_of_speech }}</option>
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
                        <label class="col-md-2" for="image">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                            <div class="form-text text-info">
                                設定中: {{ $name_form->image_path }}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </label>
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
    </div>
@endsection
