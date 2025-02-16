<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penya extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'members', 'user_id'];
   
    
    /**
     * Relación con el modelo User (usuario que creó la peña).
     */
    public function user()
    {
        return $this->hasMany(User::class);
    }
    public function members(){
        
        return $this->hasMany(User::class);
    }
    public function users(){
        
        return $this->belongsToMany(User::class,'user_id','penya_id','relations');
                   
    }
}
