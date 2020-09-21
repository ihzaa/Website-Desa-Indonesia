<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenisPendapatan extends Model
{
    use SoftDeletes;

    public function pendapatandesa(){
        return $this->hasMany(PendapatanDesa::class);
    }
}
