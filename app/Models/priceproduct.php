<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class priceproduct extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'products_id',
        'pricelists_id',
        'price_normal',
        'price_promotion',
        'increment_precing',
        'decrement_precing',
        'user_id',
        'created_at'

    ];

    public function pricelists()
    {
        return $this->belongsTo(pricelist::class);
    }

    public function productos()
    {
        return $this->belongsTo(producto::class)->withTrashed();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($priceproduct) {
            // Obtiene el ID del usuario logueado y lo asigna a la priceproduct
            $priceproduct->user_id = auth()->id();
        });
    }

}
