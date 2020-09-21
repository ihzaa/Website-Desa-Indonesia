<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SisaPendapatanDesa extends Model
{
    use SoftDeletes;

    public function transpransidesa(){
        return $this->hasMany(TransparansiDanaDesa::class);
    }
}
