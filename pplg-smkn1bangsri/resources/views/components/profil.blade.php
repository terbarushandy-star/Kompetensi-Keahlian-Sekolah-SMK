{{-- SECTION PROFIL, TIMELINE SEJARAH, & STATISTIK KEAHLIAN PPLG --}}
@php
    $milestones = [
        [
            'year' => '2010',
            'title' => 'Berdirinya Keahlian PPLG',
            'desc' => 'Awal dibentuknya program keahlian di SMKN 1 Bangsri untuk menjawab kebutuhan tenaga terampil di bidang pemrogram komputer.',
            'img' => asset('images/profil/sejarah-1.jpg')
        ],
        [
            'year' => '2010 - 2021',
            'title' => 'Nama Awal RPL',
            'desc' => 'Selama 11 tahun berkiprah menggunakan nomenklatur Rekayasa Perangkat Lunak (RPL) dengan fokus pemograman desktop & web.',
            'img' => asset('images/profil/sejarah-2.jpg')
        ],
        [
            'year' => '2022',
            'title' => 'Pergantian Nomenklatur',
            'desc' => 'Penerapan Kurikulum Merdeka yang mentransformasi RPL menjadi Pengembangan Perangkat Lunak dan Gim (PPLG).',
            'img' => asset('images/profil/sejarah-3.jpg')
        ],
        [
            'year' => '2022 - Sekarang',
            'title' => 'Resmi PPLG SMKN 1 Bangsri',
            'desc' => 'Fokus memperluas kurikulum mencakup Aplikasi Mobile, Internet of Things (IoT), Game Development, dan Teaching Factory (TeFa).',
            'img' => asset('images/profil/sejarah-4.jpg')
        ]
    ];
@endphp

