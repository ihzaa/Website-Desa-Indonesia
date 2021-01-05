<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PosArsipKeuangan extends Model
{
    protected $table = 'pos_arsip_keuangan';
    protected $fillable = [
        'tahun_arsip_keuangan_id',
        'nama_pos'
    ];

    public function TahunArsipKeuangan(){
        return $this->belongsTo(TahunArsipKeuangan::class);
    }

    public function RincianArsipKeuangan(){
        return $this->hasMany(RincianArsipKeuangan::class);
    }
}
