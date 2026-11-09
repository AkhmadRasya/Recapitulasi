<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisSurat;
use App\Models\Pegawai;
use App\Models\PengajuanSurat;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->get('status');
        $idJenis = $request->get('id_jenis');
        $search = $request->get('search');

        $query = PengajuanSurat::with(['jenisSurat', 'dokumen']);

        if ($status) {
            $query->where('status', $status);
        }

        if ($idJenis) {
            $query->where('id_jenis', $idJenis);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama_pemohon', 'LIKE', "%{$search}%")
                    ->orWhere('nik', 'LIKE', "%{$search}%")
                    ->orWhere('kode_tiket', 'LIKE', "%{$search}%")
                    ->orWhere('nomor_surat', 'LIKE', "%{$search}%");
            });
        }

        $pengajuan = $query->orderBy('created_at', 'desc')->paginate(10);
        $jenisSurat = JenisSurat::all();

        return view('admin.pengajuan.index', compact('pengajuan', 'jenisSurat', 'status', 'idJenis', 'search'));
    }

    public function show($id)
    {
        $pengajuan = PengajuanSurat::with(['jenisSurat', 'dokumen', 'user'])->findOrFail($id);
        $pegawaiList = Pegawai::all();

        return view('admin.pengajuan.show', compact('pengajuan', 'pegawaiList'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Menunggu,Diproses,Selesai,Ditolak',
            'nomor_surat' => 'nullable|string|max:100',
            'catatan_petugas' => 'nullable|string',
            'file_hasil' => 'nullable|file|mimes:pdf,jpg,png|max:5120',
        ]);

        $pengajuan = PengajuanSurat::findOrFail($id);
        $pengajuan->status = $request->status;

        if ($request->filled('nomor_surat')) {
            $pengajuan->nomor_surat = $request->nomor_surat;
        }

        if ($request->filled('catatan_petugas')) {
            $pengajuan->catatan_petugas = $request->catatan_petugas;
        }

        if ($request->hasFile('file_hasil')) {
            $path = $request->file('file_hasil')->store('surat_selesai', 'public');
            $pengajuan->file_hasil = $path;
        }

        $pengajuan->save();

        return redirect()->route('admin.pengajuan.show', $id)
            ->with('success', 'Status dan data pengajuan surat berhasil diperbarui!');
    }

    public function cetakSurat($id)
    {
        $pengajuan = PengajuanSurat::with(['jenisSurat', 'dokumen'])->findOrFail($id);
        $lurah = Pegawai::where('jabatan', 'LIKE', '%Lurah%')->first() 
            ?? Pegawai::first();

        return view('admin.pengajuan.cetak_surat', compact('pengajuan', 'lurah'));
    }

    public function destroy($id)
    {
        $pengajuan = PengajuanSurat::findOrFail($id);
        $pengajuan->dokumen()->delete();
        $pengajuan->delete();

        return redirect()->route('admin.pengajuan.index')
            ->with('success', 'Data pengajuan surat berhasil dihapus.');
    }
}

