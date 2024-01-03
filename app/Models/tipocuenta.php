<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tipocuenta extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tipocuentas';

    public function cuenta()
    {
        return $this->hasMany(cuenta::class);
    }
}
