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
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Plantele extends Model
{
    
    protected $perPage = 20;
    protected $primaryKey = 'id_plantel';// Así Laravel ahora sabrá que debe buscar por id_plantel y no por id.

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_plantel', 'plantel', 'direccion'];
    
}
