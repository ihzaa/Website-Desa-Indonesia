<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PendapatanDesa extends Model
{
    use SoftDeletes;
    public function jenispendapatan(){
        return $this->belongsTo(JenisPendapatan::class);
    }

    public function transpransidesa(){
        return $this->hasMany(TransparansiDanaDesa::class);
    }
}
