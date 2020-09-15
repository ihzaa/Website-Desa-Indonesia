<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Berita extends Model
{
    use SoftDeletes;
    protected $table='berita';
    protected $fillable=['judul_berita', 'thumbnail_berita', 'konten_berita'];
}
