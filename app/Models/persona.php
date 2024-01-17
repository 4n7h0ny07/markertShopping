<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class persona extends Model
{

    use HasFactory, SoftDeletes;
    protected $table = 'personas';
    protected $fillable = [
        'group_id',
        'names',
        'dni',
        'extencion',
        'expedito',
        'telefono',
        'direccion',
        'photo',
        'mailes',
        'created_at',
    ];

    protected $dates = ['deleted_at'];

    public function grupos()
    {
        return $this->belongsTo(Grupo::class, 'group_id');
    }

    public function activos()
    {
        return $this->hasMany(activos::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($persona) {
            // Obtiene el ID del usuario logueado y lo asigna a la persona
            $persona->user_id = auth()->id();
        });
    }
   
}
