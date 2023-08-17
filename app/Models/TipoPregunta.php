<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPregunta extends Model
{
    use HasFactory;

    protected $table = 'tipos_preguntas';
    protected $primaryKey = 'idTipoPregunta';
    protected $fillable = ['nombre'];

    // Relación con la tabla de preguntas
    public function preguntas()
    {
        return $this->hasMany(Pregunta::class, 'idTipoPregunta');
    }
}
