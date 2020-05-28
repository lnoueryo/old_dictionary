@extends('layouts.front')

@section('title', 'ニュースの新規作成')

@section('content')
    <div class="container">
        <div class="col-md-8 offset-md-2">
            <div id="summary" class="mainBlock non-member hlt_SUMRY col-md-12">
                <div class="addLmFdWr" id="addLmFdWrHdId">
                    <div class="title p-2">
                        @foreach($posts as $post)
                        @if($post->sound_path == null&&$post->image_path == null)
                        <a href="{{ action('Front\WordController@edit', ['id' => $post->id]) }}">
                            <div>
                                <h1>
                                    <span class="mr-4">{{ Str::limit($post->name, 70) }}</span>
                                    <span class="mr-4">{{ Str::limit($post->language, 70) }}</span>
                                    <span class="mr-4">{{ Str::limit($post->meaning, 70) }}</span>
                                </h1>
                            </div>
                        </a>
                        <p>No sound/No picture</p>
                        @elseif($post->sound_path == null&&isset($post->image_path))
                        <a href="{{ action('Front\WordController@edit', ['id' => $post->id]) }}">
                            <div>
                                <h1>
                                    <span class="mr-4">{{ Str::limit($post->name, 70) }}</span>
                                    <span class="mr-4">{{ Str::limit($post->language, 70) }}</span>
                                    <span class="mr-4">{{ Str::limit($post->meaning, 70) }}</span>
                                </h1>
                            </div>
                        </a>
                        <p>No sound</p>
                        @elseif($post->image_path == null&&isset($post->sound_path))
                        <a href="{{ action('Front\WordController@edit', ['id' => $post->id]) }}">
                            <div>
                                <h1>
                                    <span class="mr-4">{{ Str::limit($post->name, 70) }}</span>
                                    <span class="mr-4">{{ Str::limit($post->language, 70) }}</span>
                                    <span class="mr-4">{{ Str::limit($post->meaning, 70) }}</span>
                                </h1>
                            </div>
                        </a>
                        <p>No picture</p>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--  <div class="container">
        <hr color="#c0c0c0">
        @if (!is_null($headline))
            <div class="row">
                <div class="headline col-md-10 mx-auto">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="caption mx-auto">
                                <div class="image">
                                    @if ($headline->image_path)
                                    <a href="{{ action('Front\WordController@edit', ['id' => $headline->id]) }}"><img src="{{ asset('storage/image/' . $headline->image_path) }}" class="front_trim"></a>
                                    @endif
                                </div>
                                <div class="title p-2">
                                    <h1>{{ Str::limit($headline->name, 70) }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p class="body mx-auto">{{ Str::limit($headline->meaning, 650) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <hr color="#c0c0c0">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                @foreach($posts as $post)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="date">
                                    {{ $post->updated_at->format('Y年m月d日') }}
                                </div>
                                <div class="title">
                                    {{ Str::limit($post->title, 150) }}
                                </div>
                                <div class="body mt-3">
                                    {{ Str::limit($post->body, 1500) }}
                                </div>
                            </div>
                            <div class="image col-md-6 text-right mt-4">
                                @if ($post->image_path)
                                    <img src="{{ asset('storage/image/' . $post->image_path) }}">
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
    </div>
    </div>  --}}
@endsection
