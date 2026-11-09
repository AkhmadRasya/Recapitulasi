<?php $__env->startSection('title', 'Kelurahan Sungai Andai - Kota Banjarmasin'); ?>

<?php $__env->startSection('content'); ?>
<!-- Hero Section with Background Glow -->
<section class="relative overflow-hidden bg-gradient-to-b from-emerald-900 via-teal-900 to-slate-900 text-white pt-12 pb-24 lg:pt-20 lg:pb-32">
    <!-- Background Decor -->
    <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#10b981_1px,transparent_1px)] [background-size:24px_24px]"></div>
    <div class="absolute -top-40 -right-40 w-96 h-96 rounded-full bg-emerald-500/20 blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 left-1/4 w-80 h-80 rounded-full bg-teal-500/20 blur-3xl pointer-events-none"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <!-- Left Text Content -->
            <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-500/20 border border-emerald-400/30 text-emerald-300 text-xs sm:text-sm font-semibold backdrop-blur-md">
                    <i class="fa-solid fa-water"></i>
                    <span>Kota Banjarmasin • Wilayah Sungai Andai</span>
                </div>

                <h1 class="text-3xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight leading-tight">
                    Pelayanan Kelurahan <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 via-teal-300 to-cyan-300">
                        Cepat, Mudah & Terpadu
                    </span>
                </h1>

                <p class="text-slate-300 text-base sm:text-lg max-w-2xl leading-relaxed">
                    Selamat datang di Portal Resmi Kelurahan Sungai Andai. Kini pengurusan Surat Keterangan Belum Punya Rumah, Kematian, Belum Menikah, SKTM, hingga Surat Pengantar Nikah dapat diajukan secara online dari mana saja.
                </p>

                <!-- Interactive Fast Tracking Box -->
                <div class="pt-2">
                    <form action="<?php echo e(route('layanan.tracking')); ?>" method="GET" class="p-2 sm:p-2.5 rounded-2xl bg-white/10 backdrop-blur-md border border-white/20 shadow-2xl max-w-xl mx-auto lg:mx-0 flex flex-col sm:flex-row gap-2">
                        <div class="flex-1 flex items-center gap-2 px-3 bg-white/10 rounded-xl">
                            <i class="fa-solid fa-magnifying-glass text-emerald-300"></i>
                            <input type="text" 
                                   name="q" 
                                   placeholder="Ketik Nomor Tiket (REG-SA-...) atau NIK Anda..." 
                                   class="w-full bg-transparent text-sm py-2.5 text-white placeholder-slate-400 focus:outline-none"
                                   required>
                        </div>
                        <button type="submit" class="px-6 py-2.5 rounded-xl bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-bold text-sm transition flex items-center justify-center gap-2 shadow-lg shadow-emerald-500/30">
                            <span>Lacak Status</span>
                            <i class="fa-solid fa-arrow-right text-xs"></i>
                        </button>
                    </form>
                    <p class="text-xs text-slate-400 mt-2">
                        <i class="fa-solid fa-circle-info text-emerald-400 mr-1"></i>
                        Contoh nomor tiket uji coba: <code class="text-emerald-300 font-mono">REG-SA-202611-001</code>
                    </p>
                </div>

                <!-- Call to Action Buttons -->
                <div class="flex flex-wrap justify-center lg:justify-start gap-4 pt-4">
                    <a href="<?php echo e(route('layanan.buat')); ?>" 
                       class="px-6 py-3.5 rounded-2xl bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-sm shadow-xl shadow-emerald-700/40 hover:-translate-y-0.5 transition flex items-center gap-2.5">
                        <i class="fa-solid fa-file-circle-plus text-base"></i>
                        <span>Ajukan Surat Online</span>
                    </a>
                    <a href="<?php echo e(route('layanan.index')); ?>" 
                       class="px-6 py-3.5 rounded-2xl bg-white/10 hover:bg-white/20 text-white font-semibold text-sm border border-white/20 backdrop-blur-sm transition flex items-center gap-2.5">
                        <i class="fa-solid fa-list-check text-emerald-300"></i>
                        <span>Persyaratan 5 Surat</span>
                    </a>
                </div>
            </div>

            <!-- Right Hero Card / Visual -->
            <div class="lg:col-span-5">
                <div class="relative mx-auto max-w-md">
                    <!-- Glass Card -->
                    <div class="relative rounded-3xl bg-gradient-to-b from-white/15 to-white/5 border border-white/20 p-6 sm:p-8 backdrop-blur-xl shadow-2xl">
                        
                        <!-- Header badge -->
                        <div class="flex items-center justify-between pb-6 border-b border-white/10">
                            <div>
                                <span class="text-xs font-semibold uppercase text-emerald-400 tracking-wider">Maklumat Pelayanan</span>
                                <h3 class="text-lg font-bold text-white">Disiplin • Layanan • Kehormatan</h3>
                            </div>
                            <div class="w-12 h-12 rounded-2xl bg-emerald-500/20 border border-emerald-400/30 flex items-center justify-center text-emerald-300">
                                <i class="fa-solid fa-shield-halved text-2xl"></i>
                            </div>
                        </div>

                        <!-- 5 Letters Quick List -->
                        <div class="space-y-3.5 py-6">
                            <div class="flex items-center justify-between p-3 rounded-xl bg-white/5 hover:bg-white/10 border border-white/10 transition">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-lg bg-emerald-500/20 text-emerald-300 flex items-center justify-center text-xs">
                                        <i class="fa-solid fa-house"></i>
                                    </div>
                                    <span class="text-xs sm:text-sm font-medium text-slate-200">Keterangan Belum Punya Rumah</span>
                                </div>
                                <span class="text-[11px] px-2 py-0.5 rounded bg-emerald-500/20 text-emerald-300 border border-emerald-400/20">Online</span>
                            </div>

                            <div class="flex items-center justify-between p-3 rounded-xl bg-white/5 hover:bg-white/10 border border-white/10 transition">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-lg bg-teal-500/20 text-teal-300 flex items-center justify-center text-xs">
                                        <i class="fa-solid fa-book-skull"></i>
                                    </div>
                                    <span class="text-xs sm:text-sm font-medium text-slate-200">Keterangan Kematian (Manual)</span>
                                </div>
                                <span class="text-[11px] px-2 py-0.5 rounded bg-teal-500/20 text-teal-300 border border-teal-400/20">Online</span>
                            </div>

                            <div class="flex items-center justify-between p-3 rounded-xl bg-white/5 hover:bg-white/10 border border-white/10 transition">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-lg bg-cyan-500/20 text-cyan-300 flex items-center justify-center text-xs">
                                        <i class="fa-solid fa-user-check"></i>
                                    </div>
                                    <span class="text-xs sm:text-sm font-medium text-slate-200">Pengantar Belum Menikah</span>
                                </div>
                                <span class="text-[11px] px-2 py-0.5 rounded bg-cyan-500/20 text-cyan-300 border border-cyan-400/20">Online</span>
                            </div>

                            <div class="flex items-center justify-between p-3 rounded-xl bg-white/5 hover:bg-white/10 border border-white/10 transition">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-lg bg-amber-500/20 text-amber-300 flex items-center justify-center text-xs">
                                        <i class="fa-solid fa-hand-holding-dollar"></i>
                                    </div>
                                    <span class="text-xs sm:text-sm font-medium text-slate-200">Surat Keterangan Tidak Mampu (SKTM)</span>
                                </div>
                                <span class="text-[11px] px-2 py-0.5 rounded bg-amber-500/20 text-amber-300 border border-amber-400/20">Bansos</span>
                            </div>

                            <div class="flex items-center justify-between p-3 rounded-xl bg-emerald-500/15 border border-emerald-400/40 transition">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-lg bg-emerald-500 text-slate-900 flex items-center justify-center text-xs font-bold">
                                        <i class="fa-solid fa-heart"></i>
                                    </div>
                                    <div>
                                        <span class="text-xs sm:text-sm font-semibold text-white">Surat Pengantar Nikah (N1-N4)</span>
                                        <p class="text-[10px] text-emerald-300">Lengkap berkas 2 mempelai & ortu</p>
                                    </div>
                                </div>
                                <i class="fa-solid fa-chevron-right text-xs text-emerald-300"></i>
                            </div>
                        </div>

                        <!-- Footer mini stat -->
                        <div class="pt-4 border-t border-white/10 flex items-center justify-between text-xs text-slate-300">
                            <span><i class="fa-solid fa-circle-check text-emerald-400 mr-1.5"></i> Syarat Utama: <strong>Pengantar RT</strong></span>
                            <span class="text-emerald-300 font-medium">Bebas Pungli 100%</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Stats Strip -->
