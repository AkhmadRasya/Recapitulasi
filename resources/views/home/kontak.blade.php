@extends('layouts.app')

@section('title', 'Kontak & Lokasi - Kelurahan Sungai Andai')

@section('content')
<section class="bg-gradient-to-b from-emerald-900 to-teal-900 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-3">
        <span class="inline-block px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-bold uppercase tracking-wider border border-emerald-400/30">
            Hubungi Kami
        </span>
        <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight">Kontak & Lokasi Pelayanan</h1>
        <p class="text-slate-300 text-sm sm:text-base max-w-2xl mx-auto">
            Informasi alamat kantor, nomor telepon darurat/layanan, email resmi, dan jam operasional pelayanan kelurahan.
        </p>
    </div>
</section>

<section class="py-16 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
            
            <!-- Contact Cards -->
            <div class="lg:col-span-5 space-y-6">
                
                <div class="p-6 rounded-3xl bg-white border border-slate-200 shadow-sm space-y-4">
                    <h3 class="text-lg font-bold text-slate-900 flex items-center gap-2">
                        <i class="fa-solid fa-building text-emerald-600"></i>
                        Kantor Kelurahan Sungai Andai
                    </h3>
                    <p class="text-sm text-slate-600 leading-relaxed">
                        Jl. AMD Sungai Andai Komplek Purnama Permai / Padat Karya, Kecamatan Banjarmasin Utara, Kota Banjarmasin, Kalimantan Selatan 70122.
                    </p>
                </div>

                <div class="p-6 rounded-3xl bg-white border border-slate-200 shadow-sm space-y-4">
                    <h3 class="text-lg font-bold text-slate-900 flex items-center gap-2">
                        <i class="fa-solid fa-headset text-emerald-600"></i>
                        Kanal Komunikasi & WhatsApp
                    </h3>
                    <ul class="space-y-3 text-sm text-slate-600">
                        <li class="flex items-center gap-3">
                            <i class="fa-brands fa-whatsapp text-emerald-600 text-lg w-5"></i>
                            <div>
                                <span class="block text-xs text-slate-400">WhatsApp Pelayanan</span>
                                <a href="https://wa.me/6281234567890" target="_blank" class="font-bold text-slate-900 hover:text-emerald-700">0812-3456-7890</a>
                            </div>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fa-solid fa-phone text-emerald-600 text-lg w-5"></i>
                            <div>
                                <span class="block text-xs text-slate-400">Telepon Kantor</span>
                                <span class="font-bold text-slate-900">(0511) 330-ANDAI</span>
                            </div>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fa-solid fa-envelope text-emerald-600 text-lg w-5"></i>
                            <div>
                                <span class="block text-xs text-slate-400">Email Resmi</span>
                                <span class="font-bold text-slate-900">kelurahan.sungaiandai@banjarmasinkota.go.id</span>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="p-6 rounded-3xl bg-emerald-50 border border-emerald-200 shadow-sm space-y-3">
                    <h4 class="text-sm font-bold text-emerald-900 flex items-center gap-2">
                        <i class="fa-solid fa-clock text-emerald-700"></i>
                        Jam Kerja Pelayanan Loket
                    </h4>
                    <div class="text-xs text-emerald-800 space-y-1">
                        <p><strong>Senin - Kamis:</strong> 08.00 - 15.00 WITA (Istirahat 12.00 - 13.00)</p>
                        <p><strong>Jumat:</strong> 08.00 - 11.30 WITA</p>
                        <p><strong>Sabtu & Minggu:</strong> Libur Pelayanan Tatap Muka</p>
                        <p class="text-[11px] text-emerald-700 italic pt-1">*Pelayanan online melalui web ini tetap aktif menerima permohonan 24 jam.</p>
                    </div>
                </div>

            </div>

            <!-- Google Map -->
            <div class="lg:col-span-7">
                <div class="rounded-3xl overflow-hidden border border-slate-200 shadow-xl h-full min-h-[420px] bg-slate-200">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15933.278393392305!2d114.606275!3d-3.284351!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de423c14a275463%3A0xe549326a26df8018!2sSungai%20Andai%2C%20Kec.%20Banjarmasin%20Utara%2C%20Kota%20Banjarmasin%2C%20Kalimantan%20Selatan!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" 
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy">
                    </iframe>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection

