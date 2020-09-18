<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class KegiatanPosyandu extends Model
{
    protected $guarded = [];
    protected $appends = ['path_logo','date_format','date_kegiatan'];

    public function posyandu()
    {
        return $this->belongsTo(Posyandu::class);
    }

    public function getPathLogoAttribute()
    {
        return 'storage/' . $this->thumbnail;
    }

    public function delete_photo()
    {
        if (file_exists($this->path_logo)) {
            @unlink($this->path_logo);
        }
    }

    public function getDateKegiatanAttribute()
    {
        return Carbon::parse($this->tanggal_kegiatan)->translatedFormat('l, d F Y');
    }
    
    public function getDateFormatAttribute()
    {
        return Carbon::parse($this->created_at)->translatedFormat('l, d F Y') . 
        ' | ' . Carbon::parse($this->created_at)->translatedFormat('H:i') . ' WIB';
    }
}
