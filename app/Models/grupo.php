<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class grupo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'grupos';

    protected $fillable = [
        'names',
        'group_code',
        'description',
    ];
    public function persona()
    {
        return $this->hasMany(persona::class,);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($grupo) {
            // Obtiene el ID del usuario logueado y lo asigna a la grupo
            $grupo->user_id = auth()->id();
        });
    }
}
