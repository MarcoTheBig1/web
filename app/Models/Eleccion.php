<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Eleccion extends Model
{
    protected $table = 'elecciones';

    protected $fillable = [
        'nombre',
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
        'estado',
        'posicion'
    ];

    public function candidatos()
    {
        return $this->hasMany(Candidato::class);
    }
}
