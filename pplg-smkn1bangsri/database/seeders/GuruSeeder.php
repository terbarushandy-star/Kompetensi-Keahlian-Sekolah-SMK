<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Matikan Foreign Key check agar truncate tidak error jika ada relasi
        Schema::disableForeignKeyConstraints();
        DB::table('gurus')->truncate();
        Schema::enableForeignKeyConstraints();

        DB::table('gurus')->insert([
            [
                'nama' => 'Rima Ariona Nur Awalia, S.Pd.',
                'jabatan' => 'Kepala Program PPLG',
                'mapel' => 'Pemrograman Berorientasi Objek & Basis Data',
                'foto' => 'images/guru/guru1.jpg',
                'is_staf' => false,
                'urutan' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Muhammad Abdul Latif, S.Kom',
                'jabatan' => 'Guru Produktif PPLG',
                'mapel' => 'Produktif PPLG, Mata Pelajaran Pilihan',
                'foto' => 'images/guru/guru6.jpg',
                'is_staf' => false,
                'urutan' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Eko Siswanto, S.Kom.',
                'jabatan' => 'Guru Produktif PPLG',
                'mapel' => 'Informatika, Produktif PPLG',
                'foto' => 'images/guru/guru2.jpg',
                'is_staf' => false,
                'urutan' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Dwi Agung Suhartono, S.T.',
                'jabatan' => 'Guru Produktif PPLG',
                'mapel' => 'UI/UX Design & Desain Grafis Percetakan',
                'foto' => 'images/guru/guru3.jpg',
                'is_staf' => false,
                'urutan' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Abdullah Azzam Al Haqqoni, S.Pd.',
                'jabatan' => 'Guru Produktif PPLG',
                'mapel' => 'Informatika, PKK',
                'foto' => 'images/guru/guru4.jpg',
                'is_staf' => false,
                'urutan' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Iwan Safrudin, S.Kom.',
                'jabatan' => 'Guru Produktif PPLG',
                'mapel' => 'Pemrograman',
                'foto' => 'images/guru/guru5.jpg',
                'is_staf' => false,
                'urutan' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Guizka Maulana, A.Md',
                'jabatan' => 'Staf Administrasi Jurusan',
                'mapel' => 'Administrasi & Layanan Akademik PPLG',
                'foto' => 'images/guru/staf1.jpg',
                'is_staf' => true,
                'urutan' => 1, // Urutan tersendiri untuk kelompok staf
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}