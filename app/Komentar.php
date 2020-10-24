<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Berita;
use App\User;

class Komentar extends Model
{
    protected $table ='berita_komentar';
    protected $fillable = [
        'name',
        'user_id',
        'komentar',
        'berita_id'
    ];


    public function post()
    {
        return $this->belongsTo(Berita::class);
    }
    public function user()
    {
    return $this->belongsTo(User::class);
    }

}
