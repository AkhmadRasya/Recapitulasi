<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Website Resmi Kelurahan Sungai Andai - Banjarmasin Utara'); ?></title>
    <meta name="description" content="Portal Profil dan Layanan Administrasi Kependudukan Online Kelurahan Sungai Andai, Kecamatan Banjarmasin Utara, Kota Banjarmasin.">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    },
                    colors: {
                        primary: {
                            50: '#ecfdf5',
                            100: '#d1fae5',
                            500: '#10b981',
                            600: '#059669',
                            700: '#047857',
                            800: '#065f46',
                            900: '#064e3b',
                        },
                        secondary: {
                            50: '#f0f9ff',
                            600: '#0284c7',
                            700: '#0369a1',
                        }
                    }
                }
            }
        }
    </script>
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.5/dist/cdn.min.js"></script>
    
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        [x-cloak] { display: none !important; }
        .glass-nav {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
    </style>
    <?php echo $__env->yieldContent('styles'); ?>
</head>
<body class="bg-slate-50 text-slate-800 font-sans antialiased flex flex-col min-h-screen" x-data="{ mobileMenuOpen: false }">

    <!-- Top Announcement Bar -->
    <div class="bg-gradient-to-r from-emerald-800 to-teal-700 text-white text-xs sm:text-sm py-2 px-4 shadow-sm">
        <div class="max-w-7xl mx-auto flex flex-col sm:flex-row justify-between items-center gap-2">
            <div class="flex items-center gap-3">
                <span class="inline-flex items-center px-2 py-0.5 rounded text-[11px] font-semibold bg-emerald-500/30 text-emerald-100 border border-emerald-400/30">
                    <i class="fa-solid fa-clock mr-1.5"></i> Jam Layanan
                </span>
                <span class="text-emerald-100">Senin - Kamis: 08.00 - 15.00 | Jumat: 08.00 - 11.30 WITA</span>
            </div>
            <div class="flex items-center gap-4 text-emerald-100">
                <a href="tel:0511123456" class="hover:text-white transition flex items-center gap-1">
                    <i class="fa-solid fa-phone text-xs"></i> (0511) 330-ANDAI
                </a>
                <span class="text-emerald-300">|</span>
                <a href="<?php echo e(route('layanan.tracking')); ?>" class="hover:text-white font-medium underline underline-offset-2 flex items-center gap-1">
                    <i class="fa-solid fa-magnifying-glass text-xs"></i> Lacak Status Surat
                </a>
            </div>
        </div>
    </div>

    <!-- Main Navigation Bar -->
    <header class="glass-nav sticky top-0 z-50 border-b border-slate-200/80 shadow-sm transition-all duration-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                
                <!-- Logo & Brand -->
                <a href="<?php echo e(route('home')); ?>" class="flex items-center gap-3.5 group">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-emerald-700 to-teal-500 flex items-center justify-center text-white shadow-md shadow-emerald-700/20 group-hover:scale-105 transition-transform">
                        <i class="fa-solid fa-landmark-flag text-2xl"></i>
                    </div>
                    <div>
                        <div class="flex items-center gap-1.5">
                            <span class="text-xs font-bold tracking-wider uppercase text-emerald-700">Pemerintah Kota Banjarmasin</span>
                        </div>
                        <h1 class="text-lg sm:text-xl font-extrabold text-slate-900 group-hover:text-emerald-700 transition">
                            Kelurahan Sungai Andai
                        </h1>
                        <p class="text-xs text-slate-500 font-medium">Kecamatan Banjarmasin Utara</p>
                    </div>
                </a>

                <!-- Desktop Nav Links -->
                <nav class="hidden lg:flex items-center gap-1">
                    <a href="<?php echo e(route('home')); ?>" 
                       class="px-3.5 py-2 rounded-xl text-sm font-semibold transition <?php echo e(request()->routeIs('home') ? 'text-emerald-700 bg-emerald-50' : 'text-slate-600 hover:text-emerald-700 hover:bg-slate-100/70'); ?>">
                        Beranda
                    </a>
                    <a href="<?php echo e(route('profil')); ?>" 
                       class="px-3.5 py-2 rounded-xl text-sm font-semibold transition <?php echo e(request()->routeIs('profil') ? 'text-emerald-700 bg-emerald-50' : 'text-slate-600 hover:text-emerald-700 hover:bg-slate-100/70'); ?>">
                        Profil
                    </a>
                    <a href="<?php echo e(route('layanan.index')); ?>" 
                       class="px-3.5 py-2 rounded-xl text-sm font-semibold transition <?php echo e(request()->routeIs('layanan.*') ? 'text-emerald-700 bg-emerald-50' : 'text-slate-600 hover:text-emerald-700 hover:bg-slate-100/70'); ?>">
                        <span class="inline-flex items-center gap-1.5">
                            Layanan Surat
                            <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                        </span>
                    </a>
                    <a href="<?php echo e(route('statistik')); ?>" 
                       class="px-3.5 py-2 rounded-xl text-sm font-semibold transition <?php echo e(request()->routeIs('statistik') ? 'text-emerald-700 bg-emerald-50' : 'text-slate-600 hover:text-emerald-700 hover:bg-slate-100/70'); ?>">
                        Statistik
                    </a>
                    <a href="<?php echo e(route('berita.index')); ?>" 
                       class="px-3.5 py-2 rounded-xl text-sm font-semibold transition <?php echo e(request()->routeIs('berita.*') ? 'text-emerald-700 bg-emerald-50' : 'text-slate-600 hover:text-emerald-700 hover:bg-slate-100/70'); ?>">
                        Berita
                    </a>
                    <a href="<?php echo e(route('galeri.index')); ?>" 
                       class="px-3.5 py-2 rounded-xl text-sm font-semibold transition <?php echo e(request()->routeIs('galeri.*') ? 'text-emerald-700 bg-emerald-50' : 'text-slate-600 hover:text-emerald-700 hover:bg-slate-100/70'); ?>">
                        Galeri
                    </a>
                    <a href="<?php echo e(route('pengaduan')); ?>" 
                       class="px-3.5 py-2 rounded-xl text-sm font-semibold transition <?php echo e(request()->routeIs('pengaduan') ? 'text-emerald-700 bg-emerald-50' : 'text-slate-600 hover:text-emerald-700 hover:bg-slate-100/70'); ?>">
                        Pengaduan
                    </a>
                    <a href="<?php echo e(route('kontak')); ?>" 
                       class="px-3.5 py-2 rounded-xl text-sm font-semibold transition <?php echo e(request()->routeIs('kontak') ? 'text-emerald-700 bg-emerald-50' : 'text-slate-600 hover:text-emerald-700 hover:bg-slate-100/70'); ?>">
                        Kontak
                    </a>
                </nav>

                <!-- Actions -->
                <div class="hidden lg:flex items-center gap-3">
                    <a href="<?php echo e(route('layanan.buat')); ?>" 
                       class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 text-white font-semibold text-sm shadow-md shadow-emerald-600/20 hover:shadow-lg transition">
                        <i class="fa-solid fa-file-signature"></i>
                        Ajukan Surat
                    </a>
                    <?php if(auth()->guard()->check()): ?>
                        <a href="<?php echo e(route('admin.dashboard')); ?>" class="p-2.5 rounded-xl bg-slate-100 text-slate-700 hover:bg-slate-200 transition" title="Admin Panel">
                            <i class="fa-solid fa-gauge-high"></i>
                        </a>
                    <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>" class="p-2.5 rounded-xl border border-slate-200 text-slate-600 hover:text-emerald-700 hover:border-emerald-300 transition" title="Login Pegawai">
                            <i class="fa-solid fa-user-shield"></i>
                        </a>
                    <?php endif; ?>
                </div>

                <!-- Mobile Menu Button -->
                <div class="flex lg:hidden items-center gap-2">
                    <a href="<?php echo e(route('layanan.buat')); ?>" class="px-3 py-1.5 rounded-lg bg-emerald-600 text-white text-xs font-semibold">
                        Ajukan
                    </a>
                    <button @click="mobileMenuOpen = !mobileMenuOpen" 
                            class="p-2.5 rounded-xl border border-slate-200 text-slate-600 hover:bg-slate-100">
                        <i class="fa-solid" :class="mobileMenuOpen ? 'fa-xmark' : 'fa-bars'"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Drawer -->
        <div x-show="mobileMenuOpen" 
             x-cloak 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-4"
             class="lg:hidden border-t border-slate-200 bg-white px-4 pt-3 pb-6 shadow-xl space-y-1">
            <a href="<?php echo e(route('home')); ?>" class="block px-4 py-2.5 rounded-lg text-sm font-semibold <?php echo e(request()->routeIs('home') ? 'bg-emerald-50 text-emerald-700' : 'text-slate-700 hover:bg-slate-50'); ?>">Beranda</a>
            <a href="<?php echo e(route('profil')); ?>" class="block px-4 py-2.5 rounded-lg text-sm font-semibold <?php echo e(request()->routeIs('profil') ? 'bg-emerald-50 text-emerald-700' : 'text-slate-700 hover:bg-slate-50'); ?>">Profil Kelurahan</a>
            <a href="<?php echo e(route('layanan.index')); ?>" class="block px-4 py-2.5 rounded-lg text-sm font-semibold <?php echo e(request()->routeIs('layanan.*') ? 'bg-emerald-50 text-emerald-700' : 'text-slate-700 hover:bg-slate-50'); ?>">Layanan Surat Kependudukan</a>
            <a href="<?php echo e(route('layanan.tracking')); ?>" class="block px-4 py-2.5 rounded-lg text-sm font-semibold text-slate-700 hover:bg-slate-50">Lacak Pengajuan Surat</a>
            <a href="<?php echo e(route('statistik')); ?>" class="block px-4 py-2.5 rounded-lg text-sm font-semibold <?php echo e(request()->routeIs('statistik') ? 'bg-emerald-50 text-emerald-700' : 'text-slate-700 hover:bg-slate-50'); ?>">Data Statistik</a>
            <a href="<?php echo e(route('berita.index')); ?>" class="block px-4 py-2.5 rounded-lg text-sm font-semibold <?php echo e(request()->routeIs('berita.*') ? 'bg-emerald-50 text-emerald-700' : 'text-slate-700 hover:bg-slate-50'); ?>">Berita & Informasi</a>
            <a href="<?php echo e(route('galeri.index')); ?>" class="block px-4 py-2.5 rounded-lg text-sm font-semibold <?php echo e(request()->routeIs('galeri.*') ? 'bg-emerald-50 text-emerald-700' : 'text-slate-700 hover:bg-slate-50'); ?>">Galeri Kegiatan</a>
            <a href="<?php echo e(route('pengaduan')); ?>" class="block px-4 py-2.5 rounded-lg text-sm font-semibold <?php echo e(request()->routeIs('pengaduan') ? 'bg-emerald-50 text-emerald-700' : 'text-slate-700 hover:bg-slate-50'); ?>">Pengaduan & Aspirasi</a>
            <a href="<?php echo e(route('kontak')); ?>" class="block px-4 py-2.5 rounded-lg text-sm font-semibold <?php echo e(request()->routeIs('kontak') ? 'bg-emerald-50 text-emerald-700' : 'text-slate-700 hover:bg-slate-50'); ?>">Kontak & Lokasi</a>
            
            <div class="pt-4 border-t border-slate-100 flex flex-col gap-2">
                <a href="<?php echo e(route('layanan.buat')); ?>" class="w-full text-center py-2.5 rounded-xl bg-emerald-600 text-white font-semibold text-sm shadow">
                    Ajukan Surat Online
                </a>
                <?php if(auth()->guard()->check()): ?>
                    <a href="<?php echo e(route('admin.dashboard')); ?>" class="w-full text-center py-2 rounded-xl border border-emerald-600 text-emerald-700 font-semibold text-sm">
                        Dashboard Admin
                    </a>
                <?php else: ?>
                    <a href="<?php echo e(route('login')); ?>" class="w-full text-center py-2 rounded-xl border border-slate-300 text-slate-600 font-semibold text-sm">
                        Login Pegawai
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <!-- Global Notification Alerts -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 w-full">
        <?php if(session('success')): ?>
            <div class="p-4 mb-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 flex items-start gap-3 shadow-sm animate-fade-in" x-data="{ show: true }" x-show="show">
                <i class="fa-solid fa-circle-check text-emerald-600 text-lg mt-0.5"></i>
                <div class="flex-1 text-sm font-medium">
                    <?php echo e(session('success')); ?>

                </div>
                <button @click="show = false" class="text-emerald-500 hover:text-emerald-700">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
        <?php endif; ?>

        <?php if(session('error')): ?>
            <div class="p-4 mb-4 rounded-2xl bg-rose-50 border border-rose-200 text-rose-800 flex items-start gap-3 shadow-sm" x-data="{ show: true }" x-show="show">
                <i class="fa-solid fa-triangle-exclamation text-rose-600 text-lg mt-0.5"></i>
                <div class="flex-1 text-sm font-medium">
                    <?php echo e(session('error')); ?>

                </div>
                <button @click="show = false" class="text-rose-500 hover:text-rose-700">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
        <?php endif; ?>

        <?php if($errors->any()): ?>
            <div class="p-4 mb-4 rounded-2xl bg-amber-50 border border-amber-200 text-amber-800 flex items-start gap-3 shadow-sm">
                <i class="fa-solid fa-circle-exclamation text-amber-600 text-lg mt-0.5"></i>
                <div class="flex-1 text-sm">
                    <p class="font-semibold mb-1">Mohon periksa kembali isian formulir Anda:</p>
                    <ul class="list-disc list-inside space-y-0.5">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <!-- Main Content Area -->
    <main class="flex-grow">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <!-- Footer -->
    <footer class="bg-slate-900 text-slate-300 pt-16 pb-8 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 pb-12 border-b border-slate-800">
                
                <!-- About Col -->
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-emerald-600 flex items-center justify-center text-white">
                            <i class="fa-solid fa-landmark-flag text-xl"></i>
                        </div>
                        <div>
                            <span class="text-xs uppercase tracking-wider text-emerald-400 font-bold">Pemerintah Kota Banjarmasin</span>
                            <h4 class="text-white font-bold text-base">Kelurahan Sungai Andai</h4>
                        </div>
                    </div>
                    <p class="text-sm text-slate-400 leading-relaxed">
                        Kelurahan Sungai Andai merupakan wilayah pemekaran dari Kelurahan Sungai Jingah sejak 1 Agustus 2010 di Kecamatan Banjarmasin Utara, berkomitmen memberikan pelayanan prima yang cepat, transparan, dan akuntabel.
                    </p>
                    <div class="flex items-center gap-3 pt-2">
                        <a href="https://facebook.com" target="_blank" class="w-9 h-9 rounded-lg bg-slate-800 hover:bg-emerald-600 hover:text-white flex items-center justify-center transition">
                            <i class="fa-brands fa-facebook-f text-sm"></i>
                        </a>
                        <a href="https://instagram.com" target="_blank" class="w-9 h-9 rounded-lg bg-slate-800 hover:bg-emerald-600 hover:text-white flex items-center justify-center transition">
                            <i class="fa-brands fa-instagram text-sm"></i>
                        </a>
                        <a href="https://youtube.com" target="_blank" class="w-9 h-9 rounded-lg bg-slate-800 hover:bg-emerald-600 hover:text-white flex items-center justify-center transition">
                            <i class="fa-brands fa-youtube text-sm"></i>
                        </a>
                        <a href="https://wa.me/6281234567890" target="_blank" class="w-9 h-9 rounded-lg bg-slate-800 hover:bg-emerald-600 hover:text-white flex items-center justify-center transition">
                            <i class="fa-brands fa-whatsapp text-sm"></i>
                        </a>
                    </div>
                </div>

                <!-- 5 Surat Layanan Col -->
                <div>
                    <h5 class="text-white font-bold text-sm uppercase tracking-wider mb-4 border-l-2 border-emerald-500 pl-3">
                        Layanan Surat Utama
                    </h5>
                    <ul class="space-y-2.5 text-sm">
                        <li>
                            <a href="<?php echo e(route('layanan.buat', ['id' => 1])); ?>" class="hover:text-emerald-400 transition flex items-center gap-2">
                                <i class="fa-solid fa-chevron-right text-[10px] text-emerald-500"></i>
                                Belum Memiliki Rumah
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('layanan.buat', ['id' => 2])); ?>" class="hover:text-emerald-400 transition flex items-center gap-2">
                                <i class="fa-solid fa-chevron-right text-[10px] text-emerald-500"></i>
                                Kematian (Manual)
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('layanan.buat', ['id' => 3])); ?>" class="hover:text-emerald-400 transition flex items-center gap-2">
                                <i class="fa-solid fa-chevron-right text-[10px] text-emerald-500"></i>
                                Pengantar Belum Menikah
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('layanan.buat', ['id' => 4])); ?>" class="hover:text-emerald-400 transition flex items-center gap-2">
                                <i class="fa-solid fa-chevron-right text-[10px] text-emerald-500"></i>
                                Keterangan Tidak Mampu (SKTM)
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('layanan.buat', ['id' => 5])); ?>" class="hover:text-emerald-400 transition flex items-center gap-2">
                                <i class="fa-solid fa-chevron-right text-[10px] text-emerald-500"></i>
                                Pengantar Nikah (Model N1-N4)
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Quick Links -->
                <div>
                    <h5 class="text-white font-bold text-sm uppercase tracking-wider mb-4 border-l-2 border-emerald-500 pl-3">
                        Akses Cepat
                    </h5>
                    <ul class="space-y-2.5 text-sm">
                        <li><a href="<?php echo e(route('profil')); ?>" class="hover:text-emerald-400 transition">Visi & Misi Kelurahan</a></li>
                        <li><a href="<?php echo e(route('profil')); ?>#struktur" class="hover:text-emerald-400 transition">Struktur Organisasi</a></li>
                        <li><a href="<?php echo e(route('layanan.tracking')); ?>" class="hover:text-emerald-400 transition">Lacak Pengajuan Surat</a></li>
                        <li><a href="<?php echo e(route('statistik')); ?>" class="hover:text-emerald-400 transition">Demografi & Statistik RT/RW</a></li>
                        <li><a href="<?php echo e(route('pengaduan')); ?>" class="hover:text-emerald-400 transition">Kanal Pengaduan Warga</a></li>
                        <li><a href="https://banjarmasinkota.go.id" target="_blank" class="hover:text-emerald-400 transition">Portal Pemko Banjarmasin</a></li>
                    </ul>
                </div>

                <!-- Kontak Kantor -->
                <div>
                    <h5 class="text-white font-bold text-sm uppercase tracking-wider mb-4 border-l-2 border-emerald-500 pl-3">
                        Kantor Kelurahan
                    </h5>
                    <ul class="space-y-3 text-sm text-slate-400">
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-location-dot text-emerald-400 mt-1"></i>
                            <span>Jl. AMD Sungai Andai Komplek Purnama Permai / Padat Karya, Banjarmasin Utara, Kota Banjarmasin, Kalsel 70122</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fa-solid fa-phone text-emerald-400"></i>
                            <span>(0511) 330-ANDAI / 0812-3456-7890</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fa-solid fa-envelope text-emerald-400"></i>
                            <span>kelurahan.sungaiandai@banjarmasinkota.go.id</span>
                        </li>
                    </ul>
                </div>

            </div>

            <!-- Bottom Copyright & Internship Attribution -->
            <div class="pt-8 flex flex-col md:flex-row items-center justify-between gap-4 text-xs text-slate-500">
                <p>
                    &copy; <?php echo e(date('Y')); ?> Pemerintah Kelurahan Sungai Andai - Banjarmasin Utara. Hak Cipta Dilindungi.
                </p>
                <p class="flex items-center gap-2">
                    <span class="inline-block w-2 h-2 rounded-full bg-emerald-500"></span>
                    <span>Tugas Akhir / Praktik Kerja Lapangan (PKL) Mahasiswa Semester 7</span>
                </p>
            </div>
        </div>
    </footer>

    <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>

<?php /**PATH C:\laragon\www\Recapitulasi\resources\views/layouts/app.blade.php ENDPATH**/ ?>