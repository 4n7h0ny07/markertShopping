<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class planpagos extends Model
{
    use HasFactory;

    protected $table  = 'tipo_plan_pagos';

    protected $fillable = [
       'descripcion',
       'nro_cuotas',
       'primer_vencimiento',
       'dias_entre_cuotas',
       'observaciones',
       'status_ativo',
       'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($planpagos) {
            // Obtiene el ID del usuario logueado y lo asigna a la planpagos
            $planpagos->user_id = auth()->id();
        });
    }
}
