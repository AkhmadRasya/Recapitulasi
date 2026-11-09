<?php

namespace Database\Seeders;

use App\Models\Berita;
use App\Models\Galeri;
use App\Models\JenisSurat;
use App\Models\Pegawai;
use App\Models\Penduduk;
use App\Models\PengajuanSurat;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Users
        if (User::where('username', 'admin')->count() === 0) {
            User::create([
                'nama_lengkap' => 'Administrator Kelurahan',
                'username' => 'admin',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ]);
        }
        if (User::where('username', 'admin9')->count() === 0) {
            User::create([
                'nama_lengkap' => 'Administrator',
                'username' => 'admin9',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ]);
        }
        if (User::where('username', 'rasya1')->count() === 0) {
            User::create([
                'nama_lengkap' => 'Pegawai Kelurahan',
                'username' => 'rasya1',
                'password' => Hash::make('rasya123'),
                'role' => 'pegawai',
            ]);
        }

        // 2. Jenis Surat (5 Surat Sesuai Requirement)
        $suratList = [
            [
                'id_jenis' => 1,
                'nama_surat' => 'Surat Keterangan Belum Memiliki Rumah',
                'keterangan' => 'Surat keterangan dari kelurahan yang menerangkan bahwa warga bersangkutan belum memiliki rumah tinggal sendiri.'
            ],
            [
                'id_jenis' => 2,
                'nama_surat' => 'Surat Keterangan Kematian (Kematian Manual)',
                'keterangan' => 'Surat pengantar dan pencatatan resmi kematian warga untuk pengurusan akta kematian Disdukcapil atau administrasi pemakaman/waris.'
            ],
            [
                'id_jenis' => 3,
                'nama_surat' => 'Surat Pengantar Belum Menikah',
                'keterangan' => 'Surat keterangan resmi yang menyatakan bahwa pemohon berstatus belum kawin/menikah untuk keperluan kerja, beasiswa, atau kedinasan.'
            ],
            [
                'id_jenis' => 4,
                'nama_surat' => 'Surat Keterangan Tidak Mampu (SKTM)',
                'keterangan' => 'Surat keterangan untuk warga kurang mampu untuk keperluan beasiswa, keringanan biaya pendidikan/sekolah, rumah sakit, BPJS PBI, dll.'
            ],
            [
                'id_jenis' => 5,
                'nama_surat' => 'Surat Pengantar Nikah (Model N1 - N4)',
                'keterangan' => 'Surat pengantar dan rekomendasi nikah dari kelurahan ke KUA Kecamatan dengan persyaratan lengkap kedua mempelai dan orang tua.'
            ]
        ];

        foreach ($suratList as $s) {
            JenisSurat::updateOrCreate(['id_jenis' => $s['id_jenis']], $s);
        }

        // 3. Pegawai
        $pegawaiList = [
            ['id_pegawai' => 1, 'nip' => '232111', 'nama_pegawai' => 'Sumiarji', 'jabatan' => 'Lurah', 'no_hp' => '08118291271919', 'alamat' => 'Jln. Padat Karya'],
            ['id_pegawai' => 2, 'nip' => '2310024', 'nama_pegawai' => 'Ridwan', 'jabatan' => 'Kasi Pelayanan', 'no_hp' => '085787662498', 'alamat' => 'Jl. Sungai Miai'],
        ];
        foreach ($pegawaiList as $p) {
            Pegawai::updateOrCreate(['id_pegawai' => $p['id_pegawai']], $p);
        }

        // 4. Sample Penduduk (untuk fitur cek NIK otomatis)
        $pendudukList = [
            [
                'nik' => '6371011508980002',
                'no_kk' => '6371012509120005',
                'nama_lengkap' => 'Muhammad Rifqi Maulana',
                'tempat_lahir' => 'Banjarmasin',
                'tanggal_lahir' => '1998-08-15',
                'jenis_kelamin' => 'Laki-laki',
                'agama' => 'Islam',
                'status_perkawinan' => 'Belum Kawin',
                'pekerjaan' => 'Karyawan Swasta',
                'alamat' => 'Komplek Purnama Permai Jalur 3 No. 45',
                'rt' => '024',
                'rw' => '002',
            ],
            [
                'nik' => '6371012005950003',
                'no_kk' => '6371011104100001',
                'nama_lengkap' => 'Nur Azizah, S.Pd',
                'tempat_lahir' => 'Martapura',
                'tanggal_lahir' => '1995-05-20',
                'jenis_kelamin' => 'Perempuan',
                'agama' => 'Islam',
                'status_perkawinan' => 'Belum Kawin',
                'pekerjaan' => 'Guru',
                'alamat' => 'Jl. AMD Sungai Andai Blok B No. 12',
                'rt' => '015',
                'rw' => '001',
            ],
            [
                'nik' => '3201011234567890',
                'no_kk' => '3201011234567880',
                'nama_lengkap' => 'Hermansyah',
                'tempat_lahir' => 'Banjarmasin',
                'tanggal_lahir' => '1990-06-08',
                'jenis_kelamin' => 'Laki-laki',
                'agama' => 'Islam',
                'status_perkawinan' => 'Kawin',
                'pekerjaan' => 'Wiraswasta',
                'alamat' => 'Jl. Sultan Adam',
                'rt' => '002',
                'rw' => '003',
            ]
        ];
        foreach ($pendudukList as $pen) {
            Penduduk::updateOrCreate(['nik' => $pen['nik']], $pen);
        }

        // 5. Berita
        if (Berita::count() === 0) {
            $news = [
                [
                    'judul' => 'Inovasi Pelayanan Administrasi Surat Kependudukan Berbasis Digital Kelurahan Sungai Andai',
                    'slug' => 'inovasi-pelayanan-administrasi-surat-kependudukan-digital',
                    'kategori' => 'Pengumuman',
                    'ringkasan' => 'Masyarakat kini dapat mengajukan 5 jenis layanan surat keterangan secara online dari rumah dengan melampirkan berkas persyaratan lengkap.',
                    'isi' => '<p>Kelurahan Sungai Andai, Kecamatan Banjarmasin Utara terus berkomitmen meningkatkan kualitas pelayanan publik kepada seluruh warga. Salah satu langkah konkrit adalah dengan meluncurkan portal layanan mandiri pengurusan surat kependudukan online.</p><p>Layanan ini mencakup <strong>Surat Keterangan Belum Memiliki Rumah, Surat Kematian, Surat Keterangan Tidak Mampu (SKTM), Surat Pengantar Belum Menikah, dan Surat Pengantar Nikah (N1-N4)</strong>. Warga cukup mengisi formulir, mengunggah persyaratan seperti Surat Pengantar RT, Kartu Keluarga, dan KTP, lalu memantau progres melalui fitur lacak status dengan nomor tiket.</p>',
                    'gambar' => 'https://images.unsplash.com/photo-1450133064473-71024230f91b?auto=format&fit=crop&w=800&q=80',
                    'penulis' => 'Humas Kelurahan',
                    'tanggal_publikasi' => '2026-11-01',
                    'views' => 142
                ],
                [
                    'judul' => 'Gotong Royong Kebersihan Saluran Sungai Andai Cegah Genangan Musim Hujan',
                    'slug' => 'gotong-royong-kebersihan-saluran-sungai-andai',
                    'kategori' => 'Berita',
                    'ringkasan' => 'Aparat Kelurahan Sungai Andai bersama Ketua RT, RW, dan warga bahu membahu membersihkan drainase dan sungai untuk kelancaran aliran air.',
                    'isi' => '<p>Dalam rangka mengantisipasi musim penghujan dan menjaga kebersihan lingkungan permukiman, pihak Kelurahan Sungai Andai menggelar aksi gotong royong massal di sepanjang jalur utama AMD dan kompleks perumahan.</p>',
                    'gambar' => 'https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?auto=format&fit=crop&w=800&q=80',
                    'penulis' => 'Kasi Trantib',
                    'tanggal_publikasi' => '2026-10-28',
                    'views' => 210
                ]
            ];
            foreach ($news as $n) {
                Berita::create($n);
            }
        }

        // 6. Galeri
        if (Galeri::count() === 0) {
            $galeri = [
                [
                    'judul' => 'Pelayanan Tatap Muka Terpadu di Kantor Kelurahan',
                    'kategori' => 'Pelayanan',
                    'foto' => 'https://images.unsplash.com/photo-1577495508048-b635879837f1?auto=format&fit=crop&w=800&q=80',
                    'keterangan' => 'Suasana loket pelayanan administrasi kependudukan yang cepat, ramah, dan transparan.',
                    'tanggal' => '2026-11-03'
                ],
                [
                    'judul' => 'Rapat Koordinasi Bersama Ketua RT dan RW se-Sungai Andai',
                    'kategori' => 'Kegiatan',
                    'foto' => 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&w=800&q=80',
                    'keterangan' => 'Pembahasan sinergi pengantar administrasi warga serta ketertiban lingkungan.',
                    'tanggal' => '2026-10-25'
                ]
            ];
            foreach ($galeri as $g) {
                Galeri::create($g);
            }
        }

        // 7. Sample Pengajuan Surat untuk demo
        if (PengajuanSurat::count() === 0) {
            PengajuanSurat::create([
                'kode_tiket' => 'REG-SA-202611-001',
                'nomor_surat' => '470/102/Kel-SA/2026',
                'nik' => '6371011508980002',
                'no_kk' => '6371012509120005',
                'nama_pemohon' => 'Muhammad Rifqi Maulana',
                'tempat_lahir' => 'Banjarmasin',
                'tanggal_lahir' => '1998-08-15',
                'jenis_kelamin' => 'Laki-laki',
                'agama' => 'Islam',
                'pekerjaan' => 'Karyawan Swasta',
                'alamat' => 'Komplek Purnama Permai Jalur 3 No. 45 RT 024 RW 002',
                'rt' => '024',
                'rw' => '002',
                'no_hp' => '081234567890',
                'id_jenis' => 1,
                'keperluan' => 'Persyaratan pengajuan KPR Subsidi Perumahan Bank BTN',
                'status' => 'Selesai',
                'catatan_petugas' => 'Surat telah ditandatangani Lurah. Berkas fisik dapat diambil di loket kelurahan.',
                'tanggal_pengajuan' => now(),
            ]);
        }
    }
}
