<?php $__env->startSection('title', 'Formulir Permohonan Surat Online - Kelurahan Sungai Andai'); ?>

<?php $__env->startSection('content'); ?>
<section class="bg-gradient-to-b from-emerald-900 to-teal-900 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-3">
        <span class="inline-block px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-bold uppercase tracking-wider border border-emerald-400/30">
            Formulir Mandiri Warga
        </span>
        <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Permohonan Surat Kependudukan Online</h1>
        <p class="text-slate-300 text-xs sm:text-sm max-w-2xl mx-auto">
            Isi data pemohon secara benar dan unggah dokumen pendukung. Nomor tiket registrasi akan diterbitkan untuk melacak status proses secara langsung.
        </p>
    </div>
</section>

<section class="py-12 bg-slate-100" 
         x-data="suratForm({ 
            selectedJenis: <?php echo e(old('id_jenis', $selectedSurat->id_jenis ?? 1)); ?> 
         })">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Form Wrapper -->
        <form action="<?php echo e(route('layanan.simpan')); ?>" 
              method="POST" 
              enctype="multipart/form-data" 
              class="space-y-8"
              @submit="isSubmitting = true">
            <?php echo csrf_field(); ?>

            <!-- Card 1: Pilihan Jenis Surat -->
            <div class="p-6 sm:p-8 rounded-3xl bg-white border border-slate-200 shadow-sm space-y-5">
                <div class="flex items-center gap-3 pb-4 border-b border-slate-100">
                    <span class="w-8 h-8 rounded-xl bg-emerald-600 text-white flex items-center justify-center font-bold text-sm">1</span>
                    <div>
                        <h3 class="text-base font-bold text-slate-900">Pilih Jenis Surat yang Diurus</h3>
                        <p class="text-xs text-slate-500">Pilih salah satu dari 5 jenis surat yang disediakan</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
                    <?php $__currentLoopData = $jenisSurat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $js): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <label class="relative flex flex-col p-4 rounded-2xl border cursor-pointer transition select-none"
                               :class="selectedJenis == <?php echo e($js->id_jenis); ?> ? 'border-emerald-600 bg-emerald-50/70 ring-2 ring-emerald-500/30' : 'border-slate-200 bg-white hover:bg-slate-50'">
                            <input type="radio" 
                                   name="id_jenis" 
                                   value="<?php echo e($js->id_jenis); ?>" 
                                   x-model="selectedJenis" 
                                   class="sr-only">
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-xs font-bold text-slate-400">#<?php echo e($js->id_jenis); ?></span>
                                <div class="w-4 h-4 rounded-full border flex items-center justify-center"
                                     :class="selectedJenis == <?php echo e($js->id_jenis); ?> ? 'border-emerald-600 bg-emerald-600' : 'border-slate-300'">
                                    <div class="w-1.5 h-1.5 rounded-full bg-white" x-show="selectedJenis == <?php echo e($js->id_jenis); ?>"></div>
                                </div>
                            </div>
                            <span class="text-xs sm:text-sm font-bold text-slate-900" :class="selectedJenis == <?php echo e($js->id_jenis); ?> ? 'text-emerald-900' : ''">
                                <?php echo e($js->nama_surat); ?>

                            </span>
                        </label>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <!-- Alert Notice Khusus Surat Pengantar Nikah -->
                <div x-show="selectedJenis == 5" x-cloak class="p-4 rounded-2xl bg-amber-50 border border-amber-200 text-amber-900 text-xs space-y-1">
                    <p class="font-bold flex items-center gap-1.5">
                        <i class="fa-solid fa-triangle-exclamation text-amber-600"></i>
                        Perhatian Khusus Permohonan Pengantar Nikah (Model N1-N4):
                    </p>
                    <p class="leading-relaxed">
                        Selain Surat Pengantar RT, KTP, dan KK pemohon, Anda <strong>wajib</strong> melampirkan berkas lengkap kedua mempelai (KTP orang tua kedua belah mempelai, KK kedua mempelai, ijazah, akta kelahiran, foto gandeng berdua, foto masing-masing, serta materai Rp 10.000). Formulir isian khusus akan terbuka di bawah.
                    </p>
                </div>
            </div>

            <!-- Card 2: Data Pemohon (Dengan Fitur Auto-Check NIK) -->
            <div class="p-6 sm:p-8 rounded-3xl bg-white border border-slate-200 shadow-sm space-y-6">
                <div class="flex items-center justify-between pb-4 border-b border-slate-100">
                    <div class="flex items-center gap-3">
                        <span class="w-8 h-8 rounded-xl bg-emerald-600 text-white flex items-center justify-center font-bold text-sm">2</span>
                        <div>
                            <h3 class="text-base font-bold text-slate-900">Data Identitas Pemohon</h3>
                            <p class="text-xs text-slate-500">Sesuai dengan KTP dan Kartu Keluarga yang berlaku</p>
                        </div>
                    </div>
                    <span class="text-[11px] text-emerald-700 bg-emerald-50 px-2.5 py-1 rounded-full font-medium">
                        <i class="fa-solid fa-bolt mr-1"></i> Auto-Fill Database
                    </span>
                </div>

                <!-- Input NIK + Check Button -->
                <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">
                    <div class="md:col-span-8">
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">
                            Nomor Induk Kependudukan (NIK 16 Digit) *
                        </label>
                        <div class="relative">
                            <input type="text" 
                                   name="nik" 
                                   x-model="formData.nik" 
                                   maxlength="16" 
                                   required 
                                   placeholder="Contoh: 6371011234567890" 
                                   class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm font-mono focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                            <div class="absolute right-3 top-2.5 text-slate-400" x-show="isCheckingNik">
                                <i class="fa-solid fa-spinner fa-spin text-emerald-600"></i>
                            </div>
                        </div>
                    </div>
                    <div class="md:col-span-4">
                        <button type="button" 
                                @click="checkNik()" 
                                class="w-full py-2.5 px-4 rounded-xl bg-slate-800 hover:bg-slate-900 text-white font-bold text-xs shadow transition flex items-center justify-center gap-2">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <span>Cek Data NIK</span>
                        </button>
                    </div>
                </div>

                <!-- Notifikasi Hasil Cek NIK -->
                <div x-show="nikFoundMsg" x-cloak class="p-3 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs flex items-center gap-2">
                    <i class="fa-solid fa-circle-check text-emerald-600"></i>
                    <span x-text="nikFoundMsg"></span>
                </div>

                <!-- Form Baris Data Diri -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Nomor Kartu Keluarga (KK 16 Digit) *</label>
                        <input type="text" name="no_kk" x-model="formData.no_kk" maxlength="16" required placeholder="6371..." class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm font-mono focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Nama Lengkap Pemohon *</label>
                        <input type="text" name="nama_pemohon" x-model="formData.nama_lengkap" required placeholder="Nama sesuai KTP" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Tempat Lahir *</label>
                        <input type="text" name="tempat_lahir" x-model="formData.tempat_lahir" required placeholder="Kota kelahiran" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Tanggal Lahir *</label>
                        <input type="date" name="tanggal_lahir" x-model="formData.tanggal_lahir" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Jenis Kelamin *</label>
                        <select name="jenis_kelamin" x-model="formData.jenis_kelamin" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                            <option value="">-- Pilih --</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Agama *</label>
                        <select name="agama" x-model="formData.agama" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                            <option value="">-- Pilih Agama --</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Konghucu">Konghucu</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Pekerjaan *</label>
                        <input type="text" name="pekerjaan" x-model="formData.pekerjaan" required placeholder="Contoh: Karyawan Swasta, Wiraswasta" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Alamat Tempat Tinggal (Domisili di Sungai Andai) *</label>
                    <textarea name="alamat" x-model="formData.alamat" rows="2" required placeholder="Nama jalan, komplek perumahan, nomor rumah..." class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none"></textarea>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Rukun Tetangga (RT) *</label>
                        <input type="text" name="rt" x-model="formData.rt" required placeholder="Contoh: 015" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Rukun Warga (RW) *</label>
                        <input type="text" name="rw" x-model="formData.rw" required placeholder="Contoh: 002" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Nomor WhatsApp / HP Aktif *</label>
                        <input type="text" name="no_hp" value="<?php echo e(old('no_hp')); ?>" required placeholder="08xxxxxxxxxx" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Tujuan / Keperluan Permohonan Surat *</label>
                    <textarea name="keperluan" rows="2" required placeholder="Contoh: Persyaratan pengajuan KPR Perumahan Bank BTN / Keringanan biaya UKT Kuliah" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none"><?php echo e(old('keperluan')); ?></textarea>
                </div>
            </div>

            <!-- Card 3: Data Khusus (Kondisional: Pernikahan atau Kematian) -->
            <!-- Data Khusus Pengantar Nikah (id_jenis = 5) -->
            <div x-show="selectedJenis == 5" x-cloak class="p-6 sm:p-8 rounded-3xl bg-white border border-emerald-300 shadow-sm space-y-6">
                <div class="flex items-center gap-3 pb-4 border-b border-emerald-100">
                    <span class="w-8 h-8 rounded-xl bg-emerald-700 text-white flex items-center justify-center font-bold text-sm">
                        <i class="fa-solid fa-heart text-xs"></i>
                    </span>
                    <div>
                        <h3 class="text-base font-bold text-slate-900">Data Khusus Surat Pengantar Nikah (N1-N4)</h3>
                        <p class="text-xs text-slate-500">Isi data calon pasangan dan kedua orang tua kedua belah pihak</p>
                    </div>
                </div>

                <div class="space-y-4">
                    <h4 class="text-xs font-bold uppercase tracking-wider text-emerald-800 bg-emerald-50 p-2.5 rounded-xl">
                        A. Identitas Calon Pasangan
                    </h4>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Nama Lengkap Pasangan *</label>
                            <input type="text" name="nama_pasangan" value="<?php echo e(old('nama_pasangan')); ?>" :required="selectedJenis == 5" class="w-full px-4 py-2 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase mb-1">NIK Pasangan (16 Digit) *</label>
                            <input type="text" name="nik_pasangan" maxlength="16" value="<?php echo e(old('nik_pasangan')); ?>" :required="selectedJenis == 5" class="w-full px-4 py-2 rounded-xl border border-slate-300 text-sm font-mono focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Tempat Lahir Pasangan *</label>
                            <input type="text" name="tempat_lahir_pasangan" value="<?php echo e(old('tempat_lahir_pasangan')); ?>" :required="selectedJenis == 5" class="w-full px-4 py-2 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Tanggal Lahir Pasangan *</label>
                            <input type="date" name="tanggal_lahir_pasangan" value="<?php echo e(old('tanggal_lahir_pasangan')); ?>" :required="selectedJenis == 5" class="w-full px-4 py-2 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                        </div>
                    </div>
                </div>

                <div class="space-y-4 pt-2">
                    <h4 class="text-xs font-bold uppercase tracking-wider text-emerald-800 bg-emerald-50 p-2.5 rounded-xl">
                        B. Data Orang Tua Kedua Belah Mempelai
                    </h4>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Nama Ayah Mempelai Pria *</label>
                            <input type="text" name="nama_ayah_pria" value="<?php echo e(old('nama_ayah_pria')); ?>" :required="selectedJenis == 5" class="w-full px-4 py-2 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Nama Ibu Mempelai Pria *</label>
                            <input type="text" name="nama_ibu_pria" value="<?php echo e(old('nama_ibu_pria')); ?>" :required="selectedJenis == 5" class="w-full px-4 py-2 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Nama Ayah Mempelai Wanita *</label>
                            <input type="text" name="nama_ayah_wanita" value="<?php echo e(old('nama_ayah_wanita')); ?>" :required="selectedJenis == 5" class="w-full px-4 py-2 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Nama Ibu Mempelai Wanita *</label>
                            <input type="text" name="nama_ibu_wanita" value="<?php echo e(old('nama_ibu_wanita')); ?>" :required="selectedJenis == 5" class="w-full px-4 py-2 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Data Khusus Kematian Manual (id_jenis = 2) -->
            <div x-show="selectedJenis == 2" x-cloak class="p-6 sm:p-8 rounded-3xl bg-white border border-teal-300 shadow-sm space-y-6">
                <div class="flex items-center gap-3 pb-4 border-b border-teal-100">
                    <span class="w-8 h-8 rounded-xl bg-teal-700 text-white flex items-center justify-center font-bold text-sm">
                        <i class="fa-solid fa-ribbon text-xs"></i>
                    </span>
                    <div>
                        <h3 class="text-base font-bold text-slate-900">Data Khusus Surat Kematian</h3>
                        <p class="text-xs text-slate-500">Identitas almarhum/almarhumah yang dilaporkan</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Nama Lengkap Almarhum/ah *</label>
                        <input type="text" name="nama_almarhum" value="<?php echo e(old('nama_almarhum')); ?>" :required="selectedJenis == 2" class="w-full px-4 py-2 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">NIK Almarhum/ah (16 Digit) *</label>
                        <input type="text" name="nik_almarhum" maxlength="16" value="<?php echo e(old('nik_almarhum')); ?>" :required="selectedJenis == 2" class="w-full px-4 py-2 rounded-xl border border-slate-300 text-sm font-mono focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Tanggal Meninggal *</label>
                        <input type="date" name="tanggal_kematian" value="<?php echo e(old('tanggal_kematian')); ?>" :required="selectedJenis == 2" class="w-full px-4 py-2 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Tempat Meninggal *</label>
                        <input type="text" name="tempat_kematian" value="<?php echo e(old('tempat_kematian')); ?>" :required="selectedJenis == 2" placeholder="Contoh: RSUD Ulin / Rumah Duka" class="w-full px-4 py-2 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Penyebab Kematian *</label>
                        <input type="text" name="penyebab_kematian" value="<?php echo e(old('penyebab_kematian')); ?>" :required="selectedJenis == 2" placeholder="Contoh: Sakit Wajar / Usia Lanjut" class="w-full px-4 py-2 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>
                </div>
            </div>

            <!-- Card 4: Upload Dokumen Persyaratan -->
            <div class="p-6 sm:p-8 rounded-3xl bg-white border border-slate-200 shadow-sm space-y-6">
                <div class="flex items-center justify-between pb-4 border-b border-slate-100">
                    <div class="flex items-center gap-3">
                        <span class="w-8 h-8 rounded-xl bg-emerald-600 text-white flex items-center justify-center font-bold text-sm">3</span>
                        <div>
                            <h3 class="text-base font-bold text-slate-900">Unggah Berkas Dokumen Persyaratan</h3>
                            <p class="text-xs text-slate-500">Format yang diterima: JPG, PNG, atau PDF (Maks. 3MB per berkas)</p>
                        </div>
                    </div>
                </div>

                <!-- Bagian A: Syarat Utama (Semua Surat) -->
                <div class="space-y-4">
                    <div class="p-4 rounded-2xl bg-emerald-50 border border-emerald-200">
                        <span class="text-xs font-extrabold uppercase text-emerald-900 flex items-center gap-1.5">
                            <i class="fa-solid fa-star text-amber-500"></i>
                            Persyaratan Utama (Wajib untuk Semua Jenis Surat):
                        </span>
                        <p class="text-xs text-emerald-800 mt-0.5">Surat Pengantar RT, Fotocopy Kartu Keluarga, dan Fotocopy KTP.</p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        
                        <!-- 1. Pengantar RT (Utama) -->
                        <div class="p-4 rounded-2xl border-2 border-emerald-500 bg-emerald-50/30 space-y-2">
                            <label class="block text-xs font-extrabold text-emerald-900 uppercase">
                                1. Surat Pengantar RT (Utama) *
                            </label>
                            <input type="file" 
                                   name="doc_pengantar_rt" 
                                   required 
                                   accept=".pdf,.jpg,.jpeg,.png"
                                   class="w-full text-xs text-slate-600 file:mr-2 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-emerald-600 file:text-white hover:file:bg-emerald-700">
                            <span class="block text-[11px] text-emerald-700">Foto/Scan Asli cap RT</span>
                        </div>

                        <!-- 2. KTP Pemohon -->
                        <div class="p-4 rounded-2xl border border-slate-200 bg-slate-50 space-y-2">
                            <label class="block text-xs font-bold text-slate-700 uppercase">
                                2. Fotocopy KTP Pemohon *
                            </label>
                            <input type="file" 
                                   name="doc_ktp" 
                                   required 
                                   accept=".pdf,.jpg,.jpeg,.png"
                                   class="w-full text-xs text-slate-600 file:mr-2 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-slate-700 file:text-white hover:file:bg-slate-800">
                            <span class="block text-[11px] text-slate-400">Scan/Foto KTP jelas</span>
                        </div>

                        <!-- 3. KK Pemohon -->
                        <div class="p-4 rounded-2xl border border-slate-200 bg-slate-50 space-y-2">
                            <label class="block text-xs font-bold text-slate-700 uppercase">
                                3. Fotocopy Kartu Keluarga *
                            </label>
                            <input type="file" 
                                   name="doc_kk" 
                                   required 
                                   accept=".pdf,.jpg,.jpeg,.png"
                                   class="w-full text-xs text-slate-600 file:mr-2 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-slate-700 file:text-white hover:file:bg-slate-800">
                            <span class="block text-[11px] text-slate-400">Scan/Foto KK seluruh lembar</span>
                        </div>

                    </div>
                </div>

                <!-- Bagian B: Persyaratan Tambahan Khusus Pengantar Nikah (id_jenis = 5) -->
                <div x-show="selectedJenis == 5" x-cloak class="space-y-4 pt-4 border-t border-slate-200">
                    <div class="p-4 rounded-2xl bg-teal-50 border border-teal-200">
                        <span class="text-xs font-extrabold uppercase text-teal-900 flex items-center gap-1.5">
                            <i class="fa-solid fa-rings-wedding text-teal-700"></i>
                            Persyaratan Berkas Tambahan Calon Pengantin (Kedua Mempelai):
                        </span>
                        <p class="text-xs text-teal-800 mt-0.5">Sesuai ketentuan, harus menyertakan KTP orang tua, KK kedua mempelai, ijazah, akta kelahiran, foto gandeng, foto masing-masing, dan materai 10.000.</p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        
                        <!-- 4. KTP Ortu Kedua Mempelai -->
                        <div class="p-4 rounded-2xl border border-teal-200 bg-teal-50/40 space-y-2">
                            <label class="block text-xs font-bold text-teal-950 uppercase">
                                4. KTP Ortu Kedua Mempelai *
                            </label>
                            <input type="file" 
                                   name="doc_ktp_ortu" 
                                   :required="selectedJenis == 5" 
                                   accept=".pdf,.jpg,.jpeg,.png"
                                   class="w-full text-xs text-slate-600 file:mr-2 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-teal-700 file:text-white hover:file:bg-teal-800">
                            <span class="block text-[11px] text-slate-500">Scan/Foto KTP Ayah & Ibu kedua pihak</span>
                        </div>

                        <!-- 5. KK Kedua Mempelai -->
                        <div class="p-4 rounded-2xl border border-teal-200 bg-teal-50/40 space-y-2">
                            <label class="block text-xs font-bold text-teal-950 uppercase">
                                5. KK Kedua Mempelai *
                            </label>
                            <input type="file" 
                                   name="doc_kk_kedua_mempelai" 
                                   :required="selectedJenis == 5" 
                                   accept=".pdf,.jpg,.jpeg,.png"
                                   class="w-full text-xs text-slate-600 file:mr-2 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-teal-700 file:text-white hover:file:bg-teal-800">
                            <span class="block text-[11px] text-slate-500">FC Kartu Keluarga calon suami & istri</span>
                        </div>

                        <!-- 6. Ijazah Kedua Mempelai -->
                        <div class="p-4 rounded-2xl border border-teal-200 bg-teal-50/40 space-y-2">
                            <label class="block text-xs font-bold text-teal-950 uppercase">
                                6. FC Ijazah Terakhir *
                            </label>
                            <input type="file" 
                                   name="doc_ijazah" 
                                   :required="selectedJenis == 5" 
                                   accept=".pdf,.jpg,.jpeg,.png"
                                   class="w-full text-xs text-slate-600 file:mr-2 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-teal-700 file:text-white hover:file:bg-teal-800">
                            <span class="block text-[11px] text-slate-500">Ijazah terakhir kedua mempelai</span>
                        </div>

                        <!-- 7. Akta Kelahiran Kedua Mempelai -->
                        <div class="p-4 rounded-2xl border border-teal-200 bg-teal-50/40 space-y-2">
                            <label class="block text-xs font-bold text-teal-950 uppercase">
                                7. FC Akta Kelahiran *
                            </label>
                            <input type="file" 
                                   name="doc_akta_kelahiran" 
                                   :required="selectedJenis == 5" 
                                   accept=".pdf,.jpg,.jpeg,.png"
                                   class="w-full text-xs text-slate-600 file:mr-2 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-teal-700 file:text-white hover:file:bg-teal-800">
                            <span class="block text-[11px] text-slate-500">Akta kelahiran kedua calon mempelai</span>
                        </div>

                        <!-- 8. Pas Foto Gandeng Berdua -->
                        <div class="p-4 rounded-2xl border border-teal-200 bg-teal-50/40 space-y-2">
                            <label class="block text-xs font-bold text-teal-950 uppercase">
                                8. Pas Foto Gandeng Berdua *
                            </label>
                            <input type="file" 
                                   name="doc_foto_gandeng" 
                                   :required="selectedJenis == 5" 
                                   accept="image/*"
                                   class="w-full text-xs text-slate-600 file:mr-2 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-teal-700 file:text-white hover:file:bg-teal-800">
                            <span class="block text-[11px] text-slate-500">Ukuran 4x6 berdampingan (Background biru)</span>
                        </div>

                        <!-- 9. Pas Foto Masing-masing -->
                        <div class="p-4 rounded-2xl border border-teal-200 bg-teal-50/40 space-y-2">
                            <label class="block text-xs font-bold text-teal-950 uppercase">
                                9. Foto Masing-Masing (1 Lbr) *
                            </label>
                            <input type="file" 
                                   name="doc_foto_masing_masing" 
                                   :required="selectedJenis == 5" 
                                   accept="image/*"
                                   class="w-full text-xs text-slate-600 file:mr-2 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-teal-700 file:text-white hover:file:bg-teal-800">
                            <span class="block text-[11px] text-slate-500">Pas foto pria 1 lbr & wanita 1 lbr</span>
                        </div>

                        <!-- 10. Materai 10.000 -->
                        <div class="p-4 rounded-2xl border border-teal-200 bg-teal-50/40 space-y-2 sm:col-span-2 lg:col-span-3">
                            <label class="block text-xs font-bold text-teal-950 uppercase">
                                10. Pernyataan / Berkas Bermaterai Rp 10.000 *
                            </label>
                            <input type="file" 
                                   name="doc_materai" 
                                   :required="selectedJenis == 5" 
                                   accept=".pdf,.jpg,.jpeg,.png"
                                   class="w-full text-xs text-slate-600 file:mr-2 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-teal-700 file:text-white hover:file:bg-teal-800">
                            <span class="block text-[11px] text-slate-500">Scan/Foto lembar persetujuan pernikahan yang telah ditempel materai Rp 10.000</span>
                        </div>

                    </div>
                </div>

                <!-- Dokumen Tambahan Lain (Opsional) -->
                <div class="pt-2">
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">
                        Dokumen Pendukung Tambahan (Opsional)
                    </label>
                    <input type="file" name="doc_tambahan" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-slate-100 file:text-slate-700 hover:file:bg-slate-200">
                    <span class="text-[11px] text-slate-400">Contoh: Surat keterangan dokter, foto rumah untuk SKTM, dll.</span>
                </div>
            </div>

            <!-- Card 5: Pernyataan & Tombol Kirim -->
            <div class="p-6 sm:p-8 rounded-3xl bg-slate-900 text-white shadow-xl space-y-6">
                <div class="flex items-start gap-3">
                    <input type="checkbox" id="setuju" required class="mt-1 w-4 h-4 rounded text-emerald-600 focus:ring-emerald-500 border-slate-700 bg-slate-800">
                    <label for="setuju" class="text-xs sm:text-sm text-slate-300 leading-relaxed cursor-pointer select-none">
                        Saya menyatakan dengan sesungguhnya bahwa seluruh data dan dokumen yang saya unggah adalah <strong>benar, sah, dan sesuai aslinya</strong>. Apabila di kemudian hari ditemukan pemalsuan, saya bersedia dituntut sesuai peraturan perundang-undangan yang berlaku.
                    </label>
                </div>

                <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-4 border-t border-slate-800">
                    <a href="<?php echo e(route('layanan.index')); ?>" class="text-xs font-bold text-slate-400 hover:text-white transition">
                        <i class="fa-solid fa-arrow-left mr-1"></i> Batal / Kembali ke Katalog
                    </a>
                    
                    <button type="submit" 
                            :disabled="isSubmitting"
                            class="w-full sm:w-auto px-8 py-3.5 rounded-2xl bg-gradient-to-r from-emerald-500 to-teal-400 text-slate-950 font-extrabold text-sm hover:from-emerald-400 hover:to-teal-300 transition shadow-lg shadow-emerald-500/20 flex items-center justify-center gap-2">
                        <span x-show="!isSubmitting">Kirim Permohonan Surat Sekarang</span>
                        <span x-show="isSubmitting" x-cloak>
                            <i class="fa-solid fa-spinner fa-spin mr-2"></i> Mengunggah Berkas...
                        </span>
                        <i class="fa-solid fa-paper-plane text-xs" x-show="!isSubmitting"></i>
                    </button>
                </div>
            </div>

        </form>

    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
