<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Jenis Surat
        if (!Schema::hasTable('jenis_surat')) {
            Schema::create('jenis_surat', function (Blueprint $table) {
                $table->id('id_jenis');
                $table->string('nama_surat', 100);
                $table->text('keterangan')->nullable();
            });
        }

        // 2. Pegawai
        if (!Schema::hasTable('pegawai')) {
            Schema::create('pegawai', function (Blueprint $table) {
                $table->id('id_pegawai');
                $table->string('nip', 30)->nullable()->unique();
                $table->string('nama_pegawai', 100);
                $table->string('jabatan', 100)->nullable();
                $table->string('no_hp', 20)->nullable();
                $table->text('alamat')->nullable();
            });
        }

        // 3. Penduduk
        if (!Schema::hasTable('penduduk')) {
            Schema::create('penduduk', function (Blueprint $table) {
                $table->id('id_penduduk');
                $table->string('nik', 16)->unique();
                $table->string('no_kk', 16);
                $table->string('nama_lengkap', 100);
                $table->string('tempat_lahir', 100)->nullable();
                $table->date('tanggal_lahir')->nullable();
                $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable();
                $table->string('agama', 30)->nullable();
                $table->string('status_perkawinan', 30)->nullable();
                $table->string('pekerjaan', 100)->nullable();
                $table->text('alamat')->nullable();
                $table->string('rt', 10)->nullable();
                $table->string('rw', 10)->nullable();
                $table->timestamp('created_at')->useCurrent();
            });
        }

        // 4. Pengajuan Surat
        if (!Schema::hasTable('pengajuan_surat')) {
            Schema::create('pengajuan_surat', function (Blueprint $table) {
                $table->id('id_pengajuan');
                $table->string('kode_tiket', 50)->nullable()->unique();
                $table->string('nomor_surat', 100)->nullable();
                $table->unsignedBigInteger('id_user')->nullable();
                $table->string('nik', 16)->nullable();
                $table->string('no_kk', 16)->nullable();
                $table->string('nama_pemohon', 150)->nullable();
                $table->string('tempat_lahir', 100)->nullable();
                $table->date('tanggal_lahir')->nullable();
                $table->string('jenis_kelamin', 20)->nullable();
                $table->string('agama', 30)->nullable();
                $table->string('pekerjaan', 100)->nullable();
                $table->text('alamat')->nullable();
                $table->string('rt', 10)->nullable();
                $table->string('rw', 10)->nullable();
                $table->string('no_hp', 25)->nullable();
                $table->unsignedBigInteger('id_jenis');
                $table->text('keperluan')->nullable();
                $table->json('data_khusus')->nullable();
                $table->enum('status', ['Menunggu', 'Diproses', 'Selesai', 'Ditolak'])->default('Menunggu');
                $table->text('catatan_petugas')->nullable();
                $table->string('file_surat', 255)->nullable();
                $table->string('file_hasil', 255)->nullable();
                $table->date('tanggal_pengajuan')->nullable();
                $table->timestamps();
            });
        }

        // 5. Pengajuan Dokumen
        if (!Schema::hasTable('pengajuan_dokumen')) {
            Schema::create('pengajuan_dokumen', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('id_pengajuan');
                $table->string('jenis_dokumen', 100);
                $table->string('nama_dokumen', 255);
                $table->string('file_path', 255);
                $table->integer('file_size')->nullable();
                $table->timestamp('created_at')->useCurrent();
            });
        }

        // 6. Berita
        if (!Schema::hasTable('berita')) {
            Schema::create('berita', function (Blueprint $table) {
                $table->id();
                $table->string('judul', 255);
                $table->string('slug', 255)->unique();
                $table->string('kategori', 50)->default('Berita');
                $table->text('ringkasan')->nullable();
                $table->longText('isi');
                $table->string('gambar', 255)->nullable();
                $table->string('penulis', 100)->default('Humas Sungai Andai');
                $table->date('tanggal_publikasi');
                $table->enum('status', ['published', 'draft'])->default('published');
                $table->integer('views')->default(0);
                $table->timestamps();
            });
        }

        // 7. Galeri
        if (!Schema::hasTable('galeri')) {
            Schema::create('galeri', function (Blueprint $table) {
                $table->id();
                $table->string('judul', 255);
                $table->string('kategori', 100)->default('Kegiatan');
                $table->string('foto', 255);
                $table->text('keterangan')->nullable();
                $table->date('tanggal');
                $table->timestamp('created_at')->useCurrent();
            });
        }

        // 8. Pengaduan
        if (!Schema::hasTable('pengaduan')) {
            Schema::create('pengaduan', function (Blueprint $table) {
                $table->id();
                $table->string('kode_pengaduan', 50)->unique();
                $table->string('nama', 150);
                $table->string('nik', 16);
                $table->string('no_hp', 25);
                $table->string('judul', 255);
                $table->text('isi');
                $table->string('foto', 255)->nullable();
                $table->enum('status', ['Menunggu', 'Diproses', 'Selesai'])->default('Menunggu');
                $table->text('tanggapan')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('pengaduan');
        Schema::dropIfExists('galeri');
        Schema::dropIfExists('berita');
        Schema::dropIfExists('pengajuan_dokumen');
        Schema::dropIfExists('pengajuan_surat');
        Schema::dropIfExists('penduduk');
        Schema::dropIfExists('pegawai');
        Schema::dropIfExists('jenis_surat');
    }
};

