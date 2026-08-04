@extends('layouts.app')

{{-- SEO METADATA KHUSUS BERANDA --}}
@section('title', 'PPLG SMKN 1 Bangsri - Official Website')
@section('meta_title', 'PPLG SMKN 1 Bangsri - Software & Game Engineering')
@section('meta_description', 'Official Website Kompetensi Keahlian PPLG SMKN 1 Bangsri. Pusat informasi jurusan, profil, visi-misi, sarana laboratorium, dan karya unggulan siswa.')
@section('meta_image', asset('images/logo/logo-pplg.png'))

@section('content')

    {{-- 1. Hero Section --}}
    @include('components.hero')

    {{-- 2. Profil / Sejarah --}}
    @include('components.profil')

    {{-- 3. Visi & Misi --}}
    @include('components.visi-misi')

    {{-- 4. Section Guru & Staf --}}
    @include('components.guru', ['listGuru' => $listGuru ?? []])

    {{-- 5. Section Kegiatan --}}
    @include('components.kegiatan', ['kegiatans' => $kegiatans ?? []])

    {{-- 6. Section Prestasi --}}
    @include('components.prestasi', ['prestasis' => $prestasis ?? []])

    {{-- 7. Section Fasilitas --}}
    @include('components.fasilitas')

    {{-- 8. Section Mitra PKL --}}
    @include('components.mitra-pkl')

@endsection