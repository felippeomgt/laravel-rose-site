@extends('main')

@section('content')
    <div class="one-fourth">
        @include('partials.membersection')
        @include('partials.advertorialsection')
    </div>

    <div class="three-fourth-right">
        <div class="big-padding support">
            @if(Session::get('user')->Right < 32)
            <div class="new-ticket">
                <h1 class="border-ls">NOVO TICKET</h1>
                <form method="post" action="/createticket">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="text" name="title" placeholder="Título" required>
                    <select name="department" required>
                        <option value="Abuse report">Reportar Abuso</option>
                        <option value="Account issue">Problemas com a Conta</option>
                        <option value="Ban enquire">Apelar banimento</option>
                        <option value="Bug report">Reportar Bug ou Problema</option>
                        <option value="Purchase issue">Problemas com comprass</option>
                        <option value="Hack report">Reportar hacks ou bots</option>
                        <option value="Other">Outros</option>
                    </select>
                    <textarea rows="10" name="message" required placeholder="Escreva seu problema">
                    </textarea>
                    <span class="error">{{$errors->ticket->first('title')}}</span>
                    <span class="error">{{$errors->ticket->first('department')}}</span>
                    <span class="error">{{$errors->ticket->first('message')}}</span>
                    <span class="error">{{$errors->error->first('error')}}</span>
                    <input type="submit" value="Criar Ticket">
                    {{ session('message') }}
                </form>
            </div>
            @endif

            <div class="my-tickets">
                @if(Session::get('user')->Right > 32)
                    <h1 class="border-ls">TICKETS ABERTOS</h1>
                    @foreach(\App\Ticket::where('closed', false)->get() as $ticket)
                        <a href="/ticket/{{$ticket->id}}">
                            <div class="ticket">
                                <table>
                                    <tr>
                                        <td>{{$ticket->id}}</td>
                                        <td>
                                            {{$ticket->Account}}
                                        </td>
                                        <td>
                                            <h1>{{$ticket->title}}</h1>
                                            <h2>{{$ticket->department}}</h2>
                                        </td>
                                        <td>
                                            <h4>{{$ticket->created_at}}</h4>
                                        </td>
                                    </tr>
                                </table>


                            </div>
                        </a>
                    @endforeach
                @else
                    <h1 class="border-ls">Meus TICKETS</h1>
                    @foreach(\App\Ticket::where('Account', Session::get('user')->Account)->get() as $ticket)
                        <a href="/ticket/{{$ticket->id}}">
                            <div class="ticket">
                                <table>
                                    <tr>
                                        <td>{{$ticket->id}}</td>
                                        <td>
                                            {!! $ticket->closed ? '<span style="background-color: red;" class="ticket-status">closed</span>':
                                             '<span style="background-color: green;" class="ticket-status">open</span>'!!}
                                        </td>
                                        <td>
                                            <h1>{{$ticket->title}}</h1>
                                            <h2>{{$ticket->department}}</h2>
                                        </td>
                                        <td>
                                            <h4>{{$ticket->created_at}}</h4>
                                        </td>
                                    </tr>
                                </table>


                            </div>
                        </a>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection