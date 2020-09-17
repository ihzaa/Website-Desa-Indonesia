<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KritikSaran extends Model
{
    protected $table = 'kritiksarans';

    protected $fillable = ['nama', 'email', 'subject', 'message'];
}
