<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
    protected $table = 'priority';
    protected $fillable = [
        'name'
    ];


    public function surat()
    {
        return $this->hasMany('App\Surat');
	}

    public function event()
    {
        return $this->hasMany(Event::class);
	}

    public function pengumuman()
    {
        return $this->hasMany('App\Pengumuman');
    }
}
