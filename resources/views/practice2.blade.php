@extends('layouts.practice')

@section('content')
<form action="{{ action('PracticeController@postSubmit', ['id' => $memo->id]) }}">

    @csrf
    <div class="form-group">
        <label for="title">タイトル</label>
        <input type="text" class="form-control" id="title" name="title" value="{{$memo->title}}" maxlength="24"
            required>
    </div>
    <div class="form-group">
        <label for="content">内容</label>
        <input type="text" class="form-control" id="content" name="content" value="{{$memo->content}}" maxlength="60"
            required>
    </div>

    @if($memo->id == 0)
    <button type="submit" class="btn btn-success">追加</button>
    @else
    <button type="submit" class="btn btn-success">適用</button>
    @endif
</form>
@endsection('content')

    {{--  <a href="{{ route('/practice')}}" class="btn btn-primary">戻る</a>  --}}
