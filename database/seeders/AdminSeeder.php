<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::create([
        'name' => 'Admin Sistema',
        'email' => 'admin@ejemplo.com',
        'password' => bcrypt('password123'), // Esta será tu contraseña
        'phone' => '123456789',
        'role' => 'admin',
    ]);
    }
}
