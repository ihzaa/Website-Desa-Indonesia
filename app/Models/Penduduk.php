<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Penduduk extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    protected $appends = ['umur'];


    public function kartu_keluarga(){
        return $this->belongsTo(KartuKeluarga::class, 'id_kartu_keluarga');
    }

    public function data_ktp(){
        return $this->hasOne(DataKtp::class, 'id_data_ktp');
    }

    public function kematian(){
        return $this->hasOne(Kematian::class, 'id_kematian');
    }

    public function getUmurAttribute()
    {
        if($this->status_hidup=='mati'){
            return 'wafat';
        }else{
            return Carbon::parse($this->attributes['tgl_lahir'])->age;
        }
    }
}
