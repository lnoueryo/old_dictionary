@extends('layouts.front')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('send') }}">
                {{ csrf_field() }}
                <input type="hidden" class="form-control" id="formInputName" name="sender" value="{{ Auth::user()->nickname }}">
                <input type="hidden" class="form-control" id="formInputName" name="sender_id" value="{{ Auth::user()->id }}">

                <div class="form-group">
                    <label for="formInputName">To</label>
                    <input type="text" class="form-control" id="formInputName" name="receiver" value="{{ $user->nickname }}">

                    @if ($errors->has('receiver'))
                        <span class="help-block">
                            <strong>{{ $errors->first('receiver') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="formInputSubject">Subject</label>
                    <input type="text" class="form-control" id="formInputSubject" name="subject" value="Re:{{ $mail->subject }}">

                    @if ($errors->has('subject'))
                        <span class="help-block">
                            <strong>{{ $errors->first('subject') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="formInputbody">Message</label>
                    <textarea class="form-control" id="formInputBody" name="message" value="{{ old('message') }}">{{ old('message') }}</textarea>

                    @if ($errors->has('message'))
                        <span class="help-block">
                            <strong>{{ $errors->first('message') }}</strong>
                        </span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
