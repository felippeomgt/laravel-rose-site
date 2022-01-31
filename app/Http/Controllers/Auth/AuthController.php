<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Request;
use App\UserInfo;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    public function postLogin(Request $request) {
        return "test";
    }

    public function authenticate(Request $request)
    {
        if (Auth::attempt(['Account' => $request->input('username'), 'MD5Password' => $request->input('password')])) {
            // Authentication passed...
            return redirect()->intended('dashboard');
        }
    }
}