function suratForm(config) {
    return {
        selectedJenis: config.selectedJenis || 1,
        isCheckingNik: false,
        nikFoundMsg: '',
        isSubmitting: false,
        formData: {
            nik: '<?php echo e(old('nik')); ?>',
            no_kk: '<?php echo e(old('no_kk')); ?>',
            nama_lengkap: '<?php echo e(old('nama_pemohon')); ?>',
            tempat_lahir: '<?php echo e(old('tempat_lahir')); ?>',
            tanggal_lahir: '<?php echo e(old('tanggal_lahir')); ?>',
            jenis_kelamin: '<?php echo e(old('jenis_kelamin')); ?>',
            agama: '<?php echo e(old('agama')); ?>',
            pekerjaan: '<?php echo e(old('pekerjaan')); ?>',
            alamat: '<?php echo e(old('alamat')); ?>',
            rt: '<?php echo e(old('rt')); ?>',
            rw: '<?php echo e(old('rw')); ?>'
        },
        async checkNik() {
            if (!this.formData.nik || this.formData.nik.length < 16) {
                alert('Silakan masukkan 16 digit NIK terlebih dahulu.');
                return;
            }

            this.isCheckingNik = true;
            this.nikFoundMsg = '';

            try {
                const response = await fetch(`<?php echo e(route('layanan.cek-nik')); ?>?nik=${this.formData.nik}`);
                const res = await response.json();

                if (res.found && res.data) {
                    this.formData.no_kk = res.data.no_kk || this.formData.no_kk;
                    this.formData.nama_lengkap = res.data.nama_lengkap || this.formData.nama_lengkap;
                    this.formData.tempat_lahir = res.data.tempat_lahir || this.formData.tempat_lahir;
                    this.formData.tanggal_lahir = res.data.tanggal_lahir || this.formData.tanggal_lahir;
                    this.formData.jenis_kelamin = res.data.jenis_kelamin || this.formData.jenis_kelamin;
                    this.formData.agama = res.data.agama || this.formData.agama;
                    this.formData.pekerjaan = res.data.pekerjaan || this.formData.pekerjaan;
                    this.formData.alamat = res.data.alamat || this.formData.alamat;
                    this.formData.rt = res.data.rt || this.formData.rt;
                    this.formData.rw = res.data.rw || this.formData.rw;

                    this.nikFoundMsg = `Data kependudukan ditemukan atas nama "${res.data.nama_lengkap}". Isian telah terisi otomatis.`;
                } else {
                    alert('NIK belum terdaftar di database kependudukan kelurahan. Anda dapat melanjutkan dengan mengisi data secara manual.');
                }
            } catch (err) {
                console.error(err);
                alert('Terjadi kendala saat memeriksa NIK. Silakan isi form secara manual.');
            } finally {
                this.isCheckingNik = false;
            }
        }
    }
}
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Recapitulasi\resources\views/layanan/form.blade.php ENDPATH**/ ?>