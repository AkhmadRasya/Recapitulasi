<?php

use App\Http\Controllers\Admin\BeritaController as AdminBeritaController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\PegawaiController as AdminPegawaiController;
use App\Http\Controllers\Admin\PendudukController as AdminPendudukController;
use App\Http\Controllers\Admin\PengaduanController as AdminPengaduanController;
use App\Http\Controllers\Admin\PengajuanController as AdminPengajuanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LayananController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - Website Kelurahan Sungai Andai
|--------------------------------------------------------------------------
*/

// Public Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profil', [HomeController::class, 'profil'])->name('profil');
Route::get('/statistik', [HomeController::class, 'statistik'])->name('statistik');
Route::get('/kontak', [HomeController::class, 'kontak'])->name('kontak');
Route::get('/pengaduan', [HomeController::class, 'pengaduan'])->name('pengaduan');
Route::post('/pengaduan', [HomeController::class, 'simpanPengaduan'])->name('pengaduan.simpan');

// Layanan Surat Kependudukan Online
Route::prefix('layanan')->name('layanan.')->group(function () {
    Route::get('/', [LayananController::class, 'index'])->name('index');
    Route::get('/buat', [LayananController::class, 'buat'])->name('buat');
    Route::post('/simpan', [LayananController::class, 'simpan'])->name('simpan');
    Route::get('/cek-nik', [LayananController::class, 'cekNik'])->name('cek-nik');
    Route::get('/sukses/{kode}', [LayananController::class, 'sukses'])->name('sukses');
    Route::get('/tracking', [LayananController::class, 'tracking'])->name('tracking');
    Route::get('/cetak-resi/{kode}', [LayananController::class, 'cetakResi'])->name('cetak-resi');
});

// Berita & Pengumuman
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{slug}', [BeritaController::class, 'detail'])->name('berita.detail');

// Galeri Kegiatan
Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');

// Authentication
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Panel Routes
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Pengajuan Surat
    Route::get('/pengajuan', [AdminPengajuanController::class, 'index'])->name('pengajuan.index');
    Route::get('/pengajuan/{id}', [AdminPengajuanController::class, 'show'])->name('pengajuan.show');
    Route::post('/pengajuan/{id}/status', [AdminPengajuanController::class, 'updateStatus'])->name('pengajuan.status');
    Route::get('/pengajuan/{id}/cetak', [AdminPengajuanController::class, 'cetakSurat'])->name('pengajuan.cetak');
    Route::delete('/pengajuan/{id}', [AdminPengajuanController::class, 'destroy'])->name('pengajuan.destroy');

    // Berita & Agenda
    Route::resource('berita', AdminBeritaController::class);

    // Pegawai / Aparatur
    Route::get('/pegawai', [AdminPegawaiController::class, 'index'])->name('pegawai.index');
    Route::post('/pegawai', [AdminPegawaiController::class, 'store'])->name('pegawai.store');
    Route::put('/pegawai/{id}', [AdminPegawaiController::class, 'update'])->name('pegawai.update');
    Route::delete('/pegawai/{id}', [AdminPegawaiController::class, 'destroy'])->name('pegawai.destroy');

    // Penduduk
    Route::get('/penduduk', [AdminPendudukController::class, 'index'])->name('penduduk.index');
    Route::post('/penduduk', [AdminPendudukController::class, 'store'])->name('penduduk.store');
    Route::delete('/penduduk/{id}', [AdminPendudukController::class, 'destroy'])->name('penduduk.destroy');

    // Pengaduan Warga
    Route::get('/pengaduan', [AdminPengaduanController::class, 'index'])->name('pengaduan.index');
    Route::put('/pengaduan/{id}', [AdminPengaduanController::class, 'update'])->name('pengaduan.update');
    Route::delete('/pengaduan/{id}', [AdminPengaduanController::class, 'destroy'])->name('pengaduan.destroy');
});
