<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Panggil masing-masing Seeder secara berurutan dan terpisah
        $this->call([
            GuruSeeder::class,
            KegiatanSeeder::class,
            PrestasiSeeder::class,
        ]);

        // Akun Admin Bawaan
        User::firstOrCreate(
            ['email' => 'admin@smkn1bangsri.sch.id'],
            [
                'name' => 'Admin PPLG',
                'password' => Hash::make('password'),
            ]
        );
    }
}