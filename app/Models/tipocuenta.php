<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipocuenta extends Model
{
    use HasFactory;

    public function cuenta()
    {
        return $this->hasMany(Cuenta::class);
    }
}
