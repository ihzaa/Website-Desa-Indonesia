<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PembiayaanDesa extends Model
{

    use SoftDeletes;
    protected $fillable=['total_pembiayaan', 'jenis_pembiayaan_id'];

    public function jenispembiayaan(){
        return $this->hasMany(JenisPembiayaan::class);
    }

    public function transparansidesa(){
        return $this->hasMany(TransparansiDanaDesa::class);
    }
}
