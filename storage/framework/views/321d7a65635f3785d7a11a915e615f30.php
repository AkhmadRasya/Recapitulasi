<?php $__env->startSection('title', 'Data Aparatur Kelurahan - Admin Sungai Andai'); ?>
<?php $__env->startSection('page_title', 'Aparatur / Pegawai Kelurahan'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6" x-data="{ modalOpen: false, editMode: false, currentPegawai: { id: null, nip: '', nama_pegawai: '', jabatan: '', no_hp: '', alamat: '' } }">
    
    <div class="flex items-center justify-between">
        <p class="text-xs text-slate-500">Kelola jajaran pejabat struktural dan staf pelayanan kelurahan Sungai Andai.</p>
        <button @click="modalOpen = true; editMode = false; currentPegawai = { id: null, nip: '', nama_pegawai: '', jabatan: '', no_hp: '', alamat: '' }" 
                class="px-4 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs shadow-xs transition flex items-center gap-2">
            <i class="fa-solid fa-user-plus"></i>
            <span>Tambah Pegawai</span>
        </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php $__empty_1 = true; $__currentLoopData = $pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="p-6 rounded-2xl bg-white border border-slate-200 shadow-xs flex flex-col justify-between space-y-4">
                <div class="flex items-start gap-3.5">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-tr from-emerald-600 to-teal-500 text-white flex items-center justify-center font-bold text-lg shrink-0">
                        <?php echo e(strtoupper(substr($p->nama_pegawai, 0, 1))); ?>

                    </div>
                    <div class="flex-1 truncate">
                        <h4 class="text-sm font-bold text-slate-900 truncate"><?php echo e($p->nama_pegawai); ?></h4>
                        <span class="text-xs font-semibold text-emerald-700 block"><?php echo e($p->jabatan); ?></span>
                        <span class="text-[11px] text-slate-400 font-mono">NIP: <?php echo e($p->nip ?? '-'); ?></span>
                    </div>
                </div>

                <div class="text-xs text-slate-500 space-y-1 pt-2 border-t border-slate-100">
                    <p><i class="fa-solid fa-phone text-slate-400 w-4"></i> <?php echo e($p->no_hp ?? '-'); ?></p>
                    <p class="truncate"><i class="fa-solid fa-map-pin text-slate-400 w-4"></i> <?php echo e($p->alamat ?? '-'); ?></p>
                </div>

                <div class="flex items-center justify-end gap-2 pt-2 border-t border-slate-100">
                    <button @click="modalOpen = true; editMode = true; currentPegawai = { id: <?php echo e($p->id_pegawai); ?>, nip: '<?php echo e($p->nip); ?>', nama_pegawai: '<?php echo e($p->nama_pegawai); ?>', jabatan: '<?php echo e($p->jabatan); ?>', no_hp: '<?php echo e($p->no_hp); ?>', alamat: '<?php echo e($p->alamat); ?>' }" 
                            class="px-3 py-1.5 rounded-lg bg-emerald-50 text-emerald-700 font-semibold text-xs hover:bg-emerald-100">
                        <i class="fa-solid fa-pen-to-square mr-1"></i> Edit
                    </button>
                    <form action="<?php echo e(route('admin.pegawai.destroy', $p->id_pegawai)); ?>" method="POST" onsubmit="return confirm('Hapus pegawai ini?')">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="p-1.5 rounded-lg bg-rose-50 text-rose-700 hover:bg-rose-100 text-xs">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-span-3 text-center py-12 bg-white rounded-2xl border text-slate-400 text-xs">
                Belum ada data pegawai.
            </div>
        <?php endif; ?>
    </div>

    <!-- Modal Form -->
    <div x-show="modalOpen" x-cloak class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-xs">
        <div class="bg-white rounded-2xl max-w-md w-full shadow-2xl p-6 space-y-4" @click.away="modalOpen = false">
            <div class="flex items-center justify-between pb-2 border-b border-slate-100">
                <h3 class="text-sm font-bold text-slate-900" x-text="editMode ? 'Edit Data Pegawai' : 'Tambah Pegawai Baru'"></h3>
                <button @click="modalOpen = false" class="text-slate-400 hover:text-slate-600"><i class="fa-solid fa-xmark"></i></button>
            </div>

            <form :action="editMode ? `<?php echo e(url('admin/pegawai')); ?>/${currentPegawai.id}` : '<?php echo e(route('admin.pegawai.store')); ?>'" method="POST" class="space-y-3">
                <?php echo csrf_field(); ?>
                <template x-if="editMode">
                    <input type="hidden" name="_method" value="PUT">
                </template>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Nama Pegawai *</label>
                    <input type="text" name="nama_pegawai" x-model="currentPegawai.nama_pegawai" required class="w-full px-3 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Jabatan *</label>
                    <input type="text" name="jabatan" x-model="currentPegawai.jabatan" required placeholder="Contoh: Lurah / Kasi Pelayanan" class="w-full px-3 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">NIP (Nomor Induk Pegawai)</label>
                    <input type="text" name="nip" x-model="currentPegawai.nip" placeholder="232111" class="w-full px-3 py-2 rounded-xl border border-slate-300 text-xs font-mono focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Nomor WhatsApp / HP</label>
                    <input type="text" name="no_hp" x-model="currentPegawai.no_hp" placeholder="08xxxxxxxxxx" class="w-full px-3 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Alamat Tempat Tinggal</label>
                    <textarea name="alamat" x-model="currentPegawai.alamat" rows="2" class="w-full px-3 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-emerald-500 focus:outline-none"></textarea>
                </div>

                <div class="flex items-center justify-end gap-2 pt-3 border-t border-slate-100">
                    <button type="button" @click="modalOpen = false" class="px-4 py-2 rounded-xl bg-slate-100 text-slate-600 font-semibold text-xs">Batal</button>
                    <button type="submit" class="px-5 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs shadow-xs">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Recapitulasi\resources\views/admin/pegawai/index.blade.php ENDPATH**/ ?>