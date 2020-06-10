@extends('layouts.front')
<link rel="stylesheet" href="{{ asset('css/contents/word.css') }}">
@section('title', '登録済みニュースの一覧')

@section('content')
    <div class="container">
        <div class="col-md-8 offset-md-2">
            <div class="offset-md-1 mb-4">
                <h2>Flashcard</h2>
            </div>
            <div id="summary" class="mainBlock non-member hlt_SUMRY col-md-12">
                <div class="addLmFdWr" id="addLmFdWrHdId">
                    <table class="summaryTbl">
                        <div class="row">
                            <div class="offset-md-3">
                                <nav class="navbar navbar-expand-lg navbar-light">
                                    <a class="navbar-brand mr-5" href="#">デッキ</a>
                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                        <ul class="navbar-nav mr-auto">
                                            <li class="nav-item active">
                                            <a class="nav-link mr-5" href="#">検索 <span class="sr-only">(current)</span></a>
                                            </li>
                                            <li class="nav-item">
                                            <a class="nav-link" href="#">統計</a>
                                            </li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                            {{--  <div class="row">
                                <h2>単語一覧</h2>
                            </div>
                            <div class="row">  --}}
                            <div class="col-md-8">
                                <form action="{{ action('Front\FlashCardController@search') }}" method="get">
                                    <div class="form-group row float-right">
                                        <label class="col-md-3">タイトル</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="cond_flashcard" value={{ $cond_flashcard }}>
                                        </div>
                                        <div class="col-md-2">
                                            {{ csrf_field() }}
                                            <input type="submit" class="btn btn-primary" value="検索">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            {{--  </div>  --}}
                            <div class="row">
                                    <div class="row">
                                        <table class="table table-dark">
                                            <thead>
                                                <tr>
                                                    <td width="20%">Name</td>
                                                    <td width="20%">Language</td>
                                                    <td width="20%">Meaning</td>
                                                    <td width="20%">Next Time</td>
                                                    <td width="20%"></td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($flashcards as $flashcard)
                                                    <tr>
                                                        <td>{{ Str::limit($flashcard->name, 15) }}</td>
                                                        <td>{{ Str::limit($flashcard->language, 15) }}</td>
                                                        <td>{{ Str::limit($flashcard->meaning, 15) }}</td>
                                                        <td>{{ Str::limit(date('Y-m-d', strtotime($flashcard->next_day)), 15) }}</td>
                                                        <td>
                                                            <div>
                                                                <a href="{{ action('Admin\WordController@edit', ['id' => $flashcard->id]) }}">編集</a>
                                                            </div>
                                                            <div>
                                                                {{--  <a href="{{ action('Admin\WordController@delete', ['id' => $flashcard->id]) }}">削除</a>  --}}
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
