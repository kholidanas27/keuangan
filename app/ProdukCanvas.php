<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdukCanvas extends Model
{
    protected $table = "produk_canvas";
    protected $guarded = ['id'];

   	public function produk()
    {
    	return $this->belongsTo('App\Produk','produk_id', 'id');
    }
}
