<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipocuenta extends Model
{
    use HasFactory;

    protected $table = 'tipocuentas';

    public function cuenta()
    {
        return $this->hasMany(cuenta::class);
    }
}
