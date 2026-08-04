<?php

namespace Database\Seeders;

use App\Models\Prestasi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class PrestasiSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Prestasi::truncate();
        Schema::enableForeignKeyConstraints();

        $prestasis = [
            [
                'judul' => 'Juara 1 LKS Web Technologies Tingkat Kabupaten',
                'kategori' => 'siswa',
                'peraih' => 'Ahmad Rizky',
                'kelas' => 'XII PPLG 1',
                'pembimbing' => 'Muhammad Abdul Latif, S.Kom',
                'tingkat' => 'Kabupaten',
                'tahun' => '2025',
                'tanggal_lengkap' => '2025-05-12',
                'deskripsi' => 'Keberhasilan mempertahankan gelar juara 1 Lomba Kompetensi Siswa bidang Web Technologies.',
                'gambar' => 'images/prestasi/prestasi-1.jpg'
            ],
            [
                'judul' => 'Juara 2 Hackathon Software Development Nasional',
                'kategori' => 'siswa',
                'peraih' => 'Siti Nurhaliza',
                'kelas' => 'XII PPLG 2',
                'pembimbing' => 'Rima Ariona Nur Awalia, S.Pd.',
                'tingkat' => 'Nasional',
                'tahun' => '2025',
                'tanggal_lengkap' => '2025-08-20',
                'deskripsi' => 'Inovasi aplikasi pengelolaan sampah digital berbasis IoT dan Mobile App.',
                'gambar' => 'images/prestasi/prestasi-2.jpg'
            ],
            [
                'judul' => 'Juara 1 UI/UX Design Competition SMK Se-Jateng',
                'kategori' => 'siswa',
                'peraih' => 'Dewi Anggraini',
                'kelas' => 'XI PPLG 1',
                'pembimbing' => 'Dwi Agung Suhartono, S.T.',
                'tingkat' => 'Provinsi',
                'tahun' => '2025',
                'tanggal_lengkap' => '2025-10-05',
                'deskripsi' => 'Perancangan antarmuka aplikasi edukasi ramah anak dengan metode User-Centered Design.',
                'gambar' => 'images/prestasi/prestasi-3.jpg'
            ],
            [
                'judul' => 'Juara 3 Mobile App Development Competition',
                'kategori' => 'siswa',
                'peraih' => 'Fajar Pratama',
                'kelas' => 'XII PPLG 1',
                'pembimbing' => 'Eko Siswanto, S.Kom.',
                'tingkat' => 'Provinsi',
                'tahun' => '2025',
                'tanggal_lengkap' => '2025-11-15',
                'deskripsi' => 'Pengembangan aplikasi mobile sistem informasi perpustakaan sekolah.',
                'gambar' => 'images/prestasi/prestasi-1.jpg'
            ],
            [
                'judul' => 'Medali Emas Olympiad Computer Science',
                'kategori' => 'siswa',
                'peraih' => 'Bagas Rahardian',
                'kelas' => 'XI PPLG 2',
                'pembimbing' => 'Abdullah Azzam Al Haqqoni, S.Pd.',
                'tingkat' => 'Nasional',
                'tahun' => '2026',
                'tanggal_lengkap' => '2026-01-10',
                'deskripsi' => 'Kompetisi logika pemrograman dan algoritma struktur data tingkat nasional.',
                'gambar' => 'images/prestasi/prestasi-2.jpg'
            ],
            [
                'judul' => 'Juara Harapan 1 Game Development Festival',
                'kategori' => 'siswa',
                'peraih' => 'Tim Game Dev PPLG',
                'kelas' => 'XII PPLG 1 & 2',
                'pembimbing' => 'Iwan Safrudin, S.Kom.',
                'tingkat' => 'Nasional',
                'tahun' => '2026',
                'tanggal_lengkap' => '2026-02-25',
                'deskripsi' => 'Pengembangan game edukasi sejarah lokal berbasis 2D Pixel Art.',
                'gambar' => 'images/prestasi/prestasi-3.jpg'
            ],
        ];

        foreach ($prestasis as $prestasi) {
            Prestasi::create($prestasi);
        }
    }
}