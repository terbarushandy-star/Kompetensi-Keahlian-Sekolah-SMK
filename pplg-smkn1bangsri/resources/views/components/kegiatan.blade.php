{{-- SECTION KEGIATAN & BERITA PPLG (CUPLIKAN BERANDA) --}}
@php
    $kegiatans = (isset($kegiatans) && count($kegiatans) > 0) ? $kegiatans : [
        [
            'judul' => 'Kunjungan Industri & Benchmarking Software House 2026',
            'tanggal' => '15/05/2026',
            'gambar' => asset('images/kegiatan/kegiatan-1.jpg'),
            'deskripsi' => "Siswa PPLG SMKN 1 Bangsri melakukan kunjungan industri ke mitra perusahaan teknologi untuk melihat langsung workflow software house."
        ],
        [
            'judul' => 'Workshop UI/UX Design & Prototyping bersama Praktisi',
            'tanggal' => '28/04/2026',
            'gambar' => asset('images/kegiatan/kegiatan-2.jpg'),
            'deskripsi' => "Pelatihan intensif perancangan antarmuka aplikasi menggunakan Figma bersama UI/UX Designer profesional."
        ],
        [
            'judul' => 'Pameran Proyek Teaching Factory & Demo Produk Software',
            'tanggal' => '10/03/2026',
            'gambar' => asset('images/kegiatan/kegiatan-3.jpg'),
            'deskripsi' => 'Gelar karya dan unjuk gigi hasil produk aplikasi web, mobile, serta project IoT rintisan siswa PPLG.'
        ],
        [
            'judul' => 'Sertifikasi Kompetensi Keahlian Pemrograman Web',
            'tanggal' => '22/02/2026',
            'gambar' => asset('images/kegiatan/kegiatan-4.jpg'),
            'deskripsi' => 'Pelaksanaan uji kompetensi keahlian koding untuk memastikan kelulusan siswa memiliki standar BNSP.'
        ],
        [
            'judul' => 'Hackathon Internal PPLG: Inovasi Solusi Digital Sekolah',
            'tanggal' => '14/01/2026',
            'gambar' => asset('images/kegiatan/kegiatan-5.jpg'),
            'deskripsi' => 'Kompetisi koding 24 jam tingkat jurusan untuk memecahkan masalah sistem informasi sekolah.'
        ],
        [
            'judul' => 'Pelatihan IoT & Embedded Systems Mikrokontroler ESP32',
            'tanggal' => '05/12/2025',
            'gambar' => asset('images/kegiatan/kegiatan-6.jpg'),
            'deskripsi' => 'Praktikum mendalam perakitan sensor hardware pintar yang dihubungkan ke Cloud Server.'
        ],
    ];
@endphp

