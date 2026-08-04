{{-- SECTION PRESTASI SISWA & GURU PPLG (CUPLIKAN BERANDA) --}}
@php
    $prestasis = $prestasis ?? [
        [
            'kategori' => 'siswa',
            'judul' => 'Juara 1 LKS Web Technologies 2026',
            'peraih' => 'Ahmad Rizky Pratama',
            'kelas' => 'XII PPLG 1',
            'pembimbing' => 'Bpk. Ahmad Syafii, S.Kom',
            'tingkat' => 'Tingkat Provinsi',
            'deskripsi' => "Siswa PPLG SMKN 1 Bangsri berhasil meraih Juara 1 dalam ajang Lomba Kompetensi Siswa (LKS) bidang Web Technologies tingkat Provinsi.",
            'tanggal_lengkap' => 'Sabtu, 10 Mei 2026',
            'gambar' => asset('images/prestasi/lks-web.jpg'),
        ],
        [
            'kategori' => 'guru',
            'judul' => 'Juara 1 Guru Inovatif Pembelajaran Media Digital 2026',
            'peraih' => 'Bpk. Ahmad Syafii, S.Kom',
            'tingkat' => 'Tingkat Nasional',
            'deskripsi' => "Penghargaan karya inovasi media pembelajaran berbasis Teaching Factory dalam Ajang Anugerah Guru Inovatif Indonesia.",
            'tanggal_lengkap' => 'Kamis, 15 Januari 2026',
            'gambar' => asset('images/prestasi/guru-inovatif.jpg'),
        ],
        [
            'kategori' => 'siswa',
            'judul' => 'Best Student Game Award - Festival Digital',
            'peraih' => 'Tim Game Dev PPLG',
            'kelas' => 'XI PPLG 2',
            'pembimbing' => 'Ibu Nurul Hidayah, M.T.',
            'tingkat' => 'Tingkat Nasional',
            'deskripsi' => "Game 2D Adventure bertema kebudayaan lokal karya siswa PPLG SMKN 1 Bangsri memenangkan penghargaan Best Student Game.",
            'tanggal_lengkap' => 'Kamis, 20 November 2025',
            'gambar' => asset('images/prestasi/game-award.jpg'),
        ],
        [
            'kategori' => 'guru',
            'judul' => 'Instruktur Terbaik Sertifikasi Profesi Junior Web Developer',
            'peraih' => 'Ibu Nurul Hidayah, M.T.',
            'tingkat' => 'Tingkat Provinsi',
            'deskripsi' => "Meraih predikat Instruktur Pelatihan Vokasi Terbaik berkat capaian kelulusan 100% siswa bimbingan.",
            'tanggal_lengkap' => 'Senin, 10 Agustus 2025',
            'gambar' => asset('images/prestasi/guru-instruktur.jpg'),
        ],
        [
            'kategori' => 'siswa',
            'judul' => 'Juara 2 Hackathon Mobile App Development',
            'peraih' => 'Siti Nurhaliza & Tim',
            'kelas' => 'XII PPLG 2',
            'pembimbing' => 'Bpk. Eko Prasetyo, S.ST',
            'tingkat' => 'Tingkat Nasional',
            'deskripsi' => "Tim PPLG berhasil menyabet Juara 2 pada kompetisi Hackathon 24 Jam dengan merancang aplikasi mobile penanganan sampah.",
            'tanggal_lengkap' => 'Senin, 15 September 2025',
            'gambar' => asset('images/prestasi/hackathon.jpg'),
        ],
        [
            'kategori' => 'siswa',
            'judul' => '100% Lulus Sertifikasi Profesi Programmer BNSP',
            'peraih' => 'Seluruh Angkatan Lulusan',
            'kelas' => 'XII PPLG 1 & 2',
            'pembimbing' => 'Tim Penguji LSP-P1',
            'tingkat' => 'Sertifikasi Nasional',
            'deskripsi' => "Seluruh siswa kelas XII PPLG SMKN 1 Bangsri dinyatakan KOMPETEN oleh Asesor BNSP.",
            'tanggal_lengkap' => 'Minggu, 01 Juni 2025',
            'gambar' => asset('images/prestasi/bnsp.jpg'),
        ],
    ];
@endphp

