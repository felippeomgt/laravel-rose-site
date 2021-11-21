<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Activateuser;
use App\UserInfo;


Route::get('/', function () {
    return view('/partials/index');
});

Route::get('/news/{id}', function ($id){
    return view('/partials/news')
        ->with('news', \App\Newsitem::find($id));
});

Route::get('/notice', function (){
    return view('/partials/notice')
        ->with('news', \App\Newsitem::latest()->first());
});


Route::get('/register', function () {
    return view('/partials/register');
});

Route::get('/account', ['middleware' => 'authorization', function() {
    return view('/partials/account');
}]);

Route::get('/pass', ['middleware' => 'authorization', function() {
    return view('/partials/index');
}]);

Route::get('/login', function (){
    return view('/partials/login');
});

Route::get('/accountcreated', function (){
    return view('partials/accountcreated');
});

Route::get('/account/passreset', function () {
   return view('/partials/passreset');
});

Route::get('/donate', ['middleware' => 'authorization', function () {
    return view('/partials/donate');
}]);

Route::get('/rankings', function () {
    return view('/partials/rankings');
});

Route::get('/armory', function () {
    return view('/armory');
});

Route::get('/guides', function () {
    return view('/guides');
});

Route::get('/paymentsucces', function () {
    return view('partials/paymentsucces');
});

Route::get('/getbeta', function () {
   return view('partials/betasignup');
});

Route::get('/support', ['middleware' => 'authorization', function() {
    return view('partials.support');
}]);

Route::get('/ticket/{id}', ['middleware' => 'authorization', 'uses' => 'TicketController@get']);

Route::get('/account/verify/{account}/{token}', function ($account, $token) {
    $user = Activateuser::find($account);

    if(isset($user)) {
        if($user->token == $token) {
            $account = UserInfo::find($account);

            if(isset($account)) {
                $account->MailIsConfirm = 1;
                if($account->save()) {
                    return view('/partials/accountverificated');
                }
            }
        }
    }
    return 'An error occured';
});

Route::post('/changepassword', 'UserController@changepassword');
Route::post('/forgottenpassword', 'UserController@forgottenpassword');
Route::post('/authenticate', 'UserController@authenticate');
Route::post('/register', 'UserController@create');
Route::post('/signout', 'UserController@destroy');
Route::post('/update', ['middleware' => 'authorization','uses' => 'UserController@update']);
Route::post('/beta', ['middleware' => 'authorization','uses' => 'UserController@activatebeta']);
Route::post('/cash', 'PaymentController@cashMoney');
Route::post('/betasignup', 'UserController@betasignup');
Route::post('/createticket', ['middleware' => 'authorization','uses' => 'TicketController@create']);
Route::post('/updateticket/{id}', ['middleware' => 'authorization','uses' => 'TicketController@addreply']);

Route::get('/pay', 'PaymentController@pay');
Route::get('/payments', 'PaymentController@index');
Route::get('/payment/{id}', 'PaymentController@show');
Route::get('/sale/{id}', 'PaymentController@getSale');

Route::resource('payment', 'PaymentController');



