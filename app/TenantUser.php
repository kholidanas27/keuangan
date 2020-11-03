<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TenantUser extends Model
{
    Protected $table = 'tenant_user';


    public function user(){
        
        return $this->belongsTo('App\User');
    }
    public function tenants(){

        return $this->belongsTo('App\Tenant');
    }

    public function profilUser()
    {
    	return $this->belongsTo('App\ProfilUser','user_id','user_id');
    }

}
