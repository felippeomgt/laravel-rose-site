<?php
$user = \App\UserInfo::where('Account', '=', Session::get('user')->Account)->get()->first();
?>

@extends('main')

@section('content')
    <div class="one-fourth">
        @include('partials/membersection')
        @include('partials/advertorialsection')

    </div>
    <div class="three-fourth-right">
        <div class="account big-padding">
            <form class="register" method="post" role="form" action="/update">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <h1>Contact information</h1>
                <input placeholder="email*" value="{{$user->Email}}" type="email" name="Email" id="Email" required>
                <span class="error">{{ $errors->update->first('Email') }}</span>

                <h1>Informação Pessoal</h1>
                <input placeholder="Nome*" value="{{$user->FirstName}}" type="text" name="firstname" id="firstname"
                       required>
                <input placeholder="Sobrenome*" value="{{$user->LastName}}" type="text" name="lastname" id="lastname"
                       required>
                <input placeholder="Data de nascimento*" value="{{$user->Birthday}}" type="date" name="birthdate"
                       id="birthdate" readonly>
                <span class="error">{{ $errors->update->first('firstname') }}</span>
                <span class="error">{{ $errors->update->first('lastname') }}</span>
                <span class="error">{{ $errors->update->first('birthdate') }}</span>
                <h1>Informações de segurança</h1>
                <input placeholder="Palavra chave (nome da mãe)*" value="{{$user->answer}}" type="text" name="mothersname"
                       id="mothersname" required>
                <span class="error">{{ $errors->update->first('mothersname') }}</span>
                <p>* Campo Obrigatório</p>
                <input class="button" value="save" type="submit">
            </form>

            <form class="register" method="post" action="/beta">
                <h1>{{session('message')}}</h1>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <h1>Chave BETA</h1>
                <input placeholder="beta key" value="{{$user->betakey}}" type="text" name="betakey" required>
                <span class="error">{{ $errors->betakey->first('betakey') }}</span>

                <input class="button" value="Ativar" type="submit">
            </form>
        </div>
    </div>

@endsection