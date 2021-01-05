<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TahunArsipDokumen extends Model
{
    use SoftDeletes;
    protected $table = 'tahun_arsip_dokumen';
    protected $fillable = [
        'tahun',
    ];

    public function ArsipDokumen(){
        return $this->hasMany(ArsipDokumen::class);
    }
}
