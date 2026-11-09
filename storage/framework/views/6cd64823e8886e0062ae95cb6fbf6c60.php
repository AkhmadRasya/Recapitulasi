<?php $__env->startSection('title', 'Lacak Status Pengajuan Surat - Kelurahan Sungai Andai'); ?>

<?php $__env->startSection('content'); ?>
<section class="bg-gradient-to-b from-emerald-900 to-teal-900 text-white py-14">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
        <span class="inline-block px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-bold uppercase tracking-wider border border-emerald-400/30">
            Keterbukaan Pelayanan
        </span>
        <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Lacak Status Permohonan Surat</h1>
        <p class="text-slate-300 text-xs sm:text-sm max-w-xl mx-auto">
            Pantau sejauh mana proses verifikasi dan penyelesaian surat administrasi Anda secara realtime melalui Nomor Tiket atau NIK.
        </p>

        <!-- Search Form -->
        <div class="max-w-xl mx-auto pt-4">
            <form action="<?php echo e(route('layanan.tracking')); ?>" method="GET" class="p-2 rounded-2xl bg-white shadow-2xl flex flex-col sm:flex-row gap-2">
                <div class="flex-1 flex items-center gap-2 px-3">
                    <i class="fa-solid fa-magnifying-glass text-slate-400"></i>
                    <input type="text" 
                           name="q" 
                           value="<?php echo e($keyword ?? ''); ?>" 
                           placeholder="Ketik Nomor Tiket (REG-SA-...) atau NIK 16 digit..." 
                           class="w-full bg-transparent text-sm py-2.5 text-slate-800 placeholder-slate-400 focus:outline-none"
                           required>
                </div>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-sm transition flex items-center justify-center gap-2 shadow">
                    <span>Lacak Sekarang</span>
                    <i class="fa-solid fa-arrow-right text-xs"></i>
                </button>
            </form>
            <p class="text-[11px] text-emerald-200 mt-2 text-center">
                Nomor tiket dapat dilihat pada lembar bukti resi pendaftaran atau SMS/WhatsApp tanda terima.
            </p>
        </div>
    </div>
</section>

