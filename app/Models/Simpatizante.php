<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Simpatizante extends Model
{
    protected $fillable = [
        'nombre',
        'apellido',
        'telefono',
        'distrito_id',
    ];

    public function distrito()
    {
        return $this->belongsTo(Distrito::class);
    }
}
