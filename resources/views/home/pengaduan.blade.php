@extends('layouts.app')

@section('title', 'Kanal Pengaduan & Aspirasi Warga - Kelurahan Sungai Andai')

@section('content')
<section class="bg-gradient-to-b from-emerald-900 to-teal-900 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-3">
        <span class="inline-block px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-bold uppercase tracking-wider border border-emerald-400/30">
            Suara Warga
        </span>
        <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight">Kanal Pengaduan & Aspirasi</h1>
        <p class="text-slate-300 text-sm sm:text-base max-w-2xl mx-auto">
            Sampaikan masukan, pengaduan fasilitas umum, kebersihan drainase, atau saran pelayanan untuk kemajuan Kelurahan Sungai Andai.
        </p>
    </div>
</section>

<section class="py-16 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
            
            <!-- Form Pengaduan -->
            <div class="lg:col-span-7">
                <div class="p-8 rounded-3xl bg-white border border-slate-200 shadow-sm space-y-6">
                    <div>
                        <h3 class="text-xl font-bold text-slate-900">Kirim Laporan / Aspirasi Anda</h3>
                        <p class="text-xs text-slate-500 mt-1">Identitas Anda dijamin kerahasiaannya oleh pihak kelurahan.</p>
                    </div>

                    <form action="{{ route('pengaduan.simpan') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Nama Lengkap *</label>
                                <input type="text" name="nama" value="{{ old('nama') }}" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Nomor WhatsApp / HP *</label>
                                <input type="text" name="no_hp" value="{{ old('no_hp') }}" required placeholder="08xxxxxxxxxx" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Nomor Induk Kependudukan (NIK 16 Digit) *</label>
                            <input type="text" name="nik" value="{{ old('nik') }}" maxlength="16" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm font-mono focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Judul Laporan / Topik *</label>
                            <input type="text" name="judul" value="{{ old('judul') }}" required placeholder="Contoh: Saluran air tersumbat di RT 015" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Uraian / Isi Laporan *</label>
                            <textarea name="isi" rows="4" required placeholder="Jelaskan detail pengaduan atau aspirasi Anda secara jelas..." class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">{{ old('isi') }}</textarea>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Foto Bukti / Pendukung (Opsional)</label>
                            <input type="file" name="foto" accept="image/*" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100">
                            <span class="text-[11px] text-slate-400">Format: JPG, PNG, max 3MB</span>
                        </div>

                        <button type="submit" class="w-full py-3 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-sm shadow-md transition flex items-center justify-center gap-2">
                            <i class="fa-solid fa-paper-plane"></i>
                            <span>Kirim Laporan Pengaduan</span>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Info & Pengaduan Terbaru -->
            <div class="lg:col-span-5 space-y-6">
                <div class="p-6 rounded-3xl bg-teal-50 border border-teal-200 text-teal-900 space-y-3">
                    <h4 class="text-sm font-bold flex items-center gap-2">
                        <i class="fa-solid fa-circle-info text-teal-700"></i>
                        Ketentuan Penyampaian Aspirasi
                    </h4>
                    <ul class="text-xs space-y-2 list-disc list-inside leading-relaxed text-teal-800">
                        <li>Gunakan bahasa yang santun, jelas, dan dapat dipertanggungjawabkan.</li>
                        <li>Tidak mengandung unsur SARA, ujaran kebencian, atau fitnah.</li>
                        <li>Laporan akan segera diverifikasi oleh tim penanganan aduan masyarakat Kelurahan Sungai Andai.</li>
                    </ul>
                </div>

                <div class="p-6 rounded-3xl bg-white border border-slate-200 shadow-sm space-y-4">
                    <h4 class="text-sm font-bold text-slate-900 flex items-center justify-between">
                        <span>Aspirasi Terkini</span>
                        <span class="text-xs text-slate-400">Terbuka untuk umum</span>
                    </h4>

                    <div class="space-y-3">
                        @forelse($pengaduanTerbaru as $p)
                            <div class="p-3.5 rounded-2xl bg-slate-50 border border-slate-200 text-xs space-y-1.5">
                                <div class="flex items-center justify-between">
                                    <span class="font-bold text-slate-900">{{ $p->judul }}</span>
                                    <span class="px-2 py-0.5 rounded text-[10px] font-semibold {{ $p->status == 'Selesai' ? 'bg-emerald-100 text-emerald-800' : 'bg-amber-100 text-amber-800' }}">
                                        {{ $p->status }}
                                    </span>
                                </div>
                                <p class="text-slate-600 line-clamp-2">{{ $p->isi }}</p>
                                <div class="flex items-center justify-between text-[11px] text-slate-400 pt-1">
                                    <span>Pelapor: {{ substr($p->nama, 0, 3) . '***' }}</span>
                                    <span>{{ $p->created_at ? $p->created_at->diffForHumans() : '-' }}</span>
                                </div>
                            </div>
                        @empty
                            <p class="text-xs text-slate-400 text-center py-4">Belum ada pengaduan terbaru.</p>
                        @endforelse
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection

