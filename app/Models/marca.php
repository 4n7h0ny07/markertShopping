<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class marca extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillelable = [
        'image',
        'names',
        'code',
        'description',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function productos()
    {
        return $this->hasMany(producto::class)->withTrashed();
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($marca) {
            // Obtiene el ID del usuario logueado y lo asigna a la marca
            $marca->user_id = auth()->id();
        });
    }
}
