@extends('layouts.app')

@section('title', 'Data Statistik Penduduk - Kelurahan Sungai Andai')

@section('content')
<section class="bg-gradient-to-b from-emerald-900 to-teal-900 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-3">
        <span class="inline-block px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-bold uppercase tracking-wider border border-emerald-400/30">
            Keterbukaan Data Publik
        </span>
        <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight">Data Statistik Kependudukan</h1>
        <p class="text-slate-300 text-sm sm:text-base max-w-2xl mx-auto">
            Visualisasi demografi, perbandingan jenis kelamin, status perkawinan, dan keragaman warga Kelurahan Sungai Andai.
        </p>
    </div>
</section>

<section class="py-16 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Summary Cards -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-12">
            <div class="p-6 rounded-3xl bg-white border border-slate-200 shadow-sm text-center">
                <span class="text-xs font-semibold text-slate-500 uppercase">Total Jiwa Terdata</span>
                <p class="text-3xl font-extrabold text-emerald-700 mt-2">{{ number_format($totalPenduduk, 0, ',', '.') }}</p>
                <p class="text-[11px] text-slate-400 mt-1">Penduduk Terdaftar</p>
            </div>

            <div class="p-6 rounded-3xl bg-white border border-slate-200 shadow-sm text-center">
                <span class="text-xs font-semibold text-slate-500 uppercase">Jumlah Rukun Tetangga</span>
                <p class="text-3xl font-extrabold text-teal-700 mt-2">62 RT</p>
                <p class="text-[11px] text-slate-400 mt-1">Tersebar di Kompleks</p>
            </div>

            <div class="p-6 rounded-3xl bg-white border border-slate-200 shadow-sm text-center">
                <span class="text-xs font-semibold text-slate-500 uppercase">Jumlah Rukun Warga</span>
                <p class="text-3xl font-extrabold text-cyan-700 mt-2">4 RW</p>
                <p class="text-[11px] text-slate-400 mt-1">Wilayah Administrasi</p>
            </div>

            <div class="p-6 rounded-3xl bg-white border border-slate-200 shadow-sm text-center">
                <span class="text-xs font-semibold text-slate-500 uppercase">Layanan Tersedia</span>
                <p class="text-3xl font-extrabold text-amber-700 mt-2">5 Surat</p>
                <p class="text-[11px] text-slate-400 mt-1">Layanan Kependudukan</p>
            </div>
        </div>

        <!-- Charts Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            
            <!-- Gender Chart -->
            <div class="p-7 rounded-3xl bg-white border border-slate-200 shadow-sm space-y-4">
                <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                    <div>
                        <h4 class="text-base font-bold text-slate-900">Perbandingan Jenis Kelamin</h4>
                        <p class="text-xs text-slate-500">Distribusi laki-laki dan perempuan</p>
                    </div>
                    <i class="fa-solid fa-venus-mars text-emerald-600 text-xl"></i>
                </div>
                <div class="h-64 flex items-center justify-center">
                    <canvas id="genderChart"></canvas>
                </div>
            </div>

            <!-- Agama Chart -->
            <div class="p-7 rounded-3xl bg-white border border-slate-200 shadow-sm space-y-4">
                <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                    <div>
                        <h4 class="text-base font-bold text-slate-900">Komposisi Agama</h4>
                        <p class="text-xs text-slate-500">Keragaman pemeluk agama warga</p>
                    </div>
                    <i class="fa-solid fa-hands-praying text-teal-600 text-xl"></i>
                </div>
                <div class="h-64 flex items-center justify-center">
                    <canvas id="agamaChart"></canvas>
                </div>
            </div>

            <!-- Status Perkawinan Chart -->
            <div class="p-7 rounded-3xl bg-white border border-slate-200 shadow-sm space-y-4 lg:col-span-2">
                <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                    <div>
                        <h4 class="text-base font-bold text-slate-900">Status Perkawinan Penduduk</h4>
                        <p class="text-xs text-slate-500">Kategori belum kawin, kawin, dan cerai</p>
                    </div>
                    <i class="fa-solid fa-rings-wedding text-cyan-600 text-xl"></i>
                </div>
                <div class="h-64 flex items-center justify-center">
                    <canvas id="perkawinanChart"></canvas>
                </div>
            </div>

        </div>

    </div>
</section>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Gender Chart
    const ctxGender = document.getElementById('genderChart');
    if (ctxGender) {
        new Chart(ctxGender, {
            type: 'doughnut',
            data: {
                labels: ['Laki-laki', 'Perempuan'],
                datasets: [{
                    data: [15210, 14630],
                    backgroundColor: ['#059669', '#06b6d4'],
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { position: 'bottom' }
                }
            }
        });
    }

    // Agama Chart
    const ctxAgama = document.getElementById('agamaChart');
    if (ctxAgama) {
        new Chart(ctxAgama, {
            type: 'bar',
            data: {
                labels: ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha'],
                datasets: [{
                    label: 'Jumlah Jiwa',
                    data: [28400, 850, 390, 120, 80],
                    backgroundColor: '#10b981',
                    borderRadius: 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    }

    // Status Perkawinan Chart
    const ctxPerkawinan = document.getElementById('perkawinanChart');
    if (ctxPerkawinan) {
        new Chart(ctxPerkawinan, {
            type: 'pie',
            data: {
                labels: ['Kawin', 'Belum Kawin', 'Cerai Hidup', 'Cerai Mati'],
                datasets: [{
                    data: [17800, 10200, 1140, 700],
                    backgroundColor: ['#047857', '#0284c7', '#f59e0b', '#64748b'],
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { position: 'bottom' }
                }
            }
        });
    }
});
</script>
@endsection

