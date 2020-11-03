<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
    protected $guarded = [];
    public $timestamps = false;

    public function tenant()
    {
    	return $this->belongsTo('App\Tenant','tenant_id','id');
    }

    public function priority()
    {
    	return $this->belongsTo('App\Priority');
    }

    public function produk_image()
    {
    	return $this->belongsTo('App\ProdukImage','id','produk_id');
    }

    public function produk_team()
    {
        return $this->belongTo('App\ProdukTeam','id','produk_id');
    }
}
