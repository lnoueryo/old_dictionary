@extends('layouts.admin')

<link rel="stylesheet" href="{{ asset('css/contents/word.css') }}">

@section('title', 'ニュースの新規作成')

@section('content')

<div class="container col-md-6">
<h3 class="">プロフィール</h3>
<div style="margin-top: 30px;">

<table class="table table-striped">
    <tr>
        <th>氏名</th>
        <td>{{ $user_form->name }}</td>
    </tr>
    <tr>
        <th>メールアドレス</th>
        <td>{{ $user_form->email }}</td>
    </tr>
    <tr>
        <th>ニックネーム</th>
        <td>{{ $user_form->nickname }}</td>
    </tr>
    <tr>
        <th>性別</th>
        <td>{{ $user_form->gender }}</td>
    </tr>
    <tr>
        <th>生年月日</th>
        <td>{{ $user_form->birth_year }}年{{ $user_form->birth_month }}月{{ $user_form->birth_day }}日　{{ $user_form->age }}歳</td>
    </tr>
    <tr>
        <th>職業</th>
        <td>{{ $user_form->occupation }}</td>
    </tr>
    <tr>
        <th>国籍</th>
        <td>{{ $user_form->country }}</td>
    </tr>
    <tr>
        <th>当サイトからの通知</th>
        <td>{{ $user_form->mail_magazine }}</td>
    </tr>
    <tr>
        <th>ログイン回数</th>
        <td>{{ $user_form->login_counter }}</td>
    </tr>
    <tr>
        <th>登録日時</th>
        <td>{{ date('Y年n月j日 G時i分', strtotime($user_form->created_at)) }}</td>
    </tr>
    <tr>
        <th>ラストログイン</th>
        <td>{{ date('Y年n月j日 G時i分', strtotime($user_form->last_sign_in_at)) }}</td>
    </tr>
    <tr>
        <th>最新ログイン</th>
        <td>{{ date('Y年n月j日 G時i分', strtotime($user_form->current_sign_in_at)) }}</td>
    </tr>
    <tr>
    <th>memo</th>
            <td class="col-md-4 float-right"><a type="button" class="btn btn-primary" href="{{ action('Admin\UserController@edit', ['id' => $user_form->id]) }}">編集</a>
            <a type="button" class="btn btn-danger" href="{{ action('Admin\UserController@profile') }}">戻る</a></td>

    </tr>

</table>
</div>
</div>

@endsection('content')

