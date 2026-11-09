<?php $__env->startSection('title', 'Daftar Pengajuan Surat - Admin Sungai Andai'); ?>
<?php $__env->startSection('page_title', 'Kelola Pengajuan Surat Kependudukan'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6">
    
    <!-- Filter Card -->
    <div class="p-6 rounded-2xl bg-white border border-slate-200 shadow-xs space-y-4">
        <form action="<?php echo e(route('admin.pengajuan.index')); ?>" method="GET" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            
            <div>
                <label class="block text-xs font-bold text-slate-600 uppercase mb-1">Cari Data</label>
                <input type="text" 
                       name="search" 
                       value="<?php echo e($search ?? ''); ?>" 
                       placeholder="Cari nama, NIK, atau nomor tiket..." 
                       class="w-full px-3 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-emerald-500 focus:outline-none">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-600 uppercase mb-1">Status Pengajuan</label>
                <select name="status" class="w-full px-3 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    <option value="">-- Semua Status --</option>
                    <option value="Menunggu" <?php echo e($status === 'Menunggu' ? 'selected' : ''); ?>>Menunggu Verifikasi</option>
                    <option value="Diproses" <?php echo e($status === 'Diproses' ? 'selected' : ''); ?>>Sedang Diproses</option>
                    <option value="Selesai" <?php echo e($status === 'Selesai' ? 'selected' : ''); ?>>Selesai / Terbit</option>
                    <option value="Ditolak" <?php echo e($status === 'Ditolak' ? 'selected' : ''); ?>>Ditolak</option>
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-600 uppercase mb-1">Jenis Surat</label>
                <select name="id_jenis" class="w-full px-3 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    <option value="">-- Semua 5 Surat --</option>
                    <?php $__currentLoopData = $jenisSurat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $js): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($js->id_jenis); ?>" <?php echo e($idJenis == $js->id_jenis ? 'selected' : ''); ?>>
                            <?php echo e($js->nama_surat); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="flex items-end gap-2">
                <button type="submit" class="flex-1 py-2 px-4 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs shadow-xs transition">
                    <i class="fa-solid fa-filter mr-1"></i> Terapkan Filter
                </button>
                <a href="<?php echo e(route('admin.pengajuan.index')); ?>" class="py-2 px-3 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-600 text-xs font-semibold" title="Reset">
                    <i class="fa-solid fa-rotate-left"></i>
                </a>
            </div>

        </form>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-xs text-left">
                <thead class="bg-slate-50 text-slate-600 font-bold uppercase border-b border-slate-200">
                    <tr>
                        <th class="py-3.5 px-4">No. Tiket</th>
                        <th class="py-3.5 px-4">Nama Pemohon & NIK</th>
                        <th class="py-3.5 px-4">Jenis Surat</th>
                        <th class="py-3.5 px-4">RT / RW</th>
                        <th class="py-3.5 px-4">Tanggal Pengajuan</th>
                        <th class="py-3.5 px-4">Status</th>
                        <th class="py-3.5 px-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <?php $__empty_1 = true; $__currentLoopData = $pengajuan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-slate-50 transition">
                            <td class="py-3.5 px-4 font-mono font-bold text-emerald-800">
                                <?php echo e($p->kode_tiket); ?>

                            </td>
                            <td class="py-3.5 px-4">
                                <strong class="text-slate-900 block text-xs"><?php echo e($p->nama_pemohon); ?></strong>
                                <span class="text-[11px] text-slate-400 font-mono"><?php echo e($p->nik); ?></span>
                            </td>
                            <td class="py-3.5 px-4 font-medium text-slate-700">
                                <?php echo e($p->jenisSurat->nama_surat ?? '-'); ?>

                            </td>
                            <td class="py-3.5 px-4 text-slate-600">RT <?php echo e($p->rt); ?> / RW <?php echo e($p->rw); ?></td>
                            <td class="py-3.5 px-4 text-slate-500">
                                <?php echo e($p->tanggal_pengajuan ? $p->tanggal_pengajuan->format('d/m/Y') : '-'); ?>

                            </td>
                            <td class="py-3.5 px-4">
                                <span class="px-2.5 py-0.5 rounded-full font-bold border text-[11px] <?php echo e($p->status_badge); ?>">
                                    <?php echo e($p->status); ?>

                                </span>
                            </td>
                            <td class="py-3.5 px-4 text-center">
                                <div class="flex items-center justify-center gap-1.5">
                                    <a href="<?php echo e(route('admin.pengajuan.show', $p->id_pengajuan)); ?>" class="px-3 py-1.5 rounded-lg bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-[11px] shadow-xs inline-flex items-center gap-1">
                                        <i class="fa-solid fa-eye"></i> Periksa
                                    </a>
                                    <a href="<?php echo e(route('admin.pengajuan.cetak', $p->id_pengajuan)); ?>" target="_blank" class="p-1.5 rounded-lg bg-slate-800 hover:bg-slate-900 text-white text-[11px] shadow-xs" title="Cetak Surat Resmi">
                                        <i class="fa-solid fa-print"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="7" class="py-12 text-center text-slate-400">
                                Tidak ada data pengajuan surat yang sesuai kriteria.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-slate-200">
            <?php echo e($pengajuan->links()); ?>

        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Recapitulasi\resources\views/admin/pengajuan/index.blade.php ENDPATH**/ ?>