<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QnA extends Model
{
    use SoftDeletes;

    protected $fillable = ['judul', 'jawaban'];

    protected $table = 'qna';
}
