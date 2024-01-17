<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class pricelist extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'namelists',
        'description',
        'user_id',
    ];

    public function priceproduct()
    {
        return $this->hasMany(priceproduct::class, 'tipo_lista_precio_id');
    }
}
