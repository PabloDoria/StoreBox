<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Almacene
 *
 * @property $id
 * @property $nombre
 * @property $direccion
 * @property $telefono
 * @property $capacidad
 * @property $created_at
 * @property $updated_at
 *
 * @property Producto[] $productos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Almacene extends Model
{
    

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'direccion', 'telefono', 'capacidad'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productos()
    {
        return $this->hasMany(\App\Models\Producto::class, 'id', 'almacen_id');
    }
    

}
