<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('prestasis', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->enum('kategori', ['siswa', 'guru'])->default('siswa');
            $table->string('peraih')->nullable();
            $table->string('kelas')->nullable();
            $table->string('pembimbing')->nullable();
            $table->string('tingkat')->nullable();          // Misal: Kabupaten, Provinsi, Nasional
            $table->string('tahun')->nullable();
            $table->string('tanggal_lengkap')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('gambar')->nullable();           // Nullable agar tidak crash jika foto kosong
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestasis');
    }
};