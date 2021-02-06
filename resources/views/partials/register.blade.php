<?php
use Illuminate\Support\Facades\Input;
?>

@extends('main')

@section('content')

    <script>
        $( function() {
            $( "#birthdate" ).datepicker({
                yearRange: "-110:+0",
                changeMonth: true,
                changeYear: true
            });
        } );
    </script>

    <div class="three-fourth">
        <div class="register big-padding">
            <span class="image-overlay register-hawker-overlay">
            <img src="{{asset('images/hawker.png')}}">
            </span>
            <span class="image-overlay register-penguin-overlay">
            <img src="{{asset('images/dealer.png')}}">
            </span>
            <form class="register" method="post" role="form" action="/register">

                <h1 class="border">Informações da Conta</h1>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input placeholder="Usuário*" type="text" name="Account" id="Account" value="{{Input::old('Account')}}" required>
                <input placeholder="Senha*" type="password" name="password" id="password"  required autocomplete="off">
                <input placeholder="Confirmação da Senha*" type="password" name="password_confirmation"
                       id="passwordconf"
                       required>
                <span class="error"> {{ $errors->register->first('Account')}}</span>
                <span class="error">{{$errors->register->first('password')}}</span>

                <h1 class="border">Informações de contato</h1>
                <input placeholder="email*" type="email" name="Email" id="Email"  value="{{Input::old('Email')}}"required>
                <span class="error">{{ $errors->register->first('Email') }}</span>

                <h1 class="border">Informações Pessoais</h1>
                <div class="personal">
                <input placeholder="Nome*" type="text" name="firstname" id="firstname" value="{{Input::old('firstname')}}" required>
                <input placeholder="Sobrenome*" type="text" name="lastname" id="lastname" value="{{Input::old('lastname')}}" required>
                <input placeholder="Data de nascimento*" type="text" name="birthdate" id="birthdate" value="{{Input::old('birthdate')}}" readonly required>
                <span class="error">{{ $errors->register->first('firstname') }}</span>
                <span class="error">{{ $errors->register->first('lastname') }}</span>
                <span class="error">{{ $errors->register->first('birthdate') }}</span>
                </div>
                <h1 class="border">Informações de segurança</h1>
                <input placeholder="Palavra-segura ou nome da mãe*" title="Informe uma palavra de segurança para identificar a propriedade dessa conta, sugerimos usar o nome da mãe" type="text" name="mothersname" id="mothersname" value="{{Input::old('mothersname')}}" required>
                <span class="error">{{ $errors->register->first('mothersname') }}</span>
                {!! app('captcha')->display() !!}
                <span class="error">{{ $errors->register->first('g-recaptcha-response') }}</span>
                <p>* campo obrigatório</p>
                <input class="button" value="Criar" type="submit">


            </form>
        </div>
    </div>
    <div class="one-fourth">
        @include('partials/serverstatus')
        @include('partials/advertorialsection')


    </div>



@endsection