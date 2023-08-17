<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RespuestaOM extends Model
{
    use HasFactory;

    protected $table = 'respuestas_om';
    protected $primaryKey = 'idOM';
    
    protected $fillable = ['idPregunta', 'Respuesta'];

    public function pregunta()
    {
        return $this->belongsTo(Pregunta::class, 'idPregunta');
    }
}
