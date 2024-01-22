<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class producto extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
       'almacen_id',
       'categoria_id',
       'marca_id',
       'image',
       'code',
       'names',
       'model',
       'price',
       'imei',
       'mac',
       'description',
       'user_id',
    ];

    public function priceproducts()
    {
        return $this->hasMany(priceproduct::class, 'products_id')->withTrashed();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categorias(){
        return $this->belongsTo(categoria::class, 'categoria_id')->withTrashed();
    }
    public function marcas(){
        return $this->belongsTo(marca::class, 'marca_id')->withTrashed();
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($productos) {
            // Obtiene el ID del usuario logueado y lo asigna a la productos
            $productos->user_id = auth()->id();
        });
    }
}
