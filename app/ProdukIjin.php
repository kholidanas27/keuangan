<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdukIjin extends Model
{
    protected $table = "produk_ijin";
    protected $guarded = ['id'];

   	public function produk()
    {
    	return $this->belongsTo('App\Produk','produk_id', 'id');
    }
}
