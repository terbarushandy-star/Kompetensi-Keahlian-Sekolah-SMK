<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;

class KegiatanController extends Controller
{
    /**
     * Menampilkan halaman arsip lengkap kegiatan (/kegiatan)
     */
    public function index()
    {
        // Ambil semua data kegiatan diurutkan dari tanggal kegiatan terbaru
        $kegiatans = Kegiatan::latest('tanggal')->get();
        $allKegiatans = $kegiatans;

        return view('kegiatan.index', compact('kegiatans', 'allKegiatans'));
    }

    /**
     * Menampilkan halaman detail kegiatan spesifik (/kegiatan/{kegiatan:slug})
     */
    public function show(Kegiatan $kegiatan)
    {
        // Ambil 5 kegiatan lain untuk rekomendasi "Baca Juga"
        $rekomendasi = Kegiatan::where('id', '!=', $kegiatan->id)
                                ->latest('tanggal')
                                ->take(5)
                                ->get();

        return view('kegiatan.show', compact('kegiatan', 'rekomendasi'));
    }

    /**
     * Helper static jika ada controller lain yang membutuhkan list kegiatan
     */
    public static function getListKegiatan()
    {
        return Kegiatan::latest('tanggal')->get();
    }
}