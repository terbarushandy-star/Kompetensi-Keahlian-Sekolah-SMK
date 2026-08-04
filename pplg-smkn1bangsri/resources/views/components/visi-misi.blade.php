{{-- SECTION VISI, MISI, & FOKUS KEAHLIAN PPLG (STATIC CARDS - NO POPUP) --}}
@php
    $skills = [
        ['id' => 'db', 'name' => 'Basis Data', 'sub' => 'MySQL & PostgreSQL'],
        ['id' => 'algo', 'name' => 'Algoritma & Logika', 'sub' => 'Flowchart & Pseudocode'],
        ['id' => 'uiux', 'name' => 'UI/UX Design', 'sub' => 'Figma & Prototyping'],
        ['id' => 'web', 'name' => 'Web & Backend', 'sub' => 'Laravel & Livewire'],
        ['id' => 'mobile', 'name' => 'Mobile App & Game', 'sub' => 'Flutter & Engine 2D/3D']
    ];
@endphp

<section id="visi-misi" 
         class="scroll-mt-20 sm:scroll-mt-24 py-16 sm:py-24 bg-slate-50/80 text-slate-900 relative overflow-hidden border-t border-b border-slate-200/80"
         x-data="{ 
            visible: false,
            skills: {{ \Illuminate\Support\Js::from($skills) }},

            initObserver() {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            this.visible = true;
                        }
                    });
                }, { threshold: 0.15 });
                observer.observe(this.$el);
            }
         }"
         x-init="initObserver()">

    {{-- SUBTLE DEVELOPER GRID PATTERN --}}
    <div class="absolute inset-0 z-0 opacity-[0.03] pointer-events-none"
         style="background-image: radial-gradient(#0f172a 1px, transparent 1px); background-size: 24px 24px;"></div>

    {{-- Ambient Background Glows --}}
    <div class="absolute top-1/4 -left-20 w-96 h-96 bg-orange-500/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-1/4 -right-20 w-96 h-96 bg-amber-500/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        {{-- GRID UTAMA: VISI MISI & BINGKAI FOTO TERMINAL --}}
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 items-center max-w-6xl mx-auto">

            {{-- KOLOM KIRI: CARD CONTAINER VISI & MISI --}}
            <div class="lg:col-span-7 space-y-6">
                
                {{-- CARD VISI --}}
                <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-sm border border-slate-200/90 relative overflow-hidden group hover:border-orange-500/50 transition duration-300">
                    <div class="absolute top-0 right-0 translate-x-4 -translate-y-4 w-24 h-24 bg-orange-500/5 rounded-full blur-xl"></div>
                    
                    <div class="flex items-center gap-2 mb-3">
                        <span class="p-2 rounded-xl bg-orange-500/10 text-orange-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                        </span>
                        <span class="text-xs font-bold uppercase tracking-widest text-orange-600">Visi Keahlian PPLG</span>
                    </div>

                    <h2 class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight mb-2">
                        Visi Utama
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-600 font-normal leading-relaxed">
                        Menjadi Kompetensi Keahlian <strong class="text-slate-900 font-semibold">Pengembangan Perangkat Lunak dan Gim (PPLG)</strong> yang unggul, berkarakter, berstandar industri, serta mampu menghasilkan lulusan yang kompeten dan berdaya saing di era digital global.
                    </p>
                </div>

                {{-- CARD MISI --}}
                <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-sm border border-slate-200/90 relative overflow-hidden group hover:border-orange-500/50 transition duration-300">
                    <div class="flex items-center gap-2 mb-4">
                        <span class="p-2 rounded-xl bg-orange-500/10 text-orange-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
                        </span>
                        <span class="text-xs font-bold uppercase tracking-widest text-orange-600">Misi Keahlian PPLG</span>
                    </div>

                    <h2 class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight mb-4">
                        Misi Strategis
                    </h2>
                    
                    <ol role="list" class="space-y-3.5 text-xs sm:text-sm text-slate-600 font-normal leading-relaxed">
                        <li role="listitem" class="flex items-start gap-3">
                            <span class="flex h-5 w-5 sm:h-6 sm:w-6 shrink-0 items-center justify-center rounded-lg bg-orange-600 text-[10px] sm:text-[11px] font-bold text-white shadow-sm mt-0.5">1</span>
                            <span>Menyelenggarakan pembelajaran berbasis proyek (<em>Project-Based Learning</em>) dan standar Teaching Factory (TeFa).</span>
                        </li>
                        <li role="listitem" class="flex items-start gap-3">
                            <span class="flex h-5 w-5 sm:h-6 sm:w-6 shrink-0 items-center justify-center rounded-lg bg-orange-600 text-[10px] sm:text-[11px] font-bold text-white shadow-sm mt-0.5">2</span>
                            <span>Membekali siswa dengan keahlian pemrograman web, mobile app, gim interaktif, dan IoT terkini.</span>
                        </li>
                        <li role="listitem" class="flex items-start gap-3">
                            <span class="flex h-5 w-5 sm:h-6 sm:w-6 shrink-0 items-center justify-center rounded-lg bg-orange-600 text-[10px] sm:text-[11px] font-bold text-white shadow-sm mt-0.5">3</span>
                            <span>Membangun kemitraan strategis yang erat dengan dunia kerja dan industri perangkat lunak skala nasional.</span>
                        </li>
                        <li role="listitem" class="flex items-start gap-3">
                            <span class="flex h-5 w-5 sm:h-6 sm:w-6 shrink-0 items-center justify-center rounded-lg bg-orange-600 text-[10px] sm:text-[11px] font-bold text-white shadow-sm mt-0.5">4</span>
                            <span>Menanamkan nilai kedisiplinan, etika profesi, dan jiwa kewirausahaan digital (<em>technopreneurship</em>).</span>
                        </li>
                    </ol>
                </div>

            </div>

            {{-- KOLOM KANAN: CODE EDITOR BACKDROP + BINGKAI FOTO + FLOATING BADGES --}}
            <div class="lg:col-span-5 relative flex justify-center items-center min-h-[360px] sm:min-h-[440px] pt-4 lg:pt-0">
                
                {{-- Ambient Background Glow --}}
                <div class="absolute inset-0 bg-gradient-to-tr from-orange-500/15 via-amber-500/10 to-transparent rounded-3xl blur-2xl pointer-events-none"></div>

                {{-- 1. TERMINAL / CODE EDITOR BACKDROP --}}
                <div class="absolute inset-x-0 top-1 bottom-1 sm:top-2 sm:bottom-2 bg-slate-950 rounded-3xl shadow-2xl border border-slate-800 p-3.5 sm:p-5 flex flex-col justify-between opacity-95 pointer-events-none">
                    
                    {{-- Header Terminal Mac Style --}}
                    <div class="flex items-center justify-between pb-2.5 sm:pb-3 border-b border-slate-800/80">
                        <div class="flex items-center gap-1.5">
                            <span class="w-2.5 h-2.5 sm:w-3 sm:h-3 rounded-full bg-rose-500/80 inline-block"></span>
                            <span class="w-2.5 h-2.5 sm:w-3 sm:h-3 rounded-full bg-amber-500/80 inline-block"></span>
                            <span class="w-2.5 h-2.5 sm:w-3 sm:h-3 rounded-full bg-emerald-500/80 inline-block"></span>
                        </div>
                        <span class="text-[9px] sm:text-xs font-mono font-semibold text-slate-400 tracking-wide truncate max-w-[160px] sm:max-w-none">pplg_smkn1bangsri.config.js</span>
                        <span class="text-[9px] sm:text-[10px] font-mono font-bold text-emerald-400 bg-emerald-500/10 px-1.5 sm:px-2 py-0.5 rounded-full border border-emerald-500/20">LIVE</span>
                    </div>

                    {{-- Fake Code Lines Background --}}
                    <div class="font-mono text-[9px] sm:text-xs text-slate-500 space-y-1 opacity-25 select-none py-1 sm:py-2">
                        <p><span class="text-orange-400">const</span> <span class="text-blue-400">PPLG_SMKN1Bangsri</span> = {</p>
                        <p class="pl-3 sm:pl-4"><span class="text-amber-300">status</span>: <span class="text-emerald-400">'TeFa Ready'</span>,</p>
                        <p class="pl-3 sm:pl-4"><span class="text-amber-300">focus</span>: [<span class="text-emerald-400">'Software'</span>, <span class="text-emerald-400">'Game Dev'</span>],</p>
                        <p class="pl-3 sm:pl-4"><span class="text-amber-300">quality</span>: <span class="text-orange-400">100</span></p>
                        <p>};</p>
                    </div>

                    {{-- Footer Terminal --}}
                    <div class="pt-2 border-t border-slate-800/80 flex items-center justify-between text-[8px] sm:text-[10px] font-mono text-slate-500">
                        <span>utf-8</span>
                        <span>JavaScript / Node.js</span>
                    </div>
                </div>

                {{-- 2. FLOATING TECH BADGE (KIRI ATAS) --}}
                <div class="absolute -top-3 left-1 sm:-left-2 z-20 bg-slate-950 text-white px-2.5 py-1.5 sm:px-4 sm:py-2 rounded-2xl shadow-xl border border-slate-700 text-[9px] sm:text-xs font-mono font-bold flex items-center gap-1.5 sm:gap-2 animate-[bounce_4s_infinite]">
                    <span class="text-orange-400 font-black">&lt;/&gt;</span>
                    <span>Software Engineering</span>
                </div>

                {{-- 3. FLOATING TECH BADGE (KANAN ATAS) --}}
                <div class="absolute -top-1.5 right-1 sm:-right-2 z-20 bg-orange-600 text-white px-2.5 py-1.5 sm:px-3.5 sm:py-2 rounded-2xl shadow-xl border border-orange-400 text-[9px] sm:text-xs font-bold flex items-center gap-1 sm:gap-1.5">
                    <span>✨</span>
                    <span>Teaching Factory</span>
                </div>

                {{-- 4. FLOATING TECH BADGE (KANAN BAWAH) --}}
                <div class="absolute -bottom-3 right-1 sm:right-4 z-20 bg-white text-slate-900 px-2.5 py-1.5 sm:px-3.5 sm:py-2 rounded-2xl shadow-xl border border-slate-200 text-[9px] sm:text-xs font-bold flex items-center gap-1 sm:gap-1.5">
                    <span class="text-xs sm:text-sm">🎮</span>
                    <span>Game Development</span>
                </div>

                {{-- 5. BINGKAI FOTO BERTINGKAT --}}
                <div class="relative z-10 flex items-center justify-center gap-2.5 sm:gap-5 w-full max-w-[310px] sm:max-w-md mx-auto my-auto py-5 sm:py-6">
                    
                    {{-- FOTO 1 (KIRI) --}}
                    <div class="w-1/2 rounded-2xl bg-white/95 p-1.5 sm:p-2 shadow-2xl border border-slate-200 transform -rotate-3 hover:rotate-0 transition duration-300">
                        <div class="w-full aspect-[4/3] rounded-xl overflow-hidden bg-slate-100">
                            <img src="{{ asset('images/visi-misi/gedung-1.jpg') }}" 
                                 alt="Siswa PPLG SMKN 1 Bangsri di TeFa" 
                                 onerror="this.src='https://placehold.co/400x300/ea580c/ffffff?text=Fasilitas+PPLG'"
                                 class="w-full h-full object-cover">
                        </div>
                    </div>

                    {{-- FOTO 2 (KANAN) --}}
                    <div class="w-1/2 rounded-2xl bg-white/95 p-1.5 sm:p-2 shadow-2xl border border-slate-200 transform rotate-3 hover:rotate-0 transition duration-300 mt-5 sm:mt-10">
                        <div class="w-full aspect-[4/3] rounded-xl overflow-hidden bg-slate-100">
                            <img src="{{ asset('images/visi-misi/gedung-2.jpg') }}" 
                                 alt="Suasana Laboratorium Komputer PPLG" 
                                 onerror="this.src='https://placehold.co/400x300/0f172a/ffffff?text=Siswa+PPLG'"
                                 class="w-full h-full object-cover">
                        </div>
                    </div>

                </div>

            </div>

        </div>

        {{-- KARTU 5 FOKUS KEAHLIAN (KARTU INFORMASI STATIS) --}}
        <div class="mt-14 sm:mt-20 max-w-6xl mx-auto">
            <div class="bg-slate-950 text-white rounded-3xl p-5 sm:p-10 shadow-2xl border border-slate-800 relative overflow-hidden">
                
                {{-- Decorative Code Accent Background Watermark --}}
                <div class="absolute -right-8 -bottom-8 text-slate-800/40 text-7xl sm:text-9xl font-mono font-black pointer-events-none select-none">
                    &lt;/&gt;
                </div>

                {{-- HEADER SECTION KARTU --}}
                <div class="text-center mb-6 sm:mb-8 relative z-10 space-y-1">
                    <span class="text-[10px] sm:text-xs font-extrabold uppercase tracking-widest text-orange-400 block">
                        Kompetensi Inti
                    </span>
                    <h3 class="text-lg sm:text-2xl font-black text-white tracking-tight">
                        Fokus Utama Pembelajaran di Keahlian PPLG
                    </h3>
                </div>

                {{-- GRID 5 CARD FOKUS KEAHLIAN (STATIS - TIDAK BISA DIKLIK) --}}
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-3 sm:gap-4 text-center items-stretch justify-center relative z-10">
                    
                    {{-- Loop Kartu Kompetensi Statis --}}
                    <template x-for="(skill, index) in skills" :key="skill.id">
                        <div x-show="visible"
                             x-transition:enter="transition ease-out duration-500 transform"
                             x-transition:enter-start="opacity-0 translate-y-6"
                             x-transition:enter-end="opacity-100 translate-y-0"
                             :style="`transition-delay: ${index * 100}ms`"
                             class="flex flex-col items-center p-3.5 sm:p-4 rounded-2xl bg-slate-900 text-white shadow-md border border-slate-800 text-center select-none"
                             :class="(index === 4) ? 'col-span-2 sm:col-span-1' : ''">
                            
                            {{-- Icon Container --}}
                            <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-orange-500/10 border border-orange-500/30 text-orange-400 flex items-center justify-center mb-2.5 sm:mb-3 shrink-0">
                                <template x-if="skill.id === 'db'">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s-8 1.79-8-4"/></svg>
                                </template>
                                <template x-if="skill.id === 'algo'">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/></svg>
                                </template>
                                <template x-if="skill.id === 'uiux'">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/></svg>
                                </template>
                                <template x-if="skill.id === 'web'">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                                </template>
                                <template x-if="skill.id === 'mobile'">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                                </template>
                            </div>

                            <span class="text-[11px] sm:text-xs font-bold text-white leading-snug" x-text="skill.name"></span>
                            <span class="text-[9px] sm:text-[10px] text-slate-400 mt-1 font-medium leading-tight" x-text="skill.sub"></span>
                        </div>
                    </template>

                </div>
            </div>
        </div>

    </div>

</section>