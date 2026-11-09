@extends('layouts.admin')

@section('title', 'Kanal Pengaduan Warga - Admin Sungai Andai')
@section('page_title', 'Kelola Pengaduan & Aspirasi Warga')

@section('content')
<div class="space-y-6" x-data="{ modalOpen: false, currentItem: { id: null, nama: '', judul: '', isi: '', status: '', tanggapan: '' } }">
    
    <div class="bg-white rounded-2xl border border-slate-200 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-xs text-left">
                <thead class="bg-slate-50 text-slate-600 font-bold uppercase border-b border-slate-200">
                    <tr>
                        <th class="py-3 px-4">Kode & Tanggal</th>
                        <th class="py-3 px-4">Nama Pelapor</th>
                        <th class="py-3 px-4">Judul Aspirasi / Aduan</th>
                        <th class="py-3 px-4">Status</th>
                        <th class="py-3 px-4">Tanggapan Kelurahan</th>
                        <th class="py-3 px-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($pengaduan as $aduan)
                        <tr class="hover:bg-slate-50 transition">
                            <td class="py-3 px-4">
                                <span class="font-mono font-bold text-emerald-800 block">{{ $aduan->kode_pengaduan }}</span>
                                <span class="text-[11px] text-slate-400">{{ $aduan->created_at ? $aduan->created_at->format('d/m/Y') : '-' }}</span>
                            </td>
                            <td class="py-3 px-4">
                                <strong class="text-slate-900 block">{{ $aduan->nama }}</strong>
                                <span class="text-[11px] text-slate-400 font-mono">{{ $aduan->no_hp }}</span>
                            </td>
                            <td class="py-3 px-4 max-w-xs">
                                <strong class="text-slate-900 block">{{ $aduan->judul }}</strong>
                                <p class="text-slate-500 line-clamp-2 text-[11px] mt-0.5">{{ $aduan->isi }}</p>
                            </td>
                            <td class="py-3 px-4">
                                <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold {{ $aduan->status == 'Selesai' ? 'bg-emerald-100 text-emerald-800' : ($aduan->status == 'Diproses' ? 'bg-blue-100 text-blue-800' : 'bg-amber-100 text-amber-800') }}">
                                    {{ $aduan->status }}
                                </span>
                            </td>
                            <td class="py-3 px-4 text-slate-600 max-w-xs">
                                <span class="line-clamp-2 text-[11px] italic">{{ $aduan->tanggapan ?? 'Belum ada tanggapan.' }}</span>
                            </td>
                            <td class="py-3 px-4 text-center">
                                <div class="flex items-center justify-center gap-1.5">
                                    <button @click="modalOpen = true; currentItem = { id: {{ $aduan->id }}, nama: '{{ addslashes($aduan->nama) }}', judul: '{{ addslashes($aduan->judul) }}', isi: '{{ addslashes(str_replace(["\r", "\n"], ' ', $aduan->isi)) }}', status: '{{ $aduan->status }}', tanggapan: '{{ addslashes($aduan->tanggapan ?? '') }}' }" 
                                            class="px-2.5 py-1.5 rounded-lg bg-emerald-50 text-emerald-700 hover:bg-emerald-100 font-bold text-xs">
                                        Tanggapi
                                    </button>
                                    <form action="{{ route('admin.pengaduan.destroy', $aduan->id) }}" method="POST" onsubmit="return confirm('Hapus pengaduan ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-1.5 rounded-lg bg-rose-50 text-rose-700 hover:bg-rose-100 text-xs">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-8 text-center text-slate-400">Belum ada laporan pengaduan masuk.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-slate-200">
            {{ $pengaduan->links() }}
        </div>
    </div>

    <!-- Modal Tanggapi -->
    <div x-show="modalOpen" x-cloak class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-xs">
        <div class="bg-white rounded-2xl max-w-md w-full shadow-2xl p-6 space-y-4" @click.away="modalOpen = false">
            <div class="flex items-center justify-between pb-2 border-b border-slate-100">
                <h3 class="text-sm font-bold text-slate-900">Tanggapi Pengaduan Warga</h3>
                <button @click="modalOpen = false" class="text-slate-400 hover:text-slate-600"><i class="fa-solid fa-xmark"></i></button>
            </div>

            <div class="p-3 bg-slate-50 rounded-xl border border-slate-200 text-xs space-y-1">
                <p><strong>Pelapor:</strong> <span x-text="currentItem.nama"></span></p>
                <p><strong>Judul:</strong> <span x-text="currentItem.judul"></span></p>
                <p><strong>Isi:</strong> <span x-text="currentItem.isi" class="text-slate-600"></span></p>
            </div>

            <form :action="`{{ url('admin/pengaduan') }}/${currentItem.id}`" method="POST" class="space-y-3">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Status Pengaduan *</label>
                    <select name="status" x-model="currentItem.status" required class="w-full px-3 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                        <option value="Menunggu">Menunggu</option>
                        <option value="Diproses">Diproses / Diteruskan ke Instansi Terkait</option>
                        <option value="Selesai">Selesai / Sudah Ditindaklanjuti</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Tanggapan / Jawaban Resmi Kelurahan</label>
                    <textarea name="tanggapan" x-model="currentItem.tanggapan" rows="3" placeholder="Tuliskan tindak lanjut atau jawaban untuk pelapor..." class="w-full px-3 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-emerald-500 focus:outline-none"></textarea>
                </div>

                <div class="flex items-center justify-end gap-2 pt-3 border-t border-slate-100">
                    <button type="button" @click="modalOpen = false" class="px-4 py-2 rounded-xl bg-slate-100 text-slate-600 font-semibold text-xs">Batal</button>
                    <button type="submit" class="px-5 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs shadow-xs">Simpan Tanggapan</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection

