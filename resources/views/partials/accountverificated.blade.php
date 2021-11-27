@extends('main')

@section('content')
    <script>
        $(document).ready(function() {
            window.setInterval(function() {
                var timeLeft    = $("#timeLeft").html();
                if(eval(timeLeft) == 0){
                    window.location= ("/");
                }else{
                    $("#timeLeft").html(eval(timeLeft)- eval(1));
                }
            }, 1000);
        });
    </script>
    <div class="account-created big-padding text-white">
        <div class="account-verified-inner">
            <h1 style="color:#f5d248;">Conta verificada!</h1>
            <h3>Divirta-se!</h3>

			
            Você será redirecionado para a pagina inicial em <span id="timeLeft" >10</span> segundos.


        </div>

    </div>
@endsection