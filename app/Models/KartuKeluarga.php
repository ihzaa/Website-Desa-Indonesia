<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KartuKeluarga extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    protected $appends = ['jumlah_anggota'];
    
    public function penduduks(){
        return $this->hasMany(Penduduk::class, 'id_kartu_keluarga');
    }

    public function getJumlahAnggotaAttribute()
    {
        return $this->penduduks()->count();
    }
}
