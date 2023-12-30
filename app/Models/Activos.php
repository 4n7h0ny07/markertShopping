<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activos extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'activos';

    protected $fillable = [
        'persona_id',
        'cuenta_id',
        'number',
        'code_number',
        'name',
        'marca',
        'modelo',
        'serialNumber',
        'descriptions',
        'costo',
        'valor_residual',
        'vida_util',
        'status_at',
        'observaciones',
        'user_id'
    ];

    function persona(){
        return $this->belongsTo(persona::class);
    }

    function cuenta(){
        return $this->belongsTo(cuenta::class);
    }

    function empleado(){
        return $this->belongsTo(User::class, 'user_id');
    }
}


// 'persona_id',
// 'cuenta_id',
// 'number',
// 'code_number',
// 'name',
// 'marca',
// 'modelo',
// 'serialNumber',
// 'descriptions',
// 'costo',
// 'vida_util',
// 'observaciones'