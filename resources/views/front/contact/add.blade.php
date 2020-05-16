@extends('layouts.front')
<link rel="stylesheet" href="{{ asset('css/contents/contact.css') }}">

@section('title', '登録済みニュースの一覧')

@section('content')
<div class="container">
    <div class="col-10 offset-1">
    <div class="row">
    <h1>お問い合わせフォーム</h1>
        <div class="row">
            <div id="card" class="content">
                <form class="w" action="{{ action('Front\ContactController@create') }}" method="post" enctype="multipart/form-data">

                <div class="form-group row">
                　<label class="col-md-1 offset-md-2" for="name">お名前</label>
                　<div class="col-md-4">
                　　<input type="text" id="name" class="form-control" name="name" value="{{ old('name') }}">
                　</div>
                <!-- 　<label class="col-md-1" for="language">言語</label>
                　<div class="col-md-4">
                    <select class="form-control" id="language" name="language" value="{{ old('language') }}">
                    　<option value="0">選択してください</option>
                    　<option value="日本語">日本語</option>
                    　<option value="英語">英語</option>
                    　<option value="ドイツ語">ドイツ語</option>
                    </select>
                　</div> -->
                </div>
                    <div class="form-group row">
                        <label class="col-md-1 offset-md-2" for="phonetic_symbol">件名</label>
                    　  <div class="col-md-4">
                    　　    <input type="text" id="phonetic_symbol" class="form-control" name="phonetic_symbol" value="{{ old('phonetic_symbol') }}">
                    　  </div>
                    <!-- 　<label class="col-md-1" for="parts_of_speech">品詞</label>
                    　<div class="col-md-4">
                        <select class="form-control" id="parts of speech" name="parts_of_speech" value="{{ old('parts_of_speech') }}">
                        　<option value="0">言語でオプション変更</option>
                        　<option value="動詞">動詞</option>
                        　<option value="名詞">名詞</option>
                        　<option value="形容詞">形容詞</option>
                        　<option value="副詞">副詞</option>
                        　<option value="前置詞">前置詞</option>
                        </select>
                    　</div> -->
                    </div>
                    <div class="form-group row">
                        <label class="col-md-1 offset-md-2">本文</label>
                        <div class="col-md-6">
                            <textarea class="form-control" name="body" rows="5">{{ old('body') }}</textarea>
                        </div>
                    </div>
                    <!-- <div class="form-group row">
                        <label class="col-md-1 offset-md-1" for="image_path">画像</label>
                        <div class="col-md-6">
                            <input type="file" id="image_path" accept="image/*" class="form-control-file" name="image">
                            <div class="form-group row">
                                <img id="preview" class="trim m-3">
                                <p class="m-1">※単語に関係のある画像を選択して下さい</p>
                            </div>
                        </div>
                    </div> -->

                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary col-md-3 float-right" value="登録">
                </form>
            </div>
        </div>
    </div>
    


            </div>
        </div>
    </div>
</div>
@endsection('content')
