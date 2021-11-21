<?php
$job = array(
        0 => 'Visitor',
        111 => 'Soldier',
        121 => 'Knight',
        122 => 'Champ',
        211 => 'Muse',
        221 => 'Mage',
        222 => 'Cleric',
        311 => 'Hawker',
        321 => 'Raider',
        322 => 'Scout',
        411 => 'Dealer',
        421 => 'Bourg',
        422 => 'Artisan'
);

$counter = 1;
?>

<div class="ranking ">
    <div class="header big-padding">
        <h2><a class="white-link" href="/rankings">Rankings</a></h2>
    </div>
    <table class="table-striped">
        <tr>
            <th colspan="2">Nome</th>
            <th>Level</th>
            <th>Classe</th>
            <!--<th>Zuly</th> -->
        </tr>

        @foreach(\App\Avatar::where('txtNAME', 'NOT LIKE', '%]%')->orderBy('btLEVEL','DESC')->limit(10)->get() as $avatar)
            <tr>
                <td><span class="position">{{$counter++}}</span></td>
                <td style="max-width: 100px;">{{$avatar->txtNAME}}</td>
                <td>{{$avatar->btLEVEL}}</td>
                <td>{{$job[$avatar->intJOB]}}</td>
				<!--<td>{{$avatar->intMoney}}</td>-->
            </tr>
        @endforeach
    </table>
</div>

<script type="text/javascript" charset="utf-8">
    $(function () {
        $("td").each(function (i) {
            len = $(this).text().length;
            if (len > 15) {
                $(this).text($(this).text().substr(0, 15) + '...');
            }
        });
    });
</script>