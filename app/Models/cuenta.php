<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class cuenta extends Model
{
    use HasFactory;

    public function tipoCuenta()
    {
        return $this->belongsTo(TipoCuenta::class, 'tipocuenta_id');
    }

    public function activos()
    {
        return $this->hasMany(Activos::class);
    }

}
