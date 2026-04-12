<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cocina extends Model
{
    use HasFactory;

    // Permitir asignación masiva
    protected $guarded = [];

    // Una cocina tiene muchos platos
    public function platos()
    {
        return $this->hasMany(Plato::class);
    }
    //Hola estos son cambios de prueba
}