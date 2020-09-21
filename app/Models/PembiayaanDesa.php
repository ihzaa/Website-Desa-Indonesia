<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PembiayaanDesa extends Model
{

    use SoftDeletes;

    public function jenispembiayaan(){
        return $this->belongsTo(JenisPembiayaan::class);
    }

    public function transpransidesa(){
        return $this->hasMany(TransparansiDanaDesa::class);
    }
}
