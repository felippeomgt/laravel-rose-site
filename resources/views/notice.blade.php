<!DOCTYPE html>
<html>
<head>
    <title>LS-ROSE Online- FREE TO PLAY FANTASY MMORPG</title>    
    <link rel="icon" type="img/ico" href="{{ asset('favicon.ico') }}">
    <link href="{{ asset('css/css.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{ asset('/css/jquery.modal.css') }}" type="text/css">
    <script src="{{asset('/js/jquery.min.js')}}"></script>
	<script src="{{asset('/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('/js/jquery.modal.min.js')}}" type="text/javascript" charset="utf-8"></script>
    <script src="{{asset('/js/jquery.slides.min.js')}}"></script>

</head>
<body>
<div class="wrapper">
    
    <div class="content">
        @yield('notice')
    </div>

</div>

</body>
</html>
