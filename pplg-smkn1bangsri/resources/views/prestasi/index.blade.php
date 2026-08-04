<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- SEO META TAGS --}}
    <title>Arsip Semua Prestasi - PPLG SMKN 1 Bangsri</title>
    <meta name="title" content="Arsip Semua Prestasi - PPLG SMKN 1 Bangsri">
    <meta name="description" content="Kumpulan penghargaan, kejuaraan LKS, lomba coding, dan pencapaian gemilang siswa-siswi serta guru Kompetensi Keahlian PPLG SMKN 1 Bangsri.">
    <meta name="keywords" content="Prestasi PPLG SMKN 1 Bangsri, Juara LKS PPLG, Lomba Coding SMK, Penghargaan PPLG Jepara, TeFa PPLG">
    <meta name="author" content="PPLG SMKN 1 Bangsri">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- FAVICON --}}
    <link rel="icon" type="image/png" href="{{ asset('images/logo/logo-pplg.png') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/logo/logo-pplg.png') }}">

    {{-- OPEN GRAPH & TWITTER CARD --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="PPLG SMKN 1 Bangsri">
    <meta property="og:title" content="Arsip Pencapaian & Prestasi PPLG SMKN 1 Bangsri">
    <meta property="og:description" content="Rekam jejak keunggulan dan torehan juara siswa-siswi PPLG SMKN 1 Bangsri di bidang IT, pemrograman, dan teknologi.">
    <meta property="og:image" content="{{ asset('images/logo/logo-pplg.png') }}">
    <meta property="og:locale" content="id_ID">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="Arsip Prestasi - PPLG SMKN 1 Bangsri">
    <meta name="twitter:description" content="Kumpulan penghargaan dan torehan juara siswa-siswi PPLG SMKN 1 Bangsri.">
    <meta name="twitter:image" content="{{ asset('images/logo/logo-pplg.png') }}">

    {{-- VITE --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-slate-50 text-slate-900 font-sans antialiased selection:bg-orange-500 selection:text-white flex flex-col min-h-screen"
      x-data="{ 
          allPrestasi: {{ \Illuminate\Support\Js::from($allPrestasi) }},
          selectedKategori: 'semua',
          searchQuery: '',
          openModal: false, 
          activePrestasi: { judul: '', kategori: '', tahun: '', peraih: '', kelas: '', pembimbing: '', tingkat: '', deskripsi: '', desc: '', gambar_url: '', tanggal_lengkap: '' },

          get filteredPrestasi() {
              return this.allPrestasi.filter(item => {
                  const matchKategori = this.selectedKategori === 'semua' || item.kategori === this.selectedKategori;
                  const q = this.searchQuery.toLowerCase().trim();
                  const matchSearch = !q || (
                      (item.judul && item.judul.toLowerCase().includes(q)) ||
                      (item.peraih && item.peraih.toLowerCase().includes(q)) ||
                      (item.tingkat && item.tingkat.toLowerCase().includes(q))
                  );
                  return matchKategori && matchSearch;
              });
          },

          switchDetail(item) {
              this.activePrestasi = item;
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

    {{-- HERO SECTION PRESTASI --}}
    <section class="relative bg-gradient-to-br from-orange-50 via-amber-50/50 to-orange-100/40 text-slate-900 py-12 sm:py-20 overflow-hidden border-b border-slate-200/80">
        {{-- Subtle Developer Grid Pattern --}}
        <div class="absolute inset-0 z-0 opacity-[0.03] pointer-events-none"
             style="background-image: radial-gradient(#0f172a 1px, transparent 1px); background-size: 24px 24px;"></div>

        <div class="absolute -top-20 -right-20 w-96 h-96 bg-orange-400/20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-20 -left-20 w-96 h-96 bg-amber-400/15 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-3xl space-y-3 text-center sm:text-left">
                <h1 class="text-3xl sm:text-5xl lg:text-6xl font-black tracking-tight text-slate-900 leading-tight sm:leading-none">
                    Pencapaian & Prestasi <span class="bg-gradient-to-r from-orange-600 to-amber-500 bg-clip-text text-transparent">Keahlian PPLG</span>
                </h1>
                <p class="text-xs sm:text-sm md:text-base text-slate-600 font-normal leading-relaxed">
                    Kumpulan penghargaan, kejuaraan, dan pencapaian gemilang yang diraih oleh siswa-siswi serta guru Kompetensi Keahlian PPLG SMKN 1 Bangsri.
                </p>
                <div class="w-20 sm:w-24 h-1.5 bg-gradient-to-r from-orange-500 to-amber-500 rounded-full mt-3 mx-auto sm:mx-0 shadow-xs"></div>
            </div>
        </div>
    </section>

    {{-- KONTEN UTAMA & FILTER --}}
    <main class="py-12 sm:py-16 bg-slate-50/80 flex-1 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            {{-- BAR FILTER & PENCARIAN --}}
            <div class="max-w-6xl mx-auto mb-8 bg-white p-4 sm:p-5 rounded-2xl border border-slate-200/90 shadow-sm flex flex-col md:flex-row items-center justify-between gap-4">
                <div class="relative w-full md:w-80">
                    <input type="text" 
                           x-model="searchQuery"
                           placeholder="Cari prestasi, peraih, tingkat..."
                           class="w-full bg-slate-50 border border-slate-200 text-slate-800 text-xs sm:text-sm rounded-xl pl-9 pr-4 py-2.5 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-500 transition font-normal">
                    <svg class="w-4 h-4 text-slate-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>

                <div class="flex items-center gap-2.5 w-full md:w-auto justify-end">
                    <label for="filter-kategori-arsip" class="text-xs sm:text-sm font-bold text-slate-700 shrink-0">Kategori:</label>
                    <select id="filter-kategori-arsip"
                            x-model="selectedKategori" 
                            class="w-full md:w-auto text-xs sm:text-sm font-bold text-slate-800 bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-500 cursor-pointer">
                        <option value="semua">Semua Prestasi</option>
                        <option value="siswa">Prestasi Siswa & Siswi</option>
                        <option value="guru">Prestasi Guru</option>
                    </select>
                </div>
            </div>

            {{-- GRID KARTU PRESTASI --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 max-w-6xl mx-auto">
                <template x-for="(item, index) in filteredPrestasi" :key="index">
                    <div @click="
                            openModal = true;
                            switchDetail(item);
                         "
                         tabindex="0"
                         role="button"
                         :aria-label="'Lihat detail prestasi ' + item.judul"
                         class="group rounded-3xl bg-white border border-slate-200/90 border-t-4 border-t-orange-500 overflow-hidden shadow-sm hover:shadow-xl hover:border-orange-500 transition-all duration-300 flex flex-col justify-between cursor-pointer select-none hover:-translate-y-1.5 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-500">
                        
                        <div>
                            {{-- FOTO PRESTASI / TROFI --}}
                            <div class="w-full aspect-[4/3] bg-slate-100 flex items-center justify-center p-2 overflow-hidden relative border-b border-slate-100">
                                <img :src="item.gambar_url || item.gambar" 
                                     :alt="item.judul" 
                                     onerror="this.src='https://placehold.co/600x450/ea580c/ffffff?text=Prestasi+PPLG'"
                                     class="max-h-full w-auto max-w-full object-contain mx-auto transition-transform duration-500 group-hover:scale-105">
                            </div>

                            {{-- CONTENT KARTU --}}
                            <div class="p-5 sm:p-6 space-y-3">
                                <div class="flex items-center justify-between">
                                    <span x-text="item.kategori === 'guru' ? 'Guru' : 'Siswa'" class="bg-orange-50 text-orange-600 border border-orange-200 text-[11px] font-extrabold px-3 py-1 rounded-full uppercase tracking-wider"></span>
                                    <span x-text="item.tahun || item.tanggal_lengkap" class="text-xs font-bold text-slate-400"></span>
                                </div>

                                <h3 x-text="item.judul" class="text-base sm:text-lg font-bold text-slate-900 group-hover:text-orange-600 transition leading-snug line-clamp-2"></h3>

                                <div class="space-y-1.5 text-xs text-slate-600 border-t border-slate-100 pt-3 font-normal">
                                    <div x-show="item.peraih"><span class="text-slate-400 font-medium">Peraih:</span> <strong x-text="item.peraih" class="text-slate-900 font-bold"></strong></div>
                                    <div x-show="item.kelas"><span class="text-slate-400 font-medium">Kelas:</span> <strong x-text="item.kelas" class="text-slate-800 font-semibold"></strong></div>
                                    <div x-show="item.pembimbing"><span class="text-slate-400 font-medium">Pembimbing:</span> <strong x-text="item.pembimbing" class="text-slate-800 font-semibold"></strong></div>
                                    <div x-show="item.tingkat"><span class="text-slate-400 font-medium">Tingkat:</span> <strong x-text="item.tingkat" class="text-orange-600 font-bold"></strong></div>
                                </div>
                            </div>
                        </div>

                        {{-- FOOTER KARTU --}}
                        <div class="px-5 sm:px-6 pb-5 pt-0">
                            <div class="pt-3 border-t border-slate-100 flex items-center justify-between">
                                <span class="text-[11px] font-bold text-slate-400" x-text="item.tanggal_formatted || item.tanggal_lengkap || item.tahun"></span>
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

            {{-- STATE KOSONG --}}
            <div x-show="filteredPrestasi.length === 0" class="text-center py-16 bg-white rounded-3xl border border-slate-200/90 max-w-xl mx-auto p-8 shadow-sm">
                <div class="w-16 h-16 bg-orange-100 text-orange-600 rounded-full flex items-center justify-center mx-auto mb-4 text-2xl font-bold">🔍</div>
                <h3 class="text-lg font-bold text-slate-900">Prestasi Tidak Ditemukan</h3>
                <p class="text-xs text-slate-500 mt-1 font-normal">Coba gunakan kata kunci pencarian lain atau ubah filter kategori.</p>
                <button @click="searchQuery = ''; selectedKategori = 'semua'" 
                        type="button"
                        class="mt-4 px-5 py-2.5 bg-orange-600 text-white text-xs font-bold rounded-xl hover:bg-orange-700 transition cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-500">
                    Reset Filter
                </button>
            </div>

        </div>
    </main>

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
         aria-labelledby="modal-prestasi-page-title"
         class="fixed inset-0 z-50 flex items-center justify-center p-3 sm:p-5 bg-slate-950/80 backdrop-blur-md">
        
        <div @click.away="openModal = false" class="relative w-full max-w-4xl max-h-[90vh] bg-white text-slate-900 rounded-3xl shadow-2xl overflow-hidden border border-slate-200 flex flex-col">
            <button @click="openModal = false" 
                    type="button"
                    aria-label="Tutup Modal Detail Prestasi"
                    class="absolute top-4 right-4 z-40 w-9 h-9 bg-slate-950/80 hover:bg-orange-600 text-white rounded-full flex items-center justify-center transition-all duration-200 cursor-pointer shadow-md border border-white/20 backdrop-blur-xs focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-500">✕</button>

            <div class="p-6 sm:p-8 lg:p-10 overflow-y-auto flex-1" x-ref="modalBody">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-10">
                    <div class="lg:col-span-2 space-y-5">
                        <div class="flex items-center gap-3 text-xs font-extrabold text-orange-600">
                            <span x-text="(activePrestasi.kategori === 'guru' ? 'Prestasi Guru' : 'Prestasi Siswa') + (activePrestasi.tahun ? ' • ' + activePrestasi.tahun : '')" class="bg-orange-50 px-3 py-1 rounded-md border border-orange-200 uppercase"></span>
                        </div>
                        
                        <h3 id="modal-prestasi-page-title" x-text="activePrestasi.judul" class="text-xl sm:text-2xl lg:text-3xl font-black text-slate-900 leading-snug"></h3>
                        
                        <div class="bg-slate-950 rounded-2xl p-3 flex items-center justify-center min-h-[240px] max-h-[360px] overflow-hidden border border-slate-800 shadow-inner">
                            <img :src="activePrestasi.gambar_url || activePrestasi.gambar" 
                                 :alt="activePrestasi.judul" 
                                 onerror="this.src='https://placehold.co/600x450/ea580c/ffffff?text=Detail+Prestasi'"
                                 class="max-h-[340px] w-auto max-w-full object-contain mx-auto rounded-lg shadow-md">
                        </div>

                        <div class="bg-slate-50 p-4 rounded-2xl border border-slate-200/80 space-y-2 text-xs sm:text-sm font-normal">
                            <div x-show="activePrestasi.peraih"><span class="text-slate-500 font-medium">Peraih / Pemenang:</span> <strong x-text="activePrestasi.peraih" class="text-slate-900 font-extrabold"></strong></div>
                            <div x-show="activePrestasi.kelas"><span class="text-slate-500 font-medium">Kelas:</span> <strong x-text="activePrestasi.kelas" class="text-slate-900 font-bold"></strong></div>
                            <div x-show="activePrestasi.pembimbing"><span class="text-slate-500 font-medium">Guru Pembimbing:</span> <strong x-text="activePrestasi.pembimbing" class="text-slate-900 font-bold"></strong></div>
                            <div x-show="activePrestasi.tingkat"><span class="text-slate-500 font-medium">Tingkat Kejuaraan:</span> <strong x-text="activePrestasi.tingkat" class="text-orange-600 font-bold"></strong></div>
                        </div>

                        <div class="pt-1">
                            <div x-html="activePrestasi.deskripsi || activePrestasi.desc" class="text-xs sm:text-sm text-slate-600 leading-relaxed whitespace-pre-line space-y-4 pt-2 font-normal"></div>
                        </div>

                        <div x-show="activePrestasi.tanggal_lengkap || activePrestasi.tanggal_formatted" class="pt-3 border-t border-slate-100 text-xs font-bold text-slate-400">
                            <span x-text="activePrestasi.tanggal_formatted || activePrestasi.tanggal_lengkap"></span>
                        </div>
                    </div>

                    {{-- SIDEBAR REKOMENDASI --}}
                    <div class="lg:col-span-1 border-t lg:border-t-0 lg:border-l border-slate-200/80 lg:pl-8 pt-6 lg:pt-0">
                        <div class="flex items-center gap-2 mb-4">
                            <span class="w-1.5 h-5 bg-orange-600 rounded-full"></span>
                            <h4 class="text-base sm:text-lg font-black text-slate-900">Prestasi Lainnya</h4>
                        </div>
                        <div class="space-y-4">
                            <template x-for="(rec, rIdx) in allPrestasi.filter(p => p.judul !== activePrestasi.judul).slice(0, 5)" :key="rIdx">
                                <div @click="switchDetail(rec)" 
                                     tabindex="0"
                                     role="button"
                                     class="group flex items-start gap-3 p-2.5 rounded-2xl hover:bg-slate-50 border border-transparent hover:border-slate-200 transition duration-200 cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-500">
                                    <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-xl bg-slate-100 overflow-hidden shrink-0 border border-slate-200/80 flex items-center justify-center p-1">
                                        <img :src="rec.gambar_url || rec.gambar" 
                                             :alt="rec.judul" 
                                             onerror="this.src='https://placehold.co/200x200/ea580c/ffffff?text=Prestasi'"
                                             class="max-h-full max-w-full object-contain group-hover:scale-105 transition duration-300">
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <span x-text="rec.tahun || (rec.kategori === 'guru' ? 'GURU' : 'SISWA')" class="text-[10px] font-extrabold text-orange-600 block uppercase"></span>
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