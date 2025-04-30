<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Puesto
 *
 * @property $id_puesto
 * @property $puesto
 * @property $created_at
 * @property $updated_at
 *
 * @property Trabajadore[] $trabajadores
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Puesto extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_puesto', 'puesto'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function trabajadores()
    {
        return $this->hasMany(\App\Models\Trabajadore::class, 'id_puesto', 'id_puesto');
    }
    
}
