<div class="member-panel">
    <a href="/register"><img src="{{ asset('images/joinus_button.png')}}"></a>
    <div class="big-padding">
        <h1 class="border">Minha Conta</h1>
        @if(!Session::has('user'))
            <span class="image-overlay member-panel-overlay">
                <img src="{{ asset('images/hawker.png') }}">
            </span>
            <form method="post" action="/authenticate">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input placeholder="Usuario" type="text" name="username" required>
                {{$errors->login->first('username')}}
                <input placeholder="Senha" type="password" name="password" required>
                {{$errors->login->first('password')}}

                <div class="member-panel-options">
                    <ul>
                        <li><a id="forgotpass" href="#ex1" rel="modal:open"><span> > </span>Esqueci minha senha</a></li>
                        <li><a href="/register"><span> > </span>Criar Conta</a></li>
                    </ul>
                </div>

                <input class="button-login" type="submit" value="Acessar">
            </form>
        @else
            <div class="control-panel">

                <h1>Bem vindo {{Session::get('user')->Account}},</h1>
                <ul>
                    <a href="/account">
                        <li> > Minha Conta</li>
                    </a>
                    <a href="/support">
                        <li> > Meus Tickets (suporte) </li>
                    </a>
                    <a href="#">
                        <li> > Meus Chars</li>
                    </a>
                </ul>
            </div>
            <form method="post" action="/signout">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input class="button-login" type="submit" value="sign out">
            </form>
        @endif
    </div>
</div>


<!-- Modal HTML embedded directly into document -->
<div id="ex1" style="display:none;">
    <div class="modal-header">
        <h1 class="border">Senha esquecida</h1>
    </div>

    <form method="post" action="/forgottenpassword" class="forgottenpassword">
        {!! csrf_field() !!}
        <input name="email" id="email" type="email" placeholder="email" required>
        <input name="security" id="security" type="text" placeholder="mothers name" required>
        <span class="error">{{$errors->forgottenpassword->first('forgottenpassword')}}</span>
        <input type="submit" value="Sent email with further instruction">
    </form>
</div>

@if($errors->forgottenpassword->first('forgottenpassword') == 'Invalid userinfo')
    <script>
        $('.member-panel-options a').trigger('click');
    </script>
@endif
