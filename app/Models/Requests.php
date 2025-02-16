<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    use HasFactory;

    protected $fillable = ['penya_id', 'name','user_id', 'description', 'status'];

    // Relaciones (opcional)
    public function penya()
    {
        return $this->belongsTo(Penya::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
