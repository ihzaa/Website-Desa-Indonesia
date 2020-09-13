<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class arsip_surat_penduduk extends Model
{
    use SoftDeletes;
    protected $fillable = ['tanggal_surat', 'penduduk_id', 'permohonan_surat_id'];
}
