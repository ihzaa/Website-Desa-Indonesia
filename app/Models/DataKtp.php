<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class DataKtp extends Authenticatable
{
    protected $guarded = [];
    public $table = "data_ktps";
    public function penduduk()
    {
        return $this->hasOne(Penduduk::class, 'id_data_ktp');
    }
}
