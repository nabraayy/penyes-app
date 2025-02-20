<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'id' => 1,
            'name' => 'Admin',
            'email' => 'a@a',
            'data_of_birth' => null,
            'email_verified_at'=> null,
            'password' =>'a@a', // Encriptar contraseña
            'remember_token' => null,
            
        ]);

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
            
        // ]);
    }
}
