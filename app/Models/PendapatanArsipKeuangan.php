<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PendapatanArsipKeuangan extends Model
{
    use SoftDeletes;
    protected $table = 'pendapatan_arsip_keuangan';
    protected $fillable = [
        'tahun_arsip_keuangan_id',
        'nama_pendapatan',
        'nominal',
        'cash_on_hand'
    ];

    public function TahunArsipKeuangan(){
        return $this->belongsTo(TahunArsipKeuangan::class);
    }

    public function BidangArsipKeuangan(){
        return $this->hasMany(BidangArsipKeuangan::class);
    }
}