<section class="relative -mt-10 z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        
        <div class="p-6 rounded-3xl bg-white border border-slate-200/80 shadow-lg shadow-slate-200/50 flex items-center gap-4 hover:shadow-xl transition">
            <div class="w-14 h-14 rounded-2xl bg-emerald-100 text-emerald-700 flex items-center justify-center text-2xl font-bold">
                <i class="fa-solid fa-users"></i>
            </div>
            <div>
                <p class="text-2xl sm:text-3xl font-extrabold text-slate-900"><?php echo e(number_format($totalPenduduk, 0, ',', '.')); ?></p>
                <p class="text-xs sm:text-sm font-medium text-slate-500">Estimasi Penduduk</p>
            </div>
        </div>

        <div class="p-6 rounded-3xl bg-white border border-slate-200/80 shadow-lg shadow-slate-200/50 flex items-center gap-4 hover:shadow-xl transition">
            <div class="w-14 h-14 rounded-2xl bg-teal-100 text-teal-700 flex items-center justify-center text-2xl font-bold">
                <i class="fa-solid fa-sitemap"></i>
            </div>
            <div>
                <p class="text-2xl sm:text-3xl font-extrabold text-slate-900"><?php echo e($totalRT); ?> RT / <?php echo e($totalRW); ?> RW</p>
                <p class="text-xs sm:text-sm font-medium text-slate-500">Rukun Tetangga</p>
            </div>
        </div>

        <div class="p-6 rounded-3xl bg-white border border-slate-200/80 shadow-lg shadow-slate-200/50 flex items-center gap-4 hover:shadow-xl transition">
            <div class="w-14 h-14 rounded-2xl bg-cyan-100 text-cyan-700 flex items-center justify-center text-2xl font-bold">
                <i class="fa-solid fa-envelope-circle-check"></i>
            </div>
            <div>
                <p class="text-2xl sm:text-3xl font-extrabold text-slate-900"><?php echo e($totalPengajuan); ?> Permohonan</p>
                <p class="text-xs sm:text-sm font-medium text-slate-500">Surat Kependudukan</p>
            </div>
        </div>

        <div class="p-6 rounded-3xl bg-white border border-slate-200/80 shadow-lg shadow-slate-200/50 flex items-center gap-4 hover:shadow-xl transition">
            <div class="w-14 h-14 rounded-2xl bg-amber-100 text-amber-700 flex items-center justify-center text-2xl font-bold">
                <i class="fa-solid fa-medal"></i>
            </div>
            <div>
                <p class="text-2xl sm:text-3xl font-extrabold text-slate-900">100% Bebas Biaya</p>
                <p class="text-xs sm:text-sm font-medium text-slate-500">Pelayanan Gratis</p>
            </div>
        </div>

    </div>
