<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Home extends Model
{
    use SoftDeletes;
    protected $fillable = ['title', 'content', 'image', 'home_category_id'];

    public function home_category()
    {
        return $this->belongsTo(HomeCategory::class, 'home_category_id');
    }
}
