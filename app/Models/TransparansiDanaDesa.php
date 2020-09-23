<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransparansiDanaDesa extends Model
{
    use SoftDeletes;
    protected $fillable=['tahun', 'is_active', 'pendapatan_desa_id', 'pembiayaan_desa_id', 'belanja_desa_id', 'sisa_pendapatan_id'];

    public function sisapendapatan(){
        return $this->belongsTo(SisaPendapatanDesa::class, 'sisa_pendapatan_id');
    }

    public function pembiayaandesa(){
        return $this->belongsTo(PembiayaanDesa::class, 'pembiayaan_desa_id');
    }

    public function pendapatandesa(){
        return $this->belongsTo(PendapatanDesa::class, 'pendapatan_desa_id');
    }

    public function belanjadesa(){
        return $this->belongsTo(BelanjaDesa::class, 'belanja_desa_id');
    }
}
