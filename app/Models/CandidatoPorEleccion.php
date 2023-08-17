<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Candidato;
use App\Models\Eleccion;
 
class CandidatoPorEleccion extends Model
{
    use HasFactory;

    protected $table = 'candidatos_por_eleccion';
    protected $primaryKey = 'id';
    protected $fillable = [
        'candidato_id',
        'eleccion_id',
        'posicion'
    ];

    public function candidato()
    {
        return $this->belongsTo(Candidato::class, 'candidato_id');
    }

    public function eleccion()
    {
        return $this->belongsTo(Eleccion::class, 'eleccion_id');
    }
}
