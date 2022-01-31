@extends('main')

@section('content')
    <div class="one-fourth">
        @include('partials/membersection')
        <br>
        @include('partials/serverstatus')
    </div>
    <div class="three-fourth-right">
        <div class="article-header big-padding">
            <h1>{{!! nl2br($news->title) !!}}</h1>
            <h3>{{$news->publish}}</h3>
        </div>
        <div class="article big-padding">
            <span class="image-overlay news-overlay">
                <img src="{{asset('/images/dealer.png')}}">
            </span>


            <p>{!!  nl2br($news->body) !!}</p>
        </div>
        </div>


@endsection