<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        $this->call([
            AdminSeeder::class,
        ]);

        // usuario de laravel
        User::factory()->create([
            'name' => 'Usuario Estándar',
            'email' => 'user@ejemplo.com',
            'role' => 'user', 
        ]);
    }
}