<section id="prestasi" 
         class="scroll-mt-20 sm:scroll-mt-24 py-16 sm:py-24 bg-slate-50/80 text-slate-900 border-t border-b border-slate-200/80 relative overflow-hidden"
         x-data="{ 
            allPrestasis: {{ \Illuminate\Support\Js::from($prestasis) }},
            selectedKategori: 'semua',
            openModal: false, 
            isVisible: false,
            activePrestasi: { kategori: '', judul: '', peraih: '', kelas: '', pembimbing: '', tingkat: '', deskripsi: '', tanggal_lengkap: '', tanggal_formatted: '', gambar: '' },

            get berandaPrestasis() {
                let list = this.selectedKategori === 'semua' 
                    ? this.allPrestasis 
                    : this.allPrestasis.filter(item => item.kategori === this.selectedKategori);
                
                return list.slice(0, 6);
            }
         }"
         @keydown.escape.window="openModal = false"
         x-init="
            const observer = new IntersectionObserver((entries) => {
                if (entries[0].isIntersecting) {
                    isVisible = true;
                }
            }, { threshold: 0.1 });
            observer.observe($el);
         ">

    {{-- SUBTLE DEVELOPER GRID PATTERN --}}
    <div class="absolute inset-0 z-0 opacity-[0.03] pointer-events-none"
         style="background-image: radial-gradient(#0f172a 1px, transparent 1px); background-size: 24px 24px;"></div>

    {{-- Soft Ambient Glow --}}
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[32rem] h-[32rem] bg-orange-500/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        {{-- HEADER SECTION --}}
        <div class="relative text-center max-w-4xl mx-auto mb-8 sm:mb-12 min-h-[90px] sm:min-h-[110px] flex flex-col justify-center items-center px-2">

            {{-- FOTO PIALA KIRI --}}
            <div class="absolute left-0 sm:left-2 lg:left-0 xl:-left-8 top-1/2 -translate-y-1/2 pointer-events-none transition-all duration-1000 ease-out"
                 :class="isVisible ? 'translate-x-0 opacity-100' : '-translate-x-16 sm:-translate-x-32 opacity-0'">
                <img src="{{ asset('images/prestasi/piala-kiri.png') }}" 
                     alt="Foto Piala Kiri" 
                     onerror="this.src='https://placehold.co/100x100/ea580c/ffffff?text=Piala'"
                     class="w-11 h-11 sm:w-20 sm:h-20 lg:w-28 lg:h-28 object-contain -rotate-6 drop-shadow-md sm:drop-shadow-xl filter"
                     :class="isVisible ? 'animate-bounce [animation-duration:3.5s]' : ''">
            </div>

            {{-- FOTO PIALA KANAN --}}
            <div class="absolute right-0 sm:right-2 lg:right-0 xl:-right-8 top-1/2 -translate-y-1/2 pointer-events-none transition-all duration-1000 ease-out"
                 :class="isVisible ? 'translate-x-0 opacity-100' : 'translate-x-16 sm:translate-x-32 opacity-0'">
                <img src="{{ asset('images/prestasi/piala-kanan.png') }}" 
                     alt="Foto Piala Kanan" 
                     onerror="this.src='https://placehold.co/100x100/ea580c/ffffff?text=Piala'"
                     class="w-11 h-11 sm:w-20 sm:h-20 lg:w-28 lg:h-28 object-contain rotate-6 drop-shadow-md sm:drop-shadow-xl filter"
                     :class="isVisible ? 'animate-bounce [animation-duration:4s]' : ''">
            </div>

            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-black text-slate-900 leading-snug sm:leading-tight tracking-tight px-8 sm:px-16 lg:px-2">
                Prestasi Siswa & Guru <span class="bg-gradient-to-r from-orange-600 to-amber-500 bg-clip-text text-transparent">Keahlian PPLG</span>
            </h2>
            
            <div class="w-16 sm:w-20 h-1.5 bg-gradient-to-r from-orange-500 to-amber-500 mx-auto rounded-full mt-3 shadow-xs"></div>
        </div>

        {{-- FILTER DROPDOWN --}}
        <div class="max-w-6xl mx-auto mb-6 sm:mb-8 flex justify-end items-center px-1">
            <div class="flex items-center gap-2.5 w-full sm:w-auto justify-between sm:justify-end">
                <label for="filter-kategori-prestasi" class="text-xs sm:text-sm font-bold text-slate-700 shrink-0">Kategori Prestasi:</label>
                <select id="filter-kategori-prestasi"
                        :value="selectedKategori" 
                        @change="selectedKategori = $event.target.value" 
                        class="text-xs sm:text-sm font-bold text-slate-800 bg-white border border-slate-200/90 rounded-xl px-3.5 py-2 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-500 cursor-pointer shadow-sm">
                    <option value="semua">Semua Prestasi</option>
                    <option value="siswa">Prestasi Siswa & Siswi</option>
                    <option value="guru">Prestasi Guru</option>
                </select>
            </div>
        </div>

        {{-- GRID KARTU PRESTASI --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 max-w-6xl mx-auto">
            <template x-for="(item, index) in berandaPrestasis" :key="index">
                <div @click="
                        openModal = true; 
                        activePrestasi = item;
                     "
                     tabindex="0"
                     role="button"
                     :aria-label="'Lihat detail prestasi ' + item.judul"
                     class="group rounded-3xl bg-white border border-slate-200/90 border-t-4 border-t-orange-500 overflow-hidden shadow-sm hover:shadow-xl hover:border-orange-500 transition-all duration-300 flex flex-col justify-between cursor-pointer select-none hover:-translate-y-1.5 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-500">
                    
                    <div>
                        <div class="w-full aspect-[4/3] bg-slate-100 flex items-center justify-center p-2 overflow-hidden relative border-b border-slate-100">
                            <img :src="item.gambar_url || item.gambar" 
                                 :alt="item.judul" 
                                 onerror="this.src='https://placehold.co/400x300/ea580c/ffffff?text=Prestasi+PPLG'"
                                 class="max-h-full w-auto max-w-full object-contain mx-auto transition-transform duration-500 group-hover:scale-105">
                        </div>

                        <div class="p-5 sm:p-6 space-y-3">
                            <h3 x-text="item.judul" class="text-base sm:text-lg font-bold text-slate-900 group-hover:text-orange-600 transition leading-snug"></h3>

                            <template x-if="item.kategori === 'siswa'">
                                <div class="space-y-1.5 text-xs text-slate-600 border-t border-slate-100 pt-3 font-normal">
                                    <div><span class="text-slate-400 font-medium">Peraih:</span> <strong x-text="item.peraih" class="text-slate-900 font-bold"></strong></div>
                                    <div><span class="text-slate-400 font-medium">Kelas:</span> <strong x-text="item.kelas" class="text-slate-800 font-semibold"></strong></div>
                                    <div><span class="text-slate-400 font-medium">Pembimbing:</span> <strong x-text="item.pembimbing" class="text-slate-800 font-semibold"></strong></div>
                                    <div><span class="text-slate-400 font-medium">Tingkat:</span> <strong x-text="item.tingkat" class="text-orange-600 font-bold"></strong></div>
                                </div>
                            </template>

                            <template x-if="item.kategori === 'guru'">
                                <div class="space-y-1.5 text-xs text-slate-600 border-t border-slate-100 pt-3 font-normal">
                                    <div><span class="text-slate-400 font-medium">Nama Guru:</span> <strong x-text="item.peraih" class="text-slate-900 font-bold"></strong></div>
                                    <div><span class="text-slate-400 font-medium">Tingkat:</span> <strong x-text="item.tingkat" class="text-orange-600 font-bold"></strong></div>
                                </div>
                            </template>
                        </div>
                    </div>

                    <div class="px-5 sm:px-6 pb-5 pt-0">
                        <div class="pt-3 border-t border-slate-100 flex items-center justify-between">
                            <span class="text-[11px] font-bold text-slate-400" x-text="item.tanggal_formatted || item.tanggal_lengkap || item.tanggal"></span>
                            <span class="inline-flex items-center gap-1.5 text-xs font-extrabold text-orange-600 group-hover:text-orange-700 transition">
                                Detail 
                                <svg class="w-3.5 h-3.5 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
                                </svg>
                            </span>
                        </div>
                    </div>

                </div>
            </template>
        </div>

        {{-- TOMBOL 'LIHAT SEMUA PRESTASI' --}}
        <div class="mt-10 sm:mt-14 text-center">
            <a href="{{ route('prestasi.index') }}" 
               class="inline-flex items-center gap-2.5 px-7 py-3.5 bg-white border-2 border-orange-500 text-orange-600 hover:bg-orange-600 hover:text-white rounded-2xl font-black text-xs sm:text-sm transition-all duration-300 shadow-sm hover:shadow-lg hover:scale-105 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-500">
                <span>Lihat Semua Prestasi PPLG</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                </svg>
            </a>
        </div>

    </div>

    {{-- MODAL DETAIL PRESTASI --}}
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
         aria-labelledby="modal-prestasi-title"
         class="fixed inset-0 z-50 flex items-center justify-center p-3 sm:p-5 bg-slate-950/80 backdrop-blur-md">
        
        <div @click.away="openModal = false"
             class="relative w-full max-w-4xl max-h-[90vh] bg-white text-slate-900 rounded-3xl shadow-2xl overflow-hidden border border-slate-200 flex flex-col">
            
            <button @click="openModal = false" 
                    type="button"
                    aria-label="Tutup Modal Detail Prestasi"
                    class="absolute top-3.5 right-3.5 z-40 w-9 h-9 bg-slate-950/80 hover:bg-orange-600 text-white rounded-full flex items-center justify-center transition-all duration-200 cursor-pointer shadow-md border border-white/20 backdrop-blur-xs focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-500">✕</button>

            <div class="overflow-y-auto flex-1 p-5 sm:p-8">
                <div class="grid grid-cols-1 md:grid-cols-12 gap-6 md:gap-8 items-start">
                    
                    <div class="md:col-span-5 bg-slate-950 rounded-2xl p-3 flex items-center justify-center min-h-[220px] sm:min-h-[280px] max-h-[380px] sm:max-h-[420px] overflow-hidden border border-slate-800 shadow-inner">
                        <img :src="activePrestasi.gambar_url || activePrestasi.gambar" 
                             :alt="activePrestasi.judul" 
                             onerror="this.src='https://placehold.co/500x400/ea580c/ffffff?text=Detail+Prestasi'"
                             class="max-h-[320px] sm:max-h-[380px] w-auto max-w-full object-contain mx-auto rounded-lg shadow-md">
                    </div>

                    <div class="md:col-span-7 space-y-4">
                        <span class="px-3 py-1 bg-orange-50 text-orange-600 border border-orange-200 rounded-md text-[11px] sm:text-xs font-extrabold uppercase tracking-wider inline-block" 
                              x-text="activePrestasi.kategori === 'guru' ? 'Prestasi Guru' : 'Prestasi Siswa'"></span>

                        <h3 id="modal-prestasi-title" x-text="activePrestasi.judul" class="text-lg sm:text-2xl font-black text-slate-900 leading-snug"></h3>

                        <template x-if="activePrestasi.kategori === 'siswa'">
                            <div class="bg-slate-50 border border-slate-200/80 p-4 rounded-2xl space-y-1.5 text-xs sm:text-sm font-normal">
                                <div><span class="text-slate-500 font-medium">Peraih:</span> <strong x-text="activePrestasi.peraih" class="text-slate-900 font-extrabold"></strong></div>
                                <div><span class="text-slate-500 font-medium">Kelas:</span> <strong x-text="activePrestasi.kelas" class="text-slate-900 font-bold"></strong></div>
                                <div><span class="text-slate-500 font-medium">Pembimbing:</span> <strong x-text="activePrestasi.pembimbing" class="text-slate-900 font-bold"></strong></div>
                                <div><span class="text-slate-500 font-medium">Tingkat Kejuaraan:</span> <strong x-text="activePrestasi.tingkat" class="text-orange-600 font-bold"></strong></div>
                            </div>
                        </template>

                        <template x-if="activePrestasi.kategori === 'guru'">
                            <div class="bg-slate-50 border border-slate-200/80 p-4 rounded-2xl space-y-1.5 text-xs sm:text-sm font-normal">
                                <div><span class="text-slate-500 font-medium">Nama Guru:</span> <strong x-text="activePrestasi.peraih" class="text-slate-900 font-extrabold"></strong></div>
                                <div><span class="text-slate-500 font-medium">Tingkat Kejuaraan:</span> <strong x-text="activePrestasi.tingkat" class="text-orange-600 font-bold"></strong></div>
                            </div>
                        </template>

                        <div class="pt-1"><div x-html="activePrestasi.deskripsi" class="text-xs sm:text-sm text-slate-600 leading-relaxed whitespace-pre-line space-y-2 font-normal"></div></div>

                        <div class="pt-3 border-t border-slate-100 text-[11px] sm:text-xs font-bold text-slate-400">
                            <span x-text="activePrestasi.tanggal_formatted || activePrestasi.tanggal_lengkap || activePrestasi.tanggal"></span>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

</section>