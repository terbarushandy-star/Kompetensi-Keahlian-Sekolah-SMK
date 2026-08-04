<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semua Kegiatan & Berita - PPLG SMKN 1 Bangsri</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-slate-50 text-slate-900 font-sans antialiased selection:bg-orange-500 selection:text-white flex flex-col min-h-screen"
      x-data="{ 
          allKegiatans: {{ \Illuminate\Support\Js::from($allKegiatans) }},
          openModal: false, 
          activeKegiatan: { judul: '', tanggal_formatted: '', gambar_url: '', deskripsi: '', galeri: [] },
          activeImage: '',

          openDetail(item) {
              this.activeKegiatan = item;
              this.activeImage = item.gambar_url || item.gambar;
              this.openModal = true;
              if (this.$refs.modalBody) {
                  this.$refs.modalBody.scrollTop = 0;
              }
          }
      }"
      @keydown.escape.window="openModal = false">

    {{-- NAVBAR / HEADER KEMBALI --}}
    <header class="bg-white/95 backdrop-blur-md py-4 border-b border-slate-200/80 text-slate-900 sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-xs sm:text-sm font-extrabold text-slate-700 hover:text-orange-600 transition focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-500 rounded-lg px-2 py-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali ke Beranda
            </a>
            <span class="text-[10px] sm:text-xs uppercase tracking-widest text-orange-600 font-black">PPLG SMKN 1 BANGSRI</span>
        </div>
    </header>

    {{-- HERO SECTION --}}
    <section class="relative bg-gradient-to-br from-orange-50 via-amber-50/50 to-orange-100/40 text-slate-900 py-12 sm:py-20 overflow-hidden border-b border-slate-200/80">
        {{-- Subtle Developer Grid Pattern --}}
        <div class="absolute inset-0 z-0 opacity-[0.03] pointer-events-none"
             style="background-image: radial-gradient(#0f172a 1px, transparent 1px); background-size: 24px 24px;"></div>

        <div class="absolute -top-20 -right-20 w-96 h-96 bg-orange-400/20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-20 -left-20 w-96 h-96 bg-amber-400/15 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-3xl space-y-3 text-center sm:text-left">
                <h1 class="text-3xl sm:text-5xl lg:text-6xl font-black tracking-tight text-slate-900 leading-tight sm:leading-none">
                    Berita & Kegiatan <span class="bg-gradient-to-r from-orange-600 to-amber-500 bg-clip-text text-transparent">Keahlian PPLG</span>
                </h1>
                <p class="text-xs sm:text-sm md:text-base text-slate-600 font-normal leading-relaxed">
                    Pengumuman, berita, dan dokumentasi kegiatan seputar Kompetensi Keahlian PPLG SMKN 1 Bangsri.
                </p>
                <div class="w-20 sm:w-24 h-1.5 bg-gradient-to-r from-orange-500 to-amber-500 rounded-full mt-3 mx-auto sm:mx-0 shadow-xs"></div>
            </div>
        </div>
    </section>

    {{-- GRID KARTU KEGIATAN --}}
    <main class="py-12 sm:py-16 bg-slate-50/80 flex-1 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 max-w-6xl mx-auto">
                <template x-for="(item, index) in allKegiatans" :key="index">
                    <div @click="openDetail(item)"
                         tabindex="0"
                         role="button"
                         :aria-label="'Lihat detail ' + item.judul"
                         class="group rounded-3xl bg-white border border-slate-200/90 border-t-4 border-t-orange-500 overflow-hidden shadow-sm hover:shadow-xl hover:border-orange-500 transition-all duration-300 flex flex-col justify-between cursor-pointer select-none hover:-translate-y-1.5 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-500">
                        
                        <div>
                            {{-- FOTO KEGIATAN --}}
                            <div class="w-full aspect-[4/3] bg-slate-100 flex items-center justify-center p-2 overflow-hidden relative border-b border-slate-100">
                                <img :src="item.gambar_url || item.gambar" 
                                     :alt="item.judul" 
                                     onerror="this.src='https://placehold.co/600x450/ea580c/ffffff?text=Kegiatan+PPLG'"
                                     class="max-h-full w-auto max-w-full object-contain mx-auto transition-transform duration-500 group-hover:scale-105">
                            </div>

                            {{-- CONTENT KARTU --}}
                            <div class="p-5 sm:p-6 space-y-2">
                                <span x-text="item.tanggal_formatted || item.tanggal" class="text-xs font-extrabold text-orange-600 block mb-1"></span>
                                <h3 x-text="item.judul" class="text-base sm:text-lg font-bold text-slate-900 group-hover:text-orange-600 transition leading-snug line-clamp-2"></h3>
                            </div>
                        </div>

                        {{-- FOOTER KARTU --}}
                        <div class="px-5 sm:px-6 pb-5 pt-0">
                            <div class="pt-3 border-t border-slate-100 flex items-center justify-between">
                                <span class="text-[11px] font-bold text-slate-400">PPLG Bangsri</span>
                                <span class="inline-flex items-center gap-1.5 text-xs font-extrabold text-orange-600 group-hover:text-orange-700 transition">
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
    </main>

    {{-- MODAL DETAIL DENGAN GALERI FOTO --}}
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
         aria-labelledby="modal-kegiatan-page-title"
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
                        <h3 id="modal-kegiatan-page-title" x-text="activeKegiatan.judul" class="text-xl sm:text-2xl lg:text-3xl font-black text-slate-900 leading-snug"></h3>
                        
                        {{-- Foto Utama --}}
                        <div class="bg-slate-950 rounded-2xl p-3 flex items-center justify-center min-h-[260px] max-h-[360px] overflow-hidden border border-slate-800 shadow-inner">
                            <img :src="activeImage" 
                                 :alt="activeKegiatan.judul" 
                                 onerror="this.src='https://placehold.co/600x450/ea580c/ffffff?text=Kegiatan+PPLG'"
                                 class="max-h-[340px] w-auto max-w-full object-contain mx-auto rounded-lg shadow-md transition-all duration-300">
                        </div>

                        {{-- Galeri Thumbnail Foto --}}
                        <div x-show="activeKegiatan.galeri && activeKegiatan.galeri.length > 0">
                            <h4 class="text-xs font-bold text-slate-900 uppercase tracking-wider mb-2.5">Dokumentasi Foto Lainnya:</h4>
                            <div class="flex flex-wrap gap-3">
                                <template x-for="(foto, fIdx) in activeKegiatan.galeri" :key="fIdx">
                                    <button @click="activeImage = foto" 
                                            type="button"
                                            :aria-label="'Lihat foto ' + (fIdx + 1)"
                                            :class="activeImage === foto ? 'ring-2 ring-orange-500 scale-105' : 'opacity-70 hover:opacity-100'"
                                            class="w-20 h-20 rounded-xl bg-slate-100 overflow-hidden cursor-pointer border border-slate-200 transition-all duration-200 flex items-center justify-center p-1 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-500">
                                        <img :src="foto" alt="Thumbnail Foto" class="max-h-full max-w-full object-cover rounded-lg">
                                    </button>
                                </template>
                            </div>
                        </div>

                        <div x-html="activeKegiatan.deskripsi" class="text-xs sm:text-sm text-slate-600 leading-relaxed whitespace-pre-line space-y-4 pt-2 font-normal"></div>
                    </div>

                    {{-- SIDEBAR BACA JUGA (DYNAMIC WITH ALPINE) --}}
                    <div class="lg:col-span-1 border-t lg:border-t-0 lg:border-l border-slate-200/80 lg:pl-8 pt-6 lg:pt-0">
                        <div class="flex items-center gap-2 mb-4">
                            <span class="w-1.5 h-5 bg-orange-600 rounded-full"></span>
                            <h4 class="text-base sm:text-lg font-black text-slate-900">Kegiatan Lainnya</h4>
                        </div>
                        <div class="space-y-4">
                            <template x-for="(rec, recIdx) in allKegiatans.filter(k => k.judul !== activeKegiatan.judul).slice(0, 6)" :key="recIdx">
                                <div @click="openDetail(rec)" 
                                     tabindex="0"
                                     role="button"
                                     class="group flex items-start gap-3 p-2.5 rounded-2xl hover:bg-slate-50 border border-transparent hover:border-slate-200 transition duration-200 cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-500">
                                    <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-xl bg-slate-100 overflow-hidden shrink-0 border border-slate-200/80 flex items-center justify-center p-1">
                                        <img :src="rec.gambar_url || rec.gambar" 
                                             :alt="rec.judul" 
                                             onerror="this.src='https://placehold.co/200x200/ea580c/ffffff?text=PPLG'"
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

    {{-- FOOTER KONSISTEN --}}
    @include('components.footer')

</body>
</html>