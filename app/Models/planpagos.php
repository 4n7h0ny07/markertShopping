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
}