<section class="py-16 bg-slate-100 min-h-[60vh]">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <?php if($keyword && !$pengajuan && $listHasil->isEmpty()): ?>
            <!-- Not Found State -->
            <div class="p-10 rounded-3xl bg-white border border-slate-200 shadow-sm text-center space-y-4">
                <div class="w-16 h-16 rounded-full bg-rose-100 text-rose-600 flex items-center justify-center text-2xl mx-auto">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                <h3 class="text-xl font-bold text-slate-900">Data Pengajuan Tidak Ditemukan</h3>
                <p class="text-xs sm:text-sm text-slate-500 max-w-md mx-auto">
                    Tidak ditemukan permohonan surat dengan kata kunci <code class="font-mono font-bold text-slate-800">"<?php echo e($keyword); ?>"</code>. Mohon periksa kembali nomor tiket atau NIK Anda.
                </p>
                <div class="pt-2">
                    <a href="<?php echo e(route('layanan.tracking')); ?>" class="px-5 py-2.5 rounded-xl bg-slate-800 text-white text-xs font-bold hover:bg-slate-900">
                        Coba Lagi
                    </a>
                </div>
            </div>

        <?php elseif($listHasil->count() > 1 && !$pengajuan): ?>
            <!-- Multiple Results for NIK -->
            <div class="space-y-4">
                <div class="p-4 rounded-2xl bg-white border border-slate-200 shadow-sm flex items-center justify-between">
                    <div>
                        <h4 class="text-sm font-bold text-slate-900">Ditemukan <?php echo e($listHasil->count()); ?> Pengajuan untuk Kata Kunci Ini</h4>
                        <p class="text-xs text-slate-500">Klik salah satu tiket di bawah untuk melihat rincian proses</p>
                    </div>
                </div>

                <div class="space-y-3">
                    <?php $__currentLoopData = $listHasil; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('layanan.tracking', ['q' => $item->kode_tiket])); ?>" 
                           class="p-5 rounded-2xl bg-white border border-slate-200 hover:border-emerald-500 hover:shadow-md transition flex flex-col sm:flex-row sm:items-center justify-between gap-4 block">
                            <div>
                                <span class="font-mono text-xs font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded">
                                    <?php echo e($item->kode_tiket); ?>

                                </span>
                                <h4 class="text-base font-bold text-slate-900 mt-1"><?php echo e($item->jenisSurat->nama_surat ?? '-'); ?></h4>
                                <p class="text-xs text-slate-500">Pemohon: <?php echo e($item->nama_pemohon); ?> • <?php echo e($item->tanggal_pengajuan ? $item->tanggal_pengajuan->format('d/m/Y') : ''); ?></p>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="px-3 py-1 rounded-full text-xs font-bold border <?php echo e($item->status_badge); ?>">
                                    <?php echo e($item->status); ?>

                                </span>
                                <i class="fa-solid fa-chevron-right text-xs text-slate-400"></i>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

        <?php elseif($pengajuan): ?>
            <!-- Detail Single Request with Progress Stepper -->
            <div class="rounded-3xl bg-white border border-slate-200 shadow-xl overflow-hidden space-y-8">
                
                <!-- Header Box -->
                <div class="p-6 sm:p-8 bg-gradient-to-r from-slate-900 to-slate-800 text-white flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div>
                        <span class="text-xs font-semibold text-emerald-400 uppercase tracking-wider block">Rincian Permohonan Surat</span>
                        <h2 class="text-xl sm:text-2xl font-extrabold text-white mt-0.5">
                            <?php echo e($pengajuan->jenisSurat->nama_surat ?? '-'); ?>

                        </h2>
                        <p class="text-xs text-slate-400 mt-1">
                            Nomor Tiket: <strong class="font-mono text-white text-sm"><?php echo e($pengajuan->kode_tiket); ?></strong>
                        </p>
                    </div>

                    <div>
                        <span class="inline-block px-4 py-1.5 rounded-full text-xs font-extrabold border <?php echo e($pengajuan->status_badge); ?>">
                            Status: <?php echo e($pengajuan->status); ?>

                        </span>
                    </div>
                </div>

                <!-- Interactive 4-Step Progress Bar -->
                <div class="px-6 sm:px-8">
                    <?php
                        $step = match($pengajuan->status) {
                            'Menunggu' => 1,
                            'Diproses' => 2,
                            'Selesai' => 4,
                            'Ditolak' => 0,
                            default => 1,
                        };
                    ?>

                    <?php if($pengajuan->status === 'Ditolak'): ?>
                        <div class="p-5 rounded-2xl bg-rose-50 border border-rose-200 text-rose-900 space-y-2">
                            <h4 class="text-sm font-bold flex items-center gap-2">
                                <i class="fa-solid fa-circle-xmark text-rose-600"></i>
                                Permohonan Ditolak / Perlu Perbaikan Berkas
                            </h4>
                            <p class="text-xs leading-relaxed text-rose-800">
                                <strong>Catatan Petugas Kelurahan:</strong><br>
                                <?php echo e($pengajuan->catatan_petugas ?? 'Dokumen yang Anda lampirkan belum memenuhi kelengkapan atau kurang jelas. Silakan hubungi loket kelurahan atau ajukan ulang.'); ?>

                            </p>
                        </div>
                    <?php else: ?>
                        <div class="py-4">
                            <div class="relative">
                                <!-- Step Line -->
                                <div class="absolute top-5 left-6 right-6 h-1 bg-slate-200 z-0"></div>
                                <div class="absolute top-5 left-6 h-1 bg-emerald-500 transition-all duration-500 z-0"
                                     style="width: <?php echo e($step == 1 ? '15%' : ($step == 2 ? '50%' : '95%')); ?>;"></div>

                                <div class="relative z-10 grid grid-cols-4 text-center">
                                    <!-- Step 1 -->
                                    <div class="space-y-2">
                                        <div class="w-10 h-10 rounded-full mx-auto flex items-center justify-center font-bold text-xs shadow-md transition <?php echo e($step >= 1 ? 'bg-emerald-600 text-white' : 'bg-slate-200 text-slate-500'); ?>">
                                            <i class="fa-solid fa-check"></i>
                                        </div>
                                        <div>
                                            <p class="text-xs font-bold text-slate-900">Diajukan</p>
                                            <p class="text-[10px] text-slate-400">Berkas Terkirim</p>
                                        </div>
                                    </div>

                                    <!-- Step 2 -->
                                    <div class="space-y-2">
                                        <div class="w-10 h-10 rounded-full mx-auto flex items-center justify-center font-bold text-xs shadow-md transition <?php echo e($step >= 2 ? 'bg-emerald-600 text-white' : 'bg-slate-200 text-slate-500'); ?>">
                                            <?php if($step >= 2): ?> <i class="fa-solid fa-check"></i> <?php else: ?> 2 <?php endif; ?>
                                        </div>
                                        <div>
                                            <p class="text-xs font-bold text-slate-900">Verifikasi</p>
                                            <p class="text-[10px] text-slate-400">Pengecekan Syarat</p>
                                        </div>
                                    </div>

                                    <!-- Step 3 -->
                                    <div class="space-y-2">
                                        <div class="w-10 h-10 rounded-full mx-auto flex items-center justify-center font-bold text-xs shadow-md transition <?php echo e($step >= 3 ? 'bg-emerald-600 text-white' : 'bg-slate-200 text-slate-500'); ?>">
                                            <?php if($step >= 4): ?> <i class="fa-solid fa-check"></i> <?php else: ?> 3 <?php endif; ?>
                                        </div>
                                        <div>
                                            <p class="text-xs font-bold text-slate-900">Penandatanganan</p>
                                            <p class="text-[10px] text-slate-400">Tanda Tangan Lurah</p>
                                        </div>
                                    </div>

                                    <!-- Step 4 -->
                                    <div class="space-y-2">
                                        <div class="w-10 h-10 rounded-full mx-auto flex items-center justify-center font-bold text-xs shadow-md transition <?php echo e($step >= 4 ? 'bg-emerald-600 text-white' : 'bg-slate-200 text-slate-500'); ?>">
                                            <?php if($step >= 4): ?> <i class="fa-solid fa-check"></i> <?php else: ?> 4 <?php endif; ?>
                                        </div>
                                        <div>
                                            <p class="text-xs font-bold text-slate-900">Selesai</p>
                                            <p class="text-[10px] text-slate-400">Surat Siap Diambil</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Info Grid -->
                <div class="px-6 sm:px-8 space-y-6">
                    <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200 space-y-3">
                        <h4 class="text-xs font-bold text-slate-900 uppercase tracking-wider">
                            Catatan & Instruksi Terkini Petugas:
                        </h4>
                        <p class="text-xs text-slate-700 leading-relaxed font-medium">
                            <i class="fa-solid fa-comment-dots text-emerald-600 mr-1.5"></i>
                            <?php echo e($pengajuan->catatan_petugas ?? 'Permohonan Anda sedang dalam antrean pemeriksaan berkas oleh staf pelayanan kantor kelurahan.'); ?>

                        </p>

                        <?php if($pengajuan->nomor_surat): ?>
                            <div class="pt-2 border-t border-slate-200 text-xs">
                                <span class="text-slate-500">Nomor Surat Resmi Kelurahan:</span>
                                <strong class="text-slate-900 font-mono ml-1"><?php echo e($pengajuan->nomor_surat); ?></strong>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Details Table -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                        <div class="p-4 rounded-xl bg-white border border-slate-200 space-y-1">
                            <span class="text-slate-400 uppercase text-[10px] font-bold">Nama Pemohon:</span>
                            <p class="font-bold text-slate-900"><?php echo e($pengajuan->nama_pemohon); ?></p>
                        </div>
                        <div class="p-4 rounded-xl bg-white border border-slate-200 space-y-1">
                            <span class="text-slate-400 uppercase text-[10px] font-bold">Nomor KTP (NIK):</span>
                            <p class="font-mono font-bold text-slate-900"><?php echo e($pengajuan->nik); ?></p>
                        </div>
                        <div class="p-4 rounded-xl bg-white border border-slate-200 space-y-1">
                            <span class="text-slate-400 uppercase text-[10px] font-bold">Nomor Kartu Keluarga:</span>
                            <p class="font-mono font-bold text-slate-900"><?php echo e($pengajuan->no_kk); ?></p>
                        </div>
                        <div class="p-4 rounded-xl bg-white border border-slate-200 space-y-1">
                            <span class="text-slate-400 uppercase text-[10px] font-bold">Alamat & Lingkungan:</span>
                            <p class="text-slate-900"><?php echo e($pengajuan->alamat); ?> (RT <?php echo e($pengajuan->rt); ?> / RW <?php echo e($pengajuan->rw); ?>)</p>
                        </div>
                        <div class="p-4 rounded-xl bg-white border border-slate-200 space-y-1 sm:col-span-2">
                            <span class="text-slate-400 uppercase text-[10px] font-bold">Keperluan / Keterangan:</span>
                            <p class="text-slate-900"><?php echo e($pengajuan->keperluan); ?></p>
                        </div>
                    </div>
                </div>

                <!-- Footer Action Buttons -->
                <div class="p-6 sm:p-8 bg-slate-50 border-t border-slate-200 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <a href="<?php echo e(route('layanan.cetak-resi', $pengajuan->kode_tiket)); ?>" 
                       target="_blank"
                       class="w-full sm:w-auto px-5 py-2.5 rounded-xl bg-slate-800 hover:bg-slate-900 text-white font-bold text-xs transition flex items-center justify-center gap-2">
                        <i class="fa-solid fa-print"></i>
                        <span>Cetak Ulang Bukti Resi</span>
                    </a>

                    <?php if($pengajuan->status === 'Selesai'): ?>
                        <div class="flex items-center gap-3">
                            <span class="text-xs text-emerald-700 font-semibold flex items-center gap-1">
                                <i class="fa-solid fa-circle-check"></i> Surat Siap Diambil di Loket
                            </span>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        <?php else: ?>
            <!-- Initial State Search Guide -->
            <div class="p-10 rounded-3xl bg-white border border-slate-200 shadow-sm text-center space-y-4">
                <div class="w-16 h-16 rounded-2xl bg-emerald-100 text-emerald-700 flex items-center justify-center text-3xl mx-auto">
                    <i class="fa-solid fa-file-invoice"></i>
                </div>
                <h3 class="text-xl font-bold text-slate-900">Masukkan Nomor Tiket atau NIK Anda</h3>
                <p class="text-xs sm:text-sm text-slate-500 max-w-md mx-auto leading-relaxed">
                    Ketik nomor pendaftaran Anda pada kotak pencarian di atas untuk memeriksa status permohonan surat keterangan yang sedang diproses.
                </p>
                <div class="pt-4 flex flex-wrap justify-center gap-2 text-xs text-slate-500">
                    <span>Butuh surat baru?</span>
                    <a href="<?php echo e(route('layanan.buat')); ?>" class="font-bold text-emerald-700 hover:underline">
                        Ajukan Surat Sekarang <i class="fa-solid fa-arrow-right text-[10px]"></i>
                    </a>
                </div>
            </div>
        <?php endif; ?>

    </div>
</section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Recapitulasi\resources\views/layanan/tracking.blade.php ENDPATH**/ ?>