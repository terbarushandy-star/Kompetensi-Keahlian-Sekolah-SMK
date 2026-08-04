{{-- NAVBAR TRANSPARENT-TO-SOLID STICKY --}}
@php
    $isHome = request()->routeIs('home');
@endphp

<header 
    x-data="{ 
        isHome: @js($isHome),
        isScrolled: @js(!$isHome), 
        mobileMenuOpen: false,
        activeSection: '',
        scrollProgress: 0,
        
        updateScroll() {
            if(this.isHome) { 
                this.isScrolled = (window.scrollY > 20);
            }
            // Hitung persentase scroll halaman (Reading Progress Bar)
            let winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            let height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            this.scrollProgress = height > 0 ? (winScroll / height) * 100 : 0;
            
            // Detect active section (Scrollspy)
            const sections = ['profil', 'visi-misi', 'fasilitas', 'guru'];
            let current = '';
            for (const section of sections) {
                const el = document.getElementById(section);
                if (el) {
                    const rect = el.getBoundingClientRect();
                    if (rect.top <= 150 && rect.bottom >= 150) {
                        current = section;
                        break;
                    }
                }
            }
            this.activeSection = current;
        }
    }"
    x-init="updateScroll()"
    @scroll.window="updateScroll()"
    :class="(isScrolled || !isHome) 
        ? 'bg-white/95 backdrop-blur-md shadow-sm border-b border-slate-200/80 py-2.5 text-slate-800' 
        : 'bg-gradient-to-b from-black/60 via-black/20 to-transparent py-4 text-white'"
    class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">

    <div class="max-w-7xl mx-auto px-6 lg:px-8 flex items-center justify-between">

        {{-- 1. LOGO & BRANDING --}}
        <a href="{{ route('home') }}" 
           class="flex items-center gap-3 group focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-500 rounded-xl p-1 transition">
            <img 
                src="{{ asset('images/logo/logo-pplg.png') }}" 
                alt="Logo PPLG SMKN 1 Bangsri" 
                class="h-10 sm:h-11 w-auto transition transform group-hover:scale-105">
            <div>
                <span 
                    :class="(isScrolled || !isHome) ? 'text-slate-900' : 'text-white'"
                    class="font-black text-lg sm:text-xl tracking-tight block leading-none transition-colors">
                    PPLG
                </span>
                <span 
                    :class="(isScrolled || !isHome) ? 'text-slate-500' : 'text-slate-300'"
                    class="text-[9px] sm:text-[10px] font-bold tracking-widest uppercase block mt-1 transition-colors">
                    SMKN 1 Bangsri
                </span>
            </div>
        </a>

        {{-- 2. DESKTOP NAVIGATION LINKS (ADA DROPDOWN TENTANG AGAR RAPI) --}}
        <nav class="hidden md:flex items-center gap-7 text-sm font-semibold">
            
            {{-- Beranda --}}
            <a href="{{ route('home') }}" 
               :class="(isScrolled || !isHome) 
                   ? (activeSection === '' ? 'text-orange-600 font-bold' : 'text-slate-700 hover:text-orange-600') 
                   : (activeSection === '' ? 'text-orange-400 font-bold' : 'text-white/90 hover:text-orange-400')"
               class="relative py-1 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-500 rounded-md px-1">
                Beranda
                <span x-show="activeSection === '' && isHome" class="absolute bottom-0 left-1 right-1 h-0.5 bg-orange-500 rounded-full"></span>
            </a>

            {{-- DROPDOWN TENTANG (DESKTOP ONLY) --}}
            <div x-data="{ open: false }" @click.away="open = false" class="relative">
                <button 
                    @click="open = !open"
                    :class="(isScrolled || !isHome) 
                        ? (['profil','visi-misi','fasilitas'].includes(activeSection) ? 'text-orange-600 font-bold' : 'text-slate-700 hover:text-orange-600') 
                        : (['profil','visi-misi','fasilitas'].includes(activeSection) ? 'text-orange-400 font-bold' : 'text-white/90 hover:text-orange-400')"
                    class="inline-flex items-center gap-1 py-1 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-500 rounded-md px-1 cursor-pointer">
                    <span>Tentang</span>
                    <svg class="w-4 h-4 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                <div 
                    x-show="open" 
                    x-cloak
                    x-transition:enter="transition ease-out duration-150"
                    x-transition:enter-start="opacity-0 translate-y-2 scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                    x-transition:leave="transition ease-in duration-100"
                    x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                    x-transition:leave-end="opacity-0 translate-y-1 scale-95"
                    class="absolute top-full -left-4 mt-3 w-56 rounded-2xl bg-white p-2 shadow-xl border border-slate-100 text-slate-800 text-xs">
                    
                    <a href="{{ route('home') }}#profil" 
                       @click="open = false" 
                       :class="activeSection === 'profil' ? 'bg-orange-50 text-orange-600 font-bold' : 'hover:bg-slate-50 hover:text-orange-600 font-medium'"
                       class="block px-4 py-2.5 rounded-xl transition">
                        Sejarah & Profil
                    </a>
                    
                    <a href="{{ route('home') }}#visi-misi" 
                       @click="open = false" 
                       :class="activeSection === 'visi-misi' ? 'bg-orange-50 text-orange-600 font-bold' : 'hover:bg-slate-50 hover:text-orange-600 font-medium'"
                       class="block px-4 py-2.5 rounded-xl transition">
                        Visi & Misi
                    </a>
                    
                    <a href="{{ route('home') }}#fasilitas" 
                       @click="open = false" 
                       :class="activeSection === 'fasilitas' ? 'bg-orange-50 text-orange-600 font-bold' : 'hover:bg-slate-50 hover:text-orange-600 font-medium'"
                       class="block px-4 py-2.5 rounded-xl transition">
                        Sarana & Fasilitas
                    </a>
                </div>
            </div>

            {{-- Pengajar & Staf --}}
            <a href="{{ route('home') }}#guru" 
               :class="(isScrolled || !isHome) 
                   ? (activeSection === 'guru' ? 'text-orange-600 font-bold' : 'text-slate-700 hover:text-orange-600') 
                   : (activeSection === 'guru' ? 'text-orange-400 font-bold' : 'text-white/90 hover:text-orange-400')"
               class="relative py-1 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-500 rounded-md px-1">
                Pengajar & Staf
                <span x-show="activeSection === 'guru'" class="absolute bottom-0 left-1 right-1 h-0.5 bg-orange-500 rounded-full"></span>
            </a>

            {{-- Kegiatan --}}
            <a href="{{ route('kegiatan.index') }}" 
               :class="(isScrolled || !isHome) ? 'text-slate-700 hover:text-orange-600' : 'text-white/90 hover:text-orange-400'"
               class="transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-500 rounded-md px-1">
                Kegiatan
            </a>

            {{-- Prestasi --}}
            <a href="{{ route('prestasi.index') }}" 
               :class="(isScrolled || !isHome) ? 'text-slate-700 hover:text-orange-600' : 'text-white/90 hover:text-orange-400'"
               class="transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-500 rounded-md px-1">
                Prestasi
            </a>

            {{-- Unit Usaha / TeFa --}}
            <a href="https://tefa.smkn1bangsri.sch.id" 
               target="_blank" 
               rel="noopener noreferrer"
               :class="(isScrolled || !isHome) ? 'text-slate-700 hover:text-orange-600' : 'text-white/90 hover:text-orange-400'"
               class="transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-500 rounded-md px-1">
                Unit Usaha
            </a>

        </nav>

        {{-- 3. BUTTON CTA (DESKTOP) --}}
        <div class="hidden md:flex items-center">
            <a href="https://mail.google.com/mail/?view=cm&fs=1&to=rplsmkn1bangsri@gmail.com&su=Tanya%20Informasi%20PPLG%20SMKN%201%20Bangsri" 
               target="_blank" 
               rel="noopener noreferrer"
               :class="(isScrolled || !isHome) 
                   ? 'bg-orange-50 border border-orange-600/30 text-orange-600 hover:bg-orange-600 hover:text-white' 
                   : 'border border-white/40 bg-white/10 backdrop-blur-sm text-white hover:bg-white hover:text-slate-900'"
               class="px-5 py-2 rounded-full text-xs font-bold transition-all duration-300 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-500">
                Hubungi Kami
            </a>
        </div>

        {{-- 4. MOBILE MENU BUTTON --}}
        <button 
            @click="mobileMenuOpen = !mobileMenuOpen"
            :aria-expanded="mobileMenuOpen"
            aria-label="Toggle Navigation Menu"
            :class="(isScrolled || !isHome) ? 'text-slate-900' : 'text-white'"
            class="md:hidden p-2.5 rounded-xl focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-500 cursor-pointer">
            <svg x-show="!mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
            <svg x-show="mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>

    </div>

    {{-- MOBILE MENU DRAWER (FLAT LIST - TANPA ACCORDION / DROPDOWN) --}}
    <div 
        x-show="mobileMenuOpen" 
        x-cloak
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        class="md:hidden bg-white text-slate-800 border-b border-slate-200 px-6 py-5 shadow-2xl max-h-[85vh] overflow-y-auto">
        
        <div class="flex flex-col gap-1 text-sm font-semibold">
            
            {{-- Beranda Mobile --}}
            <a href="{{ route('home') }}" 
               @click="mobileMenuOpen = false" 
               :class="activeSection === '' && isHome ? 'bg-orange-50 text-orange-600 font-bold' : 'text-slate-700 hover:bg-slate-50'"
               class="px-3 py-2.5 rounded-xl transition flex items-center justify-between">
                <span>Beranda</span>
                <span x-show="activeSection === '' && isHome" class="w-2 h-2 rounded-full bg-orange-600"></span>
            </a>

            {{-- Sejarah & Profil Mobile --}}
            <a href="{{ route('home') }}#profil" 
               @click="mobileMenuOpen = false" 
               :class="activeSection === 'profil' ? 'bg-orange-50 text-orange-600 font-bold' : 'text-slate-700 hover:bg-slate-50'"
               class="px-3 py-2.5 rounded-xl transition flex items-center justify-between">
                <span>Sejarah & Profil</span>
                <span x-show="activeSection === 'profil'" class="w-2 h-2 rounded-full bg-orange-600"></span>
            </a>

            {{-- Visi & Misi Mobile --}}
            <a href="{{ route('home') }}#visi-misi" 
               @click="mobileMenuOpen = false" 
               :class="activeSection === 'visi-misi' ? 'bg-orange-50 text-orange-600 font-bold' : 'text-slate-700 hover:bg-slate-50'"
               class="px-3 py-2.5 rounded-xl transition flex items-center justify-between">
                <span>Visi & Misi</span>
                <span x-show="activeSection === 'visi-misi'" class="w-2 h-2 rounded-full bg-orange-600"></span>
            </a>

            {{-- Sarana & Fasilitas Mobile --}}
            <a href="{{ route('home') }}#fasilitas" 
               @click="mobileMenuOpen = false" 
               :class="activeSection === 'fasilitas' ? 'bg-orange-50 text-orange-600 font-bold' : 'text-slate-700 hover:bg-slate-50'"
               class="px-3 py-2.5 rounded-xl transition flex items-center justify-between">
                <span>Sarana & Fasilitas</span>
                <span x-show="activeSection === 'fasilitas'" class="w-2 h-2 rounded-full bg-orange-600"></span>
            </a>

            {{-- Pengajar & Staf Mobile --}}
            <a href="{{ route('home') }}#guru" 
               @click="mobileMenuOpen = false" 
               :class="activeSection === 'guru' ? 'bg-orange-50 text-orange-600 font-bold' : 'text-slate-700 hover:bg-slate-50'"
               class="px-3 py-2.5 rounded-xl transition flex items-center justify-between">
                <span>Pengajar & Staf</span>
                <span x-show="activeSection === 'guru'" class="w-2 h-2 rounded-full bg-orange-600"></span>
            </a>

            {{-- Kegiatan Mobile --}}
            <a href="{{ route('kegiatan.index') }}" 
               @click="mobileMenuOpen = false" 
               class="px-3 py-2.5 text-slate-700 hover:bg-slate-50 rounded-xl transition">
                Kegiatan
            </a>

            {{-- Prestasi Mobile --}}
            <a href="{{ route('prestasi.index') }}" 
               @click="mobileMenuOpen = false" 
               class="px-3 py-2.5 text-slate-700 hover:bg-slate-50 rounded-xl transition">
                Prestasi
            </a>

            {{-- Unit Usaha Mobile --}}
            <a href="https://tefa.smkn1bangsri.sch.id" 
               target="_blank" 
               rel="noopener noreferrer" 
               @click="mobileMenuOpen = false" 
               class="px-3 py-2.5 text-slate-700 hover:bg-slate-50 rounded-xl transition flex items-center justify-between">
                <span>Unit Usaha</span>
                <span class="text-xs text-orange-600 font-normal">Membuka Tab Baru ↗</span>
            </a>

            {{-- CTA Hubungi Kami Mobile --}}
            <a href="https://mail.google.com/mail/?view=cm&fs=1&to=rplsmkn1bangsri@gmail.com&su=Tanya%20Informasi%20PPLG%20SMKN%201%20Bangsri" 
               target="_blank" 
               rel="noopener noreferrer" 
               @click="mobileMenuOpen = false" 
               class="mt-3 text-center py-3 bg-orange-600 hover:bg-orange-700 text-white rounded-xl font-bold block shadow-md transition">
                Hubungi Kami
            </a>

        </div>
    </div>

    {{-- READING / SCROLL PROGRESS BAR --}}
    <div 
        class="absolute bottom-0 left-0 h-[2px] bg-gradient-to-r from-orange-500 to-amber-400 transition-all duration-150 ease-out"
        :style="`width: ${scrollProgress}%`">
    </div>

</header>