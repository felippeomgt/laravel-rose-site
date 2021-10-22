@extends('main')

@section('notice')


<div class="one-fourth">
        <div class="news">
            @foreach(\App\Newsitem::where('publish', '<=', \Carbon\Carbon::now())->orderBy('publish', 'desc')->get() as $newsitem)
                <a href="/news/{{$newsitem->id}}">
                    <div class="news-item">
                        <div class="news-image">
                            <img src="{{ asset('images/'.$newsitem->type.'.png') }}">
                        </div>
                        <div class="news-text">
                            <h1>{{$newsitem->title}}</h1>
                            <h3>{{$newsitem->publish}}</h3>
                            <p>{{$newsitem->body}}</p>
                        </div>
                    </div>
                </a>
            @endforeach

            <script type="text/javascript" charset="utf-8">
                $(function () {
                    $("p").each(function (i) {
                        len = $(this).text().length;
                        if (len > 90) {
                            $(this).text($(this).text().substr(0, 90) + '...');
                        }
                    });
                });
            </script>

        </div>

    </div>    

@endsection



<?php
//        use App\Newsitem;
//
//        $item = new Newsitem();
//        $item->title = "beta release";
//        $item->type = "update";
//        $item->body = "Lorem ipsum...";
//        $item->publish = \Carbon\Carbon::now();
//        $item->save();
//        use App\Betakey;
//$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
//        $key = "";
//for ($i = 0; $i < 50; $i++) {
//    for ($j = 0; $j < 100; $j++) {
//        $key .= $characters[rand(0, strlen($characters) - 1)];
//    }
//    $beta = new Betakey();
//    $beta->key = $key;
//    $beta->save();
//    $key = "";
//}
//?>