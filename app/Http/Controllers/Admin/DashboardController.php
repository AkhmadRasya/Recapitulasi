<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\JenisSurat;
use App\Models\Pegawai;
use App\Models\Penduduk;
use App\Models\Pengaduan;
use App\Models\PengajuanSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPengajuan = PengajuanSurat::count();
        $totalMenunggu = PengajuanSurat::where('status', 'Menunggu')->count();
        $totalDiproses = PengajuanSurat::where('status', 'Diproses')->count();
        $totalSelesai = PengajuanSurat::where('status', 'Selesai')->count();
        $totalDitolak = PengajuanSurat::where('status', 'Ditolak')->count();

        $totalPenduduk = Penduduk::count();
        $totalPegawai = Pegawai::count();
        $totalBerita = Berita::count();
        $totalPengaduan = Pengaduan::where('status', 'Menunggu')->count();

        // Rekapitulasi per jenis surat
        $rekapPerJenis = JenisSurat::withCount('pengajuan')->get();

        // Pengajuan terbaru
        $pengajuanTerbaru = PengajuanSurat::with('jenisSurat')
            ->orderBy('created_at', 'desc')
            ->take(8)
            ->get();

        return view('admin.dashboard', compact(
            'totalPengajuan',
            'totalMenunggu',
            'totalDiproses',
            'totalSelesai',
            'totalDitolak',
            'totalPenduduk',
            'totalPegawai',
            'totalBerita',
            'totalPengaduan',
            'rekapPerJenis',
            'pengajuanTerbaru'
        ));
    }
}

