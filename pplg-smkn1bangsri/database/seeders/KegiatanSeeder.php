<?php

namespace Database\Seeders;

use App\Models\Kegiatan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class KegiatanSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Kegiatan::truncate();
        Schema::enableForeignKeyConstraints();

        $kegiatans = [
            [
                'judul' => 'Workshop Pengembangan Game dengan Unity Engine',
                'tanggal' => '2025-10-15',
                'deskripsi' => 'Siswa PPLG SMKN 1 Bangsri mengikuti pelatihan komprehensif pembuatan game 2D & 3D bersama praktisi industri.',
                'gambar' => 'images/kegiatan/kegiatan-1.jpg',
                'galeri' => [
                    'images/kegiatan/kegiatan-1.jpg',
                    'images/kegiatan/kegiatan-2.jpg'
                ]
            ],
            [
                'judul' => 'Kunjungan Industri ke Gameloft Indonesia',
                'tanggal' => '2025-11-20',
                'deskripsi' => 'Pengenalan lingkungan kerja industri pengembangan perangkat lunak dan studio game internasional.',
                'gambar' => 'images/kegiatan/kegiatan-2.jpg',
                'galeri' => []
            ],
            [
                'judul' => 'Guru Tamu: Cybersecurity & Modern Web Architecture',
                'tanggal' => '2025-12-05',
                'deskripsi' => 'Sesi berbagi pengalaman dari Expert Developer mengenai keamanan web dan praktik arsitektur cloud.',
                'gambar' => 'images/kegiatan/kegiatan-3.jpg',
                'galeri' => []
            ],
            [
                'judul' => 'PPLG Tech Expo & Gelar Karya Siswa 2026',
                'tanggal' => '2026-01-18',
                'deskripsi' => 'Pameran hasil karya aplikasi web, mobile, dan game buatan siswa-siswi jurusan PPLG SMKN 1 Bangsri.',
                'gambar' => 'images/kegiatan/kegiatan-1.jpg',
                'galeri' => []
            ],
            [
                'judul' => 'Bootcamp Flutter Mobile App Development',
                'tanggal' => '2026-02-10',
                'deskripsi' => 'Pelatihan intensif membangun aplikasi cross-platform Android dan iOS untuk tingkat menengah.',
                'gambar' => 'images/kegiatan/kegiatan-2.jpg',
                'galeri' => []
            ],
            [
                'judul' => 'Sertifikasi Kompetensi BNSP Bidang Pemrograman',
                'tanggal' => '2026-03-01',
                'deskripsi' => 'Uji kompetensi keahlian bersertifikat nasional untuk siswa kelas XII PPLG.',
                'gambar' => 'images/kegiatan/kegiatan-3.jpg',
                'galeri' => []
            ],
        ];

        foreach ($kegiatans as $kegiatan) {
            $kegiatan['slug'] = Str::slug($kegiatan['judul']);
            Kegiatan::create($kegiatan);
        }
    }
}