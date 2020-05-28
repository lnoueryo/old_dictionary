@extends('layouts.admin')
<link rel="stylesheet" href="{{ asset('css/mail.css') }}">
@section('title', '登録済みニュースの一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>単語一覧</h2>
        </div>
            <div class="row">
                <div class="col-md-4">
                    <a href="{{ action('Front\MailController@form') }}" role="button" class="btn btn-primary">新規作成</a>
                </div>
                <div class="col-md-8">
                    <form action="{{ action('Front\MailController@inbox') }}" method="get">
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
                                <td width="10%">@sortablelink('current_sign_in_at','status')</td>
                                <td width="10%">@sortablelink('sender','Sender')</td>
                                <td width="15%">@sortablelink('subject','Subject')</td>
                                <td width="20%">@sortablelink('message','Message')</td>
                                <td width="20%">@sortablelink('created_at','Date')</td>
                                <td width="8%"></td>
                                <td width="8%"></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($mails as $mail)
                                <tr>
                                    <td class="align-middle"><a href="{{ action('Front\MailController@detail', ['id' => $mail->id]) }}">@if($mail->read == false)
                                        <div class="text-danger">UnRead</div>
                                    @endif</a></td>
                                    <td class="align-middle"><a href="{{ action('Admin\UserController@detail', ['id' => $mail->sender_id]) }}"><div class="text-primary">{{ Str::limit($mail->sender, 20) }}</div></a></td>
                                    <td class="align-middle"><a href="{{ action('Front\MailController@detail', ['id' => $mail->id]) }}">{{ Str::limit($mail->subject, 20) }}</a></td>
                                    <td class="align-middle"><a href="{{ action('Front\MailController@detail', ['id' => $mail->id]) }}">{{ Str::limit($mail->message, 20) }}</a></td>
                                    <td class="align-middle"><a href="{{ action('Front\MailController@detail', ['id' => $mail->id]) }}">{{ Str::limit(date('Y/n/j G:i:s D', strtotime($mail->created_at)), 30) }}</a></td>
                                    <td>
                                        <a class="delete" href="{{ action('Front\MailController@delete', ['id' => $mail->id]) }}"><div class="text-danger">削除</div></a>

                                        <a class="delete" href="{{ action('Front\MailController@unread', ['id' => $mail->id]) }}"><div class="text-danger">未読</div></a>
                                    </td>
                                    <td></td>
                                </tr></a>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection('content')
