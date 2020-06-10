@extends('layouts.front')

<link rel="stylesheet" href="{{ asset('css/contents/word.css') }}">

@section('title', 'ニュースの新規作成')

@section('content')

<div class="container">
<h3>プロフィール</h3>
<div style="margin-top: 30px;">
    <div id="summary" class="mainBlock col-md-8 offset-md-2">
<table class="table table-striped">
    <tr>
        <th>氏名</th>
        <td>{{ Auth::user()->name }}</td>
    </tr>
    <tr>
        <th>メールアドレス</th>
        <td>{{ Auth::user()->email }}</td>
    </tr>
    <tr>
        <th>ニックネーム</th>
        <td>{{ Auth::user()->nickname }}</td>
    </tr>
    <tr>
        <th>性別</th>
        <td>{{ Auth::user()->gender }}</td>
    </tr>
    <tr>
        <th>生年月日</th>
        <td>{{ Auth::user()->birth_year }}年{{ Auth::user()->birth_month }}月{{ Auth::user()->birth_day }}日　{{ Auth::user()->age }}歳</td>
    </tr>
    <tr>
        <th>職業</th>
        <td>{{ Auth::user()->occupation }}</td>
    </tr>
    <tr>
        <th>国籍</th>
        <td>{{ Auth::user()->country }}</td>
    </tr>
    <tr>
        <th>当サイトからの通知</th>
        <td>{{ Auth::user()->mail_magazine }}</td>
    </tr>
    <tr>
        <th>ラストログイン</th>
        <td>{{ Auth::user()->last_sign_in_at }}</td>
    </tr>
    <tr>
<th></th>
            <td class="col-md-5 float-right"><input type="button" value="編集" class="btn btn-green col-md-8" onclick="location.href='{{ action('PracticeController@show') }}'"></td>
    </tr>

</table>
</div>
</div>
</div>
@endsection('content')

