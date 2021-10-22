<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class UserInfo extends Authenticatable
{
    public $table = "UserInfo";
    protected $primaryKey = "Account";
    public $incrementing = false;
    
    
   
}
