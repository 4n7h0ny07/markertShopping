<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class categoria extends Model
{
    use HasFactory, SoftDeletes;

    protected $filellable = [
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

        static::creating(function ($categoria) {
            // Obtiene el ID del usuario logueado y lo asigna a la categoria
            $categoria->user_id = auth()->id();
        });
    }
}
