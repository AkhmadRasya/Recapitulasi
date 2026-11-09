<?php $__env->startSection('title', 'Login Pegawai - Kelurahan Sungai Andai'); ?>

<?php $__env->startSection('content'); ?>
<section class="py-16 bg-slate-100 min-h-[75vh] flex items-center">
    <div class="max-w-md mx-auto px-4 w-full">
        
        <div class="rounded-3xl bg-white border border-slate-200 shadow-xl overflow-hidden">
            
            <div class="bg-gradient-to-r from-emerald-800 to-teal-800 text-white p-8 text-center space-y-2">
                <div class="w-14 h-14 rounded-2xl bg-white/10 text-white flex items-center justify-center text-2xl mx-auto border border-white/20">
                    <i class="fa-solid fa-lock"></i>
                </div>
                <h2 class="text-xl font-extrabold">Portal Pegawai & Admin</h2>
                <p class="text-xs text-emerald-200">Kelurahan Sungai Andai, Banjarmasin Utara</p>
            </div>

            <form action="<?php echo e(route('login.post')); ?>" method="POST" class="p-8 space-y-5">
                <?php echo csrf_field(); ?>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Username Akun</label>
                    <div class="relative">
                        <i class="fa-solid fa-user absolute left-3.5 top-3 text-slate-400 text-xs"></i>
                        <input type="text" 
                               name="username" 
                               value="<?php echo e(old('username', 'admin')); ?>" 
                               required 
                               placeholder="admin" 
                               class="w-full pl-9 pr-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Kata Sandi</label>
                    <div class="relative">
                        <i class="fa-solid fa-key absolute left-3.5 top-3 text-slate-400 text-xs"></i>
                        <input type="password" 
                               name="password" 
                               required 
                               placeholder="••••••••" 
                               class="w-full pl-9 pr-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>
                </div>

                <div class="flex items-center justify-between text-xs text-slate-600">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="remember" class="rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
                        <span>Ingat Sesi Saya</span>
                    </label>
                </div>

                <button type="submit" class="w-full py-3 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-sm shadow-md transition flex items-center justify-center gap-2">
                    <i class="fa-solid fa-right-to-bracket"></i>
                    <span>Masuk ke Panel Pelayanan</span>
                </button>

                <div class="p-3 bg-slate-50 rounded-xl border border-slate-200 text-center text-[11px] text-slate-500 space-y-0.5">
                    <p class="font-bold text-slate-700">Informasi Login Default PKL:</p>
                    <p>Username: <code class="text-emerald-700 font-bold">admin</code> | Sandi: <code class="text-emerald-700 font-bold">admin123</code></p>
                </div>
            </form>

        </div>

    </div>
</section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Recapitulasi\resources\views/auth/login.blade.php ENDPATH**/ ?>