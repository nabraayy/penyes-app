<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    // Especificamos la tabla y las columnas que se pueden asignar de forma masiva
    protected $fillable = ['x', 'y', 'penya_id'];

    // Relación con el modelo Penya
    public function penya()
    {
        return $this->belongsTo(Penya::class);
    }
}
