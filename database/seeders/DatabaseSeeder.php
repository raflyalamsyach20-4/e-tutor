<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Akun Admin
        \App\Models\User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        // Akun Kaprodi
        \App\Models\User::create([
            'name' => 'Kepala Prodi',
            'email' => 'kaprodi@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'kaprodi',
        ]);
    }
}