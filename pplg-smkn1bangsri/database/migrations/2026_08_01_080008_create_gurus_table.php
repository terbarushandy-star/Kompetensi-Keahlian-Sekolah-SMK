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
        Schema::create('gurus', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nip')->nullable();
            $table->string('jabatan')->default('Guru PPLG');
            $table->string('mapel')->nullable();
            $table->string('foto')->nullable();             // Nullable agar tidak crash jika foto kosong
            $table->boolean('is_staf')->default(false);     // Membedakan guru dan staf
            $table->integer('urutan')->default(0);          // Mengatur urutan urutan tampilan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gurus');
    }
};