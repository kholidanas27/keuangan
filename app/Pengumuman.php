<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    protected $table = "pengumuman";
    protected $fillable = ['title', 'slug', 'foto', 'priority_id', 'pengumuman', 'author_id', 'inkubator_id', 'publish',];

    public function priority()
    {
        return $this->belongsTo('App\Priority');
    }

    public function users()
    {
        return $this->belongsTo('App\Users');
    }
}
