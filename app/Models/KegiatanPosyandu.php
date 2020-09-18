<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KegiatanPosyandu extends Model
{
    protected $guarded = [];
    protected $appends = ['path_logo'];

    public function posyandu(){
        return $this->belongsTo(Posyandu::class);
    }

    public function getPathLogoAttribute()
    {
        return 'storage/' . $this->thumbnail;
    }

    public function delete_photo(){
        if (file_exists($this->path_logo)) {
            @unlink($this->path_logo);
        }
    }
}
