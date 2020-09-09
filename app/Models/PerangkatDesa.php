<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PerangkatDesa extends Model
{
    use SoftDeletes;
    protected $table = 'perangkat_desa';

    protected $fillable = ['nama', 'jabatan', 'photo'];
}
