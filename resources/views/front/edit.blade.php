@extends('layouts.front')
<link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">

@section('content')
{{--  <div class="popup" id="js-popup">
    <div class="popup-inner">
      <div class="close-btn" id="js-close-btn"><i class="fas fa-times"></i></div>
      <a href="#"><img src="./img/popup.jpg" alt="ポップアップ画像"></a>
      <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in!<br>引き続きプロフィール作成をお願いします。
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="black-background" id="js-black-bg">

    </div>
</div>
</div>  --}}

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
    <div class="card">
        <div class="card-header">プロフィールを編集</div>
        <div class="ml-5 mr-4 row">
            <form class="offset-md-2" action="{{ action('Auth\ProfileController@update') }}" method="post" enctype="multipart/form-data">
                <div class="form-group mt-3">
                    <div class="firstItem">
                    <label class="control-label">名前</label>
                    <br><input class="form-control" type="text" value="{{ Auth::user()->name }}" disabled>
                    </div>
                    <div class="secondItem mt-3">
                    <label class="control-label">メールアドレス</label>
                    <br><input class="form-control" type="text" value="{{ Auth::user()->email }}" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <div class="firstItem">
                    <label class="control-label" for="nickname">ニックネーム</label>
                    <input class="form-control" type="text" name="nickname" value="{{ Auth::user()->nickname }}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="secondItem mr-4">
                        <label class="control-label" for="gender">性別</label>
                        <div class="radio mt-2" name="gender" value="{{ Auth::user()->gender }}">
                            <label><input class="mr-2 ml-2" type="radio" name="gender" value="男性" {{ (Auth::user()->gender=="男性")? "checked" : "" }}>男性</label>
                            <label><input class="mr-2 ml-2" type="radio" name="gender" value="女性" {{ (Auth::user()->gender=="女性")? "checked" : "" }}>女性</label>
                            <label><input class="mr-2 ml-2" type="radio" name="gender" value="その他" {{ (Auth::user()->gender=="その他")? "checked" : "" }}>その他</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="birth"
                               class="col-md-3 col-form-label">生年月日</label>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-4">
                                    <select id="birth_year" class="form-control" name="birth_year">
                                        <option>----</option>
                                        @for ($i = 1980; $i <= 2005; $i++)
                                            {{-- <option value="{{ $i }}"
                                                    @if(old('birth_year') == $i) selected @endif>{{ $i }}</option> --}}
                                            <option value="{{ $i }}" {{ (Auth::user()->birth_year == $i)? "selected" : "" }}>{{ $i }}</option>
                                        @endfor
                                    </select>
                                    @if ($errors->has('birth_year'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('birth_year') }}</strong>
                                        </span>
                                    @endif
                                </div><div class="pt-2">年</div>

                                <div class="col-md-3">
                                    <select id="birth_month" class="form-control" name="birth_month">
                                        <option value="">--</option>
                                        @for ($i = 1; $i <= 12; $i++)
                                            <option value="{{ $i }}" {{ (Auth::user()->birth_month == $i)? "selected" : "" }}>{{ $i }}</option>
                                        @endfor
                                    </select>
                                    @if ($errors->has('birth_month'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('birth_month') }}</strong>
                                        </span>
                                    @endif
                                </div><div class="pt-2">月</div>

                                <div class="col-md-3">
                                    <select id="birth_day" class="form-control" name="birth_day">
                                        <option value="">--</option>
                                        @for ($i = 1; $i <= 31; $i++)
                                            <option value="{{ $i }}" {{ (Auth::user()->birth_day == $i)? "selected" : "" }}>{{ $i }}</option>
                                        @endfor
                                    </select>

                                    @if ($errors->has('birth_day'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('birth_day') }}</strong>
                                        </span>
                                    @endif
                                </div><div class="pt-2">日</div>
                            </div>

                            <div class="row col-md-6 col-md-offset-4">
                                @if ($errors->has('birth'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('birth') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="firstItem">
                        <label class="control-label" for="age">年齢</label>
                        <input class="form-control col-md-6" name="age" type="text"　value="{{ Auth::user()->age }}">
                    </div>
                  </div>

                  <div class="form-group mt-1">
                    <div class="firstItem">
                    <label class="control-label" for="occupation">職業</label>
                    <input class="form-control" type="text" name="occupation" value="{{ Auth::user()->occupation }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="country">国籍</label>
                    <select class="form-control" name="country">
                        <option value="{{Auth::user()->country}}" selected>{{Auth::user()->country}}</option>
                        <option value="アイスランド">アイスランド</option>
                        <option value="アイルランド">アイルランド</option>
                        <option value="アゼルバイジャン">アゼルバイジャン</option>
                        <option value="アフガニスタン">アフガニスタン</option>
                        <option value="アメリカ合衆国">アメリカ合衆国</option>
                        <option value="アラブ首長国連邦">アラブ首長国連邦</option>
                        <option value="アルジェリア">アルジェリア</option>
                        <option value="アルゼンチン">アルゼンチン</option>
                        <option value="アルバニア">アルバニア</option>
                        <option value="アルメニア">アルメニア</option>
                        <option value="アンゴラ">アンゴラ</option>
                        <option value="アンティグア・バーブーダ">アンティグア・バーブーダ</option>
                        <option value="アンドラ">アンドラ</option>
                        <option value="イエメン">イエメン</option>
                        <option value="イギリス">イギリス</option>
                        <option value="イスラエル">イスラエル</option>
                        <option value="イタリア">イタリア</option>
                        <option value="イラク">イラク</option>
                        <option value="イラン">イラン</option>
                        <option value="インド">インド</option>
                        <option value="インドネシア">インドネシア</option>
                        <option value="ウガンダ">ウガンダ</option>
                        <option value="ウクライナ">ウクライナ</option>
                        <option value="ウズベキスタン">ウズベキスタン</option>
                        <option value="ウルグアイ">ウルグアイ</option>
                        <option value="エクアドル">エクアドル</option>
                        <option value="エジプト">エジプト</option>
                        <option value="エストニア">エストニア</option>
                        <option value="エチオピア">エチオピア</option>
                        <option value="エリトリア">エリトリア</option>
                        <option value="エルサルバドル">エルサルバドル</option>
                        <option value="オーストラリア">オーストラリア</option>
                        <option value="オーストリア">オーストリア</option>
                        <option value="オマーン">オマーン</option>
                        <option value="オランダ">オランダ</option>
                        <option value="ガーナ">ガーナ</option>
                        <option value="カーボベルデ">カーボベルデ</option>
                        <option value="ガイアナ">ガイアナ</option>
                        <option value="カザフスタン">カザフスタン</option>
                        <option value="カタール">カタール</option>
                        <option value="カナダ">カナダ</option>
                        <option value="ガボン">ガボン</option>
                        <option value="カメルーン">カメルーン</option>
                        <option value="ガンビア">ガンビア</option>
                        <option value="カンボジア">カンボジア</option>
                        <option value="ギニア">ギニア</option>
                        <option value="ギニアビサウ">ギニアビサウ</option>
                        <option value="キプロス">キプロス</option>
                        <option value="キューバ">キューバ</option>
                        <option value="ギリシャ">ギリシャ</option>
                        <option value="キリバス">キリバス</option>
                        <option value="キルギス">キルギス</option>
                        <option value="グアテマラ">グアテマラ</option>
                        <option value="クウェート">クウェート</option>
                        <option value="グルジア">グルジア</option>
                        <option value="グレナダ">グレナダ</option>
                        <option value="クロアチア">クロアチア</option>
                        <option value="ケニア">ケニア</option>
                        <option value="コートジボワール">コートジボワール</option>
                        <option value="コスタリカ">コスタリカ</option>
                        <option value="コモロ">コモロ</option>
                        <option value="コロンビア">コロンビア</option>
                        <option value="コンゴ共和国">コンゴ共和国</option>
                        <option value="コンゴ民主共和国">コンゴ民主共和国</option>
                        <option value="サウジアラビア">サウジアラビア</option>
                        <option value="サモア">サモア</option>
                        <option value="サントメ・プリンシペ">サントメ・プリンシペ</option>
                        <option value="ザンビア">ザンビア</option>
                        <option value="サンマリノ">サンマリノ</option>
                        <option value="シエラレオネ">シエラレオネ</option>
                        <option value="ジブチ">ジブチ</option>
                        <option value="ジャマイカ">ジャマイカ</option>
                        <option value="シリア">シリア</option>
                        <option value="シンガポール">シンガポール</option>
                        <option value="ジンバブエ">ジンバブエ</option>
                        <option value="スイス">スイス</option>
                        <option value="スウェーデン">スウェーデン</option>
                        <option value="スーダン">スーダン</option>
                        <option value="スペイン">スペイン</option>
                        <option value="スリナム">スリナム</option>
                        <option value="スリランカ">スリランカ</option>
                        <option value="スロバキア">スロバキア</option>
                        <option value="スロベニア">スロベニア</option>
                        <option value="スワジランド">スワジランド</option>
                        <option value="セーシェル">セーシェル</option>
                        <option value="赤道ギニア">赤道ギニア</option>
                        <option value="セネガル">セネガル</option>
                        <option value="セルビア">セルビア</option>
                        <option value="セントクリストファー・ネイビス">セントクリストファー・ネイビス</option>
                        <option value="セントビンセント・グレナディーン">セントビンセント・グレナディーン</option>
                        <option value="セントルシア">セントルシア</option>
                        <option value="ソマリア">ソマリア</option>
                        <option value="ソロモン諸島">ソロモン諸島</option>
                        <option value="タイ">タイ</option>
                        <option value="大韓民国">大韓民国</option>
                        <option value="タジキスタン">タジキスタン</option>
                        <option value="タンザニア">タンザニア</option>
                        <option value="チェコ">チェコ</option>
                        <option value="チャド">チャド</option>
                        <option value="中央アフリカ">中央アフリカ</option>
                        <option value="中華人民共和国">中華人民共和国</option>
                        <option value="チュニジア">チュニジア</option>
                        <option value="朝鮮民主主義人民共和国">朝鮮民主主義人民共和国</option>
                        <option value="チリ">チリ</option>
                        <option value="ツバル">ツバル</option>
                        <option value="デンマーク">デンマーク</option>
                        <option value="ドイツ">ドイツ</option>
                        <option value="トーゴ">トーゴ</option>
                        <option value="ドミニカ共和国">ドミニカ共和国</option>
                        <option value="ドミニカ国">ドミニカ国</option>
                        <option value="トリニダード・トバゴ">トリニダード・トバゴ</option>
                        <option value="トルクメニスタン">トルクメニスタン</option>
                        <option value="トルコ">トルコ</option>
                        <option value="トンガ">トンガ</option>
                        <option value="ナイジェリア">ナイジェリア</option>
                        <option value="ナウル">ナウル</option>
                        <option value="ナミビア">ナミビア</option>
                        <option value="ニカラグア">ニカラグア</option>
                        <option value="ニジェール">ニジェール</option>
                        <option value="日本">日本</option>
                        <option value="ニュージーランド">ニュージーランド</option>
                        <option value="ネパール">ネパール</option>
                        <option value="ノルウェー">ノルウェー</option>
                        <option value="バーレーン">バーレーン</option>
                        <option value="ハイチ">ハイチ</option>
                        <option value="パキスタン">パキスタン</option>
                        <option value="パナマ">パナマ</option>
                        <option value="バヌアツ">バヌアツ</option>
                        <option value="バハマ">バハマ</option>
                        <option value="パプアニューギニア">パプアニューギニア</option>
                        <option value="パラオ">パラオ</option>
                        <option value="パラグアイ">パラグアイ</option>
                        <option value="バルバドス">バルバドス</option>
                        <option value="ハンガリー">ハンガリー</option>
                        <option value="バングラデシュ">バングラデシュ</option>
                        <option value="東ティモール">東ティモール</option>
                        <option value="フィジー">フィジー</option>
                        <option value="フィリピン">フィリピン</option>
                        <option value="フィンランド">フィンランド</option>
                        <option value="ブータン">ブータン</option>
                        <option value="ブラジル">ブラジル</option>
                        <option value="フランス">フランス</option>
                        <option value="ブルガリア">ブルガリア</option>
                        <option value="ブルキナファソ">ブルキナファソ</option>
                        <option value="ブルネイ">ブルネイ</option>
                        <option value="ブルンジ">ブルンジ</option>
                        <option value="ベトナム">ベトナム</option>
                        <option value="ベナン">ベナン</option>
                        <option value="ベネズエラ">ベネズエラ</option>
                        <option value="ベラルーシ">ベラルーシ</option>
                        <option value="ベリーズ">ベリーズ</option>
                        <option value="ペルー">ペルー</option>
                        <option value="ベルギー">ベルギー</option>
                        <option value="ポーランド">ポーランド</option>
                        <option value="ボスニア・ヘルツェゴビナ">ボスニア・ヘルツェゴビナ</option>
                        <option value="ボツワナ">ボツワナ</option>
                        <option value="ボリビア">ボリビア</option>
                        <option value="ポルトガル">ポルトガル</option>
                        <option value="ホンジュラス">ホンジュラス</option>
                        <option value="マーシャル諸島">マーシャル諸島</option>
                        <option value="マケドニア">マケドニア</option>
                        <option value="マダガスカル">マダガスカル</option>
                        <option value="マラウイ">マラウイ</option>
                        <option value="マリ">マリ</option>
                        <option value="マルタ">マルタ</option>
                        <option value="マレーシア">マレーシア</option>
                        <option value="ミクロネシア連邦">ミクロネシア連邦</option>
                        <option value="南アフリカ共和国">南アフリカ共和国</option>
                        <option value="ミャンマー">ミャンマー</option>
                        <option value="メキシコ">メキシコ</option>
                        <option value="モーリシャス">モーリシャス</option>
                        <option value="モーリタニア">モーリタニア</option>
                        <option value="モザンビーク">モザンビーク</option>
                        <option value="モナコ">モナコ</option>
                        <option value="モルディブ">モルディブ</option>
                        <option value="モルドバ">モルドバ</option>
                        <option value="モロッコ">モロッコ</option>
                        <option value="モンゴル">モンゴル</option>
                        <option value="モンテネグロ">モンテネグロ</option>
                        <option value="ヨルダン">ヨルダン</option>
                        <option value="ラオス">ラオス</option>
                        <option value="ラトビア">ラトビア</option>
                        <option value="リトアニア">リトアニア</option>
                        <option value="リビア">リビア</option>
                        <option value="リヒテンシュタイン">リヒテンシュタイン</option>
                        <option value="リベリア">リベリア</option>
                        <option value="ルーマニア">ルーマニア</option>
                        <option value="ルクセンブルク">ルクセンブルク</option>
                        <option value="ルワンダ">ルワンダ</option>
                        <option value="レソト">レソト</option>
                        <option value="レバノン">レバノン</option>
                        <option value="ロシア">ロシア</option>
                    </select>
                </div>
                <div class="form-group mt-4">
                    <label class="control-label" for="mail_magazine">当サイトからの通知を受け取りますか？</label>
                    <div class="checkbox">
                        <label><input class="mr-2 ml-2" type="radio" name="mail_magazine" value="受け取る" {{ (Auth::user()->mail_magazine=="受け取る")? "checked" : "" }}>受け取る</label>
                        <label><input class="mr-2 ml-2" type="radio" name="mail_magazine" value="受け取らない" {{ (Auth::user()->mail_magazine=="受け取らない")? "checked" : "" }}>受け取らない</label>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-10">
                        <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="token_activation" value="{{ Auth::user()->token_activation }}">
                        <input type="hidden" name="isVerified" value="2">
                        <input type="hidden" name="password" value="{{ Auth::user()->password }}">
                        <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-primary" value="更新">
                    </div>
                </div>
            </form>
        </div></div>
    </div>
</div>
@endsection


