<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Tambahkan model User

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Contoh data user lain (jika diperlukan)
        // \App\Models\User::factory(10)->create();

        // Tambahkan data admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'), // Ganti 'password' dengan kata sandi yang diinginkan
            'role' => 'admin', // Pastikan tabel users memiliki kolom 'role'
        ]);

        // Jika ingin menambahkan data user biasa (opsional)
        User::create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'password' => bcrypt('password'),
            'role' => 'user', // Role untuk user biasa
        ]);

        $this->call([
            ProductSeeder::class, // Tambahkan ini
        ]);

        
    }
}
