<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BidangArsipKeuangan extends Model
{
    protected $table = 'bidang_arsip_keuangan';
    protected $fillable = [
        'pendapatan_arsip_keuangan_id',
        'nama_bidang',
        'cash_on_hand'
    ];

    public function PendapatanArsipKeuangan(){
        return $this->belongsTo(PendapatanArsipKeuangan::class);
    }

    public function RincianArsipKeuangan(){
        return $this->hasMany(RincianArsipKeuangan::class);
    }
}
