<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Visitante
 *
 * @property $id
 * @property $nombre
 * @property $apellido_materno
 * @property $apellido_paterno
 * @property $motivo
 * @property $genero
 * @property $menor
 * @property $identificacion
 * @property $code_qr
 * @property $reactivacion
 * @property $fechas_impresion
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Visitante extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nombre', 'apellido_materno', 'apellido_paterno', 'motivo', 'genero', 'menor', 'identificacion', 'code_qr', 'reactivacion', 'fechas_impresion'];


}
