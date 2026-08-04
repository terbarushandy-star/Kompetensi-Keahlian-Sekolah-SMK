{{-- SECTION FASILITAS & SARANA REAL PPLG SMKN 1 BANGSRI --}}
@php
    $fasilitas = [
        [
            'judul' => 'Lab Praktikum Komputer',
            'kategori' => '2 Ruang Lab Utama',
            'deskripsi' => 'Terdiri dari 2 laboratorium komputer ber-AC berstandar industri yang digunakan untuk praktikum koding harian, pemrograman web, mobile, dan basis data.',
            'images' => [
                asset('images/fasilitas/lab-praktikum-1.jpg'),
                asset('images/fasilitas/lab-praktikum-2.jpg')
            ],
            'highlight' => '72+ Unit PC High-Spec',
            'tags' => ['Full AC', 'Intel Core i7/Ryzen', 'Fiber Optic'],
            'specs' => [
                '2 Ruang Lab Komputer Terpisah',
                '72+ Unit PC Komputer High-Spec',
                'Koneksi Internet Dedicated Fiber Optic',
                'Full AC, Proyektor HD, & Sound System'
            ]
        ],
        [
            'judul' => 'Workspace Teaching Factory',
            'kategori' => 'TeFa Bawah & Atas',
            'deskripsi' => 'Ruang TeFa Bawah sebagai area kerja produksi proyek riil klien, serta Ruang TeFa Atas khusus area diskusi, ideasi, dan pitching produk software.',
            'images' => [
                asset('images/fasilitas/tefa-bawah.jpg'),
                asset('images/fasilitas/tefa-atas.jpg')
            ],
            'highlight' => 'Software House Model',
            'tags' => ['2 Lantai Studio', 'Scrum / Agile', 'Pitching Area'],
            'specs' => [
                'Studio Production 2 Lantai Operasional',
                'Meeting & Pitching Area Ber-AC',
                'Management Proyek Berbasis Agile/Scrum',
                'Suasana Kerja Standar Software House'
            ]
        ],
        [
            'judul' => 'Ruang Kelas Teori Pembelajaran',
            'kategori' => '2 Ruang Kelas Teori',
            'deskripsi' => 'Ruang kelas teori yang nyaman dan kondusif untuk pendalaman materi logika komputasi, algoritma dasar, analisis sistem, dan diskusi kelompok.',
            'images' => [
                asset('images/fasilitas/kelas-teori-1.jpg'),
                asset('images/fasilitas/kelas-teori-2.jpg')
            ],
            'highlight' => 'Kelas Teori Kondusif',
            'tags' => ['Proyektor HD', 'Audio System', 'Ergonomis'],
            'specs' => [
                '2 Kelas Teori Kondusif & Clean',
                'Proyektor HD & Screen Presentasi',
                'Meja & Kursi Siswa Ergonomis',
                'Pencahayaan & Ventilasi Sehat'
            ]
        ],
        [
            'judul' => 'Lab Internet of Things (IoT)',
            'kategori' => 'Hardware & IoT Studio',
            'deskripsi' => 'Fasilitas praktikum mikrokontroler dan perangkat keras pintar yang terhubung langsung dengan sistem aplikasi web dan mobile rintisan siswa.',
            'images' => [
                asset('images/fasilitas/lab-iot-1.jpg'),
                asset('images/fasilitas/lab-iot-2.jpg')
            ],
            'highlight' => 'Mikrokontroler & Sensor',
            'tags' => ['ESP32 / Arduino', 'Soldering Station', 'IoT Server'],
            'specs' => [
                'Modul Mikrokontroler (ESP32 & Arduino)',
                'Kit Sensor & Board Relay Lengkap',
                'Papan Prototyping & Soldering Station',
                'Pengujian Server IoT Cloud Integration'
            ]
        ],
    ];
@endphp

