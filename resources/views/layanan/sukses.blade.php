@extends('layouts.app')

@section('title', 'Permohonan Berhasil Dikirim - Kelurahan Sungai Andai')

@section('content')
<section class="py-16 bg-slate-100 min-h-[80vh] flex items-center">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
        
        <div class="rounded-3xl bg-white border border-slate-200 shadow-xl overflow-hidden">
            
            <!-- Success Banner -->
            <div class="bg-gradient-to-r from-emerald-600 to-teal-600 text-white p-8 text-center space-y-3">
                <div class="w-16 h-16 rounded-full bg-white/20 text-white flex items-center justify-center text-3xl mx-auto backdrop-blur-sm shadow-inner">
                    <i class="fa-solid fa-check"></i>
                </div>
                <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight">Permohonan Surat Berhasil Terkirim!</h1>
                <p class="text-xs sm:text-sm text-emerald-100 max-w-lg mx-auto">
                    Berkas permohonan Anda telah masuk ke sistem antrean pelayanan Kelurahan Sungai Andai dan siap diverifikasi oleh petugas loket.
                </p>
            </div>

            <!-- Content Card -->
            <div class="p-6 sm:p-8 space-y-6">
                
                <!-- Ticket Box Highlight -->
                <div class="p-6 rounded-2xl bg-emerald-50 border-2 border-dashed border-emerald-300 text-center space-y-2">
                    <span class="text-xs font-bold uppercase tracking-wider text-emerald-700">Kode Registrasi / Nomor Tiket Anda:</span>
                    <div class="text-2xl sm:text-3xl font-black font-mono text-emerald-900 tracking-wider">
                        {{ $pengajuan->kode_tiket }}
                    </div>
                    <p class="text-xs text-slate-500">
                        Simpan nomor tiket ini untuk melacak perkembangan status surat Anda secara online.
                    </p>
                </div>

                <!-- Detail Table -->
                <div class="space-y-3 text-xs sm:text-sm">
                    <h4 class="font-bold text-slate-900 border-b pb-2 uppercase tracking-wider text-xs">
                        Ringkasan Permohonan:
                    </h4>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-slate-600">
                        <div>
                            <span class="text-slate-400 block text-xs">Jenis Surat:</span>
                            <strong class="text-slate-900">{{ $pengajuan->jenisSurat->nama_surat ?? '-' }}</strong>
                        </div>
                        <div>
                            <span class="text-slate-400 block text-xs">Nama Pemohon:</span>
                            <strong class="text-slate-900">{{ $pengajuan->nama_pemohon }}</strong>
                        </div>
                        <div>
                            <span class="text-slate-400 block text-xs">NIK Pemohon:</span>
                            <span class="font-mono text-slate-900">{{ $pengajuan->nik }}</span>
                        </div>
                        <div>
                            <span class="text-slate-400 block text-xs">Tanggal Pengajuan:</span>
                            <span class="text-slate-900">{{ $pengajuan->tanggal_pengajuan ? $pengajuan->tanggal_pengajuan->translatedFormat('d F Y') : date('d F Y') }}</span>
                        </div>
                        <div>
                            <span class="text-slate-400 block text-xs">Alamat Domisili:</span>
                            <span class="text-slate-900">{{ $pengajuan->alamat }} (RT {{ $pengajuan->rt }} / RW {{ $pengajuan->rw }})</span>
                        </div>
                        <div>
                            <span class="text-slate-400 block text-xs">Status Terkini:</span>
                            <span class="inline-block px-2.5 py-0.5 rounded-full text-xs font-bold bg-amber-100 text-amber-800 border border-amber-300">
                                {{ $pengajuan->status }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Dokumen Diunggah -->
                <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 text-xs space-y-2">
                    <span class="font-bold text-slate-800 block">Dokumen Persyaratan yang Telah Diunggah:</span>
                    <ul class="space-y-1 text-slate-600">
                        @foreach($pengajuan->dokumen as $dok)
                            <li class="flex items-center gap-2">
                                <i class="fa-solid fa-check text-emerald-600"></i>
                                <span>{{ $dok->nama_dokumen }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row items-center gap-3 pt-4 border-t border-slate-100">
                    <a href="{{ route('layanan.cetak-resi', $pengajuan->kode_tiket) }}" 
                       target="_blank"
                       class="w-full sm:w-1/2 py-3 px-4 rounded-xl bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs sm:text-sm text-center transition flex items-center justify-center gap-2 shadow-md">
                        <i class="fa-solid fa-print"></i>
                        <span>Cetak Bukti Tanda Terima</span>
                    </a>

                    <a href="{{ route('layanan.tracking', ['q' => $pengajuan->kode_tiket]) }}" 
                       class="w-full sm:w-1/2 py-3 px-4 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs sm:text-sm text-center transition flex items-center justify-center gap-2 shadow-md">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <span>Pantau Status Pengajuan</span>
                    </a>
                </div>

            </div>

        </div>

    </div>
</section>
@endsection

