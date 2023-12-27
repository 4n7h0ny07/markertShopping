<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activos extends Model
{
    use HasFactory;

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
        'vida_util',
        'observaciones',
        'user_id'
    ];

    function persona(){
        return $this->belongsTo(persona::class, 'persona_id')->withTrashed();
    }

    function cuenta(){
        return $this->belongsTo(cuenta::class, 'cuenta_id')->withTrashed();
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