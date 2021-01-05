<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PosArsipKeuangan extends Model
{
    use SoftDeletes;
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
