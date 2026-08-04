@extends('layouts.app')

@section('title', 'PPLG SMKN 1 Bangsri - Keahlian Software & Game')

@section('content')

    {{-- 1. Hero Section (#hero) --}}
    <x-hero />

    {{-- 2. Profil & Asal-Usul (#profil) --}}
    <x-profil />

    {{-- 3. Visi & Misi (#visi-misi) --}}
    <x-visi-misi />

    {{-- 4. Fasilitas (#fasilitas) --}}
    <x-fasilitas />

    {{-- 5. Tim Guru (#guru) --}}
    <x-guru :list-guru="$listGuru ?? []" />

    {{-- 6. Prestasi (#prestasi) --}}
    <x-prestasi :list-prestasi="$listPrestasi ?? []" />

    {{-- 7. Kegiatan (#kegiatan) --}}
    <x-kegiatan :list-kegiatan="$listKegiatan ?? []" />

    {{-- 8. Mitra Kolaborasi / Tempat PKL (#mitra-pkl) --}}
    <x-mitra-pkl />

@endsection