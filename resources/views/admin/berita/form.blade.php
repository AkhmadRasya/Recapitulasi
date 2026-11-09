@extends('layouts.admin')

@section('title', isset($berita) ? 'Edit Berita' : 'Tambah Berita Baru')
@section('page_title', isset($berita) ? 'Edit Berita' : 'Tambah Berita Baru')

@section('content')
<div class="max-w-3xl space-y-6">
    
    <div class="p-6 rounded-2xl bg-white border border-slate-200 shadow-xs space-y-6">
        
        <form action="{{ isset($berita) ? route('admin.berita.update', $berita->id) : route('admin.berita.store') }}" 
              method="POST" 
              enctype="multipart/form-data" 
              class="space-y-4">
            @csrf
            @if(isset($berita))
                @method('PUT')
            @endif

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Judul Berita / Pengumuman *</label>
                <input type="text" name="judul" value="{{ old('judul', $berita->judul ?? '') }}" required class="w-full px-3 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-emerald-500 focus:outline-none">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Kategori *</label>
                    <select name="kategori" required class="w-full px-3 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                        <option value="Berita" {{ (old('kategori', $berita->kategori ?? '') == 'Berita') ? 'selected' : '' }}>Berita</option>
                        <option value="Pengumuman" {{ (old('kategori', $berita->kategori ?? '') == 'Pengumuman') ? 'selected' : '' }}>Pengumuman</option>
                        <option value="Agenda" {{ (old('kategori', $berita->kategori ?? '') == 'Agenda') ? 'selected' : '' }}>Agenda</option>
                        <option value="Prestasi" {{ (old('kategori', $berita->kategori ?? '') == 'Prestasi') ? 'selected' : '' }}>Prestasi</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Tanggal Publikasi *</label>
                    <input type="date" name="tanggal_publikasi" value="{{ old('tanggal_publikasi', isset($berita) && $berita->tanggal_publikasi ? $berita->tanggal_publikasi->format('Y-m-d') : date('Y-m-d')) }}" required class="w-full px-3 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Status Publikasi *</label>
                    <select name="status" required class="w-full px-3 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                        <option value="published" {{ (old('status', $berita->status ?? 'published') == 'published') ? 'selected' : '' }}>Published (Tayang)</option>
                        <option value="draft" {{ (old('status', $berita->status ?? '') == 'draft') ? 'selected' : '' }}>Draft (Konsep)</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Ringkasan Singkat (Lead Paragraph)</label>
                <textarea name="ringkasan" rows="2" class="w-full px-3 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-emerald-500 focus:outline-none">{{ old('ringkasan', $berita->ringkasan ?? '') }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Isi Berita Lengkap (HTML Didukung) *</label>
                <textarea name="isi" rows="6" required class="w-full px-3 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-emerald-500 focus:outline-none">{{ old('isi', $berita->isi ?? '') }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Foto Sampul (Header)</label>
                <input type="file" name="gambar" accept="image/*" class="w-full text-xs text-slate-500 file:mr-3 file:py-1.5 file:px-3 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-slate-100 file:text-slate-700 hover:file:bg-slate-200">
                @if(isset($berita) && $berita->gambar)
                    <div class="mt-2">
                        <img src="{{ $berita->gambar }}" alt="Preview" class="h-20 w-32 object-cover rounded-lg">
                    </div>
                @endif
            </div>

            <div class="flex items-center gap-3 pt-4 border-t border-slate-100">
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs shadow-xs transition">
                    <i class="fa-solid fa-save mr-1.5"></i> Simpan Berita
                </button>
                <a href="{{ route('admin.berita.index') }}" class="px-4 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-600 font-semibold text-xs">
                    Batal
                </a>
            </div>

        </form>

    </div>

</div>
@endsection

