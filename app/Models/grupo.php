<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class grupo extends Model
{
    use HasFactory, SoftDeletes;

    public function persona()
    {
        return $this->hasMany(persona::class,);
    }
}
