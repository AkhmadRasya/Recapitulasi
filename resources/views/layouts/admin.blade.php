<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel - Kelurahan Sungai Andai')</title>
    
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
                            500: '#10b981',
                            600: '#059669',
                            700: '#047857',
                            800: '#065f46',
                            900: '#064e3b',
                        }
                    }
                }
            }
        }
    </script>
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.5/dist/cdn.min.js"></script>

    <style>
        [x-cloak] { display: none !important; }
    </style>
    @yield('styles')
</head>
<body class="bg-slate-100 font-sans text-slate-800 antialiased" x-data="{ sidebarOpen: false }">

    <div class="min-h-screen flex flex-col lg:flex-row">
        
        <!-- Sidebar Navigation -->
        <aside class="fixed inset-y-0 left-0 z-50 w-64 bg-slate-900 text-slate-300 transform transition-transform duration-200 lg:translate-x-0 lg:static flex flex-col"
               :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">
            
            <!-- Sidebar Header -->
            <div class="h-20 flex items-center gap-3 px-6 border-b border-slate-800 bg-slate-950">
                <div class="w-10 h-10 rounded-xl bg-emerald-600 flex items-center justify-center text-white shadow-md">
                    <i class="fa-solid fa-landmark text-lg"></i>
                </div>
                <div>
                    <h2 class="text-sm font-bold text-white uppercase tracking-wider">Kel. Sungai Andai</h2>
                    <p class="text-xs text-emerald-400">Sistem Administrasi</p>
                </div>
            </div>

            <!-- Sidebar Nav Links -->
            <nav class="flex-1 px-4 py-6 space-y-1 overflow-y-auto">
                <div class="px-3 pb-2 text-[11px] font-bold uppercase tracking-wider text-slate-500">Menu Utama</div>

                <a href="{{ route('admin.dashboard') }}" 
                   class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('admin.dashboard') ? 'bg-emerald-600 text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    <i class="fa-solid fa-gauge-high w-5 text-center"></i>
                    Dashboard
                </a>

                <a href="{{ route('admin.pengajuan.index') }}" 
                   class="flex items-center justify-between px-3 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('admin.pengajuan.*') ? 'bg-emerald-600 text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-inbox w-5 text-center"></i>
                        <span>Pengajuan Surat</span>
                    </div>
                    @php
                        $pendingCount = \App\Models\PengajuanSurat::where('status', 'Menunggu')->count();
                    @endphp
                    @if($pendingCount > 0)
                        <span class="px-2 py-0.5 text-xs rounded-full bg-amber-500 text-white font-bold">{{ $pendingCount }}</span>
                    @endif
                </a>

                <div class="pt-6 px-3 pb-2 text-[11px] font-bold uppercase tracking-wider text-slate-500">Data Master</div>

                <a href="{{ route('admin.penduduk.index') }}" 
                   class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('admin.penduduk.*') ? 'bg-emerald-600 text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    <i class="fa-solid fa-users w-5 text-center"></i>
                    Data Penduduk
                </a>

                <a href="{{ route('admin.pegawai.index') }}" 
                   class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('admin.pegawai.*') ? 'bg-emerald-600 text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    <i class="fa-solid fa-user-tie w-5 text-center"></i>
                    Aparatur / Pegawai
                </a>

                <div class="pt-6 px-3 pb-2 text-[11px] font-bold uppercase tracking-wider text-slate-500">Informasi Publik</div>

                <a href="{{ route('admin.berita.index') }}" 
                   class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('admin.berita.*') ? 'bg-emerald-600 text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    <i class="fa-solid fa-newspaper w-5 text-center"></i>
                    Berita & Pengumuman
                </a>

                <a href="{{ route('admin.pengaduan.index') }}" 
                   class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('admin.pengaduan.*') ? 'bg-emerald-600 text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    <i class="fa-solid fa-bullhorn w-5 text-center"></i>
                    Pengaduan Warga
                </a>
            </nav>

            <!-- Bottom User & Exit -->
            <div class="p-4 border-t border-slate-800 bg-slate-950/70">
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-9 h-9 rounded-full bg-emerald-700 text-white flex items-center justify-center font-bold text-sm">
                        {{ strtoupper(substr(auth()->user()->nama_lengkap ?? 'A', 0, 1)) }}
                    </div>
                    <div class="flex-1 truncate">
                        <p class="text-xs font-semibold text-white truncate">{{ auth()->user()->nama_lengkap ?? 'Petugas' }}</p>
                        <p class="text-[11px] text-emerald-400 capitalize">{{ auth()->user()->role ?? 'Admin' }}</p>
                    </div>
                </div>

                <div class="flex items-center gap-2">
                    <a href="{{ route('home') }}" target="_blank" class="flex-1 text-center py-1.5 rounded-lg bg-slate-800 text-xs font-semibold text-slate-300 hover:bg-slate-700 transition">
                        <i class="fa-solid fa-arrow-up-right-from-square mr-1"></i> Web Profil
                    </a>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="p-1.5 rounded-lg bg-rose-900/40 text-rose-300 hover:bg-rose-900/80 transition" title="Keluar">
                            <i class="fa-solid fa-right-from-bracket"></i>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Overlay on Mobile -->
        <div x-show="sidebarOpen" 
             x-cloak 
             @click="sidebarOpen = false" 
             class="fixed inset-0 z-40 bg-slate-900/60 backdrop-blur-xs lg:hidden"></div>

        <!-- Main Content Wrapper -->
        <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
            
            <!-- Top Bar -->
            <header class="h-20 bg-white border-b border-slate-200 flex items-center justify-between px-4 sm:px-6 lg:px-8">
                <div class="flex items-center gap-3">
                    <button @click="sidebarOpen = !sidebarOpen" class="p-2 rounded-lg border border-slate-200 text-slate-600 lg:hidden hover:bg-slate-100">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                    <div>
                        <h1 class="text-lg font-bold text-slate-800">@yield('page_title', 'Dashboard')</h1>
                        <p class="text-xs text-slate-500">Kelurahan Sungai Andai, Banjarmasin Utara</p>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <span class="hidden sm:inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 mr-2 animate-ping"></span>
                        Sistem Aktif
                    </span>
                    <a href="{{ route('home') }}" target="_blank" class="hidden md:inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold bg-slate-100 text-slate-700 hover:bg-slate-200 transition">
                        <i class="fa-solid fa-globe"></i> Lihat Portal Publik
                    </a>
                </div>
            </header>

            <!-- Main Page Content -->
            <main class="flex-1 p-4 sm:p-6 lg:p-8 overflow-y-auto">
                @if(session('success'))
                    <div class="p-4 mb-6 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 flex items-center gap-3 shadow-sm">
                        <i class="fa-solid fa-circle-check text-emerald-600 text-lg"></i>
                        <span class="text-sm font-medium">{{ session('success') }}</span>
                    </div>
                @endif

                @if(session('error'))
                    <div class="p-4 mb-6 rounded-2xl bg-rose-50 border border-rose-200 text-rose-800 flex items-center gap-3 shadow-sm">
                        <i class="fa-solid fa-triangle-exclamation text-rose-600 text-lg"></i>
                        <span class="text-sm font-medium">{{ session('error') }}</span>
                    </div>
                @endif

                @yield('content')
            </main>

        </div>
    </div>

    @yield('scripts')
</body>
</html>

