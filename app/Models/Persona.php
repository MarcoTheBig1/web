<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'telefono',
        'direccion',
        'colonia_id',
        'estado_id',
    ];

    public function colonia()
    {
        return $this->belongsTo(Colonia::class);
    }

    public function estadoSimpatia()
    {
        return $this->belongsTo(EstadosDeSimpatia::class, 'estado_id');
    }
}

