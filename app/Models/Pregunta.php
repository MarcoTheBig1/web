<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    protected $table = 'preguntas';
    protected $primaryKey = 'idPregunta';
    protected $fillable = [
        'idCuestionario',
        'pregunta',
        'idTipoPregunta'
    ];

    public function tipoPregunta()
    {
        return $this->belongsTo(TipoPregunta::class, 'idTipoPregunta');
    }
    
    public function preguntas()
    {
        return $this->hasMany(Pregunta::class);
    }

  
     // Relación con el modelo Cuestionario
     public function cuestionario()
     {
         return $this->belongsTo(Cuestionario::class, 'idCuestionario');
     }
 

    // Relación con el modelo RespuestaOM
    public function respuestasOM()
    {
        return $this->hasMany(RespuestaOM::class, 'idPregunta');
    }
    
}
