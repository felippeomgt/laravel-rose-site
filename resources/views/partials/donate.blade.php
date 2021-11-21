@extends('main')

@section('content')

    <div class="one-fourth">
        <br>
    </div>
    <div class="ranking">
    <div class="header big-padding">
        <h2>Donations</h2>
    </div>
        <p>Ajude nos a manter nosso servidor funcionando!</p><br>
        <p>Ao doar para o servidor você receberá pontos de ROSE CASH, esses pontos podem ser usados dentro do jogo para obter itens especiais!<br>
        Os itens que podem ser adiquiridos com ROSE CASH são a maioria cosméticos, equipamentos, consumiveis e veículos. <br>
            Por mais que alguns equipamentos possuam ótimos atributos, os itens que podem ser obtidos dentro do jogo vão ser sempre melhores do que os itens de CASH,<br> isso garante que o jogo não se torne "pague para vencer". </p>
        <p> Você não é obrigado a doar, mas se fizer, estará ajudando a pagar os custos do servidor e trazer investimentos e melhorias para o jogo.

    <form action="/payment" method="post">





        <select id="points" name="points">
            <option value="250">R$ 4,99 -> 250RC</option>
            <option value="550">R$ 9,99 -> 550RC</option>
            <option value="1250">R$ 19,99 -> 1250RC</option>
            <option value="1600">R$ 24,99 -> 1600RC</option>
			<option value="2700">R$ 39,99 -> 2700RC</option>
            <option value="3600">R$ 49,99 -> 3600RC</option>
            <option value="8000">R$ 99,99 -> 8000RC</option>
            <option value="13000">R$ 149,99 -> 13000RC</option>
			<option value="25000">R$ 249,99 -> 25000RC</option>

            <input type="submit" value="submit">
        </select>
    </form>
@endsection









