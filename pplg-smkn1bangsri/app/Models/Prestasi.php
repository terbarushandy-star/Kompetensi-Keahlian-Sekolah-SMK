<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use DateTimeInterface;

class Prestasi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Cast kolom tanggal ke tipe date
     */
    protected $casts = [
        'tanggal' => 'date',
    ];

    /**
     * Otomatis sertakan atribut virtual ini saat Model di-convert ke Array / JSON (@js)
     */
    protected $appends = ['gambar_url', 'tanggal_formatted'];

    /**
     * Format tanggal otomatis saat di-serialize ke JSON / @js
     */
    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('d/m/Y');
    }

    /**
     * Accessor URL Gambar Prestasi
     */
    public function getGambarUrlAttribute(): string
    {
        if (empty($this->gambar)) {
            return 'https://placehold.co/600x400/f97316/ffffff?text=Prestasi+PPLG';
        }

        if (Str::startsWith($this->gambar, ['http://', 'https://'])) {
            return $this->gambar;
        }

        return asset($this->gambar);
    }

    /**
     * Accessor Format Tanggal (DD/MM/YYYY)
     */
    public function getTanggalFormattedAttribute(): string
    {
        return $this->tanggal ? $this->tanggal->format('d/m/Y') : '-';
    }
}