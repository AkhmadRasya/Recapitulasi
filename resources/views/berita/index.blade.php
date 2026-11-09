@extends('layouts.app')

@section('title', 'Berita & Pengumuman - Kelurahan Sungai Andai')

@section('content')
<section class="bg-gradient-to-b from-emerald-900 to-teal-900 text-white py-14">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-3">
        <span class="inline-block px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-bold uppercase tracking-wider border border-emerald-400/30">
            Pusat Informasi
        </span>
        <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Kabar, Agenda & Pengumuman Warga</h1>
        <p class="text-slate-300 text-xs sm:text-sm max-w-xl mx-auto">
            Informasi terkini seputar kegiatan masyarakat, gotong royong, program bantuan sosial, dan kebijakan Pemerintah Kota Banjarmasin di Sungai Andai.
        </p>

        <!-- Search Bar -->
        <div class="max-w-md mx-auto pt-4">
            <form action="{{ route('berita.index') }}" method="GET" class="p-1.5 rounded-2xl bg-white shadow-xl flex items-center gap-2">
                <i class="fa-solid fa-magnifying-glass text-slate-400 ml-3"></i>
                <input type="text" name="q" value="{{ $search ?? '' }}" placeholder="Cari berita atau pengumuman..." class="w-full bg-transparent text-xs py-2 text-slate-800 placeholder-slate-400 focus:outline-none">
                <button type="submit" class="px-4 py-2 rounded-xl bg-emerald-600 text-white font-bold text-xs hover:bg-emerald-700">
                    Cari
                </button>
            </form>
        </div>
    </div>
</section>

<section class="py-16 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Category Filter -->
        <div class="flex flex-wrap items-center gap-2 mb-10 pb-4 border-b border-slate-200">
            <a href="{{ route('berita.index') }}" class="px-4 py-2 rounded-xl text-xs font-bold transition {{ !$kategori ? 'bg-emerald-600 text-white shadow-sm' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200' }}">
                Semua Kategori
            </a>
            @foreach($kategoriList as $kat)
                <a href="{{ route('berita.index', ['kategori' => $kat]) }}" class="px-4 py-2 rounded-xl text-xs font-bold transition {{ $kategori === $kat ? 'bg-emerald-600 text-white shadow-sm' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200' }}">
                    {{ $kat }}
                </a>
            @endforeach
        </div>

        <!-- News Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($berita as $b)
                <article class="rounded-3xl overflow-hidden bg-white border border-slate-200 hover:shadow-xl transition-all duration-300 flex flex-col group">
                    <div class="relative h-48 overflow-hidden bg-slate-100">
                        <img src="{{ $b->gambar }}" 
                             alt="{{ $b->judul }}" 
                             class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        <span class="absolute top-4 left-4 px-3 py-1 rounded-full text-xs font-bold bg-emerald-600 text-white shadow">
                            {{ $b->kategori }}
                        </span>
                    </div>
                    <div class="p-6 flex-1 flex flex-col justify-between space-y-4">
                        <div class="space-y-2">
                            <span class="text-xs text-slate-400 flex items-center gap-1.5">
                                <i class="fa-regular fa-calendar"></i>
                                {{ $b->tanggal_publikasi ? $b->tanggal_publikasi->translatedFormat('d F Y') : '-' }}
                                <span class="text-slate-300">•</span>
                                <i class="fa-regular fa-eye ml-1"></i> {{ $b->views }} dilihat
                            </span>
                            <h3 class="text-base font-bold text-slate-900 group-hover:text-emerald-700 transition line-clamp-2">
                                <a href="{{ route('berita.detail', $b->slug) }}">
                                    {{ $b->judul }}
                                </a>
                            </h3>
                            <p class="text-xs text-slate-600 line-clamp-3 leading-relaxed">
                                {{ $b->ringkasan }}
                            </p>
                        </div>
                        <a href="{{ route('berita.detail', $b->slug) }}" class="text-xs font-bold text-emerald-700 hover:text-emerald-800 inline-flex items-center gap-1 pt-2">
                            <span>Baca Selengkapnya</span>
                            <i class="fa-solid fa-chevron-right text-[10px]"></i>
                        </a>
                    </div>
                </article>
            @empty
                <div class="col-span-3 text-center py-16 bg-white rounded-3xl border border-slate-200 text-slate-500 text-sm">
                    Belum ada berita atau informasi yang sesuai kriteria pencarian Anda.
                </div>
            @endforelse
        </div>

        <div class="mt-12">
            {{ $berita->links() }}
        </div>

    </div>
</section>
@endsection

