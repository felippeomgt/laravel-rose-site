<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\Ticketmessage;
use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Session;

class TicketController extends Controller
{
    function create()
    {
        $validator = Validator::make(Input::all(), [
            'title' => 'required',
            'department' => 'required',
            'message' => 'required'
        ]);

        if ($validator->passes()) {
            $ticket = new Ticket();
            $ticketmessage = new Ticketmessage();

            $ticket->Account = Session::get('user')->Account;
            $ticket->title = Input::get('title');
            $ticket->department = Input::get('department');
            $ticket->ip = request()->ip();


            if ($ticket->save()) {

                $ticketmessage->ticketid = $ticket->id;
                $ticketmessage->message = Input::get('message');

                if ($ticketmessage->save())
                    return back()
                        ->with('message', 'Ticket created!');

                return back()
                    ->withErrors(array('error' => 'An error occured'), 'error');
            }
        }

        return back()
            ->withErrors($validator, 'ticket');
    }

    function get($id)
    {
        $ticket = Ticket::find($id);
        $messages = Ticketmessage::where('ticketid', $id)->get();

        if (isset($ticket) && isset($messages) && $ticket->Account == Session::get('user')->Account)
            return view('partials.ticket')
                ->with('ticket', $ticket)
                ->with('messages', $messages);

        return redirect('/');
    }

    function addreply($id) {
        $validator = Validator::make(Input::all(), [
            'message' => 'required',
        ]);

        if(!$validator->passes()) {
            return back()
                ->withErrors($validator, 'reply');
        }

        $ticket = Ticket::find($id);

        if(isset($ticket) && $ticket->Account == Session::get('user')->Account) {
            $message = new Ticketmessage();
            $message->ticketid = $id;
            $message->message = Input::get('message');

            $ticket->replied = false;

            if($message->save() && $ticket->save())
                return back();

        }

        return back()
            ->withErrors(array('error' => 'An error occured'), 'error');


    }

}
