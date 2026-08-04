<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;

class PrestasiController extends Controller
{
    /**
     * Menampilkan halaman arsip lengkap prestasi (/prestasi)
     */
    public function index()
    {
        $prestasis = Prestasi::latest()->get();
        $allPrestasi = $prestasis;

        return view('prestasi.index', compact('prestasis', 'allPrestasi'));
    }

    /**
     * Menampilkan halaman detail prestasi spesifik (/prestasi/{prestasi})
     */
    public function show(Prestasi $prestasi)
    {
        return view('prestasi.show', compact('prestasi'));
    }

    /**
     * Helper static jika ada controller lain yang membutuhkan list prestasi
     */
    public static function getListPrestasi()
    {
        return Prestasi::latest()->get();
    }
}