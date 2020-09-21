<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenisPembiayaan extends Model
{
    use SoftDeletes;

    public function pembiayaandesa(){
        return $this->hasMany(PembiayaanDesa::class);
    }
}
