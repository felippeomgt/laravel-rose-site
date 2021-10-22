@extends('main')

@section('content')
    <div class="one-fourth">
        @include('partials.membersection')
        @include('partials.serverstatus')
    </div>

    <div class="three-fourth-right">
        <div class="ticket-messages big-padding">
            <h1>{{$ticket->title}}</h1>
            <ul>
                <li>Código do Ticket: {{$ticket->id}}</li>
                <li>Departmento: {{$ticket->department}}</li>
            </ul>

            @foreach($messages as $message)
                <div {!! $message->replygm ? : 'style="background-color: #e0e0e0;"'!!} class="ticket-message">
                    {!! nl2br(e($message->message)) !!}
                </div>
            @endforeach

            @if(!$ticket->closed)
                <form method="post" action="/updateticket/{{$ticket->id}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="ticketid" value="{{$ticket->id}}">
                    <textarea name="message" rows="10" placeholder="Escreva uma reposta" required></textarea>
                    <span class="error">{{$errors->reply->first('ticketid')}}</span>
                    <span class="error">{{$errors->reply->first('message')}}</span>
                    <span class="error">{{$errors->error->first('error')}}</span>
                    <input type="submit" value="Responder">
                </form>

            @endif
        </div>
    </div>
@endsection