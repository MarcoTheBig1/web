<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $table = 'sectores'; 

    protected $fillable = ['nombre', 'lider_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function hasRole($roleId)
    {
        return $this->roles()->where('id', $roleId)->exists();
    }
}


