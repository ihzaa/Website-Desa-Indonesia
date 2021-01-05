<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArsipDokumen extends Model
{
    use SoftDeletes;
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
