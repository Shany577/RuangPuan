<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@ruangpuan.com'],
            [
                'nama'        => 'Admin RuangPuan',
                'kata_sandi'  => Hash::make('password'),
                'peran'       => 'admin',
                'status_akun' => 'aktif',
                'dibuat_pada' => now(),
            ]
        );

        User::updateOrCreate(
            ['email' => 'pengguna@ruangpuan.com'],
            [
                'nama'        => 'Pengguna RuangPuan',
                'kata_sandi'  => Hash::make('pengguna123'),
                'peran'       => 'pengguna',
                'status_akun' => 'aktif',
                'dibuat_pada' => now(),
            ]
        );
    }
}