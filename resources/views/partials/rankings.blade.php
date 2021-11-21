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

$counterChar = 1;
$counterClan = 1;
$counterDonator = 1;
$counterPVP = 1;
?>

@extends('main')

@section('content')
    <div class="one-fourth">
        <br>
    </div>
<div class="ranking ">
    <div class="header big-padding">
        <h2>Rankings</h2>
    </div>
    <p>

    <ul class="nav nav-pills mb-3" id="rankinsTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="ranking-char-tab" data-bs-toggle="pill" data-bs-target="#ranking-char" type="button" role="tab" aria-controls="ranking-char" aria-selected="true">Chars</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="ranking-clan-tab" data-bs-toggle="pill" data-bs-target="#ranking-clan" type="button" role="tab" aria-controls="ranking-clan" aria-selected="false">Clans</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link disabled" id="ranking-donator-tab" data-bs-toggle="pill" data-bs-target="#ranking-donator" type="button" role="tab" aria-controls="ranking-donator" aria-selected="false">Donators</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link disabled" id="ranking-pvp-tab" data-bs-toggle="pill" data-bs-target="#ranking-pvp" type="button" role="tab" aria-controls="ranking-pvp" aria-selected="false">PVP</a>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="ranking-char" role="tabpanel" aria-labelledby="ranking-char-tab">
            <table class="table-striped">
                <thead>
                    <tr class="text-center">
                        <th  scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Level</th>
                        <th scope="col">Classe</th>
                        <th scope="col">Zuly</th>
                    </tr>
                </thead>

                @foreach(\App\Avatar::where('txtNAME', 'not like', '%]%')->orderBy('btLEVEL','DESC')->limit(10)->get() as $avatar)
                    <tr>
                        <td><span class="position">{{$counterChar++}}</span></td>
                        <td style="max-width: 100px;">{{$avatar->txtNAME}}</td>
                        <td>{{$avatar->btLEVEL}}</td>
                        <td>{{$job[$avatar->intJOB]}}</td>
                        <td>{{number_format(substr($avatar->intMoney,0,strlen($avatar->intMoney)-3).'.'.substr($avatar->intMoney,strlen($avatar->intMoney)-3,3),3,',','.')}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="tab-pane fade" id="ranking-clan" role="tabpanel" aria-labelledby="ranking-clan-tab">
            <table class="table-striped">
                <tr class="text-center">
                    <th>#</th>
                    <th>Nome</th>
                    <th>Slogan</th>
                    <th>Grade</th>
                    <th>Points</th>
                    <th>Zuly</th>
                </tr>

                @foreach(\App\Clans::where('txtNAME', 'not like', '%]%')->orderBy('intLEVEL','DESC')->orderBy('intPOINT','DESC')->limit(10)->get() as $clan)
                    <tr>
                        <td><span class="position">{{$counterClan++}}</span></td>
                        <td style="max-width: 100px;">{{$clan->txtNAME}}</td>
                        <td style="max-width: 100px;">{{$clan->txtDESC}}</td>
                        <td>{{$clan->intLEVEL}}</td>
                        <td>{{number_format($clan->intPOINT,0,',','.')}}</td>
                        <td>{{number_format(substr($clan->intMoney,0,strlen($clan->intMoney)-3).'.'.substr($clan->intMoney,strlen($clan->intMoney)-3,3),3,',','.')}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="tab-pane fade" id="ranking-donator" role="tabpanel" aria-labelledby="ranking-donator-tab">Em desenvolvimento</div>
        <div class="tab-pane fade" id="ranking-pvp" role="tabpanel" aria-labelledby="ranking-pvp-tab">Em desenvolvimento</div>
    </div>



</div>

@endsection

<script type="text/javascript" charset="utf-8">

    var triggerTabList = [].slice.call(document.querySelectorAll('#rankinsTabs a'))
    triggerTabList.forEach(function (triggerEl) {
        var tabTrigger = new bootstrap.Tab(triggerEl)

        triggerEl.addEventListener('click', function (event) {
            event.preventDefault()
            tabTrigger.show()
        })
    })

</script>