<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $table = 'tenant';
    protected $fillable = [
        'inkubator_id', 'title', 'subtitle', 'description', 'priority', 'foto', 'status', 'updated_at', 'created_at'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
