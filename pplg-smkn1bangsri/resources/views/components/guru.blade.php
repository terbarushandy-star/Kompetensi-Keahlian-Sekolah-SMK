{{-- SECTION TIM PENGAJAR & STAF PPLG --}}
<section id="guru" 
         class="scroll-mt-20 sm:scroll-mt-24 py-16 sm:py-24 bg-slate-50/80 text-slate-900 border-t border-b border-slate-200/80 relative overflow-hidden">
    
    {{-- SUBTLE DEVELOPER GRID PATTERN --}}
    <div class="absolute inset-0 z-0 opacity-[0.03] pointer-events-none"
         style="background-image: radial-gradient(#0f172a 1px, transparent 1px); background-size: 24px 24px;"></div>

    {{-- Soft Ambient Glow --}}
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[32rem] h-[32rem] bg-orange-500/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        {{-- HEADER SECTION --}}
        <div class="text-center max-w-3xl mx-auto mb-12 sm:mb-16">
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-black text-slate-900 tracking-tight leading-snug sm:leading-tight">
                Tim Pengajar & Staf <span class="bg-gradient-to-r from-orange-600 to-amber-500 bg-clip-text text-transparent">Keahlian PPLG</span>
            </h2>
            <div class="w-16 sm:w-20 h-1.5 bg-gradient-to-r from-orange-500 to-amber-500 mx-auto rounded-full mt-3 shadow-xs"></div>
            <p class="mt-3 text-xs sm:text-sm text-slate-600 leading-relaxed max-w-xl mx-auto font-normal">
                Tenaga pendidik profesional dan staf pendukung yang berdedikasi membimbing serta mendampingi siswa PPLG SMKN 1 Bangsri.
            </p>
        </div>

        {{-- GRID TIM GURU & STAF --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 max-w-6xl mx-auto items-stretch">
            
            @forelse($listGuru ?? [] as $guru)
                @php
                    $isStaf = data_get($guru, 'is_staf', false);
                    $nama = data_get($guru, 'nama');
                    $jabatan = data_get($guru, 'jabatan');
                    $mapel = data_get($guru, 'mapel', 'Produktif PPLG');
                    $fotoUrl = data_get($guru, 'foto_url') ?: asset('images/guru/default.jpg');
                @endphp

                <div class="group bg-white p-6 sm:p-7 rounded-3xl border border-slate-200/90 {{ $isStaf ? 'border-t-4 border-t-slate-600' : 'border-t-4 border-t-orange-500' }} text-center shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between h-full hover:-translate-y-1.5 relative overflow-hidden">
                    
                    <div>
                        {{-- FOTO PROFIL --}}
                        <div class="w-28 h-28 sm:w-32 sm:h-32 mx-auto rounded-full bg-slate-100 flex items-center justify-center p-1.5 overflow-hidden border-2 {{ $isStaf ? 'border-slate-300' : 'border-orange-500/40' }} mb-5 shadow-inner shrink-0 group-hover:border-orange-500 transition duration-300">
                            <img src="{{ $fotoUrl }}" 
                                 alt="{{ $nama }}" 
                                 loading="lazy"
                                 onerror="this.src='https://placehold.co/300x300/ea580c/ffffff?text=Foto+Guru'"
                                 class="w-full h-full object-cover rounded-full group-hover:scale-105 transition-transform duration-500">
                        </div>

                        {{-- NAMA GURU & GELAR --}}
                        <div class="min-h-[3.25rem] flex items-center justify-center mb-2 px-1">
                            <h3 class="font-black text-slate-900 text-sm sm:text-base group-hover:text-orange-600 transition leading-snug line-clamp-2">
                                {{ $nama }}
                            </h3>
                        </div>

                        {{-- JABATAN / PERAN --}}
                        <div class="mb-5">
                            <span class="inline-block px-3 py-1 rounded-full text-[10px] sm:text-xs font-extrabold uppercase tracking-wider {{ $isStaf ? 'bg-slate-100 text-slate-700 border border-slate-200' : 'bg-orange-50 text-orange-600 border border-orange-200' }}">
                                {{ $jabatan }}
                            </span>
                        </div>
                    </div>

                    {{-- MAPEL / BIDANG LAYANAN --}}
                    <div class="pt-4 border-t border-slate-100 text-left bg-slate-50/80 p-3.5 rounded-2xl mt-auto">
                        <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400 block mb-0.5">
                            {{ $isStaf ? 'Bidang Layanan:' : 'Mata Pelajaran Ampuan:' }}
                        </span>
                        <p class="text-xs font-bold text-slate-800 leading-snug line-clamp-2">
                            {{ $mapel }}
                        </p>
                    </div>

                </div>
            @empty
                <div class="col-span-full text-center py-12 bg-white rounded-3xl border border-slate-200/80 p-8">
                    <div class="w-12 h-12 mx-auto mb-3 rounded-2xl bg-orange-50 border border-orange-200 flex items-center justify-center text-orange-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <p class="text-slate-600 font-bold text-sm">Belum ada data tim pengajar yang ditampilkan.</p>
                    <p class="text-xs text-slate-400 mt-1">Data guru akan diperbarui secara berkala.</p>
                </div>
            @endforelse

        </div>

    </div>
</section>