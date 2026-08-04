<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kegiatan;
use App\Models\Prestasi;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil 6 kegiatan & prestasi terbaru berdasarkan tanggal kegiatan
        $kegiatans = Kegiatan::latest('tanggal')->take(6)->get();
        $prestasis = Prestasi::latest()->take(6)->get();

        // Ambil data guru & staf dari Database
        $gurusDB = Guru::orderBy('is_staf', 'asc')
                       ->orderBy('urutan', 'asc')
                       ->get();

        // Gunakan fallback jika DB kosong & konversi array ke object agar seragam di Blade
        $listGuru = $gurusDB->isNotEmpty() 
            ? $gurusDB 
            : collect($this->getDefaultGurus())->map(fn($item) => (object) $item);

        return view('welcome', compact('kegiatans', 'prestasis', 'listGuru'));
    }

    /**
     * Fallback data statis jika Database belum terisi
     */
    private function getDefaultGurus(): array
    {
        return [
            [
                'nama' => 'Rima Ariona Nur Awalia, S.Pd.',
                'jabatan' => 'Kepala Program PPLG',
                'mapel' => 'Pemrograman Berorientasi Objek & Basis Data',
                'foto_url' => asset('images/guru/guru1.jpg'),
                'is_staf' => false,
            ],
            [
                'nama' => 'Muhammad Abdul Latif, S.Kom',
                'jabatan' => 'Guru Produktif PPLG',
                'mapel' => 'Produktif PPLG, Mata Pelajaran Pilihan',
                'foto_url' => asset('images/guru/guru6.jpg'),
                'is_staf' => false,
            ],
            [
                'nama' => 'Eko Siswanto, S.Kom.',
                'jabatan' => 'Guru Produktif PPLG',
                'mapel' => 'Informatika, Produktif PPLG',
                'foto_url' => asset('images/guru/guru2.jpg'),
                'is_staf' => false,
            ],
            [
                'nama' => 'Dwi Agung Suhartono, S.T.',
                'jabatan' => 'Guru Produktif PPLG',
                'mapel' => 'UI/UX Design & Desain Grafis Percetakan',
                'foto_url' => asset('images/guru/guru3.jpg'),
                'is_staf' => false,
            ],
            [
                'nama' => 'Abdullah Azzam Al Haqqoni, S.Pd.',
                'jabatan' => 'Guru Produktif PPLG',
                'mapel' => 'Informatika, PKK',
                'foto_url' => asset('images/guru/guru4.jpg'),
                'is_staf' => false,
            ],
            [
                'nama' => 'Iwan Safrudin, S.Kom.',
                'jabatan' => 'Guru Produktif PPLG',
                'mapel' => 'Pemrograman',
                'foto_url' => asset('images/guru/guru5.jpg'),
                'is_staf' => false,
            ],
            [
                'nama' => 'Guizka Maulana, A.Md',
                'jabatan' => 'Staf Administrasi Jurusan',
                'mapel' => 'Administrasi & Layanan Akademik PPLG',
                'foto_url' => asset('images/guru/staf1.jpg'),
                'is_staf' => true,
            ],
        ];
    }
}