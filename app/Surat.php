<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    protected $table = 'surat';

    protected $fillable = ['id', 'title', 'dari', 'prihal', 'kepada','dokumen', 'jenis_surat', 'author_id'];


    public function users(){
        
        return $this->belongsToMany('App\User');
        // return $this->hasMany('App\User');
    }

    public function priority()
    {
        return $this->belongsTo('App\Priority');
    }

    public function disposisi(){
        
        return $this->belongsToMany('App\Disposisi','surat_disposisi');
    }

    
}

