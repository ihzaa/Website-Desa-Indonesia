<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenisPendapatan extends Model
{
    use SoftDeletes;
    protected $fillable=['jenis_pendapatan', 'nominal_pendapatan', 'pendapatan_desa_id'];
    public function pendapatandesa(){
        return $this->belongsTo(PendapatanDesa::class, 'pendapatan_desa_id');
    }
}
