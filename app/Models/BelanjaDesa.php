<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BelanjaDesa extends Model
{
    use SoftDeletes;
    public function jenisbelanja(){
        return $this->belongsTo(JenisBelanja::class);
    }

    public function transpransidesa(){
        return $this->hasMany(TransparansiDanaDesa::class);
    }
}
