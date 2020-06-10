@extends('layouts.front')
<link rel="stylesheet" href="{{ asset('css/contents/word.css') }}">
@section('title', '登録済みニュースの一覧')

@section('content')
    {{-- <div class="container">
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
        </div> --}}
        {{-- <div class="row">
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
                                <td width="15%">Meaning</td>
                                <td width="15%">Image_path</td>
                                <td width="10%">Sound_path</td>
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
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> --}}
        <div class="container">
        @foreach($posts as $name)
        <div class="col-md-8 offset-md-2">
            <div id="summary" class="mainBlock">

                    {{-- <table class="summaryTbl col-md-12">
                        <tbody>
                            <tr>
                                <td>
                                    <h1>
                                        <div class="offset-md-1">
                                            <span id="h1Query">{{ Str::limit($name->name, 15) }}</span>
                                        </div>
                                        <div class="h1keywords"></div>
                                    </h1>
                                </td>
                                <td class="pt-3 float-right" width="500px">
                                    <table class="audio">
                                        <tbody>
                                            <tr>
                                                <td class="align-middle">
                                                    <audio src="{{ asset('storage/sound/' . $name->sound_path) }}" controls>
                                                        <source src="{{ asset('storage/sound/' . $name->sound_path) }}" type="audio/mpeg">
                                                    </audio>
                                                </td>
                                                <td class="align-middle pl-5">
                                                    <div id="edit" class="pl-4">
                                                        <form action="{{ action('Front\WordController@save', ['id' => $name->id]) }}" method="POST">
                                                            <div id="" class="">
                                                                <input type="hidden" name="id" class="" value="{{ $name->id }}">

                                                                {{ csrf_field() }}
                                                                <input type="submit" class="btn btn-primary ml-1" value="登録">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </td>
                                                <td class="align-middle">
                                                    <div id="edit" class="pl-4">
                                                    <a href="{{ action('Front\WordController@edit', ['id' => $name->id]) }}" class="addUwl"><img src="{{ asset('icon/edit.png') }}"></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table> --}}
                    <div class="row">
                        <div class="col-md-3">
                            <h1>
                                <span id="cardName">{{ Str::limit($name->name, 15) }}</span>
                            </h1>
                        </div>
                        <div class="offset-md-1 mt-2">
                            <audio class="ml-3" src="{{ asset('storage/sound/' . $name->sound_path) }}" controls>
                                <source src="{{ asset('storage/sound/' . $name->sound_path) }}" type="audio/mpeg">
                            </audio>
                        </div>

                        <div class="ml-3 mt-3 float-left">
                            <a href="{{ action('Front\WordController@edit', ['id' => $name->id]) }}" class="addUwl ml-3"><img src="{{ asset('icon/edit.png') }}"></a>
                        </div>
                        <div class="mt-3 float-right">
                            <form action="{{ action('Front\WordController@save', ['id' => $name->id]) }}" method="POST">
                                <input type="hidden" name="id" value="{{ $name->id }}">
                                {{ csrf_field() }}
                                <input type="submit" class="btn btn-green ml-2 float-left" value="登録">
                            </form>
                        </div>

                    </div>
                    <div class="summaryM descriptionWrp">
                        <table>
                            <tbody>
                                <tr>
                                    <td>
                                        <b class="squareCircle description">意味</b>
                                    </td>
                                    <td class="content-explanation">{{ Str::limit($name->meaning, 15) }}</td>
                                    @if(isset($name->image_path))
                                    <td width="300px" rowspan="2" colspan="">
                                    <img src="{{ asset('storage/image/' . $name->image_path) }}" class="trim2 float-right">
                                    </td>
                                    @endif
                                </tr>
                                <div class="summaryM">
                                    <tr>
                                        <td>
                                            <b class="squareCircle align-top">発音記号・読み方</b>
                                        </td>
                                        <td>
                                            <div id="phoneticEjjeNavi">
                                                <div class="phoneticEjjeWrp">
                                                    <span class="phoneticEjjeDesc">{{ $name->phonetic_symbol }}</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </div>
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- <div class="summaryM EGateCoreDataWrp">
                    <table>
                        <tbody>
                            <tr>
                                <td>
                                    <b class="squareCircle description">コア</b>
                                </td>
                                @if(isset($name->image_path))
                                <td width="300px">
                                    <img src="{{ asset('storage/image/' . $name->image_path) }}" class="trim2 float-right">
                                </td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                </div> --}}
                {{-- <div class="summaryM">
                    <table>
                        <tbody>
                            <tr>
                                <td>
                                    <b class="squareCircle">発音記号・読み方</b>
                                </td>
                                <td>
                                    <div id="phoneticEjjeNavi">
                                        <div class="phoneticEjjeWrp">
                                            <span class="phoneticEjjeDesc">{{ $name->phonetic_symbol }}</span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div> --}}
            </div>
@endforeach
    </div>
@endsection
