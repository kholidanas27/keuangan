<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdukTeam extends Model
{
	protected $table = 'produk_team';
	protected $guarded = ['id'];

    public function produk()
    {
    	return $this->belongsTo('App\Produk');
    }

    public function profil_user()
    {
    	return $this->belongsTo('App\ProfilUser','user_id','user_id');
    }
}
