{{-- SECTION HERO / BERANDA --}}
@php
    $heroImages = [
        asset('images/hero/hero1.jpg'),
        asset('images/hero/hero2.jpg'),
        asset('images/hero/hero3.jpg'),
    ];
@endphp

<section id="hero" 
         class="relative min-h-screen overflow-hidden bg-slate-950 flex items-center justify-center pt-28 sm:pt-36 pb-20 select-none"
         x-data="{
            activeBg: 0,
            timer: null,
            touchStartX: 0,
            touchEndX: 0,
            bgs: {{ \Illuminate\Support\Js::from($heroImages) }},
            
            startTimer() {
                this.stopTimer();
                this.timer = setInterval(() => { 
                    this.nextSlide();
                }, 5000);
            },
            stopTimer() {
                if (this.timer) clearInterval(this.timer);
            },
            nextSlide() {
                this.activeBg = (this.activeBg + 1) % this.bgs.length;
            },
            prevSlide() {
                this.activeBg = (this.activeBg - 1 + this.bgs.length) % this.bgs.length;
            },
            goToBg(index) {
                this.activeBg = index;
                this.startTimer();
            },
            handleTouchStart(e) {
                this.touchStartX = e.changedTouches[0].screenX;
            },
            handleTouchEnd(e) {
                this.touchEndX = e.changedTouches[0].screenX;
                this.handleSwipe();
            },
            handleSwipe() {
                if (this.touchEndX < this.touchStartX - 40) {
                    this.nextSlide();
                    this.startTimer();
                }
                if (this.touchEndX > this.touchStartX + 40) {
                    this.prevSlide();
                    this.startTimer();
                }
            }
         }"
         x-init="startTimer()"
         @mouseenter="stopTimer()"
         @mouseleave="startTimer()"
         @touchstart="handleTouchStart($event)"
         @touchend="handleTouchEnd($event)">

    {{-- BACKGROUND SLIDER DENGAN SMOOTH CROSS-FADE --}}
    <div class="absolute inset-0 h-full w-full pointer-events-none">
        <template x-for="(bg, index) in bgs" :key="index">
            <img :src="bg"
                 :alt="'Hero Background Keahlian PPLG ' + (index + 1)"
                 x-show="activeBg === index"
                 x-transition:enter="transition-all duration-1000 ease-out"
                 x-transition:enter-start="opacity-0 scale-105"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition-all duration-1000 ease-in"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-100"
                 onerror="this.src='https://placehold.co/1920x1080/0f172a/ffffff?text=PPLG+SMKN+1+Bangsri'"
                 class="absolute inset-0 h-full w-full object-cover object-center">
        </template>
    </div>

    {{-- OVERLAY GRADIENT MULTI-LAYER (KONTRAS TEKS TINGGI & DETAIL FOTO) --}}
    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/70 to-black/60 z-0"></div>
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-transparent via-black/30 to-slate-950/80 z-0"></div>

    {{-- KONTEN UTAMA HERO --}}
    <div class="relative z-10 w-full text-center"
         x-data="{ show: false }"
         x-init="setTimeout(() => show = true, 100)">
        
        <div class="max-w-5xl mx-auto px-5 sm:px-6 lg:px-8 flex flex-col items-center">

            {{-- Judul Utama --}}
            <h1 x-show="show"
                x-transition:enter="transition ease-out duration-700 delay-100 transform"
                x-transition:enter-start="opacity-0 translate-y-6"
                x-transition:enter-end="opacity-100 translate-y-0"
                class="text-3xl font-black leading-tight text-white sm:text-5xl md:text-6xl lg:text-7xl max-w-5xl mx-auto tracking-tight drop-shadow-md">
                Pengembangan 
                <span class="block sm:inline sm:whitespace-nowrap mt-1 sm:mt-0">
                    <span class="bg-gradient-to-r from-orange-400 via-amber-300 to-orange-500 bg-clip-text text-transparent drop-shadow-sm">
                        Perangkat Lunak
                    </span> 
                    <span class="text-white">dan</span> 
                    <span class="bg-gradient-to-r from-orange-400 via-amber-300 to-orange-500 bg-clip-text text-transparent drop-shadow-sm">
                        Gim
                    </span>
                </span>
            </h1>

            {{-- Deskripsi Ringkas --}}
            <p x-show="show"
               x-transition:enter="transition ease-out duration-700 delay-200 transform"
               x-transition:enter-start="opacity-0 translate-y-6"
               x-transition:enter-end="opacity-100 translate-y-0"
               class="mt-5 text-sm sm:text-base md:text-lg leading-relaxed text-slate-200 max-w-2xl px-2 font-normal drop-shadow-sm">
                Kompetensi Keahlian PPLG SMKN 1 Bangsri berfokus pada pengembangan perangkat lunak, website, aplikasi mobile, game, serta membentuk lulusan yang siap bekerja, melanjutkan pendidikan, maupun berwirausaha.
            </p>

            {{-- TOMBOL CTA UTAMA --}}
            <div x-show="show"
                 x-transition:enter="transition ease-out duration-700 delay-300 transform"
                 x-transition:enter-start="opacity-0 translate-y-6"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 class="mt-8 sm:mt-10 flex justify-center">
                <a href="#profil"
                   class="group relative inline-flex items-center gap-3.5 rounded-full border-2 border-white/80 bg-white/5 backdrop-blur-md px-7 py-3.5 sm:px-8 sm:py-4 text-sm sm:text-base font-extrabold text-white transition-all duration-300 hover:bg-orange-600 hover:border-orange-600 hover:shadow-xl hover:shadow-orange-600/30 hover:scale-105 active:scale-95 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-500">
                    
                    <span>Jelajahi Keahlian PPLG</span>
                    
                    {{-- Lingkaran Ikon Panah --}}
                    <span class="flex h-7 w-7 sm:h-8 sm:w-8 items-center justify-center rounded-full bg-white/20 backdrop-blur-xs text-white transition-all duration-300 group-hover:bg-white group-hover:text-orange-600 group-hover:translate-x-1 group-hover:-rotate-45">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </span>

                </a>
            </div>

            {{-- Indikator Dots Slider --}}
            <div class="mt-10 sm:mt-12 flex justify-center items-center gap-2.5">
                <template x-for="(bg, index) in bgs" :key="index">
                    <button @click="goToBg(index)" 
                            type="button"
                            :aria-label="'Ganti ke slide ' + (index + 1)"
                            class="h-2 rounded-full transition-all duration-300 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-500 cursor-pointer overflow-hidden relative"
                            :class="activeBg === index ? 'w-10 bg-white/20' : 'w-2.5 bg-white/40 hover:bg-white/70'">
                        <template x-if="activeBg === index">
                            <span class="absolute inset-y-0 left-0 bg-orange-500 w-full origin-left animate-[heroProgress_5s_linear_infinite]"></span>
                        </template>
                    </button>
                </template>
            </div>

        </div>
    </div>

    {{-- SCROLL DOWN INDICATOR --}}
    <a href="#profil" 
       aria-label="Scroll ke bagian profil keahlian PPLG"
       class="absolute bottom-5 left-1/2 -translate-x-1/2 z-10 flex flex-col items-center gap-1.5 text-white/70 hover:text-orange-400 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-500 rounded-lg p-1">
        <span class="text-[10px] font-bold tracking-widest text-slate-300">Jelajahi</span>
        <svg class="w-5 h-5 animate-bounce text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
        </svg>
    </a>

</section>