<section id="kegiatan" 
         class="scroll-mt-20 sm:scroll-mt-24 py-16 sm:py-24 bg-slate-50/80 text-slate-900 border-t border-b border-slate-200/80 relative overflow-hidden"
         x-data="{ 
            allKegiatans: {{ \Illuminate\Support\Js::from($kegiatans) }},
            openModal: false, 
            activeKegiatan: { judul: '', tanggal: '', gambar: '', deskripsi: '' },

            get berandaKegiatans() {
                return this.allKegiatans.slice(0, 6);
            },

            switchDetail(item) {
                this.activeKegiatan = item;
                if (this.$refs.modalBody) {
                    this.$refs.modalBody.scrollTop = 0;
                }
            }
         }"
         @keydown.escape.window="openModal = false">

    {{-- SUBTLE DEVELOPER GRID PATTERN --}}
    <div class="absolute inset-0 z-0 opacity-[0.03] pointer-events-none"
         style="background-image: radial-gradient(#0f172a 1px, transparent 1px); background-size: 24px 24px;"></div>

    {{-- Soft Ambient Glow --}}
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[32rem] h-[32rem] bg-orange-500/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        {{-- HEADER SECTION (TITLE CASE STANDARDIZED) --}}
        <div class="text-center max-w-4xl mx-auto mb-10 sm:mb-14">
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-black text-slate-900 leading-snug sm:leading-tight tracking-tight px-2">
                Kegiatan & Berita Terbaru <span class="bg-gradient-to-r from-orange-600 to-amber-500 bg-clip-text text-transparent">Keahlian PPLG</span>
            </h2>
            <div class="w-16 sm:w-20 h-1.5 bg-gradient-to-r from-orange-500 to-amber-500 mx-auto rounded-full mt-3 shadow-xs"></div>
        </div>

        {{-- GRID KARTU KEGIATAN --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 max-w-6xl mx-auto">
            <template x-for="(item, index) in berandaKegiatans" :key="index">
                <div @click="
                        openModal = true; 
                        switchDetail(item);
                     "
                     tabindex="0"
                     role="button"
                     :aria-label="'Lihat detail kegiatan ' + item.judul"
                     class="group rounded-3xl bg-white border border-slate-200/90 overflow-hidden shadow-sm hover:shadow-xl hover:border-orange-500 transition-all duration-300 flex flex-col justify-between cursor-pointer select-none hover:-translate-y-1.5 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-500">
                    
                    <div>
                        <div class="w-full aspect-[4/3] bg-slate-100 flex items-center justify-center p-2 overflow-hidden relative border-b border-slate-100">
                            <img :src="item.gambar_url || item.gambar" 
                                 :alt="item.judul" 
                                 onerror="this.src='https://placehold.co/400x300/ea580c/ffffff?text=Kegiatan+PPLG'"
                                 class="max-h-full w-auto max-w-full object-contain mx-auto transition-transform duration-500 group-hover:scale-105">
                        </div>

                        <div class="p-5 sm:p-6">
                            <span x-text="item.tanggal_formatted || item.tanggal" class="text-xs font-extrabold text-orange-600 block mb-1.5"></span>
                            <h3 x-text="item.judul" class="text-base sm:text-lg font-bold text-slate-900 group-hover:text-orange-600 transition leading-snug line-clamp-2"></h3>
                        </div>
                    </div>

                    <div class="px-5 sm:px-6 pb-5 pt-0">
                        <span class="inline-flex items-center gap-1.5 text-xs font-extrabold text-orange-600 group-hover:text-orange-700 transition">
                            Lihat selengkapnya 
                            <svg class="w-3.5 h-3.5 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
                            </svg>
                        </span>
                    </div>

                </div>
            </template>
        </div>

        {{-- TOMBOL 'LIHAT SEMUA KEGIATAN' --}}
        <div class="mt-10 sm:mt-14 text-center">
            <a href="{{ route('kegiatan.index') }}" 
               class="inline-flex items-center gap-2.5 px-7 py-3.5 bg-white border-2 border-orange-500 text-orange-600 hover:bg-orange-600 hover:text-white rounded-2xl font-black text-xs sm:text-sm transition-all duration-300 shadow-sm hover:shadow-lg hover:scale-105 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-500">
                <span>Lihat Semua Kegiatan PPLG</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                </svg>
            </a>
        </div>

    </div>

    {{-- MODAL DETAIL KEGIATAN --}}
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
         aria-labelledby="modal-kegiatan-title"
         class="fixed inset-0 z-50 flex items-center justify-center p-3 sm:p-5 bg-slate-950/80 backdrop-blur-md">
        
        <div @click.away="openModal = false" class="relative w-full max-w-5xl max-h-[90vh] bg-white text-slate-900 rounded-3xl shadow-2xl overflow-hidden border border-slate-200 flex flex-col">
            <button @click="openModal = false" 
                    type="button"
                    aria-label="Tutup Modal Detail Kegiatan"
                    class="absolute top-4 right-4 z-40 w-9 h-9 bg-slate-950/80 hover:bg-orange-600 text-white rounded-full flex items-center justify-center transition-all duration-200 cursor-pointer shadow-md border border-white/20 backdrop-blur-xs focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-500">✕</button>

            <div class="p-6 sm:p-8 lg:p-10 overflow-y-auto flex-1" x-ref="modalBody">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-10">
                    <div class="lg:col-span-2 space-y-5">
                        <div class="flex items-center gap-3 text-xs font-extrabold text-orange-600">
                            <span x-text="activeKegiatan.tanggal_formatted || activeKegiatan.tanggal" class="bg-orange-50 px-3 py-1 rounded-md border border-orange-200"></span>
                            <span class="text-slate-300">•</span>
                            <span class="text-slate-500 font-bold">Kegiatan Keahlian PPLG</span>
                        </div>
                        <h3 id="modal-kegiatan-title" x-text="activeKegiatan.judul" class="text-xl sm:text-2xl lg:text-3xl font-black text-slate-900 leading-snug"></h3>
                        <div class="bg-slate-950 rounded-2xl p-3 flex items-center justify-center min-h-[260px] max-h-[400px] overflow-hidden border border-slate-800 shadow-inner">
                            <img :src="activeKegiatan.gambar_url || activeKegiatan.gambar" 
                                 :alt="activeKegiatan.judul" 
                                 onerror="this.src='https://placehold.co/600x400/ea580c/ffffff?text=Detail+Kegiatan'"
                                 class="max-h-[360px] w-auto max-w-full object-contain mx-auto rounded-lg shadow-md">
                        </div>
                        <div x-html="activeKegiatan.deskripsi" class="text-xs sm:text-sm text-slate-600 leading-relaxed whitespace-pre-line space-y-4 pt-2 font-normal"></div>
                    </div>

                    <div class="lg:col-span-1 border-t lg:border-t-0 lg:border-l border-slate-200/80 lg:pl-8 pt-6 lg:pt-0">
                        <div class="flex items-center gap-2 mb-4">
                            <span class="w-1.5 h-5 bg-orange-600 rounded-full"></span>
                            <h4 class="text-base sm:text-lg font-black text-slate-900">Kegiatan Lainnya</h4>
                        </div>
                        <div class="space-y-4">
                            <template x-for="(rec, rIdx) in allKegiatans.filter(k => k.judul !== activeKegiatan.judul).slice(0, 5)" :key="rIdx">
                                <div @click="switchDetail(rec)" 
                                     tabindex="0"
                                     role="button"
                                     class="group flex items-start gap-3 p-2.5 rounded-2xl hover:bg-slate-50 border border-transparent hover:border-slate-200 transition duration-200 cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-500">
                                    <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-xl bg-slate-100 overflow-hidden shrink-0 border border-slate-200/80 flex items-center justify-center p-1">
                                        <img :src="rec.gambar_url || rec.gambar" 
                                             :alt="rec.judul" 
                                             onerror="this.src='https://placehold.co/150x150/ea580c/ffffff?text=Thumbnail'"
                                             class="max-h-full max-w-full object-contain group-hover:scale-105 transition duration-300">
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <span x-text="rec.tanggal_formatted || rec.tanggal" class="text-[10px] font-extrabold text-orange-600 block"></span>
                                        <h5 x-text="rec.judul" class="text-xs font-bold text-slate-900 group-hover:text-orange-600 transition line-clamp-2 leading-snug mt-0.5"></h5>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</section>