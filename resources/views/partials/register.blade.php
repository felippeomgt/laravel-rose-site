<?php

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

                <h1 class="border-ls">Informações da Conta</h1>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input placeholder="Usuário*" class="form-control" type="text" name="Account" id="Account" value="{{Input::old('Account')}}" required>
                <input placeholder="Senha*" class="form-control" type="password" name="password" id="password"  required autocomplete="off">
                <input placeholder="Confirmação da Senha*" class="form-control" type="password" name="password_confirmation"
                       id="passwordconf"
                       required>
                <span class="error"> {{ $errors->register->first('Account')}}</span>
                <span class="error">{{$errors->register->first('password')}}</span>

                <h1 class="border-ls">Informações de contato</h1>
                <input placeholder="email*" class="form-control" type="email" name="Email" id="Email"  value="{{Input::old('Email')}}"required>
                <span class="error">{{ $errors->register->first('Email') }}</span>

                <h1 class="border-ls">Informações Pessoais</h1>
                <div class="personal">
                <input placeholder="Nome*" class="form-control" type="text" name="firstname" id="firstname" value="{{Input::old('firstname')}}" required>
                <input placeholder="Sobrenome*" class="form-control" type="text" name="lastname" id="lastname" value="{{Input::old('lastname')}}" required>
                <input placeholder="Data de nascimento*" class="form-control" type="text" name="birthdate" id="birthdate" value="{{Input::old('birthdate')}}" required>
                <span class="error">{{ $errors->register->first('firstname') }}</span>
                <span class="error">{{ $errors->register->first('lastname') }}</span>
                <span class="error">{{ $errors->register->first('birthdate') }}</span>
                </div>
                <h1 class="border-ls">Informações de segurança</h1>
                <input placeholder="Palavra-segura ou nome da mãe*" class="form-control" title="Informe uma palavra de segurança para identificar a propriedade dessa conta, sugerimos usar o nome da mãe" type="text" name="mothersname" id="mothersname" value="{{Input::old('mothersname')}}" required>
                <span class="error">{{ $errors->register->first('mothersname') }}</span>

                <input class="button" value="Criar" type="submit">


            </form>
        </div>
    </div>
    <div class="one-fourth">
        @include('partials/serverstatus')
        @include('partials/advertorialsection')



    </div>

    <script>
        $("#birthdate").mask('99/99/9999')
    </script>



@endsection