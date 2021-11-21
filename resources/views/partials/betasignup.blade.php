@extends('main')

@section('content')
    <div class="one-fourth">
        @include('/partials/membersection')
        @include('/partials/advertorialsection')
    </div>
    <div class="three-fourth-right">
        <div class="betasignup big-padding">
            <h1 class="border-ls">beta signup</h1>
            <form action="/betasignup" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="email" name="email" placeholder="email" required>
                <textarea rows="8" name="reason" placeholder="why should we give you a beta key?" required></textarea>
                <span class="error">{{$errors->beta->first('email')}}</span>
                <span class="error">{{$errors->beta->first('reason')}}</span>
                <span class="error">{{$errors->error->first('error')}}</span>
                <input type="submit" value="submit">
            </form>
        </div>

    </div>

@endsection