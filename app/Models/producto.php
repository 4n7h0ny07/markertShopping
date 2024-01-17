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

    public function priceproduct()
    {
        return $this->hasMany(priceproduct::class, 'product_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
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
