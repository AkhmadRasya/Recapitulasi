@extends('layouts.app')

@section('title', 'Profil Kelurahan Sungai Andai - Banjarmasin Utara')

@section('content')
<!-- Page Header -->
<section class="bg-gradient-to-b from-emerald-900 to-teal-900 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-3">
        <span class="inline-block px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-bold uppercase tracking-wider border border-emerald-400/30">
            Tentang Wilayah
        </span>
        <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight">Profil Kelurahan Sungai Andai</h1>
        <p class="text-slate-300 text-sm sm:text-base max-w-2xl mx-auto">
            Mengenal sejarah berdirinya, visi misi, potensi wilayah, serta jajaran aparatur pelayanan kelurahan di Kecamatan Banjarmasin Utara.
        </p>
    </div>
</section>

<!-- Visi & Misi -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
            
            <!-- Visi -->
            <div class="p-8 rounded-3xl bg-gradient-to-br from-emerald-50 to-teal-50 border border-emerald-200/80 space-y-4">
                <div class="w-12 h-12 rounded-2xl bg-emerald-600 text-white flex items-center justify-center text-xl shadow-md">
                    <i class="fa-solid fa-bullseye"></i>
                </div>
                <h3 class="text-2xl font-extrabold text-slate-900">Visi Kelurahan</h3>
                <blockquote class="p-4 rounded-2xl bg-white border-l-4 border-emerald-600 text-emerald-950 font-bold text-lg italic shadow-xs">
                    “Terwujudnya Pelayanan Prima dan Masyarakat Mandiri”
                </blockquote>
                <p class="text-sm text-slate-600 leading-relaxed">
                    Visi ini menjadi landasan moral dan operasional seluruh jajaran aparatur kelurahan dalam memberikan pelayanan kependudukan yang cepat, transparan, dan tidak berbelit-belit.
                </p>
                <div class="pt-2">
                    <span class="text-xs font-bold uppercase text-emerald-800 tracking-wider">Motto Pelayanan:</span>
                    <p class="text-sm font-semibold text-slate-800 mt-1">
                        <i class="fa-solid fa-certificate text-emerald-600 mr-1.5"></i>
                        Disiplin • Pelayanan • Kehormatan
                    </p>
                </div>
            </div>

            <!-- Misi -->
            <div class="p-8 rounded-3xl bg-slate-50 border border-slate-200 space-y-4">
                <div class="w-12 h-12 rounded-2xl bg-teal-600 text-white flex items-center justify-center text-xl shadow-md">
                    <i class="fa-solid fa-list-ol"></i>
                </div>
                <h3 class="text-2xl font-extrabold text-slate-900">Misi Kelurahan</h3>
                <ul class="space-y-3 text-sm text-slate-700">
                    <li class="flex items-start gap-3">
                        <span class="w-6 h-6 rounded-full bg-teal-100 text-teal-800 font-bold text-xs flex items-center justify-center shrink-0 mt-0.5">1</span>
                        <span>Meningkatkan kualitas pelayanan administrasi kepada masyarakat secara optimal, adil, dan arif.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="w-6 h-6 rounded-full bg-teal-100 text-teal-800 font-bold text-xs flex items-center justify-center shrink-0 mt-0.5">2</span>
                        <span>Meningkatkan kapasitas dan profesionalitas sumber daya aparatur kelurahan yang berintegritas.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="w-6 h-6 rounded-full bg-teal-100 text-teal-800 font-bold text-xs flex items-center justify-center shrink-0 mt-0.5">3</span>
                        <span>Meningkatkan partisipasi aktif warga dalam menunjang program pemerintah Kota Banjarmasin.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="w-6 h-6 rounded-full bg-teal-100 text-teal-800 font-bold text-xs flex items-center justify-center shrink-0 mt-0.5">4</span>
                        <span>Menumbuhkembangkan budaya gotong royong dan kesadaran lingkungan pemukiman yang asri dan bersih.</span>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</section>

