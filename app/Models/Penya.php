<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penya extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'miembros', 'user_id'];

    /**
     * Relación con el modelo User (usuario que creó la peña).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
