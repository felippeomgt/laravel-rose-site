@extends('main')

@section('content')
    <div class="one-fourth">
        @include('partials/membersection')
        <br>
        @include('partials/serverstatus')
    </div>

    <div class="three-fourth-right">
        <div class="login big-padding">
            <h1>
                <span class="text">Acessar sua conta</span><span class="span">
        <img class="goldT" src="{{asset('/images/penguins.png')}}">
    </span>
            </h1>


            <form method="post" action="/authenticate">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input placeholder="Usuario" type="text" class="form-control" name="username" required>
                {{$errors->login->first('username')}}
                <input placeholder="Senha" type="password" class="form-control" name="password" required autocomplete="off">
                {{$errors->login->first('password')}}

                <div class="member-panel-options">
                    <ul>
                        <li><a id="forgotpass" href="#ex1" rel="modal:open"><span> </span>Esqueci minha senha</a></li>
                        <li><a href="/register"><span> </span>Criar conta</a></li>
                    </ul>
                </div>

                <input class="button-login" type="submit" value="Acessar">
            </form>
        </div>
    </div>
@endsection