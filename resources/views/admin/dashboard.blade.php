@extends('layouts.admin')

@section('title', 'Dashboard Pelayanan - Kelurahan Sungai Andai')
@section('page_title', 'Dashboard Pelayanan Administrasi')

@section('content')
<div class="space-y-8">
    
    <!-- Top Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        
        <div class="p-5 rounded-2xl bg-white border border-slate-200 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-xs font-semibold text-slate-500 uppercase">Menunggu Verifikasi</span>
                <p class="text-2xl font-black text-amber-600 mt-1">{{ $totalMenunggu }}</p>
                <span class="text-[11px] text-amber-700 font-medium">Perlu ditindaklanjuti</span>
            </div>
            <div class="w-12 h-12 rounded-xl bg-amber-100 text-amber-700 flex items-center justify-center text-xl">
                <i class="fa-solid fa-clock"></i>
            </div>
        </div>

        <div class="p-5 rounded-2xl bg-white border border-slate-200 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-xs font-semibold text-slate-500 uppercase">Sedang Diproses</span>
                <p class="text-2xl font-black text-blue-600 mt-1">{{ $totalDiproses }}</p>
                <span class="text-[11px] text-blue-700 font-medium">Dalam penandatanganan</span>
            </div>
            <div class="w-12 h-12 rounded-xl bg-blue-100 text-blue-700 flex items-center justify-center text-xl">
                <i class="fa-solid fa-spinner"></i>
            </div>
        </div>

        <div class="p-5 rounded-2xl bg-white border border-slate-200 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-xs font-semibold text-slate-500 uppercase">Surat Selesai</span>
                <p class="text-2xl font-black text-emerald-600 mt-1">{{ $totalSelesai }}</p>
                <span class="text-[11px] text-emerald-700 font-medium">Telah diterbitkan</span>
            </div>
            <div class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center text-xl">
                <i class="fa-solid fa-circle-check"></i>
            </div>
        </div>

        <div class="p-5 rounded-2xl bg-white border border-slate-200 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-xs font-semibold text-slate-500 uppercase">Total Pengajuan</span>
                <p class="text-2xl font-black text-slate-900 mt-1">{{ $totalPengajuan }}</p>
                <span class="text-[11px] text-slate-500 font-medium">Permohonan masuk</span>
            </div>
            <div class="w-12 h-12 rounded-xl bg-slate-100 text-slate-700 flex items-center justify-center text-xl">
                <i class="fa-solid fa-folder-open"></i>
            </div>
        </div>

    </div>

    <!-- Rekapitulasi 5 Jenis Surat -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        <!-- Table 5 Surat -->
        <div class="lg:col-span-7 bg-white rounded-2xl border border-slate-200 shadow-xs p-6 space-y-4">
            <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                <h3 class="text-sm font-bold text-slate-900 uppercase tracking-wider">
                    Rekapitulasi Permohonan per Jenis Surat
                </h3>
                <span class="text-xs font-semibold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded">5 Surat Utama</span>
            </div>

            <div class="divide-y divide-slate-100">
                @foreach($rekapPerJenis as $rj)
                    <div class="py-3 flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <span class="w-7 h-7 rounded-lg bg-emerald-100 text-emerald-800 text-xs font-bold flex items-center justify-center">
                                {{ $rj->id_jenis }}
                            </span>
                            <span class="text-xs sm:text-sm font-semibold text-slate-800">{{ $rj->nama_surat }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="px-2.5 py-1 rounded-full text-xs font-bold bg-slate-100 text-slate-800">
                                {{ $rj->pengajuan_count }} berkas
                            </span>
                            <a href="{{ route('admin.pengajuan.index', ['id_jenis' => $rj->id_jenis]) }}" class="text-xs text-emerald-600 hover:text-emerald-700 font-semibold">
                                Lihat &rarr;
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Quick Summary Box -->
        <div class="lg:col-span-5 bg-gradient-to-br from-slate-900 to-slate-800 rounded-2xl text-white p-6 shadow-xs flex flex-col justify-between space-y-6">
            <div class="space-y-4">
                <div class="flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 animate-pulse"></span>
                    <span class="text-xs uppercase font-bold text-emerald-400 tracking-wider">Statistik Database</span>
                </div>
                <h4 class="text-xl font-bold">Ringkasan Sistem Kelurahan</h4>
                <div class="grid grid-cols-2 gap-3 text-xs">
                    <div class="p-3 rounded-xl bg-white/10 border border-white/10">
                        <span class="text-slate-400 block mb-1">Penduduk Terdata</span>
                        <strong class="text-base font-bold text-white">{{ $totalPenduduk }}</strong>
                    </div>
                    <div class="p-3 rounded-xl bg-white/10 border border-white/10">
                        <span class="text-slate-400 block mb-1">Aparatur / Pegawai</span>
                        <strong class="text-base font-bold text-white">{{ $totalPegawai }}</strong>
                    </div>
                    <div class="p-3 rounded-xl bg-white/10 border border-white/10">
                        <span class="text-slate-400 block mb-1">Berita & Informasi</span>
                        <strong class="text-base font-bold text-white">{{ $totalBerita }}</strong>
                    </div>
                    <div class="p-3 rounded-xl bg-white/10 border border-white/10">
                        <span class="text-slate-400 block mb-1">Aspirasi Baru</span>
                        <strong class="text-base font-bold text-amber-300">{{ $totalPengaduan }}</strong>
                    </div>
                </div>
            </div>

            <div class="pt-4 border-t border-white/10 flex items-center justify-between text-xs">
                <span class="text-slate-400">Pemerintah Kelurahan Sungai Andai</span>
                <a href="{{ route('admin.pengajuan.index') }}" class="font-bold text-emerald-400 hover:underline">
                    Buka Antrean &rarr;
                </a>
            </div>
        </div>

    </div>

    <!-- Permohonan Surat Terbaru -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-xs p-6 space-y-4">
        <div class="flex items-center justify-between pb-3 border-b border-slate-100">
            <div>
                <h3 class="text-sm font-bold text-slate-900 uppercase tracking-wider">Permohonan Surat Masuk Terbaru</h3>
                <p class="text-xs text-slate-500">Antrean pengajuan surat online warga yang perlu diproses</p>
            </div>
            <a href="{{ route('admin.pengajuan.index') }}" class="text-xs font-bold text-emerald-700 hover:text-emerald-800">
                Lihat Semua Antrean &rarr;
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-xs text-left">
                <thead class="bg-slate-50 text-slate-600 font-bold uppercase border-b border-slate-200">
                    <tr>
                        <th class="py-3 px-4">No. Tiket</th>
                        <th class="py-3 px-4">Pemohon</th>
                        <th class="py-3 px-4">Jenis Surat</th>
                        <th class="py-3 px-4">RT / RW</th>
                        <th class="py-3 px-4">Tanggal</th>
                        <th class="py-3 px-4">Status</th>
                        <th class="py-3 px-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($pengajuanTerbaru as $p)
                        <tr class="hover:bg-slate-50 transition">
                            <td class="py-3 px-4 font-mono font-bold text-emerald-700">{{ $p->kode_tiket }}</td>
                            <td class="py-3 px-4">
                                <strong class="text-slate-900 block">{{ $p->nama_pemohon }}</strong>
                                <span class="text-[11px] text-slate-400 font-mono">{{ $p->nik }}</span>
                            </td>
                            <td class="py-3 px-4 font-medium text-slate-700">{{ $p->jenisSurat->nama_surat ?? '-' }}</td>
                            <td class="py-3 px-4 text-slate-600">RT {{ $p->rt }} / RW {{ $p->rw }}</td>
                            <td class="py-3 px-4 text-slate-500">{{ $p->tanggal_pengajuan ? $p->tanggal_pengajuan->format('d/m/Y') : '-' }}</td>
                            <td class="py-3 px-4">
                                <span class="px-2.5 py-0.5 rounded-full font-bold border text-[11px] {{ $p->status_badge }}">
                                    {{ $p->status }}
                                </span>
                            </td>
                            <td class="py-3 px-4 text-center">
                                <a href="{{ route('admin.pengajuan.show', $p->id_pengajuan) }}" class="px-3 py-1.5 rounded-lg bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-[11px] shadow-xs inline-block">
                                    Verifikasi
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-8 text-center text-slate-400">Belum ada permohonan surat masuk.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection

