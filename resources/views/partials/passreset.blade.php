<?php
use Illuminate\Support\Facades\Input;

?>
@extends('main')

@section('content')
    <div class="big-padding passreset">
        <h1 class="border">change password</h1>
        <form action="/changepassword" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="password" name="password" placeholder="password" required>
            <input type="password" name="password_confirmation" placeholder="password confirmation" required>
            <input name="account" value="{{Input::get('user')}}" hidden>
            <input name="token" value="{{Input::get('token')}}" hidden>
            <span class="error"> {{$errors->password->first('password')}}</span>
            <span class="error"> {{$errors->password->first('account')}}</span>
            <span class="error">{{$errors->password->first('token')}}</span>
            <span class="error">{{$errors->error->first('error')}}</span>
            <input type="submit" value="change password">
        </form>
    </div>
@endsection