</section>

<!-- Sambutan Lurah & Profil Singkat -->
<section class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <!-- Lurah Photo Card -->
            <div class="lg:col-span-5 order-2 lg:order-1">
                <div class="relative mx-auto max-w-sm">
                    <div class="absolute -inset-2 bg-gradient-to-r from-emerald-600 to-teal-500 rounded-3xl blur-lg opacity-30"></div>
                    <div class="relative rounded-3xl overflow-hidden bg-white border border-slate-200 shadow-xl">
                        <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=700&q=80" 
                             alt="Lurah Sungai Andai" 
                             class="w-full h-80 object-cover object-top">
                        <div class="p-6 text-center bg-gradient-to-b from-white to-slate-50">
                            <h4 class="text-lg font-bold text-slate-900">Bapak Sumiarji</h4>
                            <p class="text-xs font-semibold text-emerald-700 mb-1">Lurah Sungai Andai</p>
                            <p class="text-xs text-slate-500">Kecamatan Banjarmasin Utara, Kota Banjarmasin</p>
                            
                            <div class="mt-4 pt-4 border-t border-slate-200 flex items-center justify-around text-xs text-slate-600">
                                <div>
                                    <span class="block font-bold text-slate-900">NIP</span>
                                    <span>232111</span>
                                </div>
                                <div class="w-px h-6 bg-slate-200"></div>
                                <div>
                                    <span class="block font-bold text-slate-900">Pelayanan</span>
                                    <span class="text-emerald-600 font-semibold">Prima & Transparan</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sambutan Text -->
            <div class="lg:col-span-7 order-1 lg:order-2 space-y-6">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold uppercase tracking-wider">
                    <i class="fa-solid fa-quote-left"></i>
                    <span>Sambutan Pimpinan Wilayah</span>
                </div>

                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 leading-tight">
                    "Terwujudnya Pelayanan Prima dan Masyarakat Mandiri"
                </h2>

                <div class="prose text-slate-600 leading-relaxed text-sm sm:text-base space-y-4">
                    <p>
                        Assalamu’alaikum Warahmatullahi Wabarakatuh. Selamat datang di portal resmi Kelurahan Sungai Andai, Kota Banjarmasin.
                    </p>
                    <p>
                        Kelurahan Sungai Andai yang berdiri sejak pemekaran tahun 2010 kini telah berkembang menjadi kawasan pemukiman yang padat dan dinamis. Guna mengimbangi pertumbuhan tersebut, kami menghadirkan transformasi digital layanan administrasi kependudukan agar seluruh masyarakat dapat mengurus surat-surat resmi secara cepat, mudah, dan tertib administrasi.
                    </p>
                    <p>
                        Mulai dari <strong>Surat Keterangan Belum Memiliki Rumah, Surat Kematian Manual, Surat Keterangan Tidak Mampu (SKTM), Pengantar Belum Menikah</strong>, hingga <strong>Surat Pengantar Nikah</strong>, semuanya dapat diproses secara daring tanpa antre panjang di kantor kelurahan.
                    </p>
                </div>

                <div class="pt-2 flex flex-wrap gap-4 items-center">
                    <a href="<?php echo e(route('profil')); ?>" class="inline-flex items-center gap-2 text-emerald-700 hover:text-emerald-800 font-bold text-sm">
                        <span>Baca Sejarah & Visi Misi Lengkap</span>
                        <i class="fa-solid fa-arrow-right text-xs"></i>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- 5 Layanan Surat Interaktif (Main Feature Requested) -->
