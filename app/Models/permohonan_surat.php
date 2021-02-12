<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class permohonan_surat extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'jenis_surat',
        'attribute',
        'logo',
        'keterangan',
        'tipe_surat',
        'kode_surat',
        'keterangan_pembuka'
    ];

    public function penduduk()
    {
        return $this->belongsToMany('App\Models\Penduduk', 'arsip_surat_penduduk');
    }

    public function arsip_surat_penduduks()
    {
        return $this->hasMany('App\Models\arsip_surat_penduduk');
    }
}
