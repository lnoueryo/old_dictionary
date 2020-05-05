@extends('layouts.front')

@section('title', 'Develop_term')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <h2></h2>
                <form action="{{ action('Front\WordController@add') }}" method="post" enctype="multipart/form-data">

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
                    　　<input type="text" class="form-control" name="name" value="{{ old('name') }}">
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
                    　　<input type="text" class="form-control" name="phonetic_symbol" value="{{ old('phonetic_symbol') }}" placeholder="仮想キーボード">
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
                        <!-- 　<option value="6">アラビア語</option>
                        　<option value="7">ロシア語</option>
                        　<option value="8">韓国語</option>
                        　<option value="9">中国語</option> -->
                        </select>
                    　</div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-1" for="meaning">意味</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="meaning" value="{{ old('meaning') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-1" for="example_sentence">例文</label>
                        <div class="col-md-9">
                            <div id="input_pluralBox">
                                <div id="input_plural">
                                    <input type="text" class="form-control" placeholder="jquery focusin add" value="{{ old('example_sentence') }}">
                                    <input type="button" value="＋" class="add pluralBtn btn-primary m-1">
                                    <input type="button" value="－" class="del pluralBtn btn-danger m-1">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="form-group row">
                    　<div class="col-md-4 offset-md-1">
                        <select class="form-control" id="genre" name="genre">
                        　<option value="1" selected="selected" disabled>ジャンル</option>
                        　<option value="健康">健康</option>
                        　<option value="スポーツ">スポーツ</option>
                        　<option value="旅行">旅行</option>
                        　<option value="ゲーム">ゲーム</option>
                        　<option value="マンガ・アニメ">マンガ・アニメ</option>
                        　<option value="映画">映画</option>
                        　<option value="食べ物">食べ物</option>
                        　<option value="音楽">音楽</option>
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
                    </div> -->
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
                    <!-- <div class="form-group row">
                        <label class="col-md-1" for="image_path">画像</label>
                        <div class="col-md-10">
                          <input type="file" id="myImage" accept="image/*" name="image" class="form-control-file">
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
                                                <img id="image" src="">
                                            </div>
                                            <div class="col-md-4">
                                                <div class="preview"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="crop">Crop</button>
                                </div>
                                </div>
                            </div>
                            </div>
                            <div class="form-group row">
                                <img id="preview" class="trim m-3">
                                <p class="m-1">※単語に関係のある画像を選択して下さい</p>
                            </div>
                        </div>
                    </div> -->
                    <div class="form-group row">
                    <label class="col-md-1" for="sound_path">音声</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" accept="sound/*" name="sound">
                            <audio id="audio" controls>
                            <source src="sound/*">
                            </audio><br>
                            <input type="button" value="play" onclick="audio_play()">
                            <input type="button" value="pause" onclick="audio_pause()">
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary col-md-3 offset-md-1" value="登録">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
            <!-- <div class="col-2">
            <div class="form-group row">
                        <div class="col-md-10">
                        <script type="text/javascript" src="http://www.google.com/jsapi?key=xx"></script>

<script type="text/javascript">

  function OnLoad()
  {
      // 検索コントロールを作成する
      var searchControl = new google.search.SearchControl();

      // 検索コントロールに画像検索のサーチャーを追加する
      searchControl.addSearcher( new google.search.ImageSearch() );

      // 検索コントロールを描画する
      searchControl.draw( document.getElementById( 'content' ) );

      // 検索を実行する
      searchControl.execute( '画像検索' );
  }


  // Search APIをロードする
  google.load( 'search', '1' );

  // ドキュメントがロードされた後に呼び出されるハンドラ関数を登録する
  google.setOnLoadCallback( OnLoad );



</script>

<div id="content">Loading...</div>
                        </div>
                    </div>
                    <p>Hello world</p> -->

