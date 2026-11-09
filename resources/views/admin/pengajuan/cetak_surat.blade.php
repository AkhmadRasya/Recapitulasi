<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pengajuan->jenisSurat->nama_surat ?? 'Surat Keterangan' }} - {{ $pengajuan->nama_pemohon }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @page {
            size: A4;
            margin: 20mm 20mm 20mm 20mm;
        }
        @media print {
            .no-print { display: none !important; }
            body { background: white !important; padding: 0 !important; }
            .a4-sheet { box-shadow: none !important; border: none !important; padding: 0 !important; width: 100% !important; max-width: 100% !important; }
        }
        body {
            font-family: 'Times New Roman', Times, serif;
            color: #000;
        }
    </style>
</head>
<body class="bg-slate-200 py-8 px-4">

    <!-- Action Bar -->
    <div class="max-w-[210mm] mx-auto mb-4 flex justify-between items-center no-print">
        <a href="{{ route('admin.pengajuan.show', $pengajuan->id_pengajuan) }}" class="px-4 py-2 rounded-xl bg-slate-800 text-white font-sans text-xs font-bold hover:bg-slate-900 shadow">
            &larr; Kembali ke Detail Pengajuan
        </a>
        <button onclick="window.print()" class="px-5 py-2 rounded-xl bg-emerald-600 text-white font-sans text-xs font-bold hover:bg-emerald-700 shadow flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
            Cetak Dokumen Resmi (A4)
        </button>
    </div>

    <!-- A4 Paper Container -->
    <div class="a4-sheet max-w-[210mm] min-h-[297mm] mx-auto bg-white p-12 shadow-2xl border border-slate-300 relative flex flex-col justify-between">
        
        <div>
            <!-- KOP SURAT RESMI -->
            <div class="border-b-[3px] border-black pb-2 mb-1 flex items-center justify-between">
                <div class="w-20 text-center flex items-center justify-center">
                    <!-- Logo Lambang Pemko -->
                    <div class="w-16 h-16 border-2 border-black rounded-full flex items-center justify-center font-bold text-xs uppercase">
                        KOTA BJM
                    </div>
                </div>
                <div class="flex-1 text-center px-2">
                    <h4 class="text-sm tracking-wider font-bold uppercase">PEMERINTAH KOTA BANJARMASIN</h4>
                    <h3 class="text-base tracking-wider font-bold uppercase">KECAMATAN BANJARMASIN UTARA</h3>
                    <h2 class="text-xl tracking-widest font-black uppercase">KELURAHAN SUNGAI ANDAI</h2>
                    <p class="text-xs italic mt-0.5">
                        Alamat: Jl. AMD Sungai Andai Komplek Purnama Permai / Padat Karya, Banjarmasin Utara 70122<br>
                        Email: kelurahan.sungaiandai@banjarmasinkota.go.id • Laman: https://sungaiandai.banjarmasinkota.go.id
                    </p>
                </div>
                <div class="w-20"></div>
            </div>
            <div class="border-b border-black mb-6"></div>

            <!-- JUDUL SURAT & NOMOR -->
            <div class="text-center my-6">
                <h1 class="text-base font-bold uppercase tracking-wider underline">
                    {{ strtoupper($pengajuan->jenisSurat->nama_surat ?? 'SURAT KETERANGAN') }}
                </h1>
                <p class="text-sm mt-0.5 font-mono">
                    Nomor : {{ $pengajuan->nomor_surat ?? ('470/' . $pengajuan->id_pengajuan . '/Kel-SA/' . date('Y')) }}
                </p>
            </div>

            <!-- PARAGRAF PEMBUKA -->
            <div class="text-sm leading-relaxed text-justify space-y-4">
                <p>
                    Yang bertanda tangan di bawah ini, Lurah Sungai Andai, Kecamatan Banjarmasin Utara, Kota Banjarmasin, dengan ini menerangkan bahwa:
                </p>

                <!-- TABEL DATA PEMOHON -->
                <table class="w-full text-sm my-2 ml-4">
                    <tbody>
                        <tr>
                            <td class="w-48 py-1">Nama Lengkap</td>
                            <td class="py-1">: <strong>{{ strtoupper($pengajuan->nama_pemohon) }}</strong></td>
                        </tr>
                        <tr>
                            <td class="py-1">NIK (No. KTP)</td>
                            <td class="py-1 font-mono">: {{ $pengajuan->nik }}</td>
                        </tr>
                        <tr>
                            <td class="py-1">Nomor Kartu Keluarga</td>
                            <td class="py-1 font-mono">: {{ $pengajuan->no_kk }}</td>
                        </tr>
                        <tr>
                            <td class="py-1">Tempat, Tanggal Lahir</td>
                            <td class="py-1">: {{ $pengajuan->tempat_lahir }}, {{ $pengajuan->tanggal_lahir ? $pengajuan->tanggal_lahir->translatedFormat('d F Y') : '-' }}</td>
                        </tr>
                        <tr>
                            <td class="py-1">Jenis Kelamin</td>
                            <td class="py-1">: {{ $pengajuan->jenis_kelamin }}</td>
                        </tr>
                        <tr>
                            <td class="py-1">Agama</td>
                            <td class="py-1">: {{ $pengajuan->agama }}</td>
                        </tr>
                        <tr>
                            <td class="py-1">Pekerjaan</td>
                            <td class="py-1">: {{ $pengajuan->pekerjaan }}</td>
                        </tr>
                        <tr>
                            <td class="py-1">Alamat Domisili</td>
                            <td class="py-1">: {{ $pengajuan->alamat }} RT {{ $pengajuan->rt }} / RW {{ $pengajuan->rw }}, Kelurahan Sungai Andai, Banjarmasin Utara</td>
                        </tr>
                    </tbody>
                </table>

                <!-- PARAGRAF KETERANGAN KHUSUS BERDASARKAN JENIS SURAT -->
                @if($pengajuan->id_jenis == 1)
                    <!-- Belum Memiliki Rumah -->
                    <p class="pt-2">
                        Berdasarkan Surat Pengantar dari Ketua RT {{ $pengajuan->rt }} RW {{ $pengajuan->rw }} Kelurahan Sungai Andai dan sepengetahuan kami, yang bersangkutan benar merupakan penduduk yang bertempat tinggal di alamat tersebut di atas dan hingga saat surat ini diterbitkan <strong>BELUM MEMILIKI RUMAH TINGGAL SENDIRI (ASET PRIBADI)</strong> di wilayah Kota Banjarmasin.
                    </p>
                    <p>
                        Surat keterangan ini diberikan kepada yang bersangkutan untuk keperluan: <strong>{{ $pengajuan->keperluan }}</strong>.
                    </p>

                @elseif($pengajuan->id_jenis == 2)
                    <!-- Kematian Manual -->
                    @php $dk = $pengajuan->data_khusus ?? []; @endphp
                    <p class="pt-2">
                        Berdasarkan laporan pelapor di atas dan Surat Pengantar Ketua RT {{ $pengajuan->rt }}, dengan ini menerangkan bahwa telah meninggal dunia seorang warga:
                    </p>
                    <table class="w-full text-sm my-1 ml-4">
                        <tr><td class="w-48 py-0.5">Nama Almarhum/ah</td><td>: <strong>{{ strtoupper($dk['nama_almarhum'] ?? '-') }}</strong></td></tr>
                        <tr><td class="py-0.5">NIK Almarhum/ah</td><td>: {{ $dk['nik_almarhum'] ?? '-' }}</td></tr>
                        <tr><td class="py-0.5">Tanggal Meninggal</td><td>: {{ !empty($dk['tanggal_kematian']) ? \Carbon\Carbon::parse($dk['tanggal_kematian'])->translatedFormat('d F Y') : '-' }}</td></tr>
                        <tr><td class="py-0.5">Tempat Kematian</td><td>: {{ $dk['tempat_kematian'] ?? '-' }}</td></tr>
                        <tr><td class="py-0.5">Penyebab Kematian</td><td>: {{ $dk['penyebab_kematian'] ?? 'Sakit wajar / Usia' }}</td></tr>
                    </table>
                    <p>
                        Surat keterangan ini diterbitkan guna kelengkapan pengurusan: <strong>{{ $pengajuan->keperluan }}</strong>.
                    </p>

                @elseif($pengajuan->id_jenis == 3)
                    <!-- Pengantar Belum Menikah -->
                    <p class="pt-2">
                        Berdasarkan catatan administrasi kependudukan dan Surat Pengantar RT {{ $pengajuan->rt }} Kelurahan Sungai Andai, yang bersangkutan benar tercatat berstatus <strong>BELUM PERNAH MENIKAH / KAWIN (JEJAKA / PERAWAN)</strong> sampai dengan tanggal diterbitkannya surat ini.
                    </p>
                    <p>
                        Surat pengantar ini dibuat sebagai persyaratan: <strong>{{ $pengajuan->keperluan }}</strong>.
                    </p>

                @elseif($pengajuan->id_jenis == 4)
                    <!-- SKTM -->
                    <p class="pt-2">
                        Berdasarkan data lapangan dan Surat Pengantar Ketua RT {{ $pengajuan->rt }} Kelurahan Sungai Andai, benar bahwa nama tersebut di atas tergolong dalam keluarga <strong>TIDAK MAMPU / EKONOMI LEMAH</strong>.
                    </p>
                    <p>
                        Surat Keterangan Tidak Mampu (SKTM) ini dipergunakan untuk keperluan: <strong>{{ $pengajuan->keperluan }}</strong>.
                    </p>

                @elseif($pengajuan->id_jenis == 5)
                    <!-- Pengantar Nikah N1-N4 -->
                    @php $dk = $pengajuan->data_khusus ?? []; @endphp
                    <p class="pt-2">
                        Berdasarkan permohonan yang bersangkutan, Surat Pengantar RT {{ $pengajuan->rt }}, serta kelengkapan berkas kedua calon mempelai dan orang tua yang telah diverifikasi sah, yang bersangkutan diberikan <strong>SURAT PENGANTAR NIKAH (MODEL N1 - N4)</strong> untuk melangsungkan akad pernikahan dengan:
                    </p>
                    <table class="w-full text-sm my-1 ml-4">
                        <tr><td class="w-48 py-0.5">Nama Calon Pasangan</td><td>: <strong>{{ strtoupper($dk['nama_pasangan'] ?? '-') }}</strong></td></tr>
                        <tr><td class="py-0.5">NIK Pasangan</td><td>: {{ $dk['nik_pasangan'] ?? '-' }}</td></tr>
                        <tr><td class="py-0.5">Tempat, Tgl Lahir Pasangan</td><td>: {{ $dk['tempat_lahir_pasangan'] ?? '-' }}, {{ $dk['tanggal_lahir_pasangan'] ?? '-' }}</td></tr>
                        <tr><td class="py-0.5">Nama Ayah / Ibu Pria</td><td>: {{ $dk['nama_ayah_pria'] ?? '-' }} / {{ $dk['nama_ibu_pria'] ?? '-' }}</td></tr>
                        <tr><td class="py-0.5">Nama Ayah / Ibu Wanita</td><td>: {{ $dk['nama_ayah_wanita'] ?? '-' }} / {{ $dk['nama_ibu_wanita'] ?? '-' }}</td></tr>
                    </table>
                    <p>
                        Surat pengantar ini ditujukan kepada Kantor Urusan Agama (KUA) Kecamatan Banjarmasin Utara guna proses pencatatan pernikahan lebih lanjut.
                    </p>
                @endif

                <!-- PENUTUP -->
                <p class="pt-2">
                    Demikian surat keterangan ini kami buat dengan sebenarnya agar dapat dipergunakan sebagaimana mestinya oleh yang bersangkutan.
                </p>
            </div>
        </div>

        <!-- TANDA TANGAN & LEGALISASI RESMI -->
        <div class="mt-8 pt-4">
            <div class="flex justify-between items-end">
                
                <!-- QR Code Validasi Keaslian -->
                <div class="text-center font-sans text-[10px] text-slate-500 border border-slate-300 p-2 rounded-lg w-36">
                    <div class="w-16 h-16 bg-slate-100 border border-slate-400 mx-auto mb-1 flex items-center justify-center font-mono font-bold text-[9px] text-slate-700">
                        [QR-CODE]
                    </div>
                    <span>Validasi Sistem:<br><strong>{{ $pengajuan->kode_tiket }}</strong></span>
                </div>

                <!-- Box Tanda Tangan Lurah -->
                <div class="text-center w-72">
                    <p class="text-sm">
                        Banjarmasin, {{ date('d F Y') }}<br>
                        <strong>LURAH SUNGAI ANDAI</strong>
                    </p>
                    
                    <!-- Area Tanda Tangan & Stempel -->
                    <div class="h-20 flex items-center justify-center relative">
                        <div class="text-[10px] text-emerald-800 font-bold border-2 border-emerald-700 rounded-full w-24 h-24 flex items-center justify-center opacity-85 rotate-[-12deg] absolute">
                            KELURAHAN<br>SUNGAI ANDAI<br>★ BJM ★
                        </div>
                    </div>

                    <p class="text-sm font-bold underline">
                        {{ strtoupper($lurah->nama_pegawai ?? 'SUMIARJI') }}
                    </p>
                    <p class="text-xs">
                        NIP. {{ $lurah->nip ?? '232111' }}
                    </p>
                </div>

            </div>
        </div>

    </div>

</body>
</html>

