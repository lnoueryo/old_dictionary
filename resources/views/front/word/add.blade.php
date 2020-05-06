@extends('layouts.front')
@section('title', 'ニュースの新規作成')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8 offset-2">
            <h2></h2>
            <form action="{{ action('Front\WordController@create') }}" method="post" enctype="multipart/form-data">
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
                　　<input type="text" id="name" class="form-control" name="name" value="{{ old('name') }}">
                　</div>
                　<label class="col-md-1" for="language">言語</label>
                　<div class="col-md-4">
                    <select class="form-control" id="language" name="language" value="{{ old('language') }}">
                    　<option value="0">選択してください</option>
                    　<option value="日本語">日本語</option>
                    　<option value="英語">英語</option>
                    　<option value="ドイツ語">ドイツ語</option>
                    </select>
                　</div>
                </div>
                <div class="form-group row">
                　<label class="col-md-1" for="phonetic_symbol">発音</label>
                　<div class="col-md-4">
                　　<input type="text" id="phonetic_symbol" class="form-control" name="phonetic_symbol" value="{{ old('phonetic_symbol') }}" placeholder="仮想キーボード">
                　</div>
                　<label class="col-md-1" for="parts_of_speech">品詞</label>
                　<div class="col-md-4">
                    <select class="form-control" id="parts of speech" name="parts_of_speech" value="{{ old('parts_of_speech') }}">
                    　<option value="0">言語でオプション変更</option>
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
                        <input type="text" id="meaning" class="form-control" name="meaning" value="{{ old('meaning') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-1" for="example_sentence">例文</label>
                    <div class="col-md-9">
                        <div id="input_pluralBox">
                            <div id="input_plural">
                                <input type="text" id="example_sentence" class="form-control" placeholder="jquery focusin add" value="{{ old('example_sentence') }}">
                                <input type="button" value="＋" class="add pluralBtn btn-primary m-1">
                                <input type="button" value="－" class="del pluralBtn btn-danger m-1">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-1" for="image_path">画像</label>
                    <div class="col-md-10">
                        <input type="file" id="myImage" accept="image/*" class="form-control-file" name="image">
                        <div class="form-group row">
                            <img id="preview" class="trim m-3">
                            <p class="m-1">※単語に関係のある画像を選択して下さい</p>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-1" for="image_path">画像</label>
                    <div class="col-md-10">
                <div class="container">
                    <input type="file" name="image" class="image">
                </div>
                <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalLabel">Laravel Crop Image Before Upload using Cropper JS - NiceSnippets.com</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="img-container">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
                                        </div>
                                        <div class="col-md-4">
                                            <div class="preview"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-primary" id="crop">Crop</button>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                </div>
                <input type="file" name="image" id="image" onchange="readURL(this);"/>
<div class="image_container">
    <img id="blah" src="#" alt="your image" />
</div>
<div id="cropped_result"></div>        // Cropped image to display (only if u want)
<button id="crop_button">Crop</button> // Will trigger crop event

                {{ csrf_field() }}
                <input type="submit" class="btn btn-primary col-md-3 offset-md-1" value="登録">
            </form>
        </div>
    </div>
</div>
@endsection