<section class="py-20 bg-white" id="layanan">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto space-y-4 mb-16">
            <span class="inline-block px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold uppercase tracking-wider">
                Layanan Administrasi Kependudukan
            </span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900">
                Pilih Jenis Surat yang Ingin Anda Urus
            </h2>
            <p class="text-slate-600 text-base">
                Seluruh pengurusan surat memerlukan dokumen dasar: <strong class="text-emerald-700">Surat Pengantar RT (Utama)</strong>, <strong class="text-emerald-700">Fotocopy Kartu Keluarga (KK)</strong>, dan <strong class="text-emerald-700">Fotocopy KTP</strong>.
            </p>
        </div>

        <!-- 5 Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <!-- 1. Belum Memiliki Rumah -->
            <div class="rounded-3xl bg-slate-50 border border-slate-200 p-7 hover:border-emerald-500 hover:shadow-xl transition-all duration-300 flex flex-col justify-between group">
                <div class="space-y-4">
                    <div class="w-14 h-14 rounded-2xl bg-emerald-100 text-emerald-700 flex items-center justify-center text-2xl group-hover:scale-110 transition-transform">
                        <i class="fa-solid fa-house-chimney"></i>
                    </div>
                    <div>
                        <span class="text-xs font-bold uppercase text-emerald-600 tracking-wider">Layanan Kependudukan</span>
                        <h3 class="text-xl font-bold text-slate-900 group-hover:text-emerald-700 transition">
                            Belum Memiliki Rumah
                        </h3>
                    </div>
                    <p class="text-sm text-slate-600 leading-relaxed">
                        Surat keterangan resmi yang menyatakan bahwa pemohon bersangkutan belum memiliki aset rumah/tempat tinggal pribadi (biasanya untuk pengajuan KPR Subsidi).
                    </p>

                    <div class="pt-3 border-t border-slate-200">
                        <p class="text-xs font-bold text-slate-700 mb-2 uppercase">Dokumen Persyaratan:</p>
                        <ul class="text-xs text-slate-600 space-y-1.5">
                            <li class="flex items-center gap-2">
                                <i class="fa-solid fa-circle-check text-emerald-600"></i>
                                <strong>Surat Pengantar RT (Asli / Utama)</strong>
                            </li>
                            <li class="flex items-center gap-2">
                                <i class="fa-solid fa-circle-check text-emerald-600"></i>
                                Fotocopy Kartu Keluarga (KK)
                            </li>
                            <li class="flex items-center gap-2">
                                <i class="fa-solid fa-circle-check text-emerald-600"></i>
                                Fotocopy KTP Pemohon
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="pt-6 mt-6 border-t border-slate-200">
                    <a href="<?php echo e(route('layanan.buat', ['id' => 1])); ?>" 
                       class="w-full py-2.5 px-4 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-sm text-center block transition shadow-md shadow-emerald-600/20">
                        Ajukan Surat Ini <i class="fa-solid fa-arrow-right ml-1 text-xs"></i>
                    </a>
                </div>
            </div>

            <!-- 2. Kematian Manual -->
            <div class="rounded-3xl bg-slate-50 border border-slate-200 p-7 hover:border-teal-500 hover:shadow-xl transition-all duration-300 flex flex-col justify-between group">
                <div class="space-y-4">
                    <div class="w-14 h-14 rounded-2xl bg-teal-100 text-teal-700 flex items-center justify-center text-2xl group-hover:scale-110 transition-transform">
                        <i class="fa-solid fa-ribbon"></i>
                    </div>
                    <div>
                        <span class="text-xs font-bold uppercase text-teal-600 tracking-wider">Layanan Pencatatan</span>
                        <h3 class="text-xl font-bold text-slate-900 group-hover:text-teal-700 transition">
                            Kematian (Manual)
                        </h3>
                    </div>
                    <p class="text-sm text-slate-600 leading-relaxed">
                        Surat keterangan kematian warga untuk pengurusan santunan, akta kematian Disdukcapil, pengurusan hak waris, atau administrasi pemakaman.
                    </p>

                    <div class="pt-3 border-t border-slate-200">
                        <p class="text-xs font-bold text-slate-700 mb-2 uppercase">Dokumen Persyaratan:</p>
                        <ul class="text-xs text-slate-600 space-y-1.5">
                            <li class="flex items-center gap-2">
                                <i class="fa-solid fa-circle-check text-teal-600"></i>
                                <strong>Surat Pengantar RT (Asli / Utama)</strong>
                            </li>
                            <li class="flex items-center gap-2">
                                <i class="fa-solid fa-circle-check text-teal-600"></i>
                                Fotocopy Kartu Keluarga (KK)
                            </li>
                            <li class="flex items-center gap-2">
                                <i class="fa-solid fa-circle-check text-teal-600"></i>
                                Fotocopy KTP Pemohon & Almarhum
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="pt-6 mt-6 border-t border-slate-200">
                    <a href="<?php echo e(route('layanan.buat', ['id' => 2])); ?>" 
                       class="w-full py-2.5 px-4 rounded-xl bg-teal-600 hover:bg-teal-700 text-white font-bold text-sm text-center block transition shadow-md shadow-teal-600/20">
                        Ajukan Surat Ini <i class="fa-solid fa-arrow-right ml-1 text-xs"></i>
                    </a>
                </div>
            </div>

            <!-- 3. Pengantar Belum Menikah -->
            <div class="rounded-3xl bg-slate-50 border border-slate-200 p-7 hover:border-cyan-500 hover:shadow-xl transition-all duration-300 flex flex-col justify-between group">
                <div class="space-y-4">
                    <div class="w-14 h-14 rounded-2xl bg-cyan-100 text-cyan-700 flex items-center justify-center text-2xl group-hover:scale-110 transition-transform">
                        <i class="fa-solid fa-user-tag"></i>
                    </div>
                    <div>
                        <span class="text-xs font-bold uppercase text-cyan-600 tracking-wider">Status Hubungan</span>
                        <h3 class="text-xl font-bold text-slate-900 group-hover:text-cyan-700 transition">
                            Pengantar Belum Menikah
                        </h3>
                    </div>
                    <p class="text-sm text-slate-600 leading-relaxed">
                        Surat keterangan resmi yang menyatakan bahwa pemohon belum pernah menikah, biasanya dibutuhkan untuk persyaratan kerja, ikatan dinas, CPNS, dll.
                    </p>

                    <div class="pt-3 border-t border-slate-200">
                        <p class="text-xs font-bold text-slate-700 mb-2 uppercase">Dokumen Persyaratan:</p>
                        <ul class="text-xs text-slate-600 space-y-1.5">
                            <li class="flex items-center gap-2">
                                <i class="fa-solid fa-circle-check text-cyan-600"></i>
                                <strong>Surat Pengantar RT (Asli / Utama)</strong>
                            </li>
                            <li class="flex items-center gap-2">
                                <i class="fa-solid fa-circle-check text-cyan-600"></i>
                                Fotocopy Kartu Keluarga (KK)
                            </li>
                            <li class="flex items-center gap-2">
                                <i class="fa-solid fa-circle-check text-cyan-600"></i>
                                Fotocopy KTP Pemohon
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="pt-6 mt-6 border-t border-slate-200">
                    <a href="<?php echo e(route('layanan.buat', ['id' => 3])); ?>" 
                       class="w-full py-2.5 px-4 rounded-xl bg-cyan-600 hover:bg-cyan-700 text-white font-bold text-sm text-center block transition shadow-md shadow-cyan-600/20">
                        Ajukan Surat Ini <i class="fa-solid fa-arrow-right ml-1 text-xs"></i>
                    </a>
                </div>
            </div>

            <!-- 4. SKTM -->
            <div class="rounded-3xl bg-slate-50 border border-slate-200 p-7 hover:border-amber-500 hover:shadow-xl transition-all duration-300 flex flex-col justify-between group">
                <div class="space-y-4">
                    <div class="w-14 h-14 rounded-2xl bg-amber-100 text-amber-700 flex items-center justify-center text-2xl group-hover:scale-110 transition-transform">
                        <i class="fa-solid fa-hand-holding-dollar"></i>
                    </div>
                    <div>
                        <span class="text-xs font-bold uppercase text-amber-600 tracking-wider">Sosial & Bantuan</span>
                        <h3 class="text-xl font-bold text-slate-900 group-hover:text-amber-700 transition">
                            SKTM (Tidak Mampu)
                        </h3>
                    </div>
                    <p class="text-sm text-slate-600 leading-relaxed">
                        Surat Keterangan Tidak Mampu untuk keringanan biaya rumah sakit, beasiswa/KIP Kuliah, program bantuan pangan, BPJS PBI, dll.
                    </p>

                    <div class="pt-3 border-t border-slate-200">
                        <p class="text-xs font-bold text-slate-700 mb-2 uppercase">Dokumen Persyaratan:</p>
                        <ul class="text-xs text-slate-600 space-y-1.5">
                            <li class="flex items-center gap-2">
                                <i class="fa-solid fa-circle-check text-amber-600"></i>
                                <strong>Surat Pengantar RT (Asli / Utama)</strong>
                            </li>
                            <li class="flex items-center gap-2">
                                <i class="fa-solid fa-circle-check text-amber-600"></i>
                                Fotocopy Kartu Keluarga (KK)
                            </li>
                            <li class="flex items-center gap-2">
                                <i class="fa-solid fa-circle-check text-amber-600"></i>
                                Fotocopy KTP Pemohon
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="pt-6 mt-6 border-t border-slate-200">
                    <a href="<?php echo e(route('layanan.buat', ['id' => 4])); ?>" 
                       class="w-full py-2.5 px-4 rounded-xl bg-amber-600 hover:bg-amber-700 text-white font-bold text-sm text-center block transition shadow-md shadow-amber-600/20">
                        Ajukan Surat Ini <i class="fa-solid fa-arrow-right ml-1 text-xs"></i>
                    </a>
                </div>
            </div>

            <!-- 5. Surat Pengantar Nikah (Featured / Extra Requirements) -->
            <div class="md:col-span-2 lg:col-span-2 rounded-3xl bg-gradient-to-br from-emerald-900 via-teal-900 to-slate-900 text-white p-7 sm:p-9 shadow-2xl relative overflow-hidden flex flex-col justify-between">
                <div class="absolute -right-20 -bottom-20 w-80 h-80 rounded-full bg-emerald-500/10 blur-2xl pointer-events-none"></div>

                <div class="space-y-6 relative z-10">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                        <div class="flex items-center gap-4">
                            <div class="w-16 h-16 rounded-2xl bg-emerald-500/20 border border-emerald-400/40 text-emerald-300 flex items-center justify-center text-3xl">
                                <i class="fa-solid fa-ring"></i>
                            </div>
                            <div>
                                <span class="px-2.5 py-0.5 rounded-full bg-emerald-400/20 border border-emerald-400/30 text-emerald-300 text-xs font-bold uppercase tracking-wider">
                                    Persyaratan Khusus & Lengkap
                                </span>
                                <h3 class="text-2xl sm:text-3xl font-extrabold text-white mt-1">
                                    Surat Pengantar Nikah (Model N1 - N4)
                                </h3>
                            </div>
                        </div>
                    </div>

                    <p class="text-sm text-slate-300 leading-relaxed max-w-3xl">
                        Surat rekomendasi pernikahan dari kelurahan menuju KUA Kecamatan. Sesuai regulasi kependudukan dan pencatatan nikah, permohonan ini memiliki beberapa persyaratan berkas tambahan dari kedua calon mempelai dan orang tua.
                    </p>

                    <!-- Persyaratan Grid Khusus Nikah -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2">
                        <div class="p-3.5 rounded-2xl bg-white/10 border border-white/10 space-y-2">
                            <span class="text-xs font-bold text-emerald-300 uppercase tracking-wider block">Berkas Dasar & Pengantar</span>
                            <ul class="text-xs text-slate-200 space-y-1.5">
                                <li class="flex items-center gap-2">
                                    <i class="fa-solid fa-circle-check text-emerald-400"></i>
                                    <strong>Surat Pengantar RT (Asli / Utama)</strong>
                                </li>
                                <li class="flex items-center gap-2">
                                    <i class="fa-solid fa-circle-check text-emerald-400"></i>
                                    Fotocopy KTP Pemohon & FC Kartu Keluarga
                                </li>
                                <li class="flex items-center gap-2">
                                    <i class="fa-solid fa-circle-check text-emerald-400"></i>
                                    Materai Rp 10.000 (Untuk surat pernyataan)
                                </li>
                            </ul>
                        </div>

                        <div class="p-3.5 rounded-2xl bg-white/10 border border-white/10 space-y-2">
                            <span class="text-xs font-bold text-cyan-300 uppercase tracking-wider block">Berkas Kedua Mempelai & Ortu</span>
                            <ul class="text-xs text-slate-200 space-y-1.5">
                                <li class="flex items-center gap-2">
                                    <i class="fa-solid fa-circle-check text-cyan-400"></i>
                                    KTP Orang Tua dari kedua belah mempelai
                                </li>
                                <li class="flex items-center gap-2">
                                    <i class="fa-solid fa-circle-check text-cyan-400"></i>
                                    FC Kartu Keluarga dari kedua mempelai
                                </li>
                                <li class="flex items-center gap-2">
                                    <i class="fa-solid fa-circle-check text-cyan-400"></i>
                                    FC Ijazah & FC Akta Kelahiran kedua mempelai
                                </li>
                                <li class="flex items-center gap-2">
                                    <i class="fa-solid fa-circle-check text-cyan-400"></i>
                                    Foto gandeng berdua & foto masing-masing 1 lembar
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="pt-8 mt-6 border-t border-white/10 flex flex-col sm:flex-row items-center justify-between gap-4 relative z-10">
                    <div class="text-xs text-slate-400 flex items-center gap-2">
                        <i class="fa-solid fa-file-pdf text-emerald-400 text-base"></i>
                        <span>Format blangko N1, N2, N4 disiapkan langsung oleh sistem</span>
                    </div>
                    <a href="<?php echo e(route('layanan.buat', ['id' => 5])); ?>" 
                       class="w-full sm:w-auto px-8 py-3 rounded-xl bg-gradient-to-r from-emerald-500 to-teal-400 text-slate-950 font-extrabold text-sm hover:from-emerald-400 hover:to-teal-300 transition text-center shadow-lg shadow-emerald-500/20">
                        Ajukan Pengantar Nikah Online <i class="fa-solid fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- SOP 4 Langkah Alur Pengurusan -->
