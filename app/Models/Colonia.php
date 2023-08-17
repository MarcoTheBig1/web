<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Colonia extends Model
{
    protected $fillable = ['nombre', 'distrito_id', 'user_id'];

    // Relación con el modelo Distrito
    public function distrito()
    {
        return $this->belongsTo(Distrito::class);
    }

    // Relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
