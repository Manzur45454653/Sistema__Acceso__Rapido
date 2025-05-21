<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ingreso extends Model
{
    use HasFactory;

     protected $fillable = ['id_visitante', 'id_institucional'];

    /**
     * Relación con la tabla Comunidad
     */
    public function comunidad()
    {
        return $this->belongsTo(\App\Models\Comunidad::class, 'id_institucional', 'id_institucional');
    }

    /**
     * Relación con la tabla Visitante
     */
    public function visitante()
    {
        return $this->belongsTo(\App\Models\Visitante::class, 'id_visitante', 'id_visitante');
    }
}
