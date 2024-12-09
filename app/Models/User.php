<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'data_of_birth',
        'password',
        'role_id',  // Asegúrate de que sea role_id, no 'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Relación con el modelo Role.
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Método para verificar si el usuario tiene el rol 'Admin'.
     */
    public function isAdmin()
    {
        echo 'es admin';
        return $this->role()->where('id', 1)->exists(); // Verifica si el usuario tiene el rol 'Admin'
    }

    /**
     * Método para verificar si el usuario tiene el rol 'User'.
     */
    public function isUser()
    {
        return $this->role_id === 2; // Verifica si el usuario tiene el rol 'User'
    }
}
