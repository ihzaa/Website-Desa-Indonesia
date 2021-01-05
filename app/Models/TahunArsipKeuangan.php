<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TahunArsipKeuangan extends Model
{
    protected $table = 'tahun_arsip_keuangan';
    protected $fillable = [
        'tahun',
    ];

    public function PendapatanArsipKeuangan(){
        return $this->hasMany(PendapatanArsipKeuangan::class);
    }

    public function PosArsipKeuangan(){
        return $this->hasMany(PosArsipKeuangan::class);
    }
}