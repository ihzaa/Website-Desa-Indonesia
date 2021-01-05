<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TahunArsipDokumen extends Model
{
    protected $table = 'tahun_arsip_dokumen';
    protected $fillable = [
        'tahun',
    ];

    public function ArsipDokumen(){
        return $this->hasMany(ArsipDokumen::class);
    }
}
