<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Membuat Akun Admin
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        // 2. Membuat Akun User Regular
        User::create([
            'name' => 'User Regular',
            'email' => 'user@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'user',
        ]);

        // 3. Membuat Data Mahasiswa Contoh
        Mahasiswa::create([
            'nim' => '220001',
            'nama' => 'Budi Santoso',
            'prodi' => 'Informatika',
            'email' => 'budi@mhs.ac.id',
            'angkatan' => '2022',
        ]);

        Mahasiswa::create([
            'nim' => '220002',
            'nama' => 'Siti Rahma',
            'prodi' => 'Sistem Informasi',
            'email' => 'siti@mhs.ac.id',
            'angkatan' => '2022',
        ]);
    }
}