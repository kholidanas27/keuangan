<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    protected $table = "arus_kas";
    protected $fillable = ['id', 'tenant_id', 'mentor_id', 'keterangan', 'jenis', 'jumlah','tanggal'];
    
    public function tenantuser()
    {
        return $this->belongsTo('App\TenantUser');
    }
}