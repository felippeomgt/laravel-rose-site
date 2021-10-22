@extends('main')

@section('content')
    <div class="one-fourth">
        @include('/partials/membersection')
        <br>
        @include('/partials/serverstatus')
    </div>
    <div class="three-fourth-right">
        <div class="account-created big-padding">
            <h1>Conta Criada!</h1>
            <h2>Bem vindo ao LS-ROSE!</h2>
            <p>Antes de iniciar sua jornada, precisamos que você confirme seu endereço de e-mail.<br>
                Nós te enviamos um e-mail no endereço cadastrado, com um link de confirmação de identidade.<br>
				Após confirmar sua identidade você poderá acessar a sua conta para jogar. <br>
				Caso não encontre o e-mail olhe a pasta de spam, se ainda não encontrar, solicite um novo email <a href="#">clicando aqui</a>	<br>
				Se tiver algum problema com a criação/verificação de conta, ou outros assuntos, procure-nos no <a href="https://discord.gg/cgsrhZ89wU">discord</a> ou abra um ticket pro nosso <a href="/support">suporte</a><br>				
			</p>
			<p>
				Já baixou, o jogo? Caso não tenha baixado ainda <a href="#">clique aqui para baixar o jogo</a>
			</p>
			<p>
				Não conhece o fantástico mundo de ROSE Online? Quer aprender mais sobre o jogo? <a href="#"> aqui</a> você pode ver nossos guias e tutoriais.
			</p>

			<p>
				Suporte o nosso jogo!!!<br>
				Estamos sempre trabalhando muito para lhe proporcionar a melhor experiência de ROSE Online!		<br>	<br>	
	
				Atenciosamente, equipe LS.
            </p>
        </div>

    </div>

@endsection