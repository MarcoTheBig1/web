<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OpcionRespuesta extends Model
{
    protected $table = 'opcion_respuestas';

    protected $fillable = [
        'pregunta_id',
        'contenido',
    ];

    public function pregunta()
    {
        return $this->belongsTo(Pregunta::class, 'pregunta_id');
    }
}
           