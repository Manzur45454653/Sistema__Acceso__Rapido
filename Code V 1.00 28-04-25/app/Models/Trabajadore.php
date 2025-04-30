<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Trabajadore
 *
 * @property $id
 * @property $nombre
 * @property $apellido_materno
 * @property $apellido_paterno
 * @property $genero
 * @property $id_plantel
 * @property $id_puesto
 * @property $estado
 * @property $fotografia
 * @property $code_qr
 * @property $created_at
 * @property $updated_at
 *
 * @property Plantele $plantele
 * @property Puesto $puesto
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Trabajadore extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nombre', 'apellido_materno', 'apellido_paterno', 'genero', 'id_plantel', 'id_puesto', 'estado', 'fotografia', 'code_qr'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function plantele()
    {
        return $this->belongsTo(\App\Models\Plantele::class, 'id_plantel', 'id_plantel');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function puesto()
    {
        return $this->belongsTo(\App\Models\Puesto::class, 'id_puesto', 'id_puesto');
    }
    
}
