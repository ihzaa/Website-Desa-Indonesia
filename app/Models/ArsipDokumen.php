<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArsipDokumen extends Model
{
    protected $table = 'arsip_dokumen';
    protected $fillable = [
        'tahun_arsip_dokumen_id',
        'nama_arsip',
        'file'
    ];

    public function TahunArsipDokumen(){
        return $this->belongsTo(TahunArsipDokumen::class);
    }
}
