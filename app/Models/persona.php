<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class persona extends Model
{

    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];

    public function grupos()
    {
        return $this->belongsTo(Grupo::class, 'group_id');
    }

    public function activos()
    {
        return $this->hasMany(activos::class);
    }

   
}
