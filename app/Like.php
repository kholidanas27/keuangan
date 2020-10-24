<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\kategori;
use App\Inkubator;
use App\profil_user;
use App\Like;
use App\Berita;
use App\User;

class Like extends Model
{

    public function user()
    {
    return $this->belongsTo(User::class);
    }
    
    public function likes()
    {
    return $this->belongsTo(Like::class);
    }
    
    public function reply()
    {
    return $this->belongsTo(Berita::class);
    }


}
