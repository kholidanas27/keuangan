<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LabaRugi extends Model
{
    protected $table = "laba_rugi";
    protected $fillable = ['id', 'tenant_id', 'keterangan', 'jenis', 'jumlah','tanggal'];
    
    public function tenantuser()
    {
        return $this->belongsTo('App\TenantUser');
    }
}