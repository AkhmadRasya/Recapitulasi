<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tanda Terima Pengajuan - {{ $pengajuan->kode_tiket }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media print {
            .no-print { display: none !important; }
            body { background: white !important; padding: 0 !important; }
        }
    </style>
</head>
<body class="bg-slate-100 p-4 sm:p-8 font-sans text-slate-800">

    <!-- Print Button Bar -->
    <div class="max-w-2xl mx-auto mb-6 flex justify-between items-center no-print">
        <a href="{{ route('layanan.tracking', ['q' => $pengajuan->kode_tiket]) }}" class="px-4 py-2 rounded-xl bg-slate-200 text-slate-700 font-semibold text-xs hover:bg-slate-300">
            &larr; Kembali ke Pelacakan
        </a>
        <button onclick="window.print()" class="px-5 py-2 rounded-xl bg-emerald-600 text-white font-bold text-xs hover:bg-emerald-700 shadow flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
            Cetak / Simpan PDF
        </button>
    </div>

    <!-- Receipt Sheet -->
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-2xl shadow-lg border border-slate-200">
        
        <!-- Kop Surat Tanda Terima -->
        <div class="border-b-2 border-slate-900 pb-4 text-center">
            <h4 class="text-xs uppercase tracking-widest font-bold text-slate-600">Pemerintah Kota Banjarmasin</h4>
            <h3 class="text-sm uppercase font-bold text-slate-700">Kecamatan Banjarmasin Utara</h3>
            <h2 class="text-xl font-black uppercase text-slate-900">Kelurahan Sungai Andai</h2>
            <p class="text-[11px] text-slate-500 mt-0.5">
                Jl. AMD Sungai Andai Komplek Purnama Permai / Padat Karya, Banjarmasin 70122
            </p>
        </div>

        <div class="py-4 text-center">
            <h1 class="text-base font-extrabold uppercase tracking-wider text-slate-900">
                Bukti Tanda Terima Pendaftaran Surat Online
            </h1>
            <p class="text-xs text-slate-500">Sistem Informasi Layanan Kelurahan Terpadu</p>
        </div>

        <!-- Ticket Highlight Box -->
        <div class="p-4 rounded-xl bg-slate-50 border border-slate-200 text-center my-4">
            <span class="text-[10px] font-bold uppercase text-slate-400">Nomor Registrasi / Tiket</span>
            <div class="text-2xl font-black font-mono tracking-widest text-emerald-800">
                {{ $pengajuan->kode_tiket }}
            </div>
            <span class="text-[10px] text-slate-500">Waktu Pengajuan: {{ $pengajuan->created_at ? $pengajuan->created_at->format('d/m/Y H:i') : date('d/m/Y H:i') }} WITA</span>
        </div>

        <!-- Data Pemohon Table -->
        <table class="w-full text-xs my-4 border-collapse">
            <tbody>
                <tr class="border-b border-slate-100">
                    <td class="py-2 text-slate-500 w-40">Jenis Permohonan</td>
                    <td class="py-2 font-bold text-slate-900">: {{ $pengajuan->jenisSurat->nama_surat ?? '-' }}</td>
                </tr>
                <tr class="border-b border-slate-100">
                    <td class="py-2 text-slate-500">Nama Pemohon</td>
                    <td class="py-2 font-bold text-slate-900">: {{ $pengajuan->nama_pemohon }}</td>
                </tr>
                <tr class="border-b border-slate-100">
                    <td class="py-2 text-slate-500">NIK Pemohon</td>
                    <td class="py-2 font-mono text-slate-900">: {{ $pengajuan->nik }}</td>
                </tr>
                <tr class="border-b border-slate-100">
                    <td class="py-2 text-slate-500">No. Kartu Keluarga</td>
                    <td class="py-2 font-mono text-slate-900">: {{ $pengajuan->no_kk }}</td>
                </tr>
                <tr class="border-b border-slate-100">
                    <td class="py-2 text-slate-500">Alamat / RT / RW</td>
                    <td class="py-2 text-slate-900">: {{ $pengajuan->alamat }} (RT {{ $pengajuan->rt }} / RW {{ $pengajuan->rw }})</td>
                </tr>
                <tr class="border-b border-slate-100">
                    <td class="py-2 text-slate-500">Nomor Telepon / WA</td>
                    <td class="py-2 text-slate-900">: {{ $pengajuan->no_hp }}</td>
                </tr>
                <tr class="border-b border-slate-100">
                    <td class="py-2 text-slate-500">Keperluan</td>
                    <td class="py-2 text-slate-900">: {{ $pengajuan->keperluan }}</td>
                </tr>
                <tr>
                    <td class="py-2 text-slate-500">Status Saat Ini</td>
                    <td class="py-2 font-bold text-emerald-700">: {{ $pengajuan->status }}</td>
                </tr>
            </tbody>
        </table>

        <!-- Checklist Dokumen Diterima -->
        <div class="my-4 p-3 bg-slate-50 rounded-xl border border-slate-200 text-xs">
            <strong class="block mb-1.5 text-slate-800">Dokumen yang Telah Diunggah:</strong>
            <ul class="list-disc list-inside space-y-0.5 text-slate-600">
                @foreach($pengajuan->dokumen as $dok)
                    <li>{{ $dok->nama_dokumen }}</li>
                @endforeach
            </ul>
        </div>

        <!-- Instruksi Pengambilan -->
        <div class="p-3 bg-emerald-50 rounded-xl border border-emerald-200 text-xs text-emerald-950 space-y-1 my-4">
            <strong class="block">Petunjuk Pengambilan Surat:</strong>
            <ol class="list-decimal list-inside space-y-1 text-slate-700 text-[11px]">
                <li>Pantau perkembangan status pengajuan melalui menu "Lacak Status" di website dengan nomor tiket di atas.</li>
                <li>Setelah status berubah menjadi <strong>"Selesai"</strong>, silakan datang ke Loket Pelayanan Kelurahan Sungai Andai.</li>
                <li>Tunjukkan lembar tanda terima ini (cetak atau screenshot HP) serta <strong>bawa Surat Pengantar RT Asli</strong> untuk diserahkan ke petugas loket.</li>
            </ol>
        </div>

        <!-- Signatures -->
        <div class="grid grid-cols-2 gap-4 text-xs pt-6 text-center">
            <div>
                <p class="text-slate-500">Pemohon,</p>
                <div class="h-16"></div>
                <p class="font-bold underline text-slate-900">{{ $pengajuan->nama_pemohon }}</p>
            </div>
            <div>
                <p class="text-slate-500">Banjarmasin, {{ date('d F Y') }}<br>Petugas Pelayanan Loket,</p>
                <div class="h-16"></div>
                <p class="font-bold underline text-slate-900">Kelurahan Sungai Andai</p>
            </div>
        </div>

    </div>

</body>
</html>

