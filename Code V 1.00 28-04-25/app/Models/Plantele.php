<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Plantele
 *
 * @property $id_plantel
 * @property $plantel
 * @property $direccion
 * @property $created_at
 * @property $updated_at
 *
 * @property Estudiante[] $estudiantes
 * @property Trabajadore[] $trabajadores
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Plantele extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_plantel', 'plantel', 'direccion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function estudiantes()
    {
        return $this->hasMany(\App\Models\Estudiante::class, 'id_plantel', 'id_plantel');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function trabajadores()
    {
        return $this->hasMany(\App\Models\Trabajadore::class, 'id_plantel', 'id_plantel');
    }
    
}
