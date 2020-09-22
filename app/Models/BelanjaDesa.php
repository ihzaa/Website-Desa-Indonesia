<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BelanjaDesa extends Model
{
    use SoftDeletes;
    protected $fillable=['total_belanja', 'jenis_belanja_id'];

    public function jenisbelanja(){
        return $this->hasMany(JenisBelanja::class);
    }

    public function transparansidesa(){
        return $this->hasMany(TransparansiDanaDesa::class);
    }
}
