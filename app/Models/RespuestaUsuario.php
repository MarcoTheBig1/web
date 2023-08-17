<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RespuestaUsuario extends Model
{
    use HasFactory;

    protected $table = 'respuestas_usuario';
    protected $primaryKey = 'idRU';
    public $timestamps = true;

    protected $fillable = [
        'idCU',
        'idPregunta',
        'Respuesta',
    ];

    public function cuestionarioUsuario()
    {
        return $this->belongsTo(CuestionarioUsuario::class, 'idCU');
    }

    public function pregunta()
    {
        return $this->belongsTo(Pregunta::class, 'idPregunta');
    }
}
