<!DOCTYPE html>
<html>
<head>
    <title>LS-ROSE Online- FREE TO PLAY FANTASY MMORPG</title>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <link rel="icon" type="img/ico" href="{{ asset('favicon.ico') }}">
    <link href="{{ asset('css/css.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="{{ asset('/css/jquery.modal.css') }}" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="{{asset('/js/jquery.modal.min.js')}}" type="text/javascript" charset="utf-8"></script>
    <script src="{{asset('/js/jquery.slides.min.js')}}"></script>

</head>
<body>
<div class="wrapper">
    <div class="logo">
        <img width="100%" src="{{asset('images/logo_website.png')}}">
    </div>
    <div class="navbar">
        <div class="navbar-inner">
            <ul class="navbar-text">
                <a href="/">
                    <li>Início</li>
                </a>
				<a href="/register">
                    <li>Registrar</li>
                </a>
				<a href="/account">
                    <li>Login</li>
                </a>
				<a href="/rankigns">
                    <li>Rankings</li>
                </a>				
                <a href="/download">
                    <li>Download</li>
                </a>
				<a href="/donate">
                    <li>Donate</li>
                </a>
				<!-- <a href="/armory">
                    <li>Arsenal</li>
                </a>
				<a href="/guides">
                    <li>Guias</li>
                </a> -->                           
                <a href="/support">
                    <li>Suporte</li>
                </a>
				<a href="https://www.facebook.com/lsroseonline" target="_blank">
                    <li>Facebook</li>
                </a>  
				<a href="https://discord.gg/cgsrhZ89wU" target='_blank'>
                    <li>Discord</li>
                </a>
            </ul>
        </div>
    </div>
    <div class="content">
        @yield('content')
    </div>

</div>

<div class="footer">
    <div class="inner-footer">
        <div class="nav-footer border">
            <ul class="navbar-text">
				<li><a href="/">Início </a></li>
                <li><a href="/register">Registrar </a></li>
                <li><a href="/account">Login </a></li>
                <li><a href="/rankings">Rankings </a></li>                
                <li><a href="/download">Download </a></li>
                <li><a href="/donate">Donate </a></li>
                <li><a href="/armory">Arsenal </a></li>
                <li><a href="/guides">Guias </a></li>
                <li><a href="/support">Suporte </a></li>
				<li><a href="https://www.facebook.com/lsroseonline" target="_blank">Facebook </a></li>
                <li><a href="https://discord.gg/cgsrhZ89wU" target='_blank'>Discord </a></li>			
            </ul>
        </div>
        <div class="nav-copyright">
            <li><img width="80px" src="{{asset('/images/logo_black.png')}}"></li>
            &copy; 2020 - LS-ROSE Online - All rights reserved
        </div>
    </div>
</div>
</body>
</html>
