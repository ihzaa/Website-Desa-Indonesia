<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RincianArsipKeuangan extends Model
{
    protected $table = 'rincian_arsip_keuangan';
    protected $fillable = [
        'bidang_arsip_keuangan_id',
        'pos_arsip_keuangan_id',
        'rincian',
        'nominal',
        'pajak',
    ];

    public function BidangArsipKeuangan(){
        return $this->belongsTo(BidangArsipKeuangan::class);
    }

    public function PosArsipKeuangan(){
        return $this->belongsTo(PosArsipKeuangan::class);
    }
}
