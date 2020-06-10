{{-- @extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login.custom') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="メールアドレス" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-3 col-form-label text-md-right">{{ __('') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="パスワード">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="captcha" class="col-md-3 col-form-label text-md-right">{{ __('') }}</label>


                            <div class="col-md-6">
                                <div class="captcha mb-3">
                                    <span>{!! captcha_img('math') !!}</span>
                                    <button type="button" class="btn btn-success btn-refresh float-right">Refresh</button>
                                </div>
                                <input id="captcha" type="text" class="form-control @error('captcha') is-invalid @enderror" name="captcha" placeholder="キャプチャコード" required>

                                @error('captcha')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6 offset-3 d-flex align-items-center mb-3">
                                <button type="submit" class="btn btn-primary mr-5">
                                            {{ __('Login') }}
                                </button>
                                <a class="ml-5" href="{{ route('password.request') }}">
                                    {{ __('パスワードを忘れた場合') }}
                                </a>
                            </div>
                        </div>
                        <div class="text-row">

                            </div>


                            <div class="col-md-6 offset-md-3">
                                アカウントをお持ちですか？<a class="" href="{{ route('register') }}">　{{ __('アカウント作成') }}</a>
                            </div>


                        <div class="form-group row mt-4">
                            <div class="col-md-6 offset-md-3">
                                <a href="auth/google" class="btn-square-soft mr-4">
                                    <img src="{{ asset('icon/google.png') }}" width="24" height="24">
                                    <span class="g">G</span><span class="o">o</span><span class="o2">o</span><span class="g2">g</span><span class="l">l</span><span class="e">e</span>
                                </a>
                                <a href="{{url('/redirect')}}" class="btn-square-soft2">
                                    <img src="{{ asset('icon/facebook.png') }}" width="24" height="24">
                                    <span class="facebook">Facebook</span>
                                </a>
                            </div>
                        </div>



                                            </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('.btn-refresh').click(function () {
    $.ajax({
        type: 'GET',
        url: '{{  url('/refresh_captcha') }}',
        success: function (data) {
    $('.captcha span').html(data);
        }
    });
    });
        </script>
@endsection --}}

@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@section('content')

<div class="container">
    <div class="row">
        <div class="justify-content-center"></div>

        <div class="col-md-8">
            <span class="balloon3-right-btm">
                Blah Blah
              </span>
                    <h1 class="ml-3">My Turn to Blab</h1>

                    <form method="POST" action="{{ route('login.custom') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('') }}</label>
                            {{-- E-Mail Address --}}
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="メールアドレス" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-3 col-form-label text-md-right">{{ __('') }}</label>
                            {{-- Password --}}
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="パスワード">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="captcha" class="col-md-3 col-form-label text-md-right">{{ __('') }}</label>
                            {{-- captcha --}}

                            <div class="col-md-6">
                                <div class="captcha mb-3">
                                    <span>{!! captcha_img('math') !!}</span>
                                    <button type="button" class="btn btn-success btn-refresh float-right">Refresh</button>
                                </div>
                                <input id="captcha" type="text" class="form-control @error('captcha') is-invalid @enderror" name="captcha" placeholder="キャプチャコード" required>

                                @error('captcha')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- キャプチャ実装のためremember me は使えない --}}
                        {{-- <div class="text-row">
                            <div class="vertical-align col-md-3 offset-3">
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div> --}}
                        <div class="">
                            <div class="col-md-6 d-flex align-items-center mb-3">
                                <button type="submit" class="btn btn-green mr-5">
                                            {{ __('ログイン') }}
                                </button>
                                <a class="ml-4" href="{{ route('password.request') }}">
                                    {{ __('パスワードを忘れた場合') }}
                                </a>
                            </div>
                        </div>
                        <div class="text-row">
                            {{-- <div class="col-md-6 offset-md-5">

                                @if (Route::has('password.request'))
                                <a class="ml-3" href="{{ route('password.request') }}">
                                        {{ __('パスワードを忘れた場合') }}
                                    </a>
                                @endif</div> --}}
                            </div>
                            {{-- Forgot Your Password? --}}

                            <div class="col-md-6">
                                アカウントをお持ちですか？<a class="" href="{{ route('register') }}">　{{ __('アカウント作成') }}</a>
                            </div>


                        <div class="form-group mt-4">
                            <div class="col-md-6">
                                <a href="auth/google" class="btn-square-soft mr-4">
                                    <img src="{{ asset('icon/google.png') }}" width="24" height="24">
                                    <span class="g">G</span><span class="o">o</span><span class="o2">o</span><span class="g2">g</span><span class="l">l</span><span class="e">e</span>
                                </a>
                                <a href="{{url('/redirect')}}" class="btn-square-soft2">
                                    <img src="{{ asset('icon/facebook.png') }}" width="24" height="24">
                                    <span class="facebook">Facebook</span>
                                </a>
                            </div>
                        </div>



                                            </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
