<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    public function home_category()
    {
        return $this->hasOne(HomeCategory::class, 'id');
    }
}
