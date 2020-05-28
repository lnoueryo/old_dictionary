@extends('layouts.app')
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
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="captcha" class="col-md-4 col-form-label text-md-right">{{ __('captcha') }}</label>

                            <div class="col-md-6">
                                <div class="captcha mb-3">
                                    <span>{!! captcha_img('math') !!}</span>
                                    <button type="button" class="btn btn-success btn-refresh float-right">Refresh</button>
                                </div>
                                <input id="captcha" type="text" class="form-control @error('captcha') is-invalid @enderror" name="captcha" placeholder="Enter captcha" required>

                                @error('captcha')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="text-row">
                            <div class="vertical-align col-md-3 offset-4">
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 offset-4 mb-3">
                                <button type="submit" class="btn btn-primary col-md-12">
                                            {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                        <div class="text-row">
                            <div class="col-md-6 offset-md-5">

                                @if (Route::has('password.request'))
<a class="ml-4" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif</div></div>


                        <div class="form-group row mt-4">
                            <div class="col-md-6 offset-md-4">
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
