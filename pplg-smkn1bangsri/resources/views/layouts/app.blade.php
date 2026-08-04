<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- COLOR THEME BROWSER MOBILE --}}
    <meta name="theme-color" content="#020617">

    {{-- 1. PRIMARY SEO META TAGS --}}
    <title>@yield('title', 'PPLG SMKN 1 Bangsri') - Official Website</title>
    <meta name="title" content="@yield('meta_title', 'PPLG SMKN 1 Bangsri - Official Website')">
    <meta name="description" content="@yield('meta_description', 'Website Resmi Jurusan PPLG SMKN 1 Bangsri. Berfokus pada pemrograman web, aplikasi mobile, game development, dan Internet of Things (IoT) berstandar industri.')">
    <meta name="keywords" content="@yield('meta_keywords', 'PPLG SMKN 1 Bangsri, RPL SMKN 1 Bangsri, PPLG Bangsri, SMK Bangsri, Rekayasa Perangkat Lunak, Pengembangan Perangkat Lunak dan Gim, Teaching Factory PPLG')">
    <meta name="author" content="PPLG SMKN 1 Bangsri">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- 2. FAVICON & APPLE TOUCH ICON --}}
    <link rel="icon" href="{{ asset('images/logo/logo-pplg.png') }}" type="image/png">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/logo/logo-pplg.png') }}">

    {{-- 3. OPEN GRAPH / FACEBOOK / WHATSAPP PREVIEW --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="PPLG SMKN 1 Bangsri">
    <meta property="og:title" content="@yield('meta_title', 'PPLG SMKN 1 Bangsri - Software & Game Engineering')">
    <meta property="og:description" content="@yield('meta_description', 'Portal Resmi Kompetensi Keahlian PPLG SMKN 1 Bangsri. Informasi program keahlian, berita kegiatan, dan karya siswa.')">
    <meta property="og:image" content="@yield('meta_image', asset('images/logo/logo-pplg.png'))">
    <meta property="og:locale" content="id_ID">

    {{-- 4. TWITTER CARD --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="@yield('meta_title', 'PPLG SMKN 1 Bangsri')">
    <meta name="twitter:description" content="@yield('meta_description', 'Website Resmi Jurusan PPLG SMKN 1 Bangsri.')">
    <meta name="twitter:image" content="@yield('meta_image', asset('images/logo/logo-pplg.png'))">

    {{-- GOOGLE FONTS: PLUS JAKARTA SANS --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

    {{-- VITE (TAILWIND & JS) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- ALPINE.JS X-CLOAK HELPER & CUSTOM STYLES --}}
    <style>
        [x-cloak] { display: none !important; }
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        
        /* Custom Modern Scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }
        ::-webkit-scrollbar-track {
            background: #090d16;
        }
        ::-webkit-scrollbar-thumb {
            background: #334155;
            border-radius: 5px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #ea580c;
        }
        
        /* Hide Scrollbar Utility Class */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>

    @stack('styles')
</head>
<body class="bg-slate-50 text-slate-800 antialiased selection:bg-orange-500 selection:text-white flex flex-col min-h-screen relative"
      x-data="{ showBackToTop: false }"
      @scroll.window="showBackToTop = (window.pageYOffset > 400)">

    {{-- 1. NAVBAR --}}
    @include('components.navbar')

    {{-- 2. MAIN CONTENT --}}
    <main class="grow">
        @yield('content')
    </main>

    {{-- 3. FOOTER --}}
    @include('components.footer')

    {{-- 4. FLOATING BACK TO TOP BUTTON --}}
    <button @click="window.scrollTo({ top: 0, behavior: 'smooth' })"
            x-show="showBackToTop"
            x-cloak
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 scale-90"
            x-transition:enter-end="opacity-100 translate-y-0 scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 scale-90"
            type="button"
            aria-label="Kembali ke Atas"
            class="fixed bottom-6 right-6 z-40 p-3 rounded-2xl bg-slate-950/90 text-white hover:bg-orange-600 border border-slate-700/80 shadow-xl backdrop-blur-md transition-all duration-300 cursor-pointer hover:scale-110 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-500">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
        </svg>
    </button>

    @stack('scripts')
</body>
</html>