<section id="fasilitas" 
         class="scroll-mt-20 sm:scroll-mt-24 py-16 sm:py-24 bg-slate-50/80 text-slate-900 border-t border-b border-slate-200/80 relative overflow-hidden"
         x-data="{ 
            openModal: false, 
            modalSlide: 0,
            activeData: { judul: '', kategori: '', images: [], deskripsi: '', specs: [] },
            items: {{ \Illuminate\Support\Js::from($fasilitas) }},
            
            openDetail(item) {
                this.activeData = item;
                this.modalSlide = 0;
                this.openModal = true;
            }
         }"
         @keydown.escape.window="openModal = false">

    {{-- SUBTLE DEVELOPER GRID PATTERN --}}
    <div class="absolute inset-0 z-0 opacity-[0.03] pointer-events-none"
         style="background-image: radial-gradient(#0f172a 1px, transparent 1px); background-size: 24px 24px;"></div>

    {{-- Soft Ambient Glows --}}
    <div class="absolute top-1/3 -right-20 w-96 h-96 bg-orange-500/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-1/4 -left-20 w-96 h-96 bg-amber-500/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        {{-- HEADER SECTION --}}
        <div class="text-center max-w-4xl mx-auto mb-10 sm:mb-14">
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-black text-slate-900 leading-snug sm:leading-tight tracking-tight px-2">
                Sarana & Fasilitas <span class="bg-gradient-to-r from-orange-600 to-amber-500 bg-clip-text text-transparent">Keahlian PPLG</span>
            </h2>
            <div class="w-16 sm:w-20 h-1.5 bg-gradient-to-r from-orange-500 to-amber-500 mx-auto rounded-full mt-3 shadow-xs"></div>

            <p class="mt-3 text-xs sm:text-sm text-slate-600 leading-relaxed max-w-2xl mx-auto px-2 font-normal">
                Empat area utama praktikum dan pembelajaran berstandar industri. Klik kartu untuk melihat foto lengkap dan spesifikasi fasilitas.
            </p>
        </div>

        {{-- GRID 2x2 KARTU FASILITAS --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 max-w-5xl mx-auto">
            <template x-for="(item, index) in items" :key="index">
                <div @click="openDetail(item)"
                     tabindex="0"
                     role="button"
                     :aria-label="'Lihat detail fasilitas ' + item.judul"
                     class="group rounded-3xl bg-white border border-slate-200/90 overflow-hidden shadow-sm hover:shadow-xl hover:border-orange-500 transition-all duration-300 flex flex-col justify-between hover:-translate-y-1.5 cursor-pointer select-none focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-500">
                    
                    <div>
                        {{-- CONTAINER SLIDER FOTO --}}
                        <div x-data="{ 
                                currentSlide: 0, 
                                timer: null,
                                init() {
                                    if (item.images && item.images.length > 1) {
                                        this.timer = setInterval(() => {
                                            this.currentSlide = (this.currentSlide + 1) % item.images.length;
                                        }, 4000);
                                    }
                                }
                            }"
                            class="relative h-48 sm:h-60 w-full overflow-hidden bg-slate-950">
                            
                            <template x-for="(slide, imgIdx) in item.images" :key="imgIdx">
                                <img :src="slide" 
                                     :alt="item.judul" 
                                     x-show="currentSlide === imgIdx"
                                     x-transition:enter="transition ease-out duration-700"
                                     x-transition:enter-start="opacity-0 scale-105"
                                     x-transition:enter-end="opacity-100 scale-100"
                                     onerror="this.src='https://placehold.co/800x600/ea580c/ffffff?text=Fasilitas+PPLG'"
                                     class="absolute inset-0 w-full h-full object-cover">
                            </template>

                            {{-- Badge Kategori --}}
                            <span x-text="item.kategori" 
                                  class="absolute top-3.5 left-3.5 z-10 px-3 py-1 bg-slate-950/80 backdrop-blur-md text-white text-[11px] font-bold rounded-full border border-white/20 shadow-sm">
                            </span>

                            {{-- Dots Indicator Slider --}}
                            <div class="absolute bottom-3.5 right-3.5 z-10 flex gap-1.5 bg-slate-950/50 backdrop-blur-xs px-2.5 py-1 rounded-full border border-white/10">
                                <template x-for="(slide, imgIdx) in item.images" :key="imgIdx">
                                    <button @click.stop="currentSlide = imgIdx"
                                            type="button"
                                            :aria-label="'Ganti slide ke ' + (imgIdx + 1)"
                                            :class="currentSlide === imgIdx ? 'bg-orange-500 w-4' : 'bg-white/70 w-1.5'"
                                            class="h-1.5 rounded-full transition-all duration-300"></button>
                                </template>
                            </div>
                        </div>

                        {{-- ISI KARTU --}}
                        <div class="p-5 sm:p-6">
                            <h3 x-text="item.judul" class="text-base sm:text-lg font-bold text-slate-900 group-hover:text-orange-600 transition leading-snug">
                            </h3>
                            <p x-text="item.deskripsi" class="text-xs sm:text-sm text-slate-600 mt-2 leading-relaxed font-normal">
                            </p>

                            {{-- TAGS FITUR RINGKAS --}}
                            <div class="mt-4 flex flex-wrap gap-1.5">
                                <template x-for="(tag, tagIdx) in item.tags" :key="tagIdx">
                                    <span class="text-[10px] sm:text-[11px] font-semibold text-slate-700 bg-slate-100 px-2.5 py-1 rounded-lg border border-slate-200/80">
                                        ✓ <span x-text="tag"></span>
                                    </span>
                                </template>
                            </div>
                        </div>
                    </div>

                    {{-- FOOTER KARTU --}}
                    <div class="px-5 sm:px-6 pb-5 pt-0">
                        <div class="pt-3.5 border-t border-slate-100 flex items-center justify-between">
                            <span x-text="item.highlight" class="text-[11px] font-bold text-slate-400">
                            </span>
                            
                            <span class="inline-flex items-center gap-1.5 text-xs font-black text-orange-600 group-hover:text-orange-700 transition">
                                Lihat Detail 
                                <svg class="w-3.5 h-3.5 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
                                </svg>
                            </span>
                        </div>
                    </div>

                </div>
            </template>
        </div>

    </div>

    {{-- MODAL POP-UP DETAIL --}}
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
         aria-labelledby="modal-fasilitas-title"
         class="fixed inset-0 z-50 flex items-center justify-center p-3 sm:p-5 bg-slate-950/80 backdrop-blur-md">
        
        <div @click.away="openModal = false"
             class="relative w-full max-w-2xl max-h-[90vh] bg-white text-slate-900 rounded-3xl shadow-2xl overflow-hidden border border-slate-200 flex flex-col">
            
            {{-- Tombol Close --}}
            <button @click="openModal = false" 
                    type="button"
                    aria-label="Tutup Modal Fasilitas"
                    class="absolute top-3.5 right-3.5 z-30 w-8 h-8 sm:w-9 sm:h-9 bg-slate-950/80 hover:bg-orange-600 text-white rounded-full flex items-center justify-center transition-all duration-200 cursor-pointer shadow-md border border-white/20 backdrop-blur-xs focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-500">
                ✕
            </button>

            {{-- Slider Gambar Modal --}}
            <div class="relative h-52 sm:h-64 w-full bg-slate-950 shrink-0 overflow-hidden">
                <template x-for="(img, idx) in activeData.images" :key="idx">
                    <img :src="img" 
                         :alt="activeData.judul"
                         x-show="modalSlide === idx"
                         x-transition:enter="transition ease-out duration-400"
                         x-transition:enter-start="opacity-0 scale-105"
                         x-transition:enter-end="opacity-100 scale-100"
                         onerror="this.src='https://placehold.co/800x600/ea580c/ffffff?text=Fasilitas+PPLG'"
                         class="absolute inset-0 w-full h-full object-cover">
                </template>

                <span x-text="activeData.kategori" 
                      class="absolute bottom-3.5 left-3.5 z-10 px-3.5 py-1 bg-orange-600 text-white text-[11px] sm:text-xs font-bold rounded-full shadow-md">
                </span>

                <template x-if="activeData.images && activeData.images.length > 1">
                    <div>
                        <button @click="modalSlide = (modalSlide === 0) ? activeData.images.length - 1 : modalSlide - 1"
                                type="button"
                                aria-label="Gambar Sebelumnya"
                                class="absolute left-3 top-1/2 -translate-y-1/2 z-20 w-8 h-8 sm:w-9 sm:h-9 rounded-full bg-slate-950/70 hover:bg-orange-600 text-white flex items-center justify-center transition cursor-pointer backdrop-blur-xs focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-500">
                            ❮
                        </button>
                        <button @click="modalSlide = (modalSlide === activeData.images.length - 1) ? 0 : modalSlide + 1"
                                type="button"
                                aria-label="Gambar Selanjutnya"
                                class="absolute right-3 top-1/2 -translate-y-1/2 z-20 w-8 h-8 sm:w-9 sm:h-9 rounded-full bg-slate-950/70 hover:bg-orange-600 text-white flex items-center justify-center transition cursor-pointer backdrop-blur-xs focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-500">
                            ❯
                        </button>

                        <div class="absolute bottom-3.5 right-3.5 z-20 flex gap-1.5 bg-slate-950/50 backdrop-blur-xs px-2.5 py-1 rounded-full border border-white/10">
                            <template x-for="(img, idx) in activeData.images" :key="idx">
                                <button @click="modalSlide = idx"
                                        type="button"
                                        :aria-label="'Pindah ke foto ' + (idx + 1)"
                                        :class="modalSlide === idx ? 'bg-orange-500 w-4' : 'bg-white/70 w-1.5'"
                                        class="h-1.5 rounded-full transition-all duration-300"></button>
                            </template>
                        </div>
                    </div>
                </template>
            </div>

            {{-- Detail Spesifikasi Modal --}}
            <div class="p-5 sm:p-7 overflow-y-auto flex-1">
                <h3 id="modal-fasilitas-title" x-text="activeData.judul" class="text-lg sm:text-2xl font-black text-slate-900 leading-snug"></h3>
                
                <p x-text="activeData.deskripsi" class="mt-2.5 text-xs sm:text-sm text-slate-600 leading-relaxed font-normal"></p>

                <div class="mt-5 pt-4 border-t border-slate-100">
                    <h4 class="text-[11px] sm:text-xs font-bold text-slate-900 uppercase tracking-wider mb-3">Spesifikasi & Fasilitas Utama:</h4>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                        <template x-for="(spec, index) in activeData.specs" :key="index">
                            <div class="flex items-center gap-2.5 text-xs text-slate-700 font-medium bg-slate-50 p-2.5 rounded-xl border border-slate-200/80">
                                <span class="h-2 w-2 rounded-full bg-orange-600 shrink-0"></span>
                                <span x-text="spec"></span>
                            </div>
                        </template>
                    </div>
                </div>
            </div>

            {{-- Footer Modal --}}
            <div class="p-3.5 sm:p-4 border-t border-slate-100 bg-slate-50 flex justify-end">
                <button @click="openModal = false" 
                        type="button"
                        class="px-5 py-2.5 bg-slate-950 hover:bg-orange-600 text-white rounded-xl font-bold text-xs transition cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-500">
                    Tutup
                </button>
            </div>

        </div>
    </div>

</section>