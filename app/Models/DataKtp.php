<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataKtp extends Model
{
    protected $guarded = [];
    public function penduduk(){
        return $this->hasOne(Penduduk::class, 'id_data_ktp');
    }

}
