<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BPD extends Model
{
    use SoftDeletes;
    protected $table = 'bpd';

    protected $fillable = ['nama', 'jabatan', 'photo'];
}
