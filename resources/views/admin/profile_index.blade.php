@extends('layouts.admin')
{{-- <link rel="stylesheet" href="{{ asset('css/front.css') }}"> --}}
@section('title', '登録済みニュースの一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>単語一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="" role="button" class="btn btn-primary">新規作成</a>
                <p><br>{{ $cc }}<span>件</span></p>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\UserController@profile') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">国籍</label>
                        <div class="col-md-3">
                            <select class="form-control" id="cond_user_country" name="cond_user_country" value="{{ $cond_user_country }}">
                                　<option value="{{ $cond_user_country }}">{{ $cond_user_country }}</option>
                                　<option value="日本">日本</option>
                                　<option value="ドイツ">ドイツ</option>
                                　<option value="アメリカ合衆国">アメリカ合衆国</option>
                                　<option value="イギリス">イギリス</option>
                                　<option value="">なし</option>
                            </select>
                        </div>
                        <label class="col-md-2">性別</label>
                        <div class="col-md-3">
                            <select class="form-control" id="cond_user_gender" name="cond_user_gender" value="{{ $cond_user_gender }}">
                                　<option value="{{ $cond_user_gender }}">{{ $cond_user_gender }}</option>
                                　<option value="男性">男性</option>
                                　<option value="女性">女性</option>
                                　<option value="その他">その他</option>
                                　<option value="">なし</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('dashboard') }}" role="button" class="btn btn-danger">リセット</a>
                            {{--  <input type="submit" class="btn btn-danger" value="リセット">  --}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">フリーワード</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_user" value={{ $cond_user }}>
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="　検索　">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark sample">
                        <thead>
                            <tr>
                                <td class="text-white" width="2%">@sortablelink('id','ID')</td>
                                <td width="8%">@sortablelink('name','Name')</td>
                                <td width="4%">@sortablelink('gender','Gender')</td>
                                <td width="10%">@sortablelink('country','Country')</td>
                                <td width="7%">@sortablelink('email','Email')</td>
                                <td width="15%">@sortablelink('current_sign_in_at','Latest Login')</td>
                                <td width="7%">@sortablelink('login_counter','Login Times')</td>
                                <td width="7%">@sortablelink('search_time','Search Times')</td>
                                <td width="7%">@sortablelink('edit_word_time','Revision Times')</td>
                                <td width="7%">@sortablelink('current_sign_in_at','status')</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($userPosts as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ Str::limit($user->name, 10) }}</td>
                                    <td>{{ Str::limit($user->gender, 5) }}</td>
                                    <td>{{ Str::limit($user->country, 8) }}</td>
                                    <td>{{ Str::limit($user->email, 15) }}</td>
                                    <td>{{ Str::limit($user->current_sign_in_at, 20) }}</td>
                                    <td class="text-center">{{ Str::limit($user->login_counter-1, 5) }}</td>
                                    <td class="text-center">{{ Str::limit($user->search_time, 5) }}</td>
                                    <td class="text-center">{{ Str::limit($user->edit_word_time, 5) }}</td>
                                    <td class="text-danger">@if($user->isOnline())
                                        online
                                    @endif</td>
                                    <td class="text-center">
                                        <div>
                                            <a href="{{ action('Admin\UserController@detail', ['id' => $user->id]) }}">詳細</a>
                                        </div>
                                        <div>
                                            <a href="{{ action('Admin\UserController@delete', ['id' => $user->id]) }}">削除</a>
                                        </div>
                                    </td>
                                    <td></td>
                                </tr>
                            @endforeach
                            {{--  {!! $user->appends(\Request::except('page'))->render() !!}  --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection('content')
