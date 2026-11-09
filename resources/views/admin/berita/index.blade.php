@extends('layouts.admin')

@section('title', 'Kelola Berita & Pengumuman - Admin Sungai Andai')
@section('page_title', 'Kelola Berita & Agenda Kelurahan')

@section('content')
<div class="space-y-6">
    
    <div class="flex items-center justify-between">
        <p class="text-xs text-slate-500">Daftar publikasi berita, pengumuman, dan agenda kegiatan masyarakat.</p>
        <a href="{{ route('admin.berita.create') }}" class="px-4 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs shadow-xs transition flex items-center gap-2">
            <i class="fa-solid fa-plus"></i>
            <span>Tambah Berita Baru</span>
        </a>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-xs text-left">
                <thead class="bg-slate-50 text-slate-600 font-bold uppercase border-b border-slate-200">
                    <tr>
                        <th class="py-3 px-4">Judul Berita</th>
                        <th class="py-3 px-4">Kategori</th>
                        <th class="py-3 px-4">Penulis</th>
                        <th class="py-3 px-4">Tanggal Publikasi</th>
                        <th class="py-3 px-4">Status</th>
                        <th class="py-3 px-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($berita as $b)
                        <tr class="hover:bg-slate-50 transition">
                            <td class="py-3 px-4 max-w-sm">
                                <strong class="text-slate-900 block text-xs line-clamp-1">{{ $b->judul }}</strong>
                                <span class="text-[11px] text-slate-400 font-mono">{{ $b->slug }}</span>
                            </td>
                            <td class="py-3 px-4">
                                <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-slate-100 text-slate-700">
                                    {{ $b->kategori }}
                                </span>
                            </td>
                            <td class="py-3 px-4 text-slate-600">{{ $b->penulis ?? 'Admin' }}</td>
                            <td class="py-3 px-4 text-slate-500">{{ $b->tanggal_publikasi ? $b->tanggal_publikasi->format('d/m/Y') : '-' }}</td>
                            <td class="py-3 px-4">
                                <span class="px-2 py-0.5 rounded-full text-[10px] font-bold {{ $b->status === 'published' ? 'bg-emerald-100 text-emerald-800' : 'bg-slate-100 text-slate-600' }}">
                                    {{ ucfirst($b->status) }}
                                </span>
                            </td>
                            <td class="py-3 px-4 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('admin.berita.edit', $b->id) }}" class="p-1.5 rounded-lg bg-emerald-50 text-emerald-700 hover:bg-emerald-100 text-xs" title="Edit">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="{{ route('admin.berita.destroy', $b->id) }}" method="POST" onsubmit="return confirm('Hapus berita ini?')" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-1.5 rounded-lg bg-rose-50 text-rose-700 hover:bg-rose-100 text-xs" title="Hapus">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-8 text-center text-slate-400">Belum ada berita.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-slate-200">
            {{ $berita->links() }}
        </div>
    </div>

</div>
@endsection

