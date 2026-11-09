<?php

namespace App\Http\Controllers;

use App\Models\JenisSurat;
use App\Models\Penduduk;
use App\Models\PengajuanDokumen;
use App\Models\PengajuanSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class LayananController extends Controller
{
    public function index()
    {
        $jenisSurat = JenisSurat::all();
        return view('layanan.index', compact('jenisSurat'));
    }

    public function buat(Request $request)
    {
        $jenisSurat = JenisSurat::all();
        $selectedId = $request->get('id', 1);
        $selectedSurat = JenisSurat::find($selectedId) ?? $jenisSurat->first();

        return view('layanan.form', compact('jenisSurat', 'selectedSurat'));
    }

    public function cekNik(Request $request)
    {
        $nik = $request->query('nik');
        if (!$nik) {
            return response()->json(['found' => false]);
        }

        $penduduk = Penduduk::where('nik', $nik)->first();
        if ($penduduk) {
            return response()->json([
                'found' => true,
                'data' => [
                    'nik' => $penduduk->nik,
                    'no_kk' => $penduduk->no_kk,
                    'nama_lengkap' => $penduduk->nama_lengkap,
                    'tempat_lahir' => $penduduk->tempat_lahir,
                    'tanggal_lahir' => $penduduk->tanggal_lahir ? $penduduk->tanggal_lahir->format('Y-m-d') : '',
                    'jenis_kelamin' => $penduduk->jenis_kelamin,
                    'agama' => $penduduk->agama,
                    'pekerjaan' => $penduduk->pekerjaan,
                    'alamat' => $penduduk->alamat,
                    'rt' => $penduduk->rt,
                    'rw' => $penduduk->rw,
                ]
            ]);
        }

        return response()->json(['found' => false]);
    }

    public function simpan(Request $request)
    {
        $idJenis = $request->id_jenis;

        $rules = [
            'id_jenis' => 'required|exists:jenis_surat,id_jenis',
            'nik' => 'required|digits:16',
            'no_kk' => 'required|digits:16',
            'nama_pemohon' => 'required|string|max:150',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'agama' => 'required|string|max:50',
            'pekerjaan' => 'required|string|max:100',
            'alamat' => 'required|string',
            'rt' => 'required|string|max:10',
            'rw' => 'required|string|max:10',
            'no_hp' => 'required|string|max:25',
            'keperluan' => 'required|string',

            // Syarat Utama & Wajib untuk semua surat
            'doc_pengantar_rt' => 'required|file|mimes:jpeg,jpg,png,pdf|max:3072',
            'doc_ktp' => 'required|file|mimes:jpeg,jpg,png,pdf|max:3072',
            'doc_kk' => 'required|file|mimes:jpeg,jpg,png,pdf|max:3072',
        ];

        // Persyaratan khusus Pengantar Nikah (id_jenis = 5)
        if ($idJenis == 5) {
            $rules = array_merge($rules, [
                'nama_pasangan' => 'required|string|max:150',
                'nik_pasangan' => 'required|digits:16',
                'tempat_lahir_pasangan' => 'required|string|max:100',
                'tanggal_lahir_pasangan' => 'required|date',
                'nama_ayah_pria' => 'required|string|max:150',
                'nama_ibu_pria' => 'required|string|max:150',
                'nama_ayah_wanita' => 'required|string|max:150',
                'nama_ibu_wanita' => 'required|string|max:150',

                // Dokumen Tambahan Nikah
                'doc_ktp_ortu' => 'required|file|mimes:jpeg,jpg,png,pdf|max:4096',
                'doc_kk_kedua_mempelai' => 'required|file|mimes:jpeg,jpg,png,pdf|max:4096',
                'doc_ijazah' => 'required|file|mimes:jpeg,jpg,png,pdf|max:4096',
                'doc_akta_kelahiran' => 'required|file|mimes:jpeg,jpg,png,pdf|max:4096',
                'doc_foto_gandeng' => 'required|file|mimes:jpeg,jpg,png|max:3072',
                'doc_foto_masing_masing' => 'required|file|mimes:jpeg,jpg,png|max:3072',
                'doc_materai' => 'required|file|mimes:jpeg,jpg,png,pdf|max:3072',
            ]);
        }

        // Persyaratan khusus Kematian Manual (id_jenis = 2)
        if ($idJenis == 2) {
            $rules = array_merge($rules, [
                'nama_almarhum' => 'required|string|max:150',
                'nik_almarhum' => 'required|digits:16',
                'tanggal_kematian' => 'required|date',
                'tempat_kematian' => 'required|string|max:150',
                'penyebab_kematian' => 'required|string|max:150',
            ]);
        }

        $validated = $request->validate($rules, [
            'doc_pengantar_rt.required' => 'Surat Pengantar dari RT adalah persyaratan utama dan wajib diunggah.',
            'doc_ktp.required' => 'Fotocopy KTP wajib diunggah.',
            'doc_kk.required' => 'Fotocopy Kartu Keluarga wajib diunggah.',
            'doc_ktp_ortu.required' => 'Fotocopy KTP Orang Tua kedua belah mempelai wajib diunggah untuk pengantar nikah.',
            'doc_kk_kedua_mempelai.required' => 'Fotocopy KK kedua mempelai wajib diunggah untuk pengantar nikah.',
            'doc_ijazah.required' => 'Fotocopy Ijazah kedua mempelai wajib diunggah untuk pengantar nikah.',
            'doc_akta_kelahiran.required' => 'Fotocopy Akta Kelahiran kedua mempelai wajib diunggah untuk pengantar nikah.',
            'doc_foto_gandeng.required' => 'Pas foto gandeng berdua mempelai wajib diunggah.',
            'doc_foto_masing_masing.required' => 'Pas foto masing-masing (pria & wanita) wajib diunggah.',
            'doc_materai.required' => 'Surat pernyataan bermaterai 10.000 wajib diunggah.',
        ]);

        DB::beginTransaction();
        try {
            // Generate ticket code
            $kodeTiket = 'REG-SA-' . date('Ym') . '-' . strtoupper(Str::random(5));

            // Data khusus tambahan
            $dataKhusus = [];
            if ($idJenis == 5) {
                $dataKhusus = [
                    'nama_pasangan' => $request->nama_pasangan,
                    'nik_pasangan' => $request->nik_pasangan,
                    'tempat_lahir_pasangan' => $request->tempat_lahir_pasangan,
                    'tanggal_lahir_pasangan' => $request->tanggal_lahir_pasangan,
                    'nama_ayah_pria' => $request->nama_ayah_pria,
                    'nama_ibu_pria' => $request->nama_ibu_pria,
                    'nama_ayah_wanita' => $request->nama_ayah_wanita,
                    'nama_ibu_wanita' => $request->nama_ibu_wanita,
                ];
            } elseif ($idJenis == 2) {
                $dataKhusus = [
                    'nama_almarhum' => $request->nama_almarhum,
                    'nik_almarhum' => $request->nik_almarhum,
                    'tanggal_kematian' => $request->tanggal_kematian,
                    'tempat_kematian' => $request->tempat_kematian,
                    'penyebab_kematian' => $request->penyebab_kematian,
                ];
            }

            $pengajuan = PengajuanSurat::create([
                'kode_tiket' => $kodeTiket,
                'id_user' => auth()->id() ?? null,
                'nik' => $request->nik,
                'no_kk' => $request->no_kk,
                'nama_pemohon' => $request->nama_pemohon,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'agama' => $request->agama,
                'pekerjaan' => $request->pekerjaan,
                'alamat' => $request->alamat,
                'rt' => $request->rt,
                'rw' => $request->rw,
                'no_hp' => $request->no_hp,
                'id_jenis' => $idJenis,
                'keperluan' => $request->keperluan,
                'data_khusus' => $dataKhusus,
                'status' => 'Menunggu',
                'catatan_petugas' => 'Permohonan baru berhasil diajukan. Menunggu proses verifikasi berkas oleh staf pelayanan.',
                'tanggal_pengajuan' => now(),
            ]);

            // Save documents
            $documentLabels = [
                'doc_pengantar_rt' => 'Surat Pengantar RT (Asli)',
                'doc_ktp' => 'Fotocopy KTP Pemohon',
                'doc_kk' => 'Fotocopy Kartu Keluarga (KK)',
                'doc_ktp_ortu' => 'Fotocopy KTP Orang Tua Kedua Mempelai',
                'doc_kk_kedua_mempelai' => 'Fotocopy KK Kedua Mempelai',
                'doc_ijazah' => 'Fotocopy Ijazah Terakhir Kedua Mempelai',
                'doc_akta_kelahiran' => 'Fotocopy Akta Kelahiran Kedua Mempelai',
                'doc_foto_gandeng' => 'Pas Foto Gandeng Berdua Mempelai',
                'doc_foto_masing_masing' => 'Pas Foto Masing-Masing Mempelai',
                'doc_materai' => 'Pernyataan / Berkas Bermaterai 10.000',
                'doc_tambahan' => 'Dokumen Pendukung Tambahan',
            ];

            foreach ($documentLabels as $fieldKey => $label) {
                if ($request->hasFile($fieldKey)) {
                    $file = $request->file($fieldKey);
                    $path = $file->store('dokumen_pengajuan/' . date('Y-m'), 'public');

                    PengajuanDokumen::create([
                        'id_pengajuan' => $pengajuan->id_pengajuan,
                        'jenis_dokumen' => $fieldKey,
                        'nama_dokumen' => $label,
                        'file_path' => $path,
                        'file_size' => $file->getSize(),
                    ]);
                }
            }

            DB::commit();

            return redirect()->route('layanan.sukses', ['kode' => $kodeTiket])
                ->with('success', 'Permohonan surat berhasil dikirim!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat memproses permohonan: ' . $e->getMessage());
        }
    }

    public function sukses($kode)
    {
        $pengajuan = PengajuanSurat::with(['jenisSurat', 'dokumen'])
            ->where('kode_tiket', $kode)
            ->firstOrFail();

        return view('layanan.sukses', compact('pengajuan'));
    }

    public function tracking(Request $request)
    {
        $keyword = trim($request->get('q', ''));
        $pengajuan = null;
        $listHasil = collect();

        if ($keyword) {
            // Pencarian bisa via kode tiket atau NIK
            if (str_starts_with(strtoupper($keyword), 'REG-SA-')) {
                $pengajuan = PengajuanSurat::with(['jenisSurat', 'dokumen'])
                    ->where('kode_tiket', $keyword)
                    ->first();
            } else {
                $listHasil = PengajuanSurat::with(['jenisSurat', 'dokumen'])
                    ->where('nik', $keyword)
                    ->orWhere('kode_tiket', 'LIKE', "%$keyword%")
                    ->orderBy('created_at', 'desc')
                    ->get();

                if ($listHasil->count() === 1) {
                    $pengajuan = $listHasil->first();
                }
            }
        }

        return view('layanan.tracking', compact('keyword', 'pengajuan', 'listHasil'));
    }

    public function cetakResi($kode)
    {
        $pengajuan = PengajuanSurat::with(['jenisSurat', 'dokumen'])
            ->where('kode_tiket', $kode)
            ->firstOrFail();

        return view('layanan.cetak_resi', compact('pengajuan'));
    }
}

