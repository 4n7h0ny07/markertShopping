<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ventas extends Model
{
    use HasFactory;

    protected $fillable = [
       'persona_id',
       'cuenta_id',
       'tipo_plan_pagos_id',
       'price_list_id',
       'inicial',
       'saldo',
       'total',
       'iva',
       'typepayment',
       'status_at',
       'user_id',
    ];
}
