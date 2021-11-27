<?php

namespace App\Http\Controllers;

use App\Activateuser;
use App\Betakey;
use App\Betareservation;
use App\Forgottenpassword;
use App\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\Mail;
use Validator;
use Auth;
use Hash;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{

    public function authenticate()
    {

        $user = UserInfo::where('Account', '=', Input::get('username'))->get()->first();

        if(isset($user)) {
            if($user->MD5PassWord == md5(Input::get('password'))) { // If their password is still MD5

                Session::put('user', $user);

                return redirect('/pass');
            }
            return back()->withErrors(array('password' => 'Invalid password'), 'login');
        }

        return back()->withErrors(array('username' => 'Invalid username'), 'login');
    }

    public function destroy() {
        Session::forget('user');

        return redirect('/');
    }

    function update() {

        $validator = Validator::make(Input::all(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'mothersname' => 'required',
        ]);

        if ($validator->passes()) {
            $user = Session::get('user');
            $user = UserInfo::where('Account', '=', $user->Account)->get()->first();
            $user->FirstName = Input::get('firstname');
            $user->LastName = Input::get('lastname');
            $user->answer = Input::get('mothersname');

            if ($user->save()) {
                return redirect('/account');
            }
        }
        return redirect('/account')
            ->withErrors($validator, 'update');
    }

    function create() {

        $validator = Validator::make(Input::all(), [
            'Account' => 'required|unique:UserInfo',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'Email' => 'required|email|unique:UserInfo',
            'firstname' => 'required',
            'lastname' => 'required',
            'birthdate' => 'required|date',
            'mothersname' => 'required'
        ]);

        if ($validator->passes()) {
            $account = new UserInfo();
            $account->Account = Input::get('Account');
            $account->MD5Password = md5(Input::get('password'));
            $account->Email = Input::get('Email');
            $account->FirstName = Input::get('firstname');
            $account->LastName = Input::get('lastname');
            $account->Birthday = Input::get('birthdate');
            $account->answer = Input::get('mothersname');
            $account->Right = 1;
            $account->USER_CP = 0;
            $account->MailIsConfirm = 0;
            $account->ip = request()->ip();

            if ($account->save()) {
                $this->sendActivateMail($account);
                return redirect('/accountcreated/'.$account->Account);
            }
        }
        return redirect('/register')
            ->withErrors($validator, 'register')
            ->withInput();

    }

    function sendActivateMail($account) {
        $user = new Activateuser();
        $user->Account = $account->Account;
        $user->token = str_random(100);

        if($user->save()) {

            Mail::send('emails.mail', ['user' => $user], function ($m) use ($account) {
                $m->from(env('MAIL_USERNAME','lsroseonline@gmail.com'), 'LS-ROSE Online');

                $m->to($account->Email, $account->FirstName . " " . $account->LastName)->subject('Ativação de conta');
            });
        }
    }
    
    function activatebeta() {
        $validator = Validator::make(Input::all(), [
            'betakey' => 'required|unique:UserInfo',
        ]);

        if ($validator->passes()) {
            $user = Session::get('user');
            $user = UserInfo::where('Account', '=', $user->Account)->get()->first();

            $user->AllowBeta = 1;
            $user->betakey = Input::get('betakey');

            $key = Betakey::where('key', '=', Input::get('betakey'))->get()->first();

            if (isset($key)) {
                $key->used = true;
                $key->Account = $user->Account;
            } else {
                return redirect('/account')
                    ->withErrors(array('betakey' => 'Invalid betakey'), 'betakey');
            }


            if ($user->save()) {
                $key->save();
                return redirect('/account')
                    ->with('message', "Account activated for beta program!");
            }
        }
        return redirect('/account')
            ->withErrors(array('betakey' => 'Betakey already in use'), 'betakey');
    }

    function forgottenpassword() {
        $validator = Validator::make(Input::all(), [
            'email' => 'required',
            'security' => 'required',
        ]);
        if ($validator->passes()) {
            $account = UserInfo::where('Email', Input::get('email'))->where('answer', Input::get('security'))->get()->first();
        }
        if(isset($account)) {
            $pass = new Forgottenpassword();
            $pass->Account = $account->Account;
            $pass->token = str_random(100);

            if($pass->save())

                Mail::send('emails.forgottenpassword', ['user' => $pass], function ($m) use ($account) {
                    $m->from(env('MAIL_USERNAME','lsroseonline@gmail.com'), 'LS-ROSE Online');

                    $m->to($account->Email, $account->FirstName . " " . $account->LastName)->subject('Forgotten password');
                });

               return redirect('/');
        }

       return redirect('/')
            ->withErrors(array('forgottenpassword' => 'Invalid userinfo'), 'forgottenpassword');


    }

    function changepassword() {
        $validator = Validator::make(Input::all(), [
            'account' => 'required',
            'token' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'

        ]);

        if ($validator->passes()) {
            $pass = Forgottenpassword::where('Account', Input::get('account'))
                ->where('token', Input::get('token'))
                ->get()->first();


            if(isset($pass) && $pass->created_at->diffInHours() < 24) {
                $user = UserInfo::find($pass->Account);
                if(isset($user)) {
                    $user->MD5PassWord = md5(Input::get('password'));

                    if($user->save())
                        return redirect('/');
                }
                return back()
                    ->withErrors(array('error' => "An error occured"), 'error');
            }

            return back()
                ->withErrors(array('error' => "Your token has expired after 24 hours. "), 'error');
        }
        return back()
            ->withErrors($validator, 'password');

    }

    function betasignup() {
        $validator = Validator::make(Input::all(), [
            'email' => 'required|email|unique:Betareservations',
            'reason' => 'required',
        ]);

        if($validator->passes()) {
            $beta = new Betareservation();

            $beta->Email = Input::get('email');
            $beta->reason = Input::get('reason');

            if($beta->save()) {
                return redirect('/');
            }

            return back()
                ->withErrors(array('error' => 'An error occured'), 'error');
        }

        return back()
            ->withErrors($validator, 'beta');
    }

}
