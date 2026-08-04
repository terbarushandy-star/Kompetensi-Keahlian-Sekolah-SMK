{{-- SECTION MITRA INDUSTRI & TEMPAT PKL --}}
@php
    $mitras = [
        [
            'nama' => 'Seveninc',
            'logo' => asset('images/mitra/seveninc.png'),
            'url' => 'https://seveninc.web.id/',
        ],
        [
            'nama' => 'Aulia Persada',
            'logo' => asset('images/mitra/aulia-persada.png'),
            'url' => 'https://auliapersada.id/',
        ],
        [
            'nama' => 'Lauwba Academy',
            'logo' => asset('images/mitra/academy-lauwba.png'),
            'url' => 'https://academy.lauwba.com/',
        ],
        [
            'nama' => 'PlatKa Software Digital',
            'logo' => asset('images/mitra/platka.png'),
            'url' => 'https://platka.io/id',
        ],
        [
            'nama' => 'Rumah Mesin',
            'logo' => asset('images/mitra/rumah-mesin.png'),
            'url' => 'https://www.rumahmesin.com/',
        ],
        [
            'nama' => 'Vektora Studio',
            'logo' => asset('images/mitra/vektora.png'),
            'url' => 'https://www.vektora.studio/',
        ],
        [
            'nama' => 'BPTIK DIKBUD',
            'logo' => asset('images/mitra/bptik-dikbud.png'),
            'url' => 'https://simpel.pdk.jatengprov.go.id/',
        ],
        [
            'nama' => 'BPSDMD JAWA TENGAH',
            'logo' => asset('images/mitra/bpsdmd-jateng.png'),
            'url' => 'https://bpsdmd.jatengprov.go.id/web/',
        ],
        [
            'nama' => 'PT. CIPTA ANYA NUGRAHA',
            'logo' => asset('images/mitra/can-creative.png'),
            'url' => 'https://can.co.id/',
        ],
        [
            'nama' => 'Anugrah Karya Indonesia',
            'logo' => asset('images/mitra/anugrah-karya-indonesia.png'),
            'url' => 'https://akarindo.id/',
        ],
        [
            'nama' => 'TEFA',
            'logo' => asset('images/mitra/tefa-logo.png'),
            'url' => 'https://tefa.smkn1bangsri.sch.id',
        ],
        [
            'nama' => 'HIMKI DPD Jepara Raya',
            'logo' => asset('images/mitra/himki-jepara.png'),
            'url' => 'https://himkijepararaya.org/',
        ],
        [
            'nama' => 'Crocodic',
            'logo' => asset('images/mitra/crocodic.png'),
            'url' => 'https://crocodic.com/',
        ],
        [
            'nama' => 'Universitas Stekom',
            'logo' => asset('images/mitra/stekom.png'),
            'url' => 'https://stekom.ac.id/',
        ],
        [
            'nama' => 'CV. Tech Area Indonesia Jaya',
            'logo' => asset('images/mitra/techarea.png'),
            'url' => 'https://techarea.co.id/',
        ],
        [
            'nama' => 'PT. Punca Media Digitala',
            'logo' => asset('images/mitra/punca.png'),
            'url' => 'https://punca.id/',
        ],
        [
            'nama' => 'PT. Humanika Mitra Solusi',
            'logo' => asset('images/mitra/humanika.png'),
            'url' => 'https://humanika.co.id/',
        ],
        [
            'nama' => 'Mangun Studio',
            'logo' => asset('images/mitra/mangun.png'),
            'url' => 'https://www.instagram.com/mangun.co/',
        ],
    ];
@endphp

<section id="mitra" 
         x-data="{ showAll: false, limit: 6 }" 
         class="scroll-mt-20 sm:scroll-mt-24 py-16 sm:py-24 bg-slate-50/80 text-slate-900 border-t border-b border-slate-200/80 relative overflow-hidden">
    
    {{-- SUBTLE DEVELOPER GRID PATTERN --}}
    <div class="absolute inset-0 z-0 opacity-[0.03] pointer-events-none"
         style="background-image: radial-gradient(#0f172a 1px, transparent 1px); background-size: 24px 24px;"></div>

    {{-- Soft Ambient Glow --}}
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[32rem] h-[32rem] bg-orange-500/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        {{-- JUDUL SECTION (TITLE CASE & CLEAN) --}}
        <div class="text-center max-w-3xl mx-auto mb-10 sm:mb-14">
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-black text-slate-900 leading-snug sm:leading-tight tracking-tight">
                Mitra Industri & Tempat PKL <span class="bg-gradient-to-r from-orange-600 to-amber-500 bg-clip-text text-transparent">Keahlian PPLG</span>
            </h2>
            <div class="w-16 sm:w-20 h-1.5 bg-gradient-to-r from-orange-500 to-amber-500 mx-auto rounded-full mt-3 shadow-xs"></div>
        </div>

        {{-- GRID LOGO: MOBILE 2 KOLOM & DESKTOP 3 KOLOM --}}
        <div class="max-w-5xl mx-auto grid grid-cols-2 lg:grid-cols-3 gap-3.5 sm:gap-6 md:gap-8 items-stretch justify-items-center">
            @foreach ($mitras as $index => $mitra)
                <a href="{{ $mitra['url'] }}" 
                   target="_blank" 
                   rel="noopener noreferrer"
                   x-show="showAll || {{ $index }} < limit"
                   x-cloak
                   x-transition:enter="transition ease-out duration-300"
                   x-transition:enter-start="opacity-0 scale-95"
                   x-transition:enter-end="opacity-100 scale-100"
                   class="group flex flex-col items-center justify-between p-4 sm:p-6 w-full rounded-3xl bg-white border border-slate-200/90 hover:border-orange-500 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1.5 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-500">
                    
                    {{-- WADAH LOGO --}}
                    <div class="h-16 sm:h-24 md:h-28 w-full flex items-center justify-center p-1 sm:p-2">
                        <img src="{{ $mitra['logo'] }}" 
                             alt="Logo {{ $mitra['nama'] }}" 
                             onerror="this.src='https://placehold.co/200x100/ea580c/ffffff?text=Mitra+PPLG'"
                             class="max-h-full max-w-full w-auto object-contain transition-transform duration-300 group-hover:scale-105">
                    </div>

                    {{-- NAMA MITRA --}}
                    <span class="mt-3 text-xs sm:text-sm md:text-base font-bold text-slate-800 group-hover:text-orange-600 transition text-center leading-snug px-0.5 break-words">
                        {{ $mitra['nama'] }}
                    </span>
                </a>
            @endforeach
        </div>

        {{-- TOMBOL TOGGLE --}}
        @if (count($mitras) > 6)
            <div class="mt-10 sm:mt-14 text-center">
                <button @click="showAll = !showAll" 
                        type="button"
                        class="px-6 sm:px-8 py-3 rounded-2xl bg-white hover:bg-orange-600 text-orange-600 hover:text-white border-2 border-orange-500 text-xs sm:text-sm font-extrabold transition-all duration-300 shadow-sm hover:shadow-lg inline-flex items-center gap-2 sm:gap-2.5 cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-500">
                    <span x-text="showAll ? 'Sembunyikan Sebagian' : 'Lihat Semua Mitra ({{ count($mitras) }})'"></span>
                    <svg class="w-4 h-4 transition-transform duration-300" 
                         :class="showAll ? 'rotate-180' : ''" 
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
            </div>
        @endif

    </div>
</section>