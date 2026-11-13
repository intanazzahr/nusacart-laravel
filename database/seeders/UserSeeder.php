<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Akun Admin
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'admin'
        ]);

        // Akun Staff
        User::create([
            'name' => 'Staff Modul',
            'email' => 'staff@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'staff'
        ]);
    }
}