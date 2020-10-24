<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Berita;

class kategori extends Model
{
    protected $fillable = ['category'];
    protected $table = 'berita_category';

    public function berita(){ 
    	return $this->belongsTo('Berita'); 
	}
}
