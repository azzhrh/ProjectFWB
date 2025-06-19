<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'Petugas User',
            'email' => 'petugas@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'petugas'
        ]);
          User::create([
            'name' => 'customer User',
            'email' => 'customer@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'customer'
        ]);
    }
}
