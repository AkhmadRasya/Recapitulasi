@extends('layouts.admin')

@section('title', 'Verifikasi Pengajuan - ' . $pengajuan->kode_tiket)
@section('page_title', 'Verifikasi & Pemrosesan Surat')

@section('content')
<div class="space-y-6">
    
    <!-- Header Summary & Quick Action Bar -->
    <div class="p-6 rounded-2xl bg-white border border-slate-200 shadow-xs flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <div class="flex items-center gap-3">
                <span class="font-mono text-sm font-black text-emerald-800 bg-emerald-50 px-3 py-1 rounded-lg border border-emerald-200">
                    {{ $pengajuan->kode_tiket }}
                </span>
                <span class="px-3 py-1 rounded-full text-xs font-bold border {{ $pengajuan->status_badge }}">
                    Status: {{ $pengajuan->status }}
                </span>
            </div>
            <h2 class="text-xl font-extrabold text-slate-900 mt-2">{{ $pengajuan->jenisSurat->nama_surat ?? '-' }}</h2>
            <p class="text-xs text-slate-500">Tanggal Pengajuan: {{ $pengajuan->tanggal_pengajuan ? $pengajuan->tanggal_pengajuan->translatedFormat('d F Y') : '-' }}</p>
        </div>

        <div class="flex items-center gap-3">
            <a href="{{ route('admin.pengajuan.cetak', $pengajuan->id_pengajuan) }}" 
               target="_blank" 
               class="px-4 py-2.5 rounded-xl bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs shadow-xs transition flex items-center gap-2">
                <i class="fa-solid fa-print"></i>
                <span>Cetak Lembar Surat Resmi (A4)</span>
            </a>
            
            <a href="{{ route('layanan.cetak-resi', $pengajuan->kode_tiket) }}" 
               target="_blank" 
               class="px-4 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold text-xs transition flex items-center gap-2">
                <i class="fa-solid fa-receipt"></i>
                <span>Resi Tanda Terima</span>
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        <!-- Left: Applicant Data & Documents Preview -->
        <div class="lg:col-span-7 space-y-6">
            
            <!-- Identitas Pemohon -->
            <div class="p-6 rounded-2xl bg-white border border-slate-200 shadow-xs space-y-4">
                <h3 class="text-sm font-bold text-slate-900 uppercase tracking-wider pb-2 border-b border-slate-100 flex items-center gap-2">
                    <i class="fa-solid fa-user text-emerald-600"></i>
                    Identitas Pemohon
                </h3>

                <div class="grid grid-cols-2 gap-3 text-xs">
                    <div><span class="text-slate-400 block">Nama Lengkap:</span><strong class="text-slate-900">{{ $pengajuan->nama_pemohon }}</strong></div>
                    <div><span class="text-slate-400 block">NIK:</span><span class="font-mono font-bold text-slate-900">{{ $pengajuan->nik }}</span></div>
                    <div><span class="text-slate-400 block">No. KK:</span><span class="font-mono text-slate-900">{{ $pengajuan->no_kk }}</span></div>
                    <div><span class="text-slate-400 block">Tempat, Tgl Lahir:</span><span class="text-slate-900">{{ $pengajuan->tempat_lahir }}, {{ $pengajuan->tanggal_lahir ? $pengajuan->tanggal_lahir->format('d/m/Y') : '-' }}</span></div>
                    <div><span class="text-slate-400 block">Jenis Kelamin:</span><span class="text-slate-900">{{ $pengajuan->jenis_kelamin }}</span></div>
                    <div><span class="text-slate-400 block">Agama:</span><span class="text-slate-900">{{ $pengajuan->agama }}</span></div>
                    <div><span class="text-slate-400 block">Pekerjaan:</span><span class="text-slate-900">{{ $pengajuan->pekerjaan }}</span></div>
                    <div><span class="text-slate-400 block">No. HP / WA:</span><span class="text-slate-900">{{ $pengajuan->no_hp }}</span></div>
                    <div class="col-span-2"><span class="text-slate-400 block">Alamat Domisili:</span><span class="text-slate-900">{{ $pengajuan->alamat }} (RT {{ $pengajuan->rt }} / RW {{ $pengajuan->rw }})</span></div>
                    <div class="col-span-2"><span class="text-slate-400 block">Keperluan / Keterangan:</span><span class="text-slate-900 font-medium">{{ $pengajuan->keperluan }}</span></div>
                </div>
            </div>

            <!-- Data Khusus Tambahan (Nikah atau Kematian) -->
            @if(!empty($pengajuan->data_khusus))
                <div class="p-6 rounded-2xl bg-white border border-emerald-200 shadow-xs space-y-4">
                    <h3 class="text-sm font-bold text-emerald-950 uppercase tracking-wider pb-2 border-b border-emerald-100 flex items-center gap-2">
                        <i class="fa-solid fa-list-check text-emerald-600"></i>
                        Data Khusus Permohonan ({{ $pengajuan->jenisSurat->nama_surat }})
                    </h3>

                    <div class="grid grid-cols-2 gap-3 text-xs">
                        @foreach($pengajuan->data_khusus as $key => $val)
                            <div>
                                <span class="text-slate-400 block capitalize">{{ str_replace('_', ' ', $key) }}:</span>
                                <strong class="text-slate-900">{{ $val }}</strong>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Berkas Persyaratan yang Diunggah -->
            <div class="p-6 rounded-2xl bg-white border border-slate-200 shadow-xs space-y-4">
                <div class="flex items-center justify-between pb-2 border-b border-slate-100">
                    <h3 class="text-sm font-bold text-slate-900 uppercase tracking-wider flex items-center gap-2">
                        <i class="fa-solid fa-folder-open text-emerald-600"></i>
                        Berkas Dokumen Persyaratan ({{ $pengajuan->dokumen->count() }})
                    </h3>
                    <span class="text-[11px] text-slate-500">Klik berkas untuk membuka / verifikasi</span>
                </div>

                <div class="space-y-2.5">
                    @forelse($pengajuan->dokumen as $dok)
                        <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200 flex items-center justify-between hover:bg-slate-100 transition">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-lg bg-emerald-100 text-emerald-700 flex items-center justify-center text-xs">
                                    <i class="fa-solid fa-file-lines"></i>
                                </div>
                                <div>
                                    <h5 class="text-xs font-bold text-slate-900">{{ $dok->nama_dokumen }}</h5>
                                    <span class="text-[10px] text-slate-400 font-mono">{{ $dok->file_path }}</span>
                                </div>
                            </div>

                            <a href="{{ asset('storage/' . $dok->file_path) }}" 
                               target="_blank" 
                               class="px-3 py-1.5 rounded-lg bg-emerald-600 text-white font-bold text-[11px] hover:bg-emerald-700 transition flex items-center gap-1">
                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                <span>Buka Berkas</span>
                            </a>
                        </div>
                    @empty
                        <p class="text-xs text-slate-400 py-4 text-center">Belum ada berkas lampiran yang diunggah.</p>
                    @endforelse
                </div>
            </div>

        </div>

        <!-- Right: Status Update & Processing Form -->
        <div class="lg:col-span-5 space-y-6">
            
            <div class="p-6 rounded-2xl bg-white border border-slate-200 shadow-xs space-y-5">
                <h3 class="text-sm font-bold text-slate-900 uppercase tracking-wider pb-2 border-b border-slate-100 flex items-center gap-2">
                    <i class="fa-solid fa-sliders text-emerald-600"></i>
                    Tindak Lanjut & Verifikasi Petugas
                </h3>

                <form action="{{ route('admin.pengajuan.status', $pengajuan->id_pengajuan) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Perbarui Status *</label>
                        <select name="status" required class="w-full px-3 py-2.5 rounded-xl border border-slate-300 text-xs font-bold focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                            <option value="Menunggu" {{ $pengajuan->status === 'Menunggu' ? 'selected' : '' }}>Menunggu Verifikasi</option>
                            <option value="Diproses" {{ $pengajuan->status === 'Diproses' ? 'selected' : '' }}>Diproses (Pemeriksaan & TTD)</option>
                            <option value="Selesai" {{ $pengajuan->status === 'Selesai' ? 'selected' : '' }}>Selesai (Surat Siap Diterbitkan)</option>
                            <option value="Ditolak" {{ $pengajuan->status === 'Ditolak' ? 'selected' : '' }}>Ditolak (Berkas Tidak Lengkap / Revisi)</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Nomor Surat Resmi Kelurahan</label>
                        <input type="text" 
                               name="nomor_surat" 
                               value="{{ old('nomor_surat', $pengajuan->nomor_surat ?? '470/' . rand(100, 999) . '/Kel-SA/' . date('Y')) }}" 
                               placeholder="Contoh: 470/102/Kel-SA/2026" 
                               class="w-full px-3 py-2 rounded-xl border border-slate-300 text-xs font-mono font-bold focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                        <span class="text-[11px] text-slate-400">Nomor ini akan tercetak otomatis pada lembar surat resmi.</span>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Catatan Petugas ke Pemohon</label>
                        <textarea name="catatan_petugas" 
                                  rows="3" 
                                  placeholder="Contoh: Berkas telah diverifikasi lengkap. Surat asli dapat diambil di loket pelayanan kelurahan." 
                                  class="w-full px-3 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-emerald-500 focus:outline-none">{{ old('catatan_petugas', $pengajuan->catatan_petugas) }}</textarea>
                        <span class="text-[11px] text-slate-400">Catatan ini akan tampil di menu lacak status yang diakses oleh warga.</span>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Unggah Scan Surat Jadi (Opsional)</label>
                        <input type="file" name="file_hasil" accept=".pdf,.jpg,.jpeg,.png" class="w-full text-xs text-slate-500 file:mr-2 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-slate-100 file:text-slate-700 hover:file:bg-slate-200">
                        @if($pengajuan->file_hasil)
                            <div class="mt-1">
                                <a href="{{ asset('storage/' . $pengajuan->file_hasil) }}" target="_blank" class="text-[11px] font-bold text-emerald-700 hover:underline">
                                    <i class="fa-solid fa-file-pdf"></i> Lihat File Surat Yang Diunggah
                                </a>
                            </div>
                        @endif
                    </div>

                    <button type="submit" class="w-full py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs shadow-md transition flex items-center justify-center gap-2">
                        <i class="fa-solid fa-save"></i>
                        <span>Simpan Perubahan Status</span>
                    </button>
                </form>
            </div>

            <!-- Hapus Pengajuan -->
            <div class="p-6 rounded-2xl bg-white border border-rose-200 shadow-xs space-y-3">
                <h4 class="text-xs font-bold text-rose-800 uppercase">Hapus Data Permohonan</h4>
                <p class="text-xs text-slate-500 leading-relaxed">
                    Menghapus data permohonan ini secara permanen beserta seluruh berkas dokumen yang terunggah.
                </p>
                <form action="{{ route('admin.pengajuan.destroy', $pengajuan->id_pengajuan) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus permohonan surat ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full py-2 rounded-xl bg-rose-50 text-rose-700 hover:bg-rose-100 font-bold text-xs border border-rose-200 transition">
                        <i class="fa-solid fa-trash mr-1"></i> Hapus Permohonan
                    </button>
                </form>
            </div>

        </div>

    </div>

</div>
@endsection

