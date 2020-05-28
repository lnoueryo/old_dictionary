@extends('layouts.front')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('contact.send') }}">
                {{ csrf_field() }}

                {{--  <div class="form-group">
                    <label for="formInputName">Name</label>  --}}
                    <input type="hidden" class="form-control" id="formInputName" name="name" value="{{ Auth::user()->name }}">

                    {{--  @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>  --}}

                <div class="form-group">
                    <label for="formInputSubject">Subject</label>
                    <input type="text" class="form-control" id="formInputSubject" name="subject" value="{{ old('subject') }}">

                    @if ($errors->has('subject'))
                        <span class="help-block">
                            <strong>{{ $errors->first('subject') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="formInputEmail">Email address</label>
                    <input type="text" class="form-control" id="formInputEmail" name="email" value="{{ old('email') }}">

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="formInputbody">Message</label>
                    <textarea class="form-control" id="formInputBody" name="body" value="{{ old('body') }}">{{ old('body') }}</textarea>

                    @if ($errors->has('body'))
                        <span class="help-block">
                            <strong>{{ $errors->first('body') }}</strong>
                        </span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
