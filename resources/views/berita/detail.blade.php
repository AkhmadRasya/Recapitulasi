@extends('layouts.app')

@section('title', $berita->judul . ' - Kelurahan Sungai Andai')

@section('content')
<section class="py-12 bg-slate-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
        
        <!-- Breadcrumbs -->
        <nav class="flex items-center gap-2 text-xs text-slate-500">
            <a href="{{ route('home') }}" class="hover:text-emerald-700">Beranda</a>
            <span>/</span>
            <a href="{{ route('berita.index') }}" class="hover:text-emerald-700">Berita</a>
            <span>/</span>
            <span class="text-slate-900 truncate font-semibold">{{ $berita->judul }}</span>
        </nav>

        <article class="bg-white rounded-3xl border border-slate-200 overflow-hidden shadow-sm p-6 sm:p-10 space-y-6">
            
            <div class="space-y-3">
                <span class="inline-block px-3 py-1 rounded-full text-xs font-bold bg-emerald-100 text-emerald-800">
                    {{ $berita->kategori }}
                </span>
                <h1 class="text-2xl sm:text-4xl font-extrabold text-slate-900 leading-tight">
                    {{ $berita->judul }}
                </h1>
                
                <div class="flex flex-wrap items-center gap-4 text-xs text-slate-500 pt-2 border-b border-slate-100 pb-4">
                    <span class="flex items-center gap-1.5">
                        <i class="fa-regular fa-user text-emerald-600"></i>
                        {{ $berita->penulis ?? 'Humas Kelurahan' }}
                    </span>
                    <span class="flex items-center gap-1.5">
                        <i class="fa-regular fa-calendar text-emerald-600"></i>
                        {{ $berita->tanggal_publikasi ? $berita->tanggal_publikasi->translatedFormat('l, d F Y') : '-' }}
                    </span>
                    <span class="flex items-center gap-1.5">
                        <i class="fa-regular fa-eye text-emerald-600"></i>
                        {{ $berita->views }} kali dibaca
                    </span>
                </div>
            </div>

            <!-- Featured Image -->
            @if($berita->gambar)
                <div class="rounded-2xl overflow-hidden shadow-md max-h-[450px]">
                    <img src="{{ $berita->gambar }}" alt="{{ $berita->judul }}" class="w-full h-full object-cover">
                </div>
            @endif

            <!-- News Content -->
            <div class="prose max-w-none text-slate-700 leading-relaxed text-sm sm:text-base space-y-4">
                {!! $berita->isi !!}
            </div>

            <!-- Share Buttons -->
            <div class="pt-6 border-t border-slate-100 flex items-center justify-between">
                <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Bagikan Kabar:</span>
                <div class="flex items-center gap-2">
                    <a href="https://api.whatsapp.com/send?text={{ urlencode($berita->judul . ' ' . url()->current()) }}" target="_blank" class="w-8 h-8 rounded-lg bg-emerald-100 text-emerald-700 hover:bg-emerald-600 hover:text-white flex items-center justify-center text-xs transition">
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="w-8 h-8 rounded-lg bg-blue-100 text-blue-700 hover:bg-blue-600 hover:text-white flex items-center justify-center text-xs transition">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                </div>
            </div>

        </article>

        <!-- Berita Terkait -->
        @if($beritaTerkait->isNotEmpty())
            <div class="space-y-4 pt-6">
                <h3 class="text-lg font-bold text-slate-900">Informasi Terkait Lainnya</h3>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    @foreach($beritaTerkait as $bt)
                        <a href="{{ route('berita.detail', $bt->slug) }}" class="p-4 rounded-2xl bg-white border border-slate-200 hover:shadow-md transition block group">
                            <span class="text-[11px] text-slate-400 block mb-1">{{ $bt->tanggal_publikasi ? $bt->tanggal_publikasi->format('d M Y') : '' }}</span>
                            <h4 class="text-xs font-bold text-slate-900 group-hover:text-emerald-700 transition line-clamp-2">
                                {{ $bt->judul }}
                            </h4>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif

    </div>
</section>
@endsection

