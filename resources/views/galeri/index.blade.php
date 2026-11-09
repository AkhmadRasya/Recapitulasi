@extends('layouts.app')

@section('title', 'Galeri Kegiatan - Kelurahan Sungai Andai')

@section('content')
<section class="bg-gradient-to-b from-emerald-900 to-teal-900 text-white py-14">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-3">
        <span class="inline-block px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-bold uppercase tracking-wider border border-emerald-400/30">
            Dokumentasi Visual
        </span>
        <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Galeri Foto Kegiatan & Pelayanan</h1>
        <p class="text-slate-300 text-xs sm:text-sm max-w-xl mx-auto">
            Potret kehidupan masyarakat, kebersamaan gotong royong, fasilitas kantor kelurahan, serta kegiatan pelayanan terpadu.
        </p>
    </div>
</section>

<section class="py-16 bg-slate-50" x-data="{ selectedModalImg: null }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Category Filter -->
        <div class="flex flex-wrap items-center gap-2 mb-10 pb-4 border-b border-slate-200">
            <a href="{{ route('galeri.index') }}" class="px-4 py-2 rounded-xl text-xs font-bold transition {{ !$kategori ? 'bg-emerald-600 text-white shadow-sm' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200' }}">
                Semua Foto
            </a>
            @foreach($kategoriList as $kat)
                <a href="{{ route('galeri.index', ['kategori' => $kat]) }}" class="px-4 py-2 rounded-xl text-xs font-bold transition {{ $kategori === $kat ? 'bg-emerald-600 text-white shadow-sm' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200' }}">
                    {{ $kat }}
                </a>
            @endforeach
        </div>

        <!-- Grid Images -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($galeri as $g)
                <div class="group rounded-3xl overflow-hidden bg-white border border-slate-200 shadow-sm hover:shadow-xl transition-all duration-300 cursor-pointer flex flex-col"
                     @click="selectedModalImg = { url: '{{ $g->foto }}', title: '{{ $g->judul }}', desc: '{{ $g->keterangan }}' }">
                    <div class="relative aspect-4/3 overflow-hidden bg-slate-100">
                        <img src="{{ $g->foto }}" alt="{{ $g->judul }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        <span class="absolute top-3 left-3 px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-slate-900/80 text-white backdrop-blur-xs">
                            {{ $g->kategori }}
                        </span>
                    </div>
                    <div class="p-4 flex-1 flex flex-col justify-between">
                        <h4 class="text-xs font-bold text-slate-900 group-hover:text-emerald-700 transition line-clamp-2">{{ $g->judul }}</h4>
                        <p class="text-[11px] text-slate-400 mt-2 flex items-center justify-between">
                            <span>{{ $g->tanggal ? $g->tanggal->format('d M Y') : '' }}</span>
                            <span class="text-emerald-600 font-bold group-hover:underline">Perbesar &rarr;</span>
                        </p>
                    </div>
                </div>
            @empty
                <div class="col-span-4 text-center py-16 bg-white rounded-3xl border border-slate-200 text-slate-500 text-sm">
                    Belum ada foto kegiatan di galeri.
                </div>
            @endforelse
        </div>

        <div class="mt-12">
            {{ $galeri->links() }}
        </div>

        <!-- Modal Lightbox Preview -->
        <div x-show="selectedModalImg" 
             x-cloak 
             @click.away="selectedModalImg = null"
             class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-950/80 backdrop-blur-sm">
            <div class="bg-white rounded-3xl overflow-hidden max-w-2xl w-full shadow-2xl space-y-4" @click.stop>
                <div class="relative bg-slate-900 max-h-[70vh] flex items-center justify-center">
                    <img :src="selectedModalImg?.url" :alt="selectedModalImg?.title" class="max-h-[70vh] w-auto object-contain">
                    <button @click="selectedModalImg = null" class="absolute top-3 right-3 w-8 h-8 rounded-full bg-slate-900/60 hover:bg-slate-900 text-white flex items-center justify-center text-xs">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="p-6">
                    <h3 class="text-base font-bold text-slate-900" x-text="selectedModalImg?.title"></h3>
                    <p class="text-xs text-slate-600 mt-1" x-text="selectedModalImg?.desc"></p>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection

