<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdukRiset extends Model
{
    protected $table = "produk_riset";
    protected $guarded = ['id'];

   	public function produk()
    {
    	return $this->belongsTo('App\Produk','produk_id', 'id');
    }
}
