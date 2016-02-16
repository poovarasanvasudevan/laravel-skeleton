<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kodeine\Acl\Traits\HasRole;

class User extends Model
{
    //

    use HasRole;

    protected $hidden = ['password'];


    var $name;
    var $email;
    var $password;
}
