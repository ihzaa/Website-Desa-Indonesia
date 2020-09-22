<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenisPembiayaan extends Model
{
    use SoftDeletes;
    protected $fillable=['jenis_pembiayaan', 'nominal_pembiayaan', 'pembiayaan_desa_id'];
    public function pembiayaandesa(){
        return $this->belongsTo(PembiayaanDesa::class, 'pembiayaan_desa_id');
    }
}
