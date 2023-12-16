<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Requerimiento extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'persona_id',
        'number',
        'monto',
        'adelanto',
        'saldo',
        'descriptions',
        'tipo_requerimiento',
        'documento',
        'observaciones',
        'user_id'
    ];

    function persona(){
        return $this->belongsTo(persona::class, 'persona_id')->withTrashed();
    }

    function empleado(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