<section class="py-20 bg-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto space-y-3 mb-16">
            <span class="text-xs font-bold uppercase tracking-wider text-emerald-700">Prosedur Pengurusan</span>
            <h2 class="text-3xl font-extrabold text-slate-900">4 Langkah Mudah Pengurusan Surat</h2>
            <p class="text-sm text-slate-600">Alur transparan tanpa perantara, bebas pungli dan dapat dipantau setiap saat.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <div class="p-6 rounded-3xl bg-white border border-slate-200/80 shadow-sm relative">
                <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-emerald-800 font-extrabold text-lg flex items-center justify-center mb-4">
                    1
                </div>
                <h4 class="text-base font-bold text-slate-900 mb-2">Pengantar dari RT</h4>
                <p class="text-xs text-slate-600 leading-relaxed">
                    Dapatkan surat pengantar tanda tangan dan stempel dari Ketua RT domisili setempat sebagai syarat utama.
                </p>
            </div>

            <div class="p-6 rounded-3xl bg-white border border-slate-200/80 shadow-sm relative">
                <div class="w-12 h-12 rounded-2xl bg-teal-100 text-teal-800 font-extrabold text-lg flex items-center justify-center mb-4">
                    2
                </div>
                <h4 class="text-base font-bold text-slate-900 mb-2">Ajukan & Unggah Berkas</h4>
                <p class="text-xs text-slate-600 leading-relaxed">
                    Pilih jenis surat, isi formulir data diri, dan upload foto/scan berkas persyaratan melalui website.
                </p>
            </div>

            <div class="p-6 rounded-3xl bg-white border border-slate-200/80 shadow-sm relative">
                <div class="w-12 h-12 rounded-2xl bg-cyan-100 text-cyan-800 font-extrabold text-lg flex items-center justify-center mb-4">
                    3
                </div>
                <h4 class="text-base font-bold text-slate-900 mb-2">Verifikasi & Penandatanganan</h4>
                <p class="text-xs text-slate-600 leading-relaxed">
                    Petugas loket memverifikasi data dan Lurah menandatangani surat secara resmi (estimasi 1x24 jam).
                </p>
            </div>

            <div class="p-6 rounded-3xl bg-white border border-slate-200/80 shadow-sm relative">
                <div class="w-12 h-12 rounded-2xl bg-amber-100 text-amber-800 font-extrabold text-lg flex items-center justify-center mb-4">
                    4
                </div>
                <h4 class="text-base font-bold text-slate-900 mb-2">Surat Selesai & Diterima</h4>
                <p class="text-xs text-slate-600 leading-relaxed">
                    Status berubah jadi "Selesai". Anda dapat mengunduh surat digital atau mengambil fisik surat asli di kantor.
                </p>
            </div>

        </div>
    </div>
