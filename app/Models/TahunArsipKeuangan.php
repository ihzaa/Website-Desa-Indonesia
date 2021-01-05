<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TahunArsipKeuangan extends Model
{
    use SoftDeletes;
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