<!-- Sejarah & Asal Usul Nama -->
<section class="py-16 bg-slate-50 border-y border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <div class="lg:col-span-6 space-y-6">
                <span class="text-xs font-bold uppercase tracking-wider text-emerald-700">Latar Belakang Historis</span>
                <h2 class="text-3xl font-extrabold text-slate-900 leading-tight">
                    Sejarah Pembentukan Kelurahan Sungai Andai
                </h2>
                
                <div class="prose text-slate-600 text-sm leading-relaxed space-y-4">
                    <p>
                        Kelurahan Sungai Andai dibentuk secara yuridis berdasarkan <strong>Peraturan Daerah Kota Banjarmasin Nomor 01 Tahun 2010</strong> tentang Pembentukan Kelurahan Sungai Andai. Wilayah ini merupakan hasil pemekaran dari Kelurahan Sungai Jingah di Kecamatan Banjarmasin Utara dan resmi mandiri melayani warga sejak <strong>1 Agustus 2010</strong>.
                    </p>
                    <p>
                        Pemekaran dilakukan seiring dengan laju pertumbuhan pemukiman penduduk yang sangat cepat di kawasan sepanjang jalur lingkar utara dan Jl. Padat Karya / AMD, sehingga membutuhkan sentralisasi pelayanan pemerintahan tingkat kelurahan yang lebih dekat dengan masyarakat.
                    </p>
                    <div class="p-4 rounded-2xl bg-emerald-50 border border-emerald-200">
                        <h4 class="text-sm font-bold text-emerald-900 mb-1">Arti & Asal Nama "Sungai Andai"</h4>
                        <p class="text-xs text-emerald-800 leading-relaxed">
                            Nama "Sungai Andai" berasal dari dua sungai yang membelah kawasan ini. Dahulu dinamakan Sungai Landai karena dasarnya dangkal saat surut. Melalui semangat gotong royong warga untuk memperdalam dan merawat sungai sebagai urat nadi kehidupan, kata tersebut bertransformasi menjadi <strong>Sungai Andai (Andai = Harapan)</strong>, simbol doa agar wilayah ini menjadi tempat bermukim yang penuh harapan kebaikan.
                        </p>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-6 space-y-4">
                <div class="rounded-3xl overflow-hidden border border-slate-200 shadow-xl bg-white p-6 space-y-6">
                    <h3 class="text-lg font-bold text-slate-900 flex items-center gap-2">
                        <i class="fa-solid fa-map text-emerald-600"></i>
                        Data Geografis & Batas Wilayah
                    </h3>
                    
                    <div class="grid grid-cols-2 gap-4 text-xs">
                        <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200">
                            <span class="text-slate-500 block mb-1">Sebelah Utara</span>
                            <strong class="text-slate-900">Kabupaten Barito Kuala</strong>
                        </div>
                        <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200">
                            <span class="text-slate-500 block mb-1">Sebelah Selatan</span>
                            <strong class="text-slate-900">Kelurahan Sungai Jingah</strong>
                        </div>
                        <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200">
                            <span class="text-slate-500 block mb-1">Sebelah Timur</span>
                            <strong class="text-slate-900">Sungai Martapura / Barito Kuala</strong>
                        </div>
                        <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200">
                            <span class="text-slate-500 block mb-1">Sebelah Barat</span>
                            <strong class="text-slate-900">Kelurahan Antasan Kecil Timur</strong>
                        </div>
                    </div>

                    <div class="p-4 rounded-2xl bg-teal-50 border border-teal-200 text-xs text-teal-900 space-y-1">
                        <p class="font-bold">Karakteristik Wilayah:</p>
                        <p>Kelurahan Sungai Andai memiliki lebih dari 60 Rukun Tetangga (RT) yang tersebar di puluhan komplek perumahan, menjadikannya salah satu sentra pemukiman terpadat di Kota Banjarmasin.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Struktur Organisasi & Aparatur -->
<section class="py-16 bg-white" id="struktur">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto space-y-3 mb-12">
            <span class="text-xs font-bold uppercase tracking-wider text-emerald-700">Aparatur Pemerintahan</span>
            <h2 class="text-3xl font-extrabold text-slate-900">Struktur Organisasi & Pejabat Kelurahan</h2>
            <p class="text-sm text-slate-600">Pejabat struktural dan staf yang siap melayani kebutuhan administrasi warga.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($pegawai as $p)
                <div class="p-6 rounded-3xl bg-slate-50 border border-slate-200 hover:shadow-lg transition flex items-center gap-4">
                    <div class="w-16 h-16 rounded-2xl bg-gradient-to-tr from-emerald-600 to-teal-500 text-white flex items-center justify-center text-2xl font-bold shrink-0 shadow-md">
                        {{ strtoupper(substr($p->nama_pegawai, 0, 1)) }}
                    </div>
                    <div>
                        <h4 class="text-base font-bold text-slate-900">{{ $p->nama_pegawai }}</h4>
                        <p class="text-xs font-bold text-emerald-700 mb-1">{{ $p->jabatan }}</p>
                        <p class="text-[11px] text-slate-500">NIP: {{ $p->nip ?? '-' }}</p>
                        @if($p->no_hp)
                            <p class="text-[11px] text-slate-500">Kontak: {{ $p->no_hp }}</p>
                        @endif
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center text-slate-500 text-sm py-8">
                    Data pegawai belum diinputkan.
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection

