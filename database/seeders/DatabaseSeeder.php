<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Membuat Akun Uji Coba Member
        User::create([
            'name' => 'Member',
            'email' => 'member@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'member',
        ]);

        // 2. Membuat Akun Uji Coba Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);
    }
}