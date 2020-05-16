@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                            <div class="col-md-6">
                            <select class="form-control" name="country">
                                <option value="0">選択されていません</option>
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
                        </div>
                        <div class="form-group row">
                            <label for="year" class="col-md-4 col-form-label text-md-right">{{ __('Year') }}</label>
                            <div class="col-md-6">
                            <select class="form-control" name="year">
                            <option value="">-</option>
                            <option value="1930">1930</option>
                            <option value="1931">1931</option>
                            <option value="1932">1932</option>
                            <option value="1933">1933</option>
                            <option value="1934">1934</option>
                            <option value="1935">1935</option>
                            <option value="1936">1936</option>
                            <option value="1937">1937</option>
                            <option value="1938">1938</option>
                            <option value="1939">1939</option>
                            <option value="1940">1940</option>
                            <option value="1941">1941</option>
                            <option value="1942">1942</option>
                            <option value="1943">1943</option>
                            <option value="1944">1944</option>
                            <option value="1945">1945</option>
                            <option value="1946">1946</option>
                            <option value="1947">1947</option>
                            <option value="1948">1948</option>
                            <option value="1949">1949</option>
                            <option value="1950">1950</option>
                            <option value="1951">1951</option>
                            <option value="1952">1952</option>
                            <option value="1953">1953</option>
                            <option value="1954">1954</option>
                            <option value="1955">1955</option>
                            <option value="1956">1956</option>
                            <option value="1957">1957</option>
                            <option value="1958">1958</option>
                            <option value="1959">1959</option>
                            <option value="1960">1960</option>
                            <option value="1961">1961</option>
                            <option value="1962">1962</option>
                            <option value="1963">1963</option>
                            <option value="1964">1964</option>
                            <option value="1965">1965</option>
                            <option value="1966">1966</option>
                            <option value="1967">1967</option>
                            <option value="1968">1968</option>
                            <option value="1969">1969</option>
                            <option value="1970">1970</option>
                            <option value="1971">1971</option>
                            <option value="1972">1972</option>
                            <option value="1973">1973</option>
                            <option value="1974">1974</option>
                            <option value="1975">1975</option>
                            <option value="1976">1976</option>
                            <option value="1977">1977</option>
                            <option value="1978">1978</option>
                            <option value="1979">1979</option>
                            <option value="1980">1980</option>
                            <option value="1981">1981</option>
                            <option value="1982">1982</option>
                            <option value="1983">1983</option>
                            <option value="1984">1984</option>
                            <option value="1985">1985</option>
                            <option value="1986">1986</option>
                            <option value="1987">1987</option>
                            <option value="1988">1988</option>
                            <option value="1989">1989</option>
                            <option value="1990">1990</option>
                            <option value="1991">1991</option>
                            <option value="1992">1992</option>
                            <option value="1993">1993</option>
                            <option value="1994">1994</option>
                            <option value="1995">1995</option>
                            <option value="1996">1996</option>
                            <option value="1997">1997</option>
                            <option value="1998">1998</option>
                            <option value="1999">1999</option>
                            <option value="2000">2000</option>
                            <option value="2001">2001</option>
                            <option value="2002">2002</option>
                            <option value="2003">2003</option>
                            <option value="2004">2004</option>
                            <option value="2005">2005</option>
                            <option value="2006">2006</option>
                            <option value="2007">2007</option>
                            <option value="2008">2008</option>
                            <option value="2009">2009</option>
                            <option value="2010">2010</option>
                            <option value="2011">2011</option>
                            <option value="2012">2012</option>
                            <option value="2013">2013</option>
                            <option value="2014">2014</option>
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                            <option value="2028">2028</option>
                            <option value="2029">2029</option>
                            <option value="2030">2030</option>
                            </select>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="year" class="col-md-4 col-form-label text-md-right">{{ __('Birth') }}</label>
                            <div class="col-md-3">
                                <select class="form-control" name="month">
                                    <option value="">-</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-control" name="day">
                                <option value="">-</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                                </select>　
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

