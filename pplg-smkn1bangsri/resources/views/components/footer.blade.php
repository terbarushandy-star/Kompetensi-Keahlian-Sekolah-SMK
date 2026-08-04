{{-- FOOTER COMPONENT PPLG SMKN 1 BANGSRI --}}
<footer class="bg-slate-950 text-slate-300 relative overflow-hidden pt-16 pb-8 border-t border-slate-800">

    {{-- SUBTLE DEVELOPER GRID PATTERN --}}
    <div class="absolute inset-0 z-0 opacity-[0.04] pointer-events-none"
         style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 24px 24px;"></div>

    {{-- EFEK GLOW HALUS DI BACKGROUND --}}
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-orange-500/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 lg:gap-12 pb-12 border-b border-slate-800/80">

            {{-- KOLOM 1: BRANDING & DESKRIPSI --}}
            <div class="space-y-4">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-3 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-500 rounded-xl p-0.5">
                    <img 
                        src="{{ asset('images/logo/logo-pplg.png') }}" 
                        alt="Logo PPLG SMKN 1 Bangsri" 
                        class="h-11 sm:h-12 w-auto"
                        onerror="this.src='https://placehold.co/100x100/ea580c/ffffff?text=PPLG'">
                    <div>
                        <span class="font-black text-xl text-white tracking-tight block leading-none">PPLG</span>
                        <span class="text-[10px] sm:text-xs font-semibold text-slate-400 tracking-wider uppercase block mt-1">SMKN 1 Bangsri</span>
                    </div>
                </a>
                <p class="text-xs text-slate-400 leading-relaxed font-normal">
                    Kompetensi Keahlian Pengembangan Perangkat Lunak dan Gim (PPLG) SMKN 1 Bangsri. Mencetak generasi developer handal, kreatif, berkarakter, dan siap bersaing di industri digital.
                </p>
            </div>

            {{-- KOLOM 2: NAVIGASI CEPAT --}}
            <div>
                <h4 class="text-sm font-extrabold text-white uppercase tracking-wider mb-4 border-l-2 border-orange-500 pl-2.5">
                    Navigasi Cepat
                </h4>
                <ul class="space-y-2.5 text-xs font-medium">
                    <li>
                        <a href="{{ route('home') }}" class="hover:text-orange-400 transition flex items-center gap-1.5 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-500 rounded-sm">
                            <span class="text-orange-500">›</span> Beranda
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('home') }}#profil" class="hover:text-orange-400 transition flex items-center gap-1.5 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-500 rounded-sm">
                            <span class="text-orange-500">›</span> Sejarah & Profil
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('home') }}#visi-misi" class="hover:text-orange-400 transition flex items-center gap-1.5 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-500 rounded-sm">
                            <span class="text-orange-500">›</span> Visi & Misi
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('home') }}#fasilitas" class="hover:text-orange-400 transition flex items-center gap-1.5 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-500 rounded-sm">
                            <span class="text-orange-500">›</span> Sarana & Fasilitas
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('home') }}#guru" class="hover:text-orange-400 transition flex items-center gap-1.5 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-500 rounded-sm">
                            <span class="text-orange-500">›</span> Tim Pengajar
                        </a>
                    </li>
                </ul>
            </div>

            {{-- KOLOM 3: ARSIP & UNIT USAHA --}}
            <div>
                <h4 class="text-sm font-extrabold text-white uppercase tracking-wider mb-4 border-l-2 border-orange-500 pl-2.5">
                    Arsip & Unit
                </h4>
                <ul class="space-y-2.5 text-xs font-medium">
                    <li>
                        <a href="{{ route('prestasi.index') }}" class="hover:text-orange-400 transition flex items-center gap-1.5 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-500 rounded-sm">
                            <span class="text-orange-500">›</span> Galeri Prestasi Siswa
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('kegiatan.index') }}" class="hover:text-orange-400 transition flex items-center gap-1.5 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-500 rounded-sm">
                            <span class="text-orange-500">›</span> Berita & Kegiatan
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('home') }}#mitra" class="hover:text-orange-400 transition flex items-center gap-1.5 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-500 rounded-sm">
                            <span class="text-orange-500">›</span> Mitra Industri (PKL)
                        </a>
                    </li>
                    <li>
                        <a href="https://tefa.smkn1bangsri.sch.id" target="_blank" rel="noopener noreferrer" class="hover:text-orange-400 transition flex items-center gap-1.5 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-500 rounded-sm">
                            <span class="text-orange-500">›</span> Unit Usaha / TeFa PPLG ↗
                        </a>
                    </li>
                </ul>
            </div>

            {{-- KOLOM 4: KONTAK & ALAMAT --}}
            <div>
                <h4 class="text-sm font-extrabold text-white uppercase tracking-wider mb-4 border-l-2 border-orange-500 pl-2.5">
                    Kontak Kami
                </h4>
                <div class="space-y-3 text-xs text-slate-400 font-normal">
                    <div class="flex items-start gap-2.5">
                        <svg class="w-4 h-4 text-orange-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span>Jl. K.H. Achmad Fauzan No. 17, Bangsri, Kab. Jepara, Jawa Tengah 59453</span>
                    </div>
                    <div class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 text-orange-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <a href="mailto:rplsmkn1bangsri@gmail.com" class="hover:text-white transition focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-500 rounded-sm">rplsmkn1bangsri@gmail.com</a>
                    </div>
                    <div class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 text-orange-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9"/>
                        </svg>
                        <a href="https://smkn1bangsri.sch.id" target="_blank" rel="noopener noreferrer" class="hover:text-white transition focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-500 rounded-sm">smkn1bangsri.sch.id</a>
                    </div>
                </div>
            </div>

        </div>

        {{-- BOTTOM BAR (COPYRIGHT) --}}
        <div class="pt-8 flex flex-col sm:flex-row items-center justify-between text-xs text-slate-500 gap-4 font-normal">
            <p>&copy; {{ date('Y') }} PPLG SMKN 1 Bangsri. All rights reserved.</p>
            <p class="text-center sm:text-right">
                Dikembangkan oleh <span class="text-slate-300 font-bold">Tim Teaching Factory PPLG</span>
            </p>
        </div>

    </div>
</footer>