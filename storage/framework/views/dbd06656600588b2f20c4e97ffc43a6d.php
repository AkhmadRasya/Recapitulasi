<?php $__env->startSection('title', 'Database Kependudukan - Admin Sungai Andai'); ?>
<?php $__env->startSection('page_title', 'Data Penduduk Kelurahan'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6" x-data="{ modalOpen: false }">
    
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <form action="<?php echo e(route('admin.penduduk.index')); ?>" method="GET" class="flex-1 max-w-md flex items-center gap-2">
            <input type="text" 
                   name="search" 
                   value="<?php echo e($search ?? ''); ?>" 
                   placeholder="Cari NIK, No. KK, atau Nama Warga..." 
                   class="w-full px-3 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-emerald-500 focus:outline-none bg-white">
            <button type="submit" class="px-4 py-2 rounded-xl bg-slate-800 text-white font-bold text-xs hover:bg-slate-900">
                Cari
            </button>
        </form>

        <button @click="modalOpen = true" class="px-4 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs shadow-xs transition flex items-center gap-2">
            <i class="fa-solid fa-user-plus"></i>
            <span>Tambah Data Penduduk</span>
        </button>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-xs text-left">
                <thead class="bg-slate-50 text-slate-600 font-bold uppercase border-b border-slate-200">
                    <tr>
                        <th class="py-3 px-4">NIK (No. KTP)</th>
                        <th class="py-3 px-4">Nama Lengkap & KK</th>
                        <th class="py-3 px-4">L/P</th>
                        <th class="py-3 px-4">Tempat, Tgl Lahir</th>
                        <th class="py-3 px-4">Pekerjaan</th>
                        <th class="py-3 px-4">Alamat RT / RW</th>
                        <th class="py-3 px-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <?php $__empty_1 = true; $__currentLoopData = $penduduk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-slate-50 transition">
                            <td class="py-3 px-4 font-mono font-bold text-slate-900"><?php echo e($p->nik); ?></td>
                            <td class="py-3 px-4">
                                <strong class="text-slate-900 block"><?php echo e($p->nama_lengkap); ?></strong>
                                <span class="text-[11px] text-slate-400 font-mono">KK: <?php echo e($p->no_kk); ?></span>
                            </td>
                            <td class="py-3 px-4"><?php echo e($p->jenis_kelamin == 'Laki-laki' ? 'L' : 'P'); ?></td>
                            <td class="py-3 px-4 text-slate-600">
                                <?php echo e($p->tempat_lahir); ?>, <?php echo e($p->tanggal_lahir ? $p->tanggal_lahir->format('d/m/Y') : '-'); ?>

                            </td>
                            <td class="py-3 px-4 text-slate-600"><?php echo e($p->pekerjaan ?? '-'); ?></td>
                            <td class="py-3 px-4 text-slate-600">
                                <?php echo e($p->alamat); ?> <span class="font-bold">(RT <?php echo e($p->rt); ?> / RW <?php echo e($p->rw); ?>)</span>
                            </td>
                            <td class="py-3 px-4 text-center">
                                <form action="<?php echo e(route('admin.penduduk.destroy', $p->id_penduduk)); ?>" method="POST" onsubmit="return confirm('Hapus data penduduk ini?')" class="inline">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="p-1.5 rounded-lg bg-rose-50 text-rose-700 hover:bg-rose-100 text-xs">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="7" class="py-8 text-center text-slate-400">Tidak ada data penduduk yang sesuai.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-slate-200">
            <?php echo e($penduduk->links()); ?>

        </div>
    </div>

    <!-- Modal Tambah Penduduk -->
    <div x-show="modalOpen" x-cloak class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-xs">
        <div class="bg-white rounded-2xl max-w-lg w-full shadow-2xl p-6 space-y-4" @click.away="modalOpen = false">
            <div class="flex items-center justify-between pb-2 border-b border-slate-100">
                <h3 class="text-sm font-bold text-slate-900">Tambah Data Penduduk Baru</h3>
                <button @click="modalOpen = false" class="text-slate-400 hover:text-slate-600"><i class="fa-solid fa-xmark"></i></button>
            </div>

            <form action="<?php echo e(route('admin.penduduk.store')); ?>" method="POST" class="space-y-3">
                <?php echo csrf_field(); ?>
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">NIK (16 Digit) *</label>
                        <input type="text" name="nik" maxlength="16" required class="w-full px-3 py-2 rounded-xl border border-slate-300 text-xs font-mono focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">No. KK (16 Digit) *</label>
                        <input type="text" name="no_kk" maxlength="16" required class="w-full px-3 py-2 rounded-xl border border-slate-300 text-xs font-mono focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Nama Lengkap *</label>
                    <input type="text" name="nama_lengkap" required class="w-full px-3 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                </div>

                <div class="grid grid-cols-3 gap-3">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="w-full px-3 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="w-full px-3 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Jenis Kelamin *</label>
                        <select name="jenis_kelamin" required class="w-full px-3 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Agama</label>
                        <select name="agama" class="w-full px-3 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Buddha</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Pekerjaan</label>
                        <input type="text" name="pekerjaan" class="w-full px-3 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Alamat Tempat Tinggal</label>
                    <textarea name="alamat" rows="2" class="w-full px-3 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-emerald-500 focus:outline-none"></textarea>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">RT</label>
                        <input type="text" name="rt" placeholder="015" class="w-full px-3 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">RW</label>
                        <input type="text" name="rw" placeholder="002" class="w-full px-3 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>
                </div>

                <div class="flex items-center justify-end gap-2 pt-3 border-t border-slate-100">
                    <button type="button" @click="modalOpen = false" class="px-4 py-2 rounded-xl bg-slate-100 text-slate-600 font-semibold text-xs">Batal</button>
                    <button type="submit" class="px-5 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs shadow-xs">Simpan Penduduk</button>
                </div>
            </form>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Recapitulasi\resources\views/admin/penduduk/index.blade.php ENDPATH**/ ?>