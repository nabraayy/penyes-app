<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relation extends Model
{
    use HasFactory;
    protected $table='relations';
    protected $fillable = ['name','user_id', 'penya_id', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function penya()
    {
        return $this->belongsTo(Penya::class);
    }
}
