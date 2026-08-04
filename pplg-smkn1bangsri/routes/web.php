<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\PrestasiController;

/*
|--------------------------------------------------------------------------
| ROUTE PUBLIK WEBSITE PPLG SMKN 1 BANGSRI
|--------------------------------------------------------------------------
| Seluruh route di bawah ini bersifat read-only untuk pengunjung umum.
*/

// 1. Halaman Utama (Beranda)
Route::get('/', [HomeController::class, 'index'])->name('home');

// 2. Halaman Kegiatan Jurusan
Route::get('/kegiatan', [KegiatanController::class, 'index'])->name('kegiatan.index');
Route::get('/kegiatan/{kegiatan:slug}', [KegiatanController::class, 'show'])->name('kegiatan.show');

// 3. Halaman Prestasi Jurusan
Route::get('/prestasi', [PrestasiController::class, 'index'])->name('prestasi.index');
Route::get('/prestasi/{prestasi}', [PrestasiController::class, 'show'])->name('prestasi.show');