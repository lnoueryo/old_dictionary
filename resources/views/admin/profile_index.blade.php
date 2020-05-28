@extends('layouts.admin')
<link rel="stylesheet" href="{{ asset('css/front.css') }}">
@section('title', '登録済みニュースの一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>単語一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\UserController@profile') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">タイトル</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_user" value={{ $cond_user }}>
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
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
    {{--  <div class="modal js-modal">
        <div class="modal__bg js-modal-close">
        <div class="modal__content">
            <p>ここにモーダルウィンドウで表示したいコンテンツを入れます。モーダルウィンドウを閉じる場合は下の「閉じる」をクリックするか、背景の黒い部分をクリックしても閉じることができます。</p>

                <div class="float-right">
                    <button class="btn btn-danger">
                        <a href="{{ action('Admin\UserController@delete', ['id' => $user->id]) }}">Yes</a>
                    </button>
                    <button class="js-modal-close btn btn-danger">
                        No
                    </button>
                </div>
            </div>
        </div>
    </div>

{{--  <div id="js-modal-open" type="button">  --}}
    {{--  {{ action('Admin\UserController@delete', ['id' => $user->id]) }}  --}}
@endsection('content')
