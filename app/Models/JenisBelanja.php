<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenisBelanja extends Model
{
    use SoftDeletes;
    protected $fillable=['jenis_belanja', 'nominal_belanja', 'belanja_desa_id'];

    public function belanjadesa(){
        return $this->belongsTo(BelanjaDesa::class, 'belanja_desa_id');
    }
}
