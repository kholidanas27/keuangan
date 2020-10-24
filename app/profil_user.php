<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Berita;

class profil_user extends Model
{
    protected $table = 'profil_user';
    protected $primaryKey = 'id';

    public function berita()
    {
    	return $this->belongTo('App\Berita','author_Id','id');
    }
}
