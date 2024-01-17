<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class cuenta extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'cuentas';

    public function tipoCuenta()
    {
        return $this->belongsTo(tipocuenta::class);
    }

    public function activos()
    {
        return $this->hasMany(Activos::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
