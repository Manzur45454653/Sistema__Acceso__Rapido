<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;// Necesario para generar las semillas

/**
 * Class Comunidad
 *
 * @property $id
 * @property $id_institucional
 * @property $nombre
 * @property $apellido_materno
 * @property $apellido_paterno
 * @property $genero
 * @property $id_plantel
 * @property $id_puesto
 * @property $id_oferta
 * @property $estado
 * @property $fotografia
 * @property $code_qr
 * @property $created_at
 * @property $updated_at
 *
 * @property Oferta $oferta
 * @property Plantele $plantele
 * @property Puesto $puesto
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Comunidad extends Model
{
    use HasFactory;// Necesario para generar las semillas
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_institucional', 'nombre', 'apellido_materno', 'apellido_paterno', 'genero', 'id_plantel', 'id_puesto', 'id_oferta', 'estado', 'fotografia', 'code_qr'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function oferta()
    {
        return $this->belongsTo(\App\Models\Oferta::class, 'id_oferta', 'id_oferta');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function plantele()
    {
        return $this->belongsTo(\App\Models\Plantele::class, 'id_plantel', 'id_plantel');
    }   

    public function puesto()
    {
        return $this->belongsTo(Puesto::class, 'id_puesto', 'id_puesto');
    }    
    
}