</section>

<!-- Berita Terkini & Agenda -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-12">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-emerald-700">Publikasi Informasi</span>
                <h2 class="text-3xl font-extrabold text-slate-900">Kabar & Pengumuman Sungai Andai</h2>
            </div>
            <a href="<?php echo e(route('berita.index')); ?>" class="inline-flex items-center gap-1.5 text-sm font-bold text-emerald-700 hover:text-emerald-800">
                <span>Lihat Semua Berita</span>
                <i class="fa-solid fa-arrow-right text-xs"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php $__currentLoopData = $beritaTerbaru; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <article class="rounded-3xl overflow-hidden bg-slate-50 border border-slate-200 hover:shadow-xl transition-all duration-300 flex flex-col group">
                    <div class="relative h-48 overflow-hidden">
                        <img src="<?php echo e($b->gambar); ?>" 
                             alt="<?php echo e($b->judul); ?>" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <span class="absolute top-4 left-4 px-3 py-1 rounded-full text-xs font-bold bg-emerald-600 text-white shadow">
                            <?php echo e($b->kategori); ?>

                        </span>
                    </div>
                    <div class="p-6 flex-1 flex flex-col justify-between space-y-4">
                        <div class="space-y-2">
                            <span class="text-xs text-slate-500 flex items-center gap-1.5">
                                <i class="fa-regular fa-calendar"></i>
                                <?php echo e($b->tanggal_publikasi ? $b->tanggal_publikasi->translatedFormat('d F Y') : '-'); ?>

                            </span>
                            <h3 class="text-base font-bold text-slate-900 group-hover:text-emerald-700 transition line-clamp-2">
                                <a href="<?php echo e(route('berita.detail', $b->slug)); ?>">
                                    <?php echo e($b->judul); ?>

                                </a>
                            </h3>
                            <p class="text-xs text-slate-600 line-clamp-3 leading-relaxed">
                                <?php echo e($b->ringkasan); ?>

                            </p>
                        </div>
                        <a href="<?php echo e(route('berita.detail', $b->slug)); ?>" class="text-xs font-bold text-emerald-700 hover:text-emerald-800 inline-flex items-center gap-1 pt-2">
                            <span>Baca Selengkapnya</span>
                            <i class="fa-solid fa-chevron-right text-[10px]"></i>
                        </a>
                    </div>
                </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>

