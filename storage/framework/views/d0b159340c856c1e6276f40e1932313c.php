<?php $__env->startSection('title', 'Katalog Layanan Surat Kependudukan - Kelurahan Sungai Andai'); ?>

<?php $__env->startSection('content'); ?>
<section class="bg-gradient-to-b from-emerald-900 to-teal-900 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-3">
        <span class="inline-block px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-bold uppercase tracking-wider border border-emerald-400/30">
            Layanan Terpadu Satu Pintu
        </span>
        <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight">Katalog Surat Kependudukan</h1>
        <p class="text-slate-300 text-sm sm:text-base max-w-2xl mx-auto">
            Daftar lengkap 5 jenis surat yang dapat diajukan secara online beserta rincian syarat dan ketentuan berkas.
        </p>
    </div>
</section>

<section class="py-16 bg-slate-50" x-data="{ tab: 'all' }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Filter Tabs -->
        <div class="flex flex-wrap items-center justify-center gap-2 mb-12">
            <button @click="tab = 'all'" 
                    class="px-5 py-2.5 rounded-xl text-xs sm:text-sm font-bold transition shadow-xs"
                    :class="tab === 'all' ? 'bg-emerald-600 text-white shadow-emerald-600/30' : 'bg-white text-slate-700 hover:bg-slate-100 border border-slate-200'">
                Semua Layanan (5)
            </button>
            <button @click="tab = 'kependudukan'" 
                    class="px-5 py-2.5 rounded-xl text-xs sm:text-sm font-bold transition shadow-xs"
                    :class="tab === 'kependudukan' ? 'bg-emerald-600 text-white shadow-emerald-600/30' : 'bg-white text-slate-700 hover:bg-slate-100 border border-slate-200'">
                Kependudukan & Tempat Tinggal
            </button>
            <button @click="tab = 'pernikahan'" 
                    class="px-5 py-2.5 rounded-xl text-xs sm:text-sm font-bold transition shadow-xs"
                    :class="tab === 'pernikahan' ? 'bg-emerald-600 text-white shadow-emerald-600/30' : 'bg-white text-slate-700 hover:bg-slate-100 border border-slate-200'">
                Pernikahan & Status
            </button>
            <button @click="tab = 'sosial'" 
                    class="px-5 py-2.5 rounded-xl text-xs sm:text-sm font-bold transition shadow-xs"
                    :class="tab === 'sosial' ? 'bg-emerald-600 text-white shadow-emerald-600/30' : 'bg-white text-slate-700 hover:bg-slate-100 border border-slate-200'">
                Bansos & Kematian
            </button>
        </div>

        <!-- Cards List -->
        <div class="space-y-8">
            
            <!-- 1. Belum Memiliki Rumah -->
            <div x-show="tab === 'all' || tab === 'kependudukan'" class="p-8 rounded-3xl bg-white border border-slate-200 shadow-sm hover:shadow-md transition">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                    <div class="lg:col-span-8 space-y-4">
                        <div class="flex items-center gap-3">
                            <span class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold">1</span>
                            <div>
                                <span class="text-xs uppercase font-bold text-emerald-600 tracking-wider">Layanan Kependudukan</span>
                                <h3 class="text-xl font-extrabold text-slate-900">Surat Keterangan Belum Memiliki Rumah</h3>
                            </div>
                        </div>
                        <p class="text-sm text-slate-600 leading-relaxed">
                            Diberikan kepada warga ber-KTP/KK Sungai Andai yang memerlukan bukti tertulis belum memiliki hunian tetap, biasanya untuk kelengkapan administrasi pengajuan KPR Bersubsidi Kementerian PUPR, fasilitas tapera, atau bantuan perumahan.
                        </p>
                        
                        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 space-y-2">
                            <h4 class="text-xs font-bold text-slate-800 uppercase tracking-wider">Persyaratan Berkas Wajib:</h4>
                            <ul class="text-xs text-slate-600 space-y-1.5 list-disc list-inside">
                                <li><strong class="text-emerald-800">Surat Pengantar dari Ketua RT Setempat (Asli / Utama)</strong></li>
                                <li>Fotocopy Kartu Keluarga (KK) pemohon</li>
                                <li>Fotocopy KTP elektronik pemohon</li>
                            </ul>
                        </div>
                    </div>

                    <div class="lg:col-span-4 flex flex-col justify-between h-full space-y-4 lg:border-l lg:border-slate-200 lg:pl-8">
                        <div class="space-y-2 text-xs text-slate-500">
                            <div class="flex justify-between"><span>Estimasi Waktu:</span><strong class="text-slate-800">1 x 24 Jam Kerja</strong></div>
                            <div class="flex justify-between"><span>Biaya Retribusi:</span><strong class="text-emerald-600 font-bold">Gratis (Rp 0)</strong></div>
                            <div class="flex justify-between"><span>Masa Berlaku:</span><strong class="text-slate-800">3 Bulan</strong></div>
                        </div>
                        <a href="<?php echo e(route('layanan.buat', ['id' => 1])); ?>" class="w-full py-3 px-4 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-sm text-center block transition shadow-md">
                            Ajukan Surat Ini Sekarang <i class="fa-solid fa-arrow-right ml-1 text-xs"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- 2. Kematian Manual -->
            <div x-show="tab === 'all' || tab === 'sosial'" class="p-8 rounded-3xl bg-white border border-slate-200 shadow-sm hover:shadow-md transition">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                    <div class="lg:col-span-8 space-y-4">
                        <div class="flex items-center gap-3">
                            <span class="w-10 h-10 rounded-xl bg-teal-100 text-teal-700 flex items-center justify-center font-bold">2</span>
                            <div>
                                <span class="text-xs uppercase font-bold text-teal-600 tracking-wider">Layanan Pencatatan Sipil</span>
                                <h3 class="text-xl font-extrabold text-slate-900">Surat Keterangan Kematian (Manual)</h3>
                            </div>
                        </div>
                        <p class="text-sm text-slate-600 leading-relaxed">
                            Surat keterangan kematian resmi dari kelurahan untuk keperluan penerbitan Akta Kematian di Dinas Kependudukan dan Pencatatan Sipil (Disdukcapil), kepengurusan warisan, penutupan rekening perbankan, santunan, atau administrasi pemakaman.
                        </p>
                        
                        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 space-y-2">
                            <h4 class="text-xs font-bold text-slate-800 uppercase tracking-wider">Persyaratan Berkas Wajib:</h4>
                            <ul class="text-xs text-slate-600 space-y-1.5 list-disc list-inside">
                                <li><strong class="text-teal-800">Surat Pengantar dari Ketua RT Setempat (Asli / Utama)</strong></li>
                                <li>Fotocopy Kartu Keluarga (KK) keluarga/almarhum</li>
                                <li>Fotocopy KTP Pemohon (Pelapor) & KTP Almarhum</li>
                                <li>Surat Keterangan Kematian dari Rumah Sakit / Puskesmas (bila ada)</li>
                            </ul>
                        </div>
                    </div>

                    <div class="lg:col-span-4 flex flex-col justify-between h-full space-y-4 lg:border-l lg:border-slate-200 lg:pl-8">
                        <div class="space-y-2 text-xs text-slate-500">
                            <div class="flex justify-between"><span>Estimasi Waktu:</span><strong class="text-slate-800">1 x 24 Jam Kerja</strong></div>
                            <div class="flex justify-between"><span>Biaya Retribusi:</span><strong class="text-emerald-600 font-bold">Gratis (Rp 0)</strong></div>
                            <div class="flex justify-between"><span>Masa Berlaku:</span><strong class="text-slate-800">Permanen</strong></div>
                        </div>
                        <a href="<?php echo e(route('layanan.buat', ['id' => 2])); ?>" class="w-full py-3 px-4 rounded-xl bg-teal-600 hover:bg-teal-700 text-white font-bold text-sm text-center block transition shadow-md">
                            Ajukan Surat Ini Sekarang <i class="fa-solid fa-arrow-right ml-1 text-xs"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- 3. Pengantar Belum Menikah -->
            <div x-show="tab === 'all' || tab === 'pernikahan'" class="p-8 rounded-3xl bg-white border border-slate-200 shadow-sm hover:shadow-md transition">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                    <div class="lg:col-span-8 space-y-4">
                        <div class="flex items-center gap-3">
                            <span class="w-10 h-10 rounded-xl bg-cyan-100 text-cyan-700 flex items-center justify-center font-bold">3</span>
                            <div>
                                <span class="text-xs uppercase font-bold text-cyan-600 tracking-wider">Status Perkawinan</span>
                                <h3 class="text-xl font-extrabold text-slate-900">Surat Pengantar Belum Menikah</h3>
                            </div>
                        </div>
                        <p class="text-sm text-slate-600 leading-relaxed">
                            Menerangkan bahwa pemohon tercatat berstatus lajang (belum kawin/menikah). Sering digunakan untuk melamar pekerjaan kedinasan (TNI/Polri/BUMN/CPNS), beasiswa program luar negeri, maupun persyaratan tender perbankan.
                        </p>
                        
                        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 space-y-2">
                            <h4 class="text-xs font-bold text-slate-800 uppercase tracking-wider">Persyaratan Berkas Wajib:</h4>
                            <ul class="text-xs text-slate-600 space-y-1.5 list-disc list-inside">
                                <li><strong class="text-cyan-800">Surat Pengantar dari Ketua RT Setempat (Asli / Utama)</strong></li>
                                <li>Fotocopy Kartu Keluarga (KK) pemohon</li>
                                <li>Fotocopy KTP elektronik pemohon</li>
                            </ul>
                        </div>
                    </div>

                    <div class="lg:col-span-4 flex flex-col justify-between h-full space-y-4 lg:border-l lg:border-slate-200 lg:pl-8">
                        <div class="space-y-2 text-xs text-slate-500">
                            <div class="flex justify-between"><span>Estimasi Waktu:</span><strong class="text-slate-800">1 x 24 Jam Kerja</strong></div>
                            <div class="flex justify-between"><span>Biaya Retribusi:</span><strong class="text-emerald-600 font-bold">Gratis (Rp 0)</strong></div>
                            <div class="flex justify-between"><span>Masa Berlaku:</span><strong class="text-slate-800">6 Bulan</strong></div>
                        </div>
                        <a href="<?php echo e(route('layanan.buat', ['id' => 3])); ?>" class="w-full py-3 px-4 rounded-xl bg-cyan-600 hover:bg-cyan-700 text-white font-bold text-sm text-center block transition shadow-md">
                            Ajukan Surat Ini Sekarang <i class="fa-solid fa-arrow-right ml-1 text-xs"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- 4. SKTM -->
            <div x-show="tab === 'all' || tab === 'sosial'" class="p-8 rounded-3xl bg-white border border-slate-200 shadow-sm hover:shadow-md transition">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                    <div class="lg:col-span-8 space-y-4">
                        <div class="flex items-center gap-3">
                            <span class="w-10 h-10 rounded-xl bg-amber-100 text-amber-700 flex items-center justify-center font-bold">4</span>
                            <div>
                                <span class="text-xs uppercase font-bold text-amber-600 tracking-wider">Jaminan Sosial</span>
                                <h3 class="text-xl font-extrabold text-slate-900">Surat Keterangan Tidak Mampu (SKTM)</h3>
                            </div>
                        </div>
                        <p class="text-sm text-slate-600 leading-relaxed">
                            Diberikan kepada keluarga yang secara ekonomi membutuhkan rekomendasi untuk memperoleh keringanan biaya pendidikan/kuliah (KIP Kuliah), perawatan medis di RSUD, pengurusan BPJS PBI, serta bantuan sosial lainnya.
                        </p>
                        
                        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 space-y-2">
                            <h4 class="text-xs font-bold text-slate-800 uppercase tracking-wider">Persyaratan Berkas Wajib:</h4>
                            <ul class="text-xs text-slate-600 space-y-1.5 list-disc list-inside">
                                <li><strong class="text-amber-800">Surat Pengantar dari Ketua RT Setempat (Asli / Utama)</strong></li>
                                <li>Fotocopy Kartu Keluarga (KK) pemohon</li>
                                <li>Fotocopy KTP elektronik pemohon</li>
                                <li>Foto kondisi tempat tinggal (bila diperlukan)</li>
                            </ul>
                        </div>
                    </div>

                    <div class="lg:col-span-4 flex flex-col justify-between h-full space-y-4 lg:border-l lg:border-slate-200 lg:pl-8">
                        <div class="space-y-2 text-xs text-slate-500">
                            <div class="flex justify-between"><span>Estimasi Waktu:</span><strong class="text-slate-800">1 x 24 Jam Kerja</strong></div>
                            <div class="flex justify-between"><span>Biaya Retribusi:</span><strong class="text-emerald-600 font-bold">Gratis (Rp 0)</strong></div>
                            <div class="flex justify-between"><span>Masa Berlaku:</span><strong class="text-slate-800">3 Bulan</strong></div>
                        </div>
                        <a href="<?php echo e(route('layanan.buat', ['id' => 4])); ?>" class="w-full py-3 px-4 rounded-xl bg-amber-600 hover:bg-amber-700 text-white font-bold text-sm text-center block transition shadow-md">
                            Ajukan Surat Ini Sekarang <i class="fa-solid fa-arrow-right ml-1 text-xs"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- 5. Surat Pengantar Nikah (Featured) -->
            <div x-show="tab === 'all' || tab === 'pernikahan'" class="p-8 rounded-3xl bg-gradient-to-br from-emerald-900 to-teal-950 text-white shadow-xl relative overflow-hidden">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start relative z-10">
                    <div class="lg:col-span-8 space-y-4">
                        <div class="flex items-center gap-3">
                            <span class="w-10 h-10 rounded-xl bg-emerald-500 text-slate-950 flex items-center justify-center font-extrabold text-lg">5</span>
                            <div>
                                <span class="text-xs uppercase font-bold text-emerald-400 tracking-wider">Administrasi KUA Kecamatan</span>
                                <h3 class="text-2xl font-extrabold text-white">Surat Pengantar Nikah (Model N1 - N4)</h3>
                            </div>
                        </div>
                        <p class="text-sm text-slate-300 leading-relaxed">
                            Surat rekomendasi pernikahan dari pihak kelurahan menuju KUA Kecamatan Banjarmasin Utara. Memerlukan kelengkapan berkas lengkap dari kedua calon mempelai dan orang tua kedua belah pihak.
                        </p>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                            <div class="p-4 rounded-2xl bg-white/10 border border-white/10 space-y-2">
                                <h4 class="text-xs font-bold text-emerald-300 uppercase tracking-wider">Persyaratan Utama:</h4>
                                <ul class="text-xs text-slate-200 space-y-1.5 list-disc list-inside">
                                    <li><strong class="text-emerald-400">Surat Pengantar dari Ketua RT Setempat (Asli)</strong></li>
                                    <li>Fotocopy KTP Pemohon & FC Kartu Keluarga</li>
                                    <li>Materai Rp 10.000 (Untuk surat pernyataan persetujuan N4)</li>
                                </ul>
                            </div>
                            <div class="p-4 rounded-2xl bg-white/10 border border-white/10 space-y-2">
                                <h4 class="text-xs font-bold text-cyan-300 uppercase tracking-wider">Persyaratan Berkas Kedua Mempelai:</h4>
                                <ul class="text-xs text-slate-200 space-y-1.5 list-disc list-inside">
                                    <li>KTP Orang Tua dari kedua belah mempelai</li>
                                    <li>FC Kartu Keluarga dari kedua belah mempelai</li>
                                    <li>FC Ijazah & FC Akta Kelahiran kedua mempelai</li>
                                    <li>Foto gandeng berdua (4x6) & foto masing-masing (1 lembar)</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-4 flex flex-col justify-between h-full space-y-4 lg:border-l lg:border-white/10 lg:pl-8">
                        <div class="space-y-2 text-xs text-slate-300">
                            <div class="flex justify-between"><span>Estimasi Waktu:</span><strong class="text-white">1 - 2 Hari Kerja</strong></div>
                            <div class="flex justify-between"><span>Biaya Retribusi:</span><strong class="text-emerald-400 font-bold">Gratis (Rp 0)</strong></div>
                            <div class="flex justify-between"><span>Tujuan:</span><strong class="text-white">KUA Kecamatan</strong></div>
                        </div>
                        <a href="<?php echo e(route('layanan.buat', ['id' => 5])); ?>" class="w-full py-3.5 px-4 rounded-xl bg-gradient-to-r from-emerald-400 to-teal-400 text-slate-950 font-extrabold text-sm text-center block transition shadow-lg hover:from-emerald-300 hover:to-teal-300">
                            Ajukan Pengantar Nikah Online <i class="fa-solid fa-arrow-right ml-1 text-xs"></i>
                        </a>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Recapitulasi\resources\views/layanan/index.blade.php ENDPATH**/ ?>