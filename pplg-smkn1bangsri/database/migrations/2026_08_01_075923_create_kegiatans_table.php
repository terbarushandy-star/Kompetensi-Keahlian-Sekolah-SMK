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
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('slug')->nullable()->unique(); // Dibuat unique agar URL tidak ganda
            $table->date('tanggal');                      // Tipe date untuk sorting akurat
            $table->text('deskripsi');
            $table->string('gambar')->nullable();         // Nullable agar fleksibel
            $table->json('galeri')->nullable();           // Menyimpan multi-foto galeri
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatans');
    }
};