<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class admin extends Authenticatable
{
    protected $hidden = [
        'password', 'remember_token',
    ];
}
