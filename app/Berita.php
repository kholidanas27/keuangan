<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\kategori;
use App\Inkubator;
use App\profil_user;
use App\Komentar;

class Berita extends Model
{
    protected $table = 'berita';
    protected $fillable = ['tittle', 'slug', 'berita', 'berita_category_id', 'publish', 'author_id', 'inkubator_id', 'foto', 'views'];

    public function beritaCategory()
	{
	    return $this->belongsTo(kategori::class);
	}

	public function inkubator()
	{
		return $this->belongsTo(Inkubator::class);
	}

	public function profil_user()
	{
		return $this->belongsTo('App\profil_user','author_id','id');
	}
	
	public function comments()
    {
        return $this->hasMany(Komentar::class);
    }
	
    public function user()
    {
    return $this->belongsTo(User::class);
    }
}
