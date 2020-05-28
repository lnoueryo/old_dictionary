@extends('layouts.front')

<link rel="stylesheet" href="{{ asset('css/contents/word.css') }}">

@section('title', 'ニュースの新規作成')

@section('content')

<div class="container col-md-6">
<h3 class="">プロフィール</h3>
<div style="margin-top: 30px;">

<table class="table table-striped">
    <tr>
        <th>ニックネーム</th>
        <td>{{ $user->nickname }}</td>
    </tr>
    <tr>
        <th>性別</th>
        <td>{{ $user->gender }}</td>
    </tr>
    <tr>
        <th>生年月日</th>
        <td>{{ $user->birth_year }}年{{ $user->birth_month }}月{{ $user->birth_day }}日　{{ $user->age }}歳</td>
    </tr>
    <tr>
        <th>職業</th>
        <td>{{ $user->occupation }}</td>
    </tr>
    <tr>
        <th>国籍</th>
        <td>{{ $user->country }}</td>
    </tr>

    <tr>
<th></th>
        <td class="float-right"><input type="button" value="戻る" class="btn btn-success" onclick="location.href='{{ action('Front\MailController@inbox') }}'"></td>
    </tr>

</table>
</div>
</div>

@endsection('content')

