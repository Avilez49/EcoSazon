<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plato extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Un plato pertenece a una cocina
    public function cocina()
    {
        return $this->belongsTo(Cocina::class);
    }
}