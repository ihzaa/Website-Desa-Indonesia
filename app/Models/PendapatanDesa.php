<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PendapatanDesa extends Model
{
    use SoftDeletes;
    protected $fillable=['total_pendapatan', 'jenis_pendapatan_id'];
    public function jenispendapatan(){
        return $this->hasMany(JenisPendapatan::class);
    }

    public function transparansidesa(){
        return $this->hasMany(TransparansiDanaDesa::class);
    }
}
