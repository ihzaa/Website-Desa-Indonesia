<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Penduduk extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    protected $appends = ['umur', 'pemilih', 'nik'];


    public function kartu_keluarga(){
        return $this->belongsTo(KartuKeluarga::class, 'id_kartu_keluarga');
    }

    public function data_ktp(){
        return $this->belongsTo(DataKtp::class, 'id_data_ktp');
    }

    public function kematian(){
        return $this->belongsTo(Kematian::class, 'id_kematian');
    }

    public function getUmurAttribute()
    {
        if($this->status_hidup=='mati'){
            return 'wafat';
        }else{
            return Carbon::parse($this->attributes['tgl_lahir'])->age;
        }
    }

    public function getPemilihAttribute()
    {
        if($this->status_hidup=='mati'){
            return 'non-aktif';
        }
        if($this->umur >= 17 && $this->data_ktp != null){
            return 'aktif';
        }
        return 'non-aktif';
    }

    public function getNikAttribute()
    {
        $nik = $this->data_ktp;
        if($nik == NULL){
            return 'belum ada data nik';
        }else{
            return $nik;
        }
    }

    public function posyandus(){
        return $this->belongsToMany(Posyandu::class, PosyanduPenduduk::class);
    }
}
