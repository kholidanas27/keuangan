<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdukBisnis extends Model
{
    protected $table = "produk_bisnis";
    protected $guarded = ['id'];

   	public function produk()
    {
    	return $this->belongsTo('App\Produk','produk_id', 'id');
    }
}
