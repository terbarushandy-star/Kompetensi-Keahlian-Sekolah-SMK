<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use DateTimeInterface; // <-- 1. Import DateTimeInterface

class Kegiatan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'galeri' => 'array',
        'tanggal' => 'date',
    ];

    /**
     * Otomatis menyertakan attribute virtual ini saat di-convert ke Array/JSON (@js)
     */
    protected $appends = ['gambar_url', 'tanggal_formatted'];

    /**
     * 2. TAMBAHKAN METHOD INI: Overwrite format tanggal bawaan saat di-serialize ke JSON / @js
     */
    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('d/m/Y');
    }

    /**
     * Accessor URL Gambar Utama
     */
    public function getGambarUrlAttribute(): string
    {
        if (empty($this->gambar)) {
            return 'https://placehold.co/600x400/f97316/ffffff?text=Kegiatan+PPLG';
        }

        if (Str::startsWith($this->gambar, ['http://', 'https://'])) {
            return $this->gambar;
        }

        return asset($this->gambar);
    }

    /**
     * Accessor Format Tanggal Indonesia (DD/MM/YYYY)
     */
    public function getTanggalFormattedAttribute(): string
    {
        return $this->tanggal ? $this->tanggal->format('d/m/Y') : '-';
    }
}