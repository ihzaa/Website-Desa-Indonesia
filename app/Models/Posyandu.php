<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

// use Illuminate\Support\Facades\Storage;

class Posyandu extends Model
{
    protected $guarded = [];
    protected $appends = ['jumlah_penduduk', 'path_logo', 'jumlah_kegiatan'];

    public function penduduks()
    {
        return $this->belongsToMany(Penduduk::class,  PosyanduPenduduk::class);
    }

    public function kegiatans()
    {
        return $this->hasMany(KegiatanPosyandu::class);
    }

    public function getJumlahPendudukAttribute()
    {
        return $this->penduduks()->count();
    }

    public function getJumlahKegiatanAttribute()
    {
        return $this->kegiatans()->count();
    }

    public function getPathLogoAttribute()
    {
        return Storage::url($this->logo_posyandu);
    }

    public function delete_photo(){
        if (file_exists($this->path_logo)) {
            @unlink($this->path_logo);
        }
    }

    public function delete()
    {
        $this->delete_photo();
        parent::delete();
    }
}
