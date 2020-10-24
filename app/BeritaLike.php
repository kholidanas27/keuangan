<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BeritaLike extends Model
{
    protected $table = 'berita_like';
    protected $fillable = ['id', 'berita_id', 'user_id'];
}
