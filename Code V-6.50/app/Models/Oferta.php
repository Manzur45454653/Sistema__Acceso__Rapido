<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Oferta
 *
 * @property $id_oferta
 * @property $oferta
 *
 * @property Estudiante[] $estudiantes
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Oferta extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_oferta', 'oferta'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comunidad()
    {
        return $this->hasMany(\App\Models\Comunidad::class, 'id_oferta', 'id_oferta');
    }
    
}
