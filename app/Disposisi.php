<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disposisi extends Model
{
    Protected $table = 'surat_disposisi';


    public function user(){
        
        return $this->belongsTo('App\User');
    }
    public function surat(){

        return $this->belongsTo('App\Surat');
    }
}
