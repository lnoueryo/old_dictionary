@extends('layouts.front')

<link rel="stylesheet" href="{{ asset('css/contents/word.css') }}">

@section('title', 'ニュースの新規作成')

@section('content')

<div class="container col-md-6">
<h3 class="">メール</h3>
<div style="margin-top: 30px;">

<table class="table table-striped">
    <tr>
        <th>{{ $mail_form->receiver }} / {{ $mail_form->subject }}</th>

    </tr>
    <tr>
        <td>{{ $mail_form->message }}</td>
    </tr>

    {{--  <tr>
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
    <tr>  --}}



</table>

<div>
<form>
<a type="button" class="btn btn-primary col-md-1" href="{{ action('Front\MailController@replyForm', ['id' => $mail_form->id]) }}">返信</a>
<input type="button" value="戻る" class="btn btn-success col-md-1" onclick="location.href='{{ action('Front\MailController@inbox') }}'">
</div>


</div>
</div>

@endsection('content')

