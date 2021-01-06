<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BidangArsipKeuangan extends Model
{
    use SoftDeletes;
    protected $table = 'bidang_arsip_keuangan';
    protected $fillable = [
        'tahun_arsip_keuangan_id',
        'nama_bidang',
        'uang_bagian',
        'cash_on_hand'
    ];

    public function TahunArsipKeuangan(){
        return $this->belongsTo(TahunArsipKeuangan::class);
    }

    public function RincianArsipKeuangan(){
        return $this->hasMany(RincianArsipKeuangan::class);
    }
}
