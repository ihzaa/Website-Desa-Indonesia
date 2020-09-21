<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransparansiDanaDesa extends Model
{
    use SoftDeletes;
    protected $fillable=['tahun'];

    public function sisapendapatan(){
        return $this->belongsTo(SisaPendapatanDesa::class);
    }

    public function pembiayaandesa(){
        return $this->belongsTo(PembiayaanDesa::class);
    }

    public function pendapatandesa(){
        return $this->belongsTo(PendapatanDesa::class);
    }

    public function belanjadesa(){
        return $this->belongsTo(BelanjaDesa::class);
    }
}
