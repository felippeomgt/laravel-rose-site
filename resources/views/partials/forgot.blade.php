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
                <span class="text">Informe seu login e palavra de segurança abaixo pra solitar a recuperação de senha.</span>
                <span class="span">
                    <img class="goldT" src="{{asset('/images/penguins.png')}}">
                </span>
            </h1>


            <form method="post" action="/forgottenpassword">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input placeholder="Usuario" type="text" class="form-control" name="email" required>
                {{$errors->login->first('email')}}
                <input placeholder="Palavra de segurança" type="text" class="form-control" name="security" required>
                {{$errors->login->first('security')}}

                <input class="button-login" type="submit" value="Solicitar email de recuperação de senha">
            </form>
        </div>
    </div>
@endsection