<!-- Galeri Foto Kegiatan Warga -->
<section class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-12">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-emerald-700">Dokumentasi</span>
                <h2 class="text-3xl font-extrabold text-slate-900">Galeri Kegiatan Masyarakat & Pelayanan</h2>
            </div>
            <a href="<?php echo e(route('galeri.index')); ?>" class="inline-flex items-center gap-1.5 text-sm font-bold text-emerald-700 hover:text-emerald-800">
                <span>Buka Galeri Foto</span>
                <i class="fa-solid fa-arrow-right text-xs"></i>
            </a>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            <?php $__currentLoopData = $galeri->take(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="group relative rounded-2xl overflow-hidden aspect-4/3 bg-slate-200 shadow-sm hover:shadow-lg transition">
                    <img src="<?php echo e($g->foto); ?>" 
                         alt="<?php echo e($g->judul); ?>" 
                         class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-slate-950/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity p-4 flex flex-col justify-end text-white">
                        <span class="text-[10px] font-semibold text-emerald-400 uppercase"><?php echo e($g->kategori); ?></span>
                        <h5 class="text-xs font-bold line-clamp-2"><?php echo e($g->judul); ?></h5>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>

<!-- Peta Lokasi & Kontak Cepat -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
            
            <div class="lg:col-span-5 space-y-6">
                <span class="text-xs font-bold uppercase tracking-wider text-emerald-700">Lokasi Kantor</span>
                <h2 class="text-3xl font-extrabold text-slate-900">Kunjungi Kantor Kelurahan Sungai Andai</h2>
                <p class="text-sm text-slate-600 leading-relaxed">
                    Kantor kami berlokasi strategis di kawasan pemukiman Sungai Andai. Anda dapat datang langsung untuk konsultasi tatap muka atau legalisir dokumen fisik.
                </p>

                <div class="space-y-4 pt-2">
                    <div class="flex items-start gap-3.5">
                        <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center text-lg mt-0.5">
                            <i class="fa-solid fa-map-location-dot"></i>
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-slate-900">Alamat Kantor</h4>
                            <p class="text-xs text-slate-600">Jl. AMD Sungai Andai Komplek Purnama Permai / Padat Karya, Banjarmasin Utara, Kota Banjarmasin, Kalimantan Selatan 70122</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3.5">
                        <div class="w-10 h-10 rounded-xl bg-teal-100 text-teal-700 flex items-center justify-center text-lg mt-0.5">
                            <i class="fa-solid fa-clock"></i>
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-slate-900">Jam Operasional Pelayanan</h4>
                            <p class="text-xs text-slate-600">Senin - Kamis: 08.00 - 15.00 WITA<br>Jumat: 08.00 - 11.30 WITA (Sabtu & Minggu Tutup)</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3.5">
                        <div class="w-10 h-10 rounded-xl bg-cyan-100 text-cyan-700 flex items-center justify-center text-lg mt-0.5">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-slate-900">Call Center & WhatsApp</h4>
                            <p class="text-xs text-slate-600">(0511) 330-ANDAI / 0812-3456-7890</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Map Iframe / Representation -->
            <div class="lg:col-span-7">
                <div class="rounded-3xl overflow-hidden border border-slate-200 shadow-xl h-96 relative bg-slate-100">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15933.278393392305!2d114.606275!3d-3.284351!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de423c14a275463%3A0xe549326a26df8018!2sSungai%20Andai%2C%20Kec.%20Banjarmasin%20Utara%2C%20Kota%20Banjarmasin%2C%20Kalimantan%20Selatan!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" 
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>

        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Recapitulasi\resources\views/home/index.blade.php ENDPATH**/ ?>