<section id="profil" 
         class="scroll-mt-20 sm:scroll-mt-24 py-16 sm:py-24 bg-white relative overflow-hidden text-slate-900 border-b border-slate-200/80"
         x-data="{ 
            openModal: false,
            selectedMilestone: 0,
            pathDrawn: false,
            statsTriggered: false,
            countStudents: 0,
            countSuccess: 0,
            milestones: {{ \Illuminate\Support\Js::from($milestones) }},

            initObserver() {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            this.pathDrawn = true;
                            this.startCounter();
                        }
                    });
                }, { threshold: 0.25 });
                observer.observe(this.$el);
            },

            startCounter() {
                if (this.statsTriggered) return;
                this.statsTriggered = true;
                
                let duration = 1200;
                let steps = 40;
                let stepTime = duration / steps;
                
                let studentStep = 400 / steps;
                let successStep = 100 / steps;
                
                let currentStep = 0;
                let interval = setInterval(() => {
                    currentStep++;
                    this.countStudents = Math.min(400, Math.round(studentStep * currentStep));
                    this.countSuccess = Math.min(100, Math.round(successStep * currentStep));
                    
                    if (currentStep >= steps) {
                        clearInterval(interval);
                        this.countStudents = 400;
                        this.countSuccess = 100;
                    }
                }, stepTime);
            },

            openMilestoneModal(index) {
                this.selectedMilestone = index;
                this.openModal = true;
            }
         }"
         @keydown.escape.window="openModal = false"
         x-init="initObserver()">
    
    {{-- SUBTLE DEVELOPER GRID PATTERN --}}
    <div class="absolute inset-0 z-0 opacity-[0.03] pointer-events-none"
         style="background-image: radial-gradient(#0f172a 1px, transparent 1px); background-size: 24px 24px;"></div>

    {{-- Ambient Soft Glow --}}
    <div class="absolute top-1/3 -left-20 w-[28rem] h-[28rem] bg-orange-500/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8 relative z-10">
        
        {{-- GRID UTAMA BERANDA --}}
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            
            {{-- KOLOM KIRI: ALUR ZIGZAG 4 AGENDA --}}
            <div class="lg:col-span-6 w-full">
                
                <div class="bg-slate-50/90 p-5 sm:p-7 rounded-3xl border border-slate-200/90 shadow-sm relative">
                    
                    <span class="text-xs font-extrabold uppercase tracking-widest text-orange-600 block mb-5 text-center">
                        Alur Sejarah & Transformasi PPLG
                    </span>

                    {{-- CONTAINER GRID ZIGZAG 2x2 --}}
                    <div class="relative grid grid-cols-2 gap-y-8 gap-x-4 sm:gap-x-8 items-start justify-items-center max-w-sm sm:max-w-md mx-auto py-2">
                        
                        {{-- GARIS HUBUNG ZIGZAG SVG --}}
                        <svg class="absolute inset-0 w-full h-full pointer-events-none z-0 overflow-visible" 
                             viewBox="0 0 100 100" 
                             preserveAspectRatio="none"
                             fill="none">
                            <path d="M 25 22 L 75 22 L 25 72 L 75 72" 
                                  stroke="#ea580c" 
                                  stroke-width="2.5" 
                                  stroke-dasharray="250" 
                                  :stroke-dashoffset="pathDrawn ? '0' : '250'"
                                  stroke-linecap="round" 
                                  stroke-linejoin="round"
                                  class="transition-all duration-1000 ease-in-out opacity-80" />
                        </svg>

                        {{-- 1. BERDIRINYA KEAHLIAN PPLG (2010) --}}
                        <button @click="openMilestoneModal(0)"
                                type="button"
                                aria-label="Lihat detail sejarah tahun 2010"
                                class="flex flex-col items-center text-center group relative z-10 w-full max-w-[130px] sm:max-w-[150px] cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-500 rounded-2xl p-1 transition">
                            <div class="w-full aspect-[4/3] rounded-2xl overflow-hidden bg-white p-1 border-2 border-orange-500 shadow-md group-hover:scale-105 transition duration-300">
                                <img src="{{ asset('images/profil/sejarah-1.jpg') }}" 
                                     alt="Berdirinya Keahlian PPLG SMKN 1 Bangsri" 
                                     onerror="this.src='https://placehold.co/300x225/ea580c/ffffff?text=2010'"
                                     class="w-full h-full object-cover rounded-xl">
                            </div>
                            <h3 class="text-xs sm:text-sm font-bold text-slate-900 mt-2.5 leading-tight group-hover:text-orange-600 transition">
                                Berdirinya Keahlian
                            </h3>
                            <span class="text-[11px] font-extrabold text-orange-600 mt-0.5">
                                2010
                            </span>
                        </button>

                        {{-- 2. NAMA AWAL RPL (2010 - 2021) --}}
                        <button @click="openMilestoneModal(1)"
                                type="button"
                                aria-label="Lihat detail sejarah tahun 2010 hingga 2021"
                                class="flex flex-col items-center text-center group relative z-10 w-full max-w-[130px] sm:max-w-[150px] cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-500 rounded-2xl p-1 transition">
                            <div class="w-full aspect-[4/3] rounded-2xl overflow-hidden bg-white p-1 border-2 border-slate-300 shadow-sm group-hover:border-orange-500 group-hover:scale-105 transition duration-300">
                                <img src="{{ asset('images/profil/sejarah-2.jpg') }}" 
                                     alt="Nama Awal RPL Keahlian PPLG" 
                                     onerror="this.src='https://placehold.co/300x225/1e293b/ffffff?text=RPL'"
                                     class="w-full h-full object-cover rounded-xl">
                            </div>
                            <h3 class="text-xs sm:text-sm font-bold text-slate-900 mt-2.5 leading-tight group-hover:text-orange-600 transition">
                                Nama Awal RPL
                            </h3>
                            <span class="text-[11px] font-extrabold text-orange-600 mt-0.5">
                                2010 - 2021
                            </span>
                        </button>

                        {{-- 3. PERGANTIAN NOMENKLATUR (2022) --}}
                        <button @click="openMilestoneModal(2)"
                                type="button"
                                aria-label="Lihat detail sejarah tahun 2022"
                                class="flex flex-col items-center text-center group relative z-10 w-full max-w-[130px] sm:max-w-[150px] cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-500 rounded-2xl p-1 transition">
                            <div class="w-full aspect-[4/3] rounded-2xl overflow-hidden bg-white p-1 border-2 border-slate-300 shadow-sm group-hover:border-orange-500 group-hover:scale-105 transition duration-300">
                                <img src="{{ asset('images/profil/sejarah-3.jpg') }}" 
                                     alt="Pergantian Nomenklatur Keahlian PPLG" 
                                     onerror="this.src='https://placehold.co/300x225/334155/ffffff?text=Transisi'"
                                     class="w-full h-full object-cover rounded-xl">
                            </div>
                            <h3 class="text-xs sm:text-sm font-bold text-slate-900 mt-2.5 leading-tight group-hover:text-orange-600 transition">
                                Pergantian Nama
                            </h3>
                            <span class="text-[11px] font-extrabold text-orange-600 mt-0.5">
                                2022
                            </span>
                        </button>

                        {{-- 4. RESMI NAMA PPLG (2022 - SEKARANG) --}}
                        <button @click="openMilestoneModal(3)"
                                type="button"
                                aria-label="Lihat detail periode PPLG sekarang"
                                class="flex flex-col items-center text-center group relative z-10 w-full max-w-[130px] sm:max-w-[150px] cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-500 rounded-2xl p-1 transition">
                            <div class="w-full aspect-[4/3] rounded-2xl overflow-hidden bg-white p-1 border-2 border-orange-500 shadow-md shadow-orange-500/15 group-hover:scale-105 transition duration-300">
                                <img src="{{ asset('images/profil/sejarah-4.jpg') }}" 
                                     alt="Resmi Nama Keahlian PPLG SMKN 1 Bangsri" 
                                     onerror="this.src='https://placehold.co/300x225/ea580c/ffffff?text=PPLG'"
                                     class="w-full h-full object-cover rounded-xl">
                            </div>
                            <h3 class="text-xs sm:text-sm font-bold text-slate-900 mt-2.5 leading-tight group-hover:text-orange-600 transition">
                                Resmi Nama PPLG
                            </h3>
                            <span class="text-[11px] font-extrabold text-orange-600 mt-0.5">
                                2022 - Sekarang
                            </span>
                        </button>

                    </div>

                </div>

            </div>

            {{-- KOLOM KANAN: TEKS PROFIL RINGKAS --}}
            <div class="lg:col-span-6 flex flex-col justify-start">
                
                <span class="text-xs sm:text-sm font-extrabold uppercase tracking-widest text-slate-500 block mb-2">
                    Selamat Datang Di
                </span>

                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-black text-slate-900 leading-snug sm:leading-tight tracking-tight">
                    Kompetensi Keahlian <br class="hidden sm:inline">
                    <span class="bg-gradient-to-r from-orange-600 to-amber-500 bg-clip-text text-transparent">
                        Pengembangan Perangkat Lunak dan Gim
                    </span>
                </h2>

                <div class="mt-4 text-xs sm:text-sm text-slate-600 leading-relaxed space-y-3 font-normal">
                    <p>
                        Kompetensi keahlian ini pertama kali berdiri pada tahun <strong class="text-slate-900 font-bold">2010</strong> dengan nama awal <em class="text-slate-800 font-medium">Rekayasa Perangkat Lunak (RPL)</em> untuk menjawab tingginya kebutuhan tenaga kerja di bidang pemrogram komputer dan IT.
                    </p>
                    <p>
                        Seiring berlakunya Kurikulum Merdeka pada tahun <strong class="text-slate-900 font-bold">2022</strong>, keahlian PPLG ini resmi bertransformasi menjadi <strong class="text-slate-900 font-bold">Pengembangan Perangkat Lunak dan Gim (PPLG)</strong>—memperluas fokus hingga pengerjaan proyek riil, aplikasi mobile, dan game interaktif.
                    </p>
                </div>

                <button 
                    @click="openMilestoneModal(0)" 
                    type="button"
                    class="mt-5 text-xs sm:text-sm font-bold text-orange-600 hover:text-orange-700 inline-flex items-center gap-2 self-start cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-500 rounded-lg py-1 transition group">
                    <span>Baca Sejarah & Perjalanan Selengkapnya</span>
                    <svg class="w-4 h-4 transform group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </button>

            </div>

        </div>

        {{-- BAR STATISTIK BAWAH --}}
        <div class="mt-14 sm:mt-16 pt-8 border-t border-slate-100 grid grid-cols-3 gap-4 text-center">
            <div>
                <span class="text-3xl sm:text-4xl lg:text-5xl font-black text-slate-900">
                    <span x-text="countStudents">0</span><span class="text-orange-600">+</span>
                </span>
                <p class="text-xs font-semibold text-slate-500 mt-1">Siswa Keahlian PPLG</p>
            </div>
            <div class="border-x border-slate-200/80">
                <span class="text-3xl sm:text-4xl lg:text-5xl font-black text-slate-900">A</span>
                <p class="text-xs font-semibold text-slate-500 mt-1">Akreditasi Keahlian PPLG</p>
            </div>
            <div>
                <span class="text-3xl sm:text-4xl lg:text-5xl font-black text-slate-900">
                    <span x-text="countSuccess">0</span><span class="text-orange-600">%</span>
                </span>
                <p class="text-xs font-semibold text-slate-500 mt-1">Siap Kerja / Kuliah</p>
            </div>
        </div>

    </div>

    {{-- MODAL POPUP SEJARAH LENGKAP --}}
    <div x-show="openModal" 
         x-cloak
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         role="dialog"
         aria-modal="true"
         aria-labelledby="modal-profil-title"
         class="fixed inset-0 z-50 flex items-center justify-center p-3 sm:p-6 bg-slate-950/80 backdrop-blur-md">
        
        <div @click.away="openModal = false"
             class="relative w-full max-w-3xl max-h-[90vh] bg-white text-slate-900 rounded-3xl shadow-2xl overflow-hidden border border-slate-200 flex flex-col">
            
            {{-- Header Modal --}}
            <div class="p-4 sm:p-6 border-b border-slate-100 flex items-center justify-between bg-slate-50">
                <div>
                    <span class="text-[10px] sm:text-xs font-extrabold uppercase tracking-widest text-orange-600">Sejarah & Transformasi</span>
                    <h3 id="modal-profil-title" class="text-base sm:text-xl font-black text-slate-900 leading-tight mt-0.5">
                        Profil Lengkap Keahlian PPLG SMKN 1 Bangsri
                    </h3>
                </div>
                <button @click="openModal = false" 
                        type="button"
                        aria-label="Tutup Modal Sejarah"
                        class="w-8 h-8 sm:w-9 sm:h-9 bg-slate-200 hover:bg-orange-600 hover:text-white rounded-full flex items-center justify-center transition cursor-pointer font-bold text-sm focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-500 shrink-0">
                    ✕
                </button>
            </div>

            {{-- Navigasi Tab Segmented Control Modern --}}
            <div class="px-4 sm:px-5 pt-3 sm:pt-4 pb-2 bg-slate-50 border-b border-slate-100">
                <div class="flex items-center gap-1.5 p-1.5 bg-slate-200/70 rounded-2xl overflow-x-auto no-scrollbar">
                    <template x-for="(m, idx) in milestones" :key="idx">
                        <button @click="selectedMilestone = idx"
                                type="button"
                                :class="selectedMilestone === idx 
                                    ? 'bg-orange-600 text-white font-bold shadow-md shadow-orange-600/20 scale-[1.02]' 
                                    : 'text-slate-600 hover:text-slate-900 font-semibold hover:bg-white/50'"
                                class="flex-1 min-w-[90px] sm:min-w-0 py-2 sm:py-2.5 px-3 rounded-xl text-xs transition-all duration-200 text-center cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-500 whitespace-nowrap">
                            <span x-text="m.year"></span>
                        </button>
                    </template>
                </div>
            </div>

            {{-- Body Modal --}}
            <div class="p-4 sm:p-7 overflow-y-auto space-y-4 sm:space-y-5 max-h-[60vh]">
                
                {{-- Card Milestone Aktif (Dark Tech Styling) --}}
                <div class="bg-slate-950 text-white rounded-2xl p-4 sm:p-6 shadow-xl relative overflow-hidden">
                    <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-orange-500/10 rounded-full blur-2xl"></div>
                    
                    <div class="relative z-10 flex flex-col sm:flex-row gap-4 sm:gap-5 items-center">
                        {{-- Foto Milestone --}}
                        <div class="w-full sm:w-1/2 aspect-[16/10] rounded-xl overflow-hidden bg-slate-900 shrink-0 border border-slate-800 shadow-md">
                            <img :src="milestones[selectedMilestone].img" 
                                 :alt="milestones[selectedMilestone].title"
                                 onerror="this.src='https://placehold.co/600x400/ea580c/ffffff?text=PPLG+SMKN+1+Bangsri'"
                                 class="w-full h-full object-cover">
                        </div>

                        {{-- Detail Teks Milestone --}}
                        <div class="w-full sm:w-1/2 space-y-2">
                            <span class="inline-block px-3 py-1 rounded-full bg-orange-500/20 text-orange-400 font-mono font-bold text-[11px] border border-orange-500/30" x-text="milestones[selectedMilestone].year"></span>
                            <h4 class="text-base sm:text-lg font-black text-white leading-snug" x-text="milestones[selectedMilestone].title"></h4>
                            <p class="text-xs sm:text-sm text-slate-300 font-normal leading-relaxed" x-text="milestones[selectedMilestone].desc"></p>
                        </div>
                    </div>
                </div>

                {{-- Teks Penjelasan Tambahan --}}
                <div class="space-y-3 text-xs sm:text-sm text-slate-600 leading-relaxed font-normal bg-slate-50 p-4 sm:p-5 rounded-2xl border border-slate-200/80">
                    <p>
                        Kompetensi Keahlian ini pertama kali berdiri pada tahun <strong class="text-slate-900 font-bold">2010</strong> dengan nama awal <em class="text-slate-800 font-medium">Rekayasa Perangkat Lunak (RPL)</em> untuk menjawab tingginya kebutuhan tenaga kerja di bidang pemrogram komputer dan IT.
                    </p>
                    <p>
                        Seiring berlakunya Kurikulum Merdeka pada tahun <strong class="text-slate-900 font-bold">2022</strong>, keahlian PPLG ini resmi bertransformasi menjadi <strong class="text-slate-900 font-bold">Pengembangan Perangkat Lunak dan Gim (PPLG)</strong>—memperluas fokus hingga pengerjaan proyek riil, aplikasi mobile, dan game interaktif.
                    </p>
                </div>

            </div>

            {{-- Footer Modal --}}
            <div class="p-3.5 sm:p-4 border-t border-slate-100 bg-slate-50 flex justify-between items-center">
                <span class="text-xs text-slate-400 font-medium">PPLG SMKN 1 Bangsri</span>
                <button @click="openModal = false" 
                        type="button"
                        class="px-5 py-2 sm:px-6 sm:py-2.5 bg-slate-950 hover:bg-orange-600 text-white rounded-xl font-bold text-xs transition-colors duration-200 cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-500">
                    Tutup
                </button>
            </div>

        </div>
    </div>

</section>