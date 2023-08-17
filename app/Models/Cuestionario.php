<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuestionario extends Model
{
    use HasFactory;

    protected $table = 'cuestionarios';
    protected $primaryKey = 'idCuestionario';
    protected $fillable = [
        'fecha_creacion',
        'nombre_cuestionario',
        'descripcion_cuestionario',
        'estatus'
    ];
    // En el modelo Cuestionario
    public function preguntas()
    {
        return $this->hasMany(Pregunta::class, 'idCuestionario');
    }
}
