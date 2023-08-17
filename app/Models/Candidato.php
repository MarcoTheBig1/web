<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    protected $table = 'candidatos';

    protected $fillable = [
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'email',
        'telefono',
        'partido_politico',
        'foto',
        'biografia',
        'estado',
        'eleccion_id',
        'edad',
        'posicion'
    ];

    public function eleccion()
    {
        return $this->belongsTo(Eleccion::class);
    }
}
