<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Guru extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nip',
        'jabatan',
        'mapel',
        'foto',
        'is_staf',
        'urutan',
    ];

    protected $casts = [
        'is_staf' => 'boolean',
        'urutan' => 'integer',
    ];

    /**
     * Otomatis sertakan foto_url saat Model di-convert ke Array / JSON
     */
    protected $appends = ['foto_url'];

    /**
     * Accessor untuk mendapatkan URL Foto secara otomatis
     */
    public function getFotoUrlAttribute(): string
    {
        if (empty($this->foto)) {
            return 'https://placehold.co/300x300/f97316/ffffff?text=Foto+Guru';
        }

        if (Str::startsWith($this->foto, ['http://', 'https://'])) {
            return $this->foto;
        }

        return asset($this->foto);
    }
}