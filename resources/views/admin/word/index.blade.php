@extends('layouts.admin')

@section('title', '登録済みニュースの一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>単語一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Front\WordController@add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\WordController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">タイトル</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_name" value={{ $cond_name }}>
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
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <td width="2%">ID</td>
                                <td width="10%">Name</td>
                                <td width="7%">Language</td>
                                <td width="10%">Phonetic symbol</td>
                                <td width="10%">Parts of speech</td>
                                <td width="10%">Meaning</td>
                                <td width="15%">Image_path</td>
                                <td width="10%">Sound_path</td>
                                <td width="5%"></td>
                                <td width="10%">Revision history</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $name)
                                <tr>
                                    <td>{{ $name->id }}</td>
                                    <td>{{ Str::limit($name->name, 15) }}</td>
                                    <td>{{ Str::limit($name->language, 15) }}</td>
                                    <td>{{ Str::limit($name->phonetic_symbol, 15) }}</td>
                                    <td>{{ Str::limit($name->parts_of_speech, 15) }}</td>
                                    <td>{{ Str::limit($name->meaning, 15) }}</td>
                                    <td><img src="{{ asset('storage/image/' . $name->image_path) }}" class="trim"></td>
                                    <td>{{ Str::limit($name->sound_path, 10) }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ action('Admin\WordController@edit', ['id' => $name->id]) }}">編集</a>
                                        </div>
                                        <div>
                                            <a href="{{ action('Admin\WordController@delete', ['id' => $name->id]) }}">削除</a>
                                        </div>
                                    </td>
                                    <td>username datetime</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
