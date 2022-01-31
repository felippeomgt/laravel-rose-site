<?php

namespace App\Http\Controllers;

use App\Avatar;
use App\Ticket;
use App\Ticketmessage;
use App\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Validator;
use App\Http\Requests;
use Session;

class TicketController extends Controller
{
    function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'department' => 'required',
            'message' => 'required'
        ]);

        if ($validator->passes()) {
            $ticket = new Ticket();
            $ticketmessage = new Ticketmessage();
            $account = Session::get('user')->Account;

            $ticket->Account = $account;
            $ticket->title = $request->input('title');
            $ticket->department = $request->input('department');
            $ticket->ip = request()->ip();


            if ($ticket->save()) {

                $ticketmessage->ticketid = $ticket->id;
                $ticketmessage->message = $request->input('message');

                if ($ticketmessage->save()){
                    $this->mailUser($ticket, $ticketmessage);
                    $this->mailStaff($ticket,$ticketmessage);
                    return back()->with('message', 'Ticket created!');
                }


                return back()
                    ->withErrors(array('error' => 'An error occured'), 'error');
            }
        }

        return back()
            ->withErrors($validator, 'ticket');
    }

    public function mailUser($ticket, $ticketmessage)
    {
        $user = UserInfo::find($ticket->Account);

        Mail::send('emails.ticket', ['user'=>$user,'ticket' => $ticket,'ticketmessage' => $ticketmessage], function ($m) use ($user,$ticket,$ticketmessage) {
            $m->from(env('MAIL_USERNAME','lsroseonline@gmail.com'), 'LS-ROSE Online');

            $m->to($user->Email, $user->FirstName . " " . $user->LastName)->subject('LS Rose Online - Ticket ' . $ticketmessage->ticketid.' aberto');
        });
    }

    public function mailStaff($ticket, $ticketmessage)
    {
        // Get all users with GM+ rights
        $users = UserInfo::where('Right', '>', 32);

        Mail::send('emails.ticketgm', ['users'=>$users,'ticket' => $ticket,'ticketmessage' => $ticketmessage], function ($m) use ($users,$ticket,$ticketmessage) {
            $m->from(env('MAIL_USERNAME','lsroseonline@gmail.com'), 'LS-ROSE Online');
            foreach($users as $user) {
                $m->to($user->Email, $user->FirstName . " " . $user->LastName)->subject('LS Rose Online - Ticket ' . $ticketmessage->ticketid . ' aberto');
            }
        });
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

    function addreply($id, Request $request) {
        $validator = Validator::make($request->all(), [
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
            $message->message = $request->input('message');

            $ticket->replied = false;

            if($message->save() && $ticket->save())
                return back();

        }

        return back()
            ->withErrors(array('error' => 'An error occured'), 'error');


    }

}
