<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 *
 * @property $id
 * @property $nombre
 * @property $cantidad
 * @property $almacen_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Almacene $almacene
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Producto extends Model
{
    

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'cantidad', 'almacen_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function almacene()
    {
        return $this->belongsTo(\App\Models\Almacene::class, 'almacen_id', 'id');
    }
    

}
