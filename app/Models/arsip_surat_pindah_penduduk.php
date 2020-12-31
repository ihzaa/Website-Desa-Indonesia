<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class arsip_surat_pindah_penduduk extends Model
{
    use SoftDeletes;
    protected $fillable = ['penduduk_id', 'rt', 'rw', 'desa_kelurahan', 'kecamatan', 'kabupaten_kota', 'provinsi'];
}
