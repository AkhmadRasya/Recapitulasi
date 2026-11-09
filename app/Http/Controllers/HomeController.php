<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Galeri;
use App\Models\JenisSurat;
use App\Models\Pegawai;
use App\Models\Penduduk;
use App\Models\Pengaduan;
use App\Models\PengajuanSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $jenisSurat = JenisSurat::all();
        $beritaTerbaru = Berita::where('status', 'published')
            ->orderBy('tanggal_publikasi', 'desc')
            ->take(3)
            ->get();
        $galeri = Galeri::orderBy('tanggal', 'desc')->take(6)->get();
        $pegawai = Pegawai::orderBy('id_pegawai', 'asc')->get();

        // Statistik
        $totalPenduduk = Penduduk::count() ?: 29840; // estimasi realistis Sungai Andai
        $totalPengajuan = PengajuanSurat::count();
        $pengajuanSelesai = PengajuanSurat::where('status', 'Selesai')->count();
        $totalRT = 62; // Karakteristik Sungai Andai memiliki banyak RT
        $totalRW = 4;

        return view('home.index', compact(
            'jenisSurat',
            'beritaTerbaru',
            'galeri',
            'pegawai',
            'totalPenduduk',
            'totalPengajuan',
            'pengajuanSelesai',
            'totalRT',
            'totalRW'
        ));
    }

    public function profil()
    {
        $pegawai = Pegawai::orderBy('id_pegawai', 'asc')->get();
        return view('home.profil', compact('pegawai'));
    }

    public function statistik()
    {
        // Data statistik dari tabel penduduk jika ada, atau data representatif kelurahan
        $genderStats = Penduduk::select('jenis_kelamin', DB::raw('count(*) as total'))
            ->groupBy('jenis_kelamin')
            ->pluck('total', 'jenis_kelamin');

        $agamaStats = Penduduk::select('agama', DB::raw('count(*) as total'))
            ->groupBy('agama')
            ->pluck('total', 'agama');

        $statusPerkawinan = Penduduk::select('status_perkawinan', DB::raw('count(*) as total'))
            ->groupBy('status_perkawinan')
            ->pluck('total', 'status_perkawinan');

        $totalPenduduk = Penduduk::count() ?: 29840;

        return view('home.statistik', compact(
            'genderStats',
            'agamaStats',
            'statusPerkawinan',
            'totalPenduduk'
        ));
    }

    public function kontak()
    {
        return view('home.kontak');
    }

    public function pengaduan()
    {
        $pengaduanTerbaru = Pengaduan::orderBy('created_at', 'desc')->take(5)->get();
        return view('home.pengaduan', compact('pengaduanTerbaru'));
    }

    public function simpanPengaduan(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:150',
            'nik' => 'required|string|size:16',
            'no_hp' => 'required|string|max:20',
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'foto' => 'nullable|image|max:3072'
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('pengaduan', 'public');
        }

        $kode = 'ADU-SA-' . date('Ymd') . '-' . rand(100, 999);

        Pengaduan::create([
            'kode_pengaduan' => $kode,
            'nama' => $request->nama,
            'nik' => $request->nik,
            'no_hp' => $request->no_hp,
            'judul' => $request->judul,
            'isi' => $request->isi,
            'foto' => $fotoPath,
            'status' => 'Menunggu'
        ]);

        return redirect()->back()->with('success', "Aspirasi/Pengaduan Anda berhasil dikirim dengan kode tracking: $kode");
    }
}

