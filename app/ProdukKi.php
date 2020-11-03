<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdukKi extends Model
{
    protected $table = "produk_ki";
    protected $guarded = ['id'];

   	public function produk()
    {
    	return $this->belongsTo('App\Produk','produk_id', 'id');
    }
}
