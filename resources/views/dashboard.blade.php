@extends('layouts.app')

@section('title', 'Sistem Pencatatan & Penimbangan Sampah Realtime')

@section('breadcrumb')
    <span id="bc-rw" class="px-2.5 py-1 bg-emerald-700 font-semibold text-white rounded transition-all cursor-pointer" onclick="navigateToStep(1)">Pilih RW</span>
    <i class="fa-solid fa-chevron-right text-xs opacity-70"></i>
    <span id="bc-rt" class="px-2.5 py-1 rounded transition-all opacity-60 cursor-pointer" onclick="navigateToStep(2)">Pilih RT</span>
    <i class="fa-solid fa-chevron-right text-xs opacity-70"></i>
    <span id="bc-crud" class="px-2.5 py-1 rounded transition-all opacity-60 cursor-pointer" onclick="navigateToStep(3)">Data Penimbangan</span>
@endsection

@section('content')
    <!-- MOBILE STEPPER / NAVIGATOR (Visible on mobile/tablet screens < lg) -->
    <div class="lg:hidden bg-white p-2.5 sm:p-3 rounded-2xl shadow-sm border border-slate-200 mb-6 flex items-center justify-between text-xs gap-1 sm:gap-2">
        <button id="mob-bc-rw" onclick="navigateToStep(1)" class="flex-1 py-2 px-1.5 text-center rounded-xl font-bold bg-emerald-700 text-white transition-all shadow-sm">
            <span class="block text-[9px] sm:text-[10px] uppercase tracking-wider opacity-80">Langkah 1</span>
            <span class="text-xs sm:text-sm">Pilih RW</span>
        </button>
        <i class="fa-solid fa-chevron-right text-slate-300 text-[10px]"></i>
        <button id="mob-bc-rt" onclick="navigateToStep(2)" class="flex-1 py-2 px-1.5 text-center rounded-xl font-medium text-slate-600 hover:bg-slate-100 transition-all">
            <span class="block text-[9px] sm:text-[10px] uppercase tracking-wider opacity-80">Langkah 2</span>
            <span class="text-xs sm:text-sm">Pilih RT</span>
        </button>
        <i class="fa-solid fa-chevron-right text-slate-300 text-[10px]"></i>
        <button id="mob-bc-crud" onclick="navigateToStep(3)" class="flex-1 py-2 px-1.5 text-center rounded-xl font-medium text-slate-600 hover:bg-slate-100 transition-all">
            <span class="block text-[9px] sm:text-[10px] uppercase tracking-wider opacity-80">Langkah 3</span>
            <span class="text-xs sm:text-sm">Data Sampah</span>
        </button>
    </div>

    <!-- ==================== HALAMAN 1: PILIH RW ==================== -->
    <section id="step-1" class="transition-all duration-300">
        <div class="text-center max-w-2xl mx-auto mb-6 sm:mb-8 px-2">
            <span class="bg-emerald-100 text-emerald-800 text-xs font-semibold px-3 py-1 rounded-full uppercase tracking-wider">Langkah 1 dari 3</span>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-800 mt-3 mb-2">Pilih Wilayah RW</h2>
            <p class="text-xs sm:text-sm text-slate-600">Pilih Rukun Warga (RW) lokasi penimbangan sampah warga. Data disimpan aman dan disinkronkan secara realtime.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 max-w-5xl mx-auto">
            <!-- RW 16 CARD -->
            <button onclick="selectRW('RW 16')" class="group bg-white p-5 sm:p-6 rounded-2xl shadow-sm hover:shadow-xl border border-slate-200/80 hover:border-emerald-500 transition-all duration-300 text-left flex flex-col justify-between transform hover:-translate-y-1 active:scale-[0.98]">
                <div class="flex items-center justify-between mb-3 sm:mb-4">
                    <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold text-lg sm:text-xl group-hover:bg-emerald-600 group-hover:text-white transition-colors">
                        16
                    </div>
                    <span class="text-xs font-medium text-slate-400 bg-slate-100 px-2.5 py-1 rounded-full">5 RT</span>
                </div>
                <div>
                    <h3 class="text-lg sm:text-xl font-bold text-slate-800 group-hover:text-emerald-600 transition-colors">RW 16</h3>
                    <p class="text-xs sm:text-sm text-slate-500 mt-1">Wilayah Pemukiman Utara</p>
                </div>
                <div class="mt-4 sm:mt-6 flex items-center text-xs sm:text-sm font-semibold text-emerald-600 group-hover:translate-x-1 transition-transform">
                    <span>Pilih Wilayah</span>
                    <i class="fa-solid fa-arrow-right ml-2 text-xs"></i>
                </div>
            </button>

            <!-- RW 17 CARD -->
            <button onclick="selectRW('RW 17')" class="group bg-white p-5 sm:p-6 rounded-2xl shadow-sm hover:shadow-xl border border-slate-200/80 hover:border-emerald-500 transition-all duration-300 text-left flex flex-col justify-between transform hover:-translate-y-1 active:scale-[0.98]">
                <div class="flex items-center justify-between mb-3 sm:mb-4">
                    <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold text-lg sm:text-xl group-hover:bg-emerald-600 group-hover:text-white transition-colors">
                        17
                    </div>
                    <span class="text-xs font-medium text-slate-400 bg-slate-100 px-2.5 py-1 rounded-full">5 RT</span>
                </div>
                <div>
                    <h3 class="text-lg sm:text-xl font-bold text-slate-800 group-hover:text-emerald-600 transition-colors">RW 17</h3>
                    <p class="text-xs sm:text-sm text-slate-500 mt-1">Wilayah Pemukiman Timur</p>
                </div>
                <div class="mt-4 sm:mt-6 flex items-center text-xs sm:text-sm font-semibold text-emerald-600 group-hover:translate-x-1 transition-transform">
                    <span>Pilih Wilayah</span>
                    <i class="fa-solid fa-arrow-right ml-2 text-xs"></i>
                </div>
            </button>

            <!-- RW 18 CARD -->
            <button onclick="selectRW('RW 18')" class="group bg-white p-5 sm:p-6 rounded-2xl shadow-sm hover:shadow-xl border border-slate-200/80 hover:border-emerald-500 transition-all duration-300 text-left flex flex-col justify-between transform hover:-translate-y-1 active:scale-[0.98]">
                <div class="flex items-center justify-between mb-3 sm:mb-4">
                    <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold text-lg sm:text-xl group-hover:bg-emerald-600 group-hover:text-white transition-colors">
                        18
                    </div>
                    <span class="text-xs font-medium text-slate-400 bg-slate-100 px-2.5 py-1 rounded-full">5 RT</span>
                </div>
                <div>
                    <h3 class="text-lg sm:text-xl font-bold text-slate-800 group-hover:text-emerald-600 transition-colors">RW 18</h3>
                    <p class="text-xs sm:text-sm text-slate-500 mt-1">Wilayah Pemukiman Selatan</p>
                </div>
                <div class="mt-4 sm:mt-6 flex items-center text-xs sm:text-sm font-semibold text-emerald-600 group-hover:translate-x-1 transition-transform">
                    <span>Pilih Wilayah</span>
                    <i class="fa-solid fa-arrow-right ml-2 text-xs"></i>
                </div>
            </button>

            <!-- RW 19 CARD -->
            <button onclick="selectRW('RW 19')" class="group bg-white p-5 sm:p-6 rounded-2xl shadow-sm hover:shadow-xl border border-slate-200/80 hover:border-emerald-500 transition-all duration-300 text-left flex flex-col justify-between transform hover:-translate-y-1 active:scale-[0.98]">
                <div class="flex items-center justify-between mb-3 sm:mb-4">
                    <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold text-lg sm:text-xl group-hover:bg-emerald-600 group-hover:text-white transition-colors">
                        19
                    </div>
                    <span class="text-xs font-medium text-slate-400 bg-slate-100 px-2.5 py-1 rounded-full">5 RT</span>
                </div>
                <div>
                    <h3 class="text-lg sm:text-xl font-bold text-slate-800 group-hover:text-emerald-600 transition-colors">RW 19</h3>
                    <p class="text-xs sm:text-sm text-slate-500 mt-1">Wilayah Pemukiman Barat</p>
                </div>
                <div class="mt-4 sm:mt-6 flex items-center text-xs sm:text-sm font-semibold text-emerald-600 group-hover:translate-x-1 transition-transform">
                    <span>Pilih Wilayah</span>
                    <i class="fa-solid fa-arrow-right ml-2 text-xs"></i>
                </div>
            </button>
        </div>
    </section>

    <!-- ==================== HALAMAN 2: PILIH RT ==================== -->
    <section id="step-2" class="hidden transition-all duration-300">
        <!-- Navigasi Kembali & Header -->
        <div class="mb-6 sm:mb-8 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 border-b border-slate-200 pb-4 sm:pb-5">
            <div>
                <button onclick="navigateToStep(1)" class="inline-flex items-center text-xs sm:text-sm font-medium text-slate-500 hover:text-emerald-600 mb-1.5 transition-colors">
                    <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Pilih RW
                </button>
                <h2 class="text-xl sm:text-2xl font-bold text-slate-800 flex items-center gap-2">
                    <span>Pilih Rukun Tetangga (RT)</span>
                    <span id="selected-rw-badge" class="bg-emerald-100 text-emerald-800 text-xs px-2.5 py-0.5 rounded-full font-semibold">RW 16</span>
                </h2>
            </div>
            <span class="bg-emerald-100 text-emerald-800 text-xs font-semibold px-3 py-1 rounded-full uppercase tracking-wider self-start sm:self-center">Langkah 2 dari 3</span>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-3 sm:gap-5">
            @foreach(['RT 01', 'RT 02', 'RT 03', 'RT 04', 'RT 05'] as $rtIndex => $rtName)
                <button onclick="selectRT('{{ $rtName }}')" class="group bg-white p-4 sm:p-5 rounded-xl shadow-sm hover:shadow-md border border-slate-200 hover:border-emerald-500 transition-all text-center flex flex-col items-center active:scale-[0.98]">
                    <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center font-bold text-base sm:text-lg mb-2 sm:mb-3 group-hover:bg-emerald-600 group-hover:text-white transition-colors">
                        0{{ $rtIndex + 1 }}
                    </div>
                    <h3 class="font-bold text-slate-800 group-hover:text-emerald-600 text-sm sm:text-base">{{ $rtName }}</h3>
                    <p class="text-[11px] sm:text-xs text-slate-500 mt-0.5">Kelola data sampah</p>
                </button>
            @endforeach
        </div>
    </section>

    <!-- ==================== HALAMAN 3: CRUD DATA PENIMBANGAN ==================== -->
    <section id="step-3" class="hidden transition-all duration-300">
        <!-- Navigation Back & Context Title -->
        <div class="mb-6 flex flex-col lg:flex-row lg:items-center justify-between gap-4 bg-white p-4 sm:p-6 rounded-2xl shadow-sm border border-slate-200">
            <div>
                <button onclick="navigateToStep(2)" class="inline-flex items-center text-xs font-semibold text-emerald-600 hover:text-emerald-700 uppercase tracking-wider mb-2">
                    <i class="fa-solid fa-arrow-left mr-1.5"></i> Ubah Pilihan RT / RW
                </button>
                <div class="flex flex-wrap items-center gap-2 sm:gap-3">
                    <h2 class="text-xl sm:text-2xl font-bold text-slate-800">Pencatatan Penimbangan</h2>
                    <span id="active-location-badge" class="bg-emerald-600 text-white text-xs px-2.5 py-0.5 rounded-full font-semibold shadow-sm">
                        RW 16 / RT 01
                    </span>
                </div>
                <!-- Context Alamat Wilayah -->
                <p id="active-location-address" class="text-xs text-slate-500 mt-1 flex items-center gap-1.5 flex-wrap">
                    <i class="fa-solid fa-location-dot text-emerald-600"></i>
                    <span>Kp. Sukamaju, Desa Sukamaju, Kec. Cilaku, Kab. Cianjur</span>
                </p>
            </div>

            <!-- Action Buttons: Responsive full width on small screens -->
            <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-2 sm:gap-3 w-full lg:w-auto">
                <button onclick="exportToCSV()" class="w-full sm:w-auto bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs sm:text-sm font-medium px-4 py-2.5 rounded-xl border border-slate-300 shadow-sm transition-all flex items-center justify-center gap-2 active:bg-slate-300">
                    <i class="fa-solid fa-file-csv text-emerald-600 text-base"></i>
                    <span>Ekspor CSV</span>
                </button>
                <button onclick="openFormModal()" class="w-full sm:w-auto bg-emerald-600 hover:bg-emerald-700 text-white text-xs sm:text-sm font-medium px-4 py-2.5 rounded-xl shadow-sm hover:shadow transition-all flex items-center justify-center gap-2 active:bg-emerald-800">
                    <i class="fa-solid fa-plus text-base"></i>
                    <span>Tambah Data Baru</span>
                </button>
            </div>
        </div>

        <!-- RINGKASAN STATISTIK (SUMMARY CARDS - 2x2 grid on mobile) -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4 mb-6">
            <!-- Card Total Catatan -->
            <div class="bg-white p-3.5 sm:p-4 rounded-xl border border-slate-200 shadow-sm flex flex-col sm:flex-row sm:items-center gap-2.5 sm:gap-4">
                <div class="w-9 h-9 sm:w-12 sm:h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center font-bold text-base sm:text-lg shrink-0">
                    <i class="fa-solid fa-clipboard-list"></i>
                </div>
                <div class="min-w-0">
                    <p class="text-[10px] sm:text-xs font-medium text-slate-500 uppercase tracking-wider truncate">Total Catatan</p>
                    <h4 id="stat-total-records" class="text-lg sm:text-2xl font-bold text-slate-800">0</h4>
                </div>
            </div>

            <!-- Card Total Organik -->
            <div class="bg-white p-3.5 sm:p-4 rounded-xl border border-slate-200 shadow-sm flex flex-col sm:flex-row sm:items-center gap-2.5 sm:gap-4">
                <div class="w-9 h-9 sm:w-12 sm:h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center font-bold text-base sm:text-lg shrink-0">
                    <i class="fa-solid fa-leaf"></i>
                </div>
                <div class="min-w-0">
                    <p class="text-[10px] sm:text-xs font-medium text-slate-500 uppercase tracking-wider truncate">Total Organik</p>
                    <h4 id="stat-total-organik" class="text-lg sm:text-2xl font-bold text-emerald-600 truncate">0.0 kg</h4>
                </div>
            </div>

            <!-- Card Total Non-Organik -->
            <div class="bg-white p-3.5 sm:p-4 rounded-xl border border-slate-200 shadow-sm flex flex-col sm:flex-row sm:items-center gap-2.5 sm:gap-4">
                <div class="w-9 h-9 sm:w-12 sm:h-12 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center font-bold text-base sm:text-lg shrink-0">
                    <i class="fa-solid fa-bottle-water"></i>
                </div>
                <div class="min-w-0">
                    <p class="text-[10px] sm:text-xs font-medium text-slate-500 uppercase tracking-wider truncate">Total Non-Organik</p>
                    <h4 id="stat-total-nonorganik" class="text-lg sm:text-2xl font-bold text-amber-600 truncate">0.0 kg</h4>
                </div>
            </div>

            <!-- Card Total Akumulasi -->
            <div class="bg-white p-3.5 sm:p-4 rounded-xl border border-slate-200 shadow-sm flex flex-col sm:flex-row sm:items-center gap-2.5 sm:gap-4">
                <div class="w-9 h-9 sm:w-12 sm:h-12 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center font-bold text-base sm:text-lg shrink-0">
                    <i class="fa-solid fa-weight-hanging"></i>
                </div>
                <div class="min-w-0">
                    <p class="text-[10px] sm:text-xs font-medium text-slate-500 uppercase tracking-wider truncate">Akumulasi Total</p>
                    <h4 id="stat-total-overall" class="text-lg sm:text-2xl font-bold text-purple-700 truncate">0.0 kg</h4>
                </div>
            </div>
        </div>

        <!-- SEARCH AND FILTER BAR -->
        <div class="bg-white p-3.5 sm:p-4 rounded-xl border border-slate-200 shadow-sm mb-6 flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-3 sm:gap-4">
            <div class="relative w-full sm:w-96">
                <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400"></i>
                <input type="text" id="search-input" oninput="handleSearch()" placeholder="Cari pemilik rumah, kampung, kec, kel, kab..." class="w-full pl-10 pr-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all">
            </div>
            <div class="text-xs text-slate-500 font-medium text-center sm:text-right">
                Menampilkan data live <span id="filter-location-text" class="font-bold text-slate-700">RW 16 / RT 01</span>
            </div>
        </div>

        <!-- DATA CONTAINER: DESKTOP TABLE + MOBILE CARDS -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
            <!-- 1. DESKTOP/TABLET TABLE VIEW (Hidden on Mobile < md) -->
            <div class="hidden md:block overflow-x-auto">
                <table class="w-full text-left border-collapse min-w-[950px]">
                    <thead>
                        <tr class="bg-slate-100/70 border-b border-slate-200 text-xs font-semibold uppercase tracking-wider text-slate-600">
                            <th class="py-3.5 px-4">No</th>
                            <th class="py-3.5 px-4">Nama Pemilik Rumah</th>
                            <th class="py-3.5 px-4">Alamat / Kampung</th>
                            <th class="py-3.5 px-4">Wilayah (RT/RW/Kel/Kec/Kab)</th>
                            <th class="py-3.5 px-4">Tanggal & Waktu</th>
                            <th class="py-3.5 px-4 text-right">Organik (kg)</th>
                            <th class="py-3.5 px-4 text-right">Non-Organik (kg)</th>
                            <th class="py-3.5 px-4 text-right">Total (kg)</th>
                            <th class="py-3.5 px-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="data-table-body" class="divide-y divide-slate-200 text-sm">
                        <!-- Rows rendered via JavaScript -->
                    </tbody>
                </table>
            </div>

            <!-- 2. MOBILE CARD VIEW (Visible only on Mobile < md) -->
            <div id="mobile-cards-body" class="md:hidden divide-y divide-slate-100 p-3 space-y-3">
                <!-- Cards rendered via JavaScript -->
            </div>

            <!-- EMPTY STATE (Shared between views) -->
            <div id="empty-state" class="hidden py-12 px-4 text-center">
                <div class="w-16 h-16 bg-slate-100 text-slate-400 rounded-full flex items-center justify-center mx-auto mb-3 text-2xl">
                    <i class="fa-regular fa-folder-open"></i>
                </div>
                <h3 class="text-base font-semibold text-slate-700">Belum ada data penimbangan</h3>
                <p class="text-xs text-slate-500 mt-1 max-w-sm mx-auto">Silakan tambahkan pencatatan sampah baru menggunakan tombol "Tambah Data Baru" di atas.</p>
            </div>
        </div>
    </section>

    <!-- ==================== MODAL FORM (TAMBAH / EDIT DATA) ==================== -->
    <div id="form-modal" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 flex items-center justify-center p-3 sm:p-4 hidden overflow-y-auto">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl my-auto overflow-hidden transform transition-all flex flex-col max-h-[92vh]">
            <!-- Modal Header -->
            <div class="bg-slate-50 px-4 sm:px-6 py-3.5 sm:py-4 border-b border-slate-200 flex items-center justify-between shrink-0">
                <h3 id="modal-title" class="font-bold text-slate-800 text-base sm:text-lg">Tambah Data Penimbangan</h3>
                <button onclick="closeFormModal()" class="text-slate-400 hover:text-slate-600 p-1.5 rounded-lg transition-colors">
                    <i class="fa-solid fa-xmark text-lg"></i>
                </button>
            </div>

            <!-- Modal Body (Form) -->
            <form id="garbage-form" onsubmit="handleSaveData(event)" class="p-4 sm:p-6 space-y-4 overflow-y-auto flex-grow">
                <input type="hidden" id="entry-id">

                <!-- SECTION 1: PEMILIK & ALAMAT KAMPUNG -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1" for="house-owner">Nama Pemilik Rumah</label>
                        <input type="text" id="house-owner" required placeholder="Contoh: Pak Budi / Ibu Siti" class="w-full px-3.5 py-2.5 sm:py-2 border border-slate-300 rounded-lg text-base sm:text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1" for="kampung-name">Alamat / Nama Kampung</label>
                        <input type="text" id="kampung-name" required placeholder="Contoh: Kp. Sukamaju No. 12" class="w-full px-3.5 py-2.5 sm:py-2 border border-slate-300 rounded-lg text-base sm:text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                    </div>
                </div>

                <!-- SECTION 2: DETAIL WILAYAH (RT, RW, KELURAHAN, KECAMATAN, KABUPATEN) -->
                <div class="bg-slate-50 p-3 sm:p-4 rounded-xl border border-slate-200 space-y-3">
                    <p class="text-xs font-bold text-slate-600 uppercase tracking-wider flex items-center gap-1.5">
                        <i class="fa-solid fa-map-location-dot text-emerald-600"></i> Detail Wilayah Administrasi
                    </p>
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-2.5 sm:gap-3">
                        <div>
                            <label class="block text-[11px] font-semibold text-slate-600 uppercase mb-1" for="rt-field">RT</label>
                            <input type="text" id="rt-field" required placeholder="Contoh: RT 01" class="w-full px-3 py-2 sm:py-1.5 border border-slate-300 rounded-lg text-base sm:text-sm focus:ring-2 focus:ring-emerald-500 bg-white">
                        </div>
                        <div>
                            <label class="block text-[11px] font-semibold text-slate-600 uppercase mb-1" for="rw-field">RW</label>
                            <input type="text" id="rw-field" required placeholder="Contoh: RW 16" class="w-full px-3 py-2 sm:py-1.5 border border-slate-300 rounded-lg text-base sm:text-sm focus:ring-2 focus:ring-emerald-500 bg-white">
                        </div>
                        <div>
                            <label class="block text-[11px] font-semibold text-slate-600 uppercase mb-1" for="kelurahan-field">Kelurahan / Desa</label>
                            <input type="text" id="kelurahan-field" required placeholder="Desa Sukamaju" class="w-full px-3 py-2 sm:py-1.5 border border-slate-300 rounded-lg text-base sm:text-sm focus:ring-2 focus:ring-emerald-500 bg-white">
                        </div>
                        <div>
                            <label class="block text-[11px] font-semibold text-slate-600 uppercase mb-1" for="kecamatan-field">Kecamatan</label>
                            <input type="text" id="kecamatan-field" required placeholder="Cilaku" class="w-full px-3 py-2 sm:py-1.5 border border-slate-300 rounded-lg text-base sm:text-sm focus:ring-2 focus:ring-emerald-500 bg-white">
                        </div>
                    </div>
                    <div>
                        <label class="block text-[11px] font-semibold text-slate-600 uppercase mb-1" for="kabupaten-field">Kabupaten / Kota</label>
                        <input type="text" id="kabupaten-field" required placeholder="Kabupaten Cianjur" class="w-full px-3 py-2 sm:py-1.5 border border-slate-300 rounded-lg text-base sm:text-sm focus:ring-2 focus:ring-emerald-500 bg-white">
                    </div>
                </div>

                <!-- SECTION 3: TANGGAL & MINGGU -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1" for="weigh-date">Tanggal Penimbangan</label>
                        <input type="date" id="weigh-date" required class="w-full px-3.5 py-2.5 sm:py-2 border border-slate-300 rounded-lg text-base sm:text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1" for="week-number">Minggu Ke-</label>
                        <select id="week-number" required class="w-full px-3.5 py-2.5 sm:py-2 border border-slate-300 rounded-lg text-base sm:text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent bg-white">
                            <option value="Minggu 1">Minggu 1</option>
                            <option value="Minggu 2">Minggu 2</option>
                            <option value="Minggu 3">Minggu 3</option>
                            <option value="Minggu 4">Minggu 4</option>
                            <option value="Minggu 5">Minggu 5</option>
                        </select>
                    </div>
                </div>

                <!-- SECTION 4: BERAT SAMPAH ORGANIK & NON-ORGANIK -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1" for="organic-weight">Sampah Organik (kg)</label>
                        <div class="relative">
                            <input type="number" id="organic-weight" step="0.1" min="0" required placeholder="0.0" class="w-full px-3.5 py-2.5 sm:py-2 border border-slate-300 rounded-lg text-base sm:text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent pr-10">
                            <span class="absolute right-3 top-1/2 -translate-y-1/2 text-xs font-medium text-slate-400">kg</span>
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1" for="nonorganic-weight">Sampah Non-Organik (kg)</label>
                        <div class="relative">
                            <input type="number" id="nonorganic-weight" step="0.1" min="0" required placeholder="0.0" class="w-full px-3.5 py-2.5 sm:py-2 border border-slate-300 rounded-lg text-base sm:text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent pr-10">
                            <span class="absolute right-3 top-1/2 -translate-y-1/2 text-xs font-medium text-slate-400">kg</span>
                        </div>
                    </div>
                </div>

                <!-- Modal Actions -->
                <div class="pt-3 border-t border-slate-100 flex flex-col-reverse sm:flex-row items-stretch sm:items-center justify-end gap-2 sm:gap-3 shrink-0">
                    <button type="button" onclick="closeFormModal()" class="w-full sm:w-auto px-4 py-2.5 sm:py-2 rounded-xl text-sm font-medium text-slate-600 hover:bg-slate-100 transition-colors text-center">Batal</button>
                    <button type="submit" id="save-btn" class="w-full sm:w-auto px-5 py-2.5 sm:py-2 rounded-xl text-sm font-medium bg-emerald-600 text-white hover:bg-emerald-700 shadow-sm transition-colors flex items-center justify-center gap-2">
                        <span>Simpan Data</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- ==================== MODAL KONFIRMASI HAPUS ==================== -->
    <div id="delete-modal" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 flex items-center justify-center p-4 hidden">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-sm p-5 sm:p-6 text-center">
            <div class="w-12 h-12 bg-red-100 text-red-600 rounded-full flex items-center justify-center mx-auto mb-3 sm:mb-4 text-xl">
                <i class="fa-solid fa-trash-can"></i>
            </div>
            <h3 class="font-bold text-slate-800 text-base sm:text-lg mb-2">Hapus Catatan Data?</h3>
            <p class="text-xs text-slate-500 mb-5 sm:mb-6">Data ini akan terhapus secara permanen dari basis data sistem.</p>
            <div class="flex flex-col-reverse sm:flex-row items-stretch sm:items-center justify-center gap-2 sm:gap-3">
                <button onclick="closeDeleteModal()" class="w-full sm:w-auto px-4 py-2.5 sm:py-2 rounded-xl text-sm font-medium text-slate-600 hover:bg-slate-100 transition-colors">Batal</button>
                <button id="confirm-delete-btn" onclick="confirmDelete()" class="w-full sm:w-auto px-4 py-2.5 sm:py-2 rounded-xl text-sm font-medium bg-red-600 text-white hover:bg-red-700 transition-colors shadow-sm flex items-center justify-center gap-2">
                    <span>Ya, Hapus Data</span>
                </button>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    // State variables
    window.currentRW = 'RW 16';
    window.currentRT = 'RT 01';
    window.records = @json($initialRecords ?? []);
    window.deleteTargetId = null;

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    // Navigation Step
    function navigateToStep(step) {
        document.getElementById('step-1').classList.add('hidden');
        document.getElementById('step-2').classList.add('hidden');
        document.getElementById('step-3').classList.add('hidden');

        // Desktop Breadcrumbs
        const bcRw = document.getElementById('bc-rw');
        const bcRt = document.getElementById('bc-rt');
        const bcCrud = document.getElementById('bc-crud');

        if (bcRw) bcRw.className = "px-2.5 py-1 rounded transition-all cursor-pointer " + (step >= 1 ? "bg-emerald-700 font-semibold text-white" : "opacity-60");
        if (bcRt) bcRt.className = "px-2.5 py-1 rounded transition-all cursor-pointer " + (step >= 2 ? "bg-emerald-700 font-semibold text-white" : "opacity-60");
        if (bcCrud) bcCrud.className = "px-2.5 py-1 rounded transition-all cursor-pointer " + (step >= 3 ? "bg-emerald-700 font-semibold text-white" : "opacity-60");

        // Mobile Stepper Buttons
        const mobBcRw = document.getElementById('mob-bc-rw');
        const mobBcRt = document.getElementById('mob-bc-rt');
        const mobBcCrud = document.getElementById('mob-bc-crud');

        if (mobBcRw) {
            mobBcRw.className = step === 1 
                ? "flex-1 py-2 px-1.5 text-center rounded-xl font-bold bg-emerald-700 text-white transition-all shadow-sm"
                : "flex-1 py-2 px-1.5 text-center rounded-xl font-medium text-slate-600 hover:bg-slate-100 transition-all";
        }
        if (mobBcRt) {
            mobBcRt.className = step === 2 
                ? "flex-1 py-2 px-1.5 text-center rounded-xl font-bold bg-emerald-700 text-white transition-all shadow-sm"
                : "flex-1 py-2 px-1.5 text-center rounded-xl font-medium text-slate-600 hover:bg-slate-100 transition-all";
        }
        if (mobBcCrud) {
            mobBcCrud.className = step === 3 
                ? "flex-1 py-2 px-1.5 text-center rounded-xl font-bold bg-emerald-700 text-white transition-all shadow-sm"
                : "flex-1 py-2 px-1.5 text-center rounded-xl font-medium text-slate-600 hover:bg-slate-100 transition-all";
        }

        if (step === 1) {
            document.getElementById('step-1').classList.remove('hidden');
        } else if (step === 2) {
            document.getElementById('selected-rw-badge').innerText = window.currentRW;
            document.getElementById('step-2').classList.remove('hidden');
        } else if (step === 3) {
            document.getElementById('active-location-badge').innerText = `${window.currentRW} / ${window.currentRT}`;
            document.getElementById('filter-location-text').innerText = `${window.currentRW} / ${window.currentRT}`;
            
            // Get context header address
            const activeRecord = (window.records || []).find(r => r.rw === window.currentRW && r.rt === window.currentRT);
            const kampung = activeRecord ? activeRecord.address_kampung : 'Kp. Sukamaju';
            const kel = activeRecord ? activeRecord.village : 'Desa Sukamaju';
            const kec = activeRecord ? activeRecord.district : 'Cilaku';
            const kab = activeRecord ? activeRecord.regency : 'Kabupaten Cianjur';
            
            document.getElementById('active-location-address').innerHTML = `
                <i class="fa-solid fa-location-dot text-emerald-600"></i>
                <span>${escapeHtml(kampung)}, ${escapeHtml(kel)}, Kec. ${escapeHtml(kec)}, ${escapeHtml(kab)}</span>
            `;

            document.getElementById('step-3').classList.remove('hidden');
            renderTable();
        }

        // Scroll smoothly to top on step transition for mobile ease
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function selectRW(rwName) {
        window.currentRW = rwName;
        navigateToStep(2);
    }

    function selectRT(rtName) {
        window.currentRT = rtName;
        navigateToStep(3);
    }

    // Render Table and Mobile Cards
    function renderTable() {
        const tbody = document.getElementById('data-table-body');
        const mobileContainer = document.getElementById('mobile-cards-body');
        const emptyState = document.getElementById('empty-state');
        const searchQuery = document.getElementById('search-input').value.toLowerCase().trim();

        const allRecords = window.records || [];

        // Filter data by selected RW, RT and search query
        const filteredRecords = allRecords.filter(item => {
            const matchesLocation = item.rw === window.currentRW && item.rt === window.currentRT;
            const fullTextSearch = `${item.owner_name} ${item.address_kampung} ${item.village} ${item.district} ${item.regency} ${item.week_number}`.toLowerCase();
            const matchesSearch = fullTextSearch.includes(searchQuery);
            return matchesLocation && matchesSearch;
        });

        // Sort by weigh_date descending
        filteredRecords.sort((a, b) => new Date(b.weigh_date || 0) - new Date(a.weigh_date || 0));

        tbody.innerHTML = '';
        if (mobileContainer) mobileContainer.innerHTML = '';

        if (filteredRecords.length === 0) {
            emptyState.classList.remove('hidden');
        } else {
            emptyState.classList.add('hidden');
            filteredRecords.forEach((item, index) => {
                const totalWeight = (parseFloat(item.organic_weight || 0) + parseFloat(item.non_organic_weight || 0)).toFixed(1);
                const formattedDate = formatDateString(item.weigh_date);

                // 1. Render Desktop Table Row
                const tr = document.createElement('tr');
                tr.className = "hover:bg-slate-50 transition-colors";
                tr.innerHTML = `
                    <td class="py-3 px-4 font-medium text-slate-500">${index + 1}</td>
                    <td class="py-3 px-4 font-semibold text-slate-800">${escapeHtml(item.owner_name)}</td>
                    <td class="py-3 px-4 text-slate-600">${escapeHtml(item.address_kampung)}</td>
                    <td class="py-3 px-4 text-xs text-slate-500">
                        <span class="font-medium text-slate-700">${escapeHtml(item.rt)} / ${escapeHtml(item.rw)}</span><br>
                        ${escapeHtml(item.village)}, Kec. ${escapeHtml(item.district)}, ${escapeHtml(item.regency)}
                    </td>
                    <td class="py-3 px-4 text-slate-600">
                        <div class="text-xs font-semibold text-slate-700">${formattedDate}</div>
                        <span class="inline-block mt-0.5 bg-slate-100 text-slate-600 text-[10px] px-2 py-0.5 rounded-full font-medium border border-slate-200">
                            ${escapeHtml(item.week_number)}
                        </span>
                    </td>
                    <td class="py-3 px-4 text-right font-medium text-emerald-600">${parseFloat(item.organic_weight || 0).toFixed(1)}</td>
                    <td class="py-3 px-4 text-right font-medium text-amber-600">${parseFloat(item.non_organic_weight || 0).toFixed(1)}</td>
                    <td class="py-3 px-4 text-right font-bold text-slate-800">${totalWeight}</td>
                    <td class="py-3 px-4 text-center">
                        <div class="flex items-center justify-center gap-1">
                            <button onclick="openEditModal(${item.id})" title="Edit Data" class="p-2 text-blue-600 hover:bg-blue-50 active:bg-blue-100 rounded-lg transition-colors">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <button onclick="openDeleteModal(${item.id})" title="Hapus Data" class="p-2 text-red-600 hover:bg-red-50 active:bg-red-100 rounded-lg transition-colors">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </div>
                    </td>
                `;
                tbody.appendChild(tr);

                // 2. Render Mobile Card (Phone View)
                if (mobileContainer) {
                    const card = document.createElement('div');
                    card.className = "bg-white p-4 rounded-xl border border-slate-200/90 shadow-sm space-y-3";
                    card.innerHTML = `
                        <div class="flex items-start justify-between gap-3">
                            <div class="min-w-0 flex-grow">
                                <div class="flex items-center gap-1.5">
                                    <span class="text-[11px] font-bold text-slate-400">#${index + 1}</span>
                                    <h4 class="font-bold text-slate-800 text-base leading-tight truncate">${escapeHtml(item.owner_name)}</h4>
                                </div>
                                <p class="text-xs text-slate-600 mt-1 flex items-center gap-1 truncate">
                                    <i class="fa-solid fa-location-dot text-emerald-600 shrink-0"></i>
                                    <span class="truncate">${escapeHtml(item.address_kampung)} (${escapeHtml(item.rt)} / ${escapeHtml(item.rw)})</span>
                                </p>
                                <p class="text-[11px] text-slate-400 mt-0.5 truncate">
                                    ${escapeHtml(item.village)}, ${escapeHtml(item.district)}, ${escapeHtml(item.regency)}
                                </p>
                            </div>
                            <div class="flex items-center gap-1 shrink-0">
                                <button onclick="openEditModal(${item.id})" title="Edit Data" class="p-2 text-blue-600 hover:bg-blue-50 active:bg-blue-100 rounded-lg transition-colors">
                                    <i class="fa-solid fa-pen-to-square text-base"></i>
                                </button>
                                <button onclick="openDeleteModal(${item.id})" title="Hapus Data" class="p-2 text-red-600 hover:bg-red-50 active:bg-red-100 rounded-lg transition-colors">
                                    <i class="fa-solid fa-trash-can text-base"></i>
                                </button>
                            </div>
                        </div>

                        <div class="flex items-center justify-between text-xs text-slate-500 border-t border-slate-100 pt-2.5">
                            <span class="font-medium text-slate-600 flex items-center gap-1">
                                <i class="fa-regular fa-calendar text-slate-400"></i> ${formattedDate}
                            </span>
                            <span class="bg-slate-100 text-slate-700 px-2.5 py-0.5 rounded-full text-[11px] font-semibold border border-slate-200">
                                ${escapeHtml(item.week_number)}
                            </span>
                        </div>

                        <div class="grid grid-cols-3 gap-2 bg-slate-50 p-2.5 rounded-xl text-center">
                            <div>
                                <span class="text-[10px] font-semibold text-slate-500 uppercase tracking-wider">Organik</span>
                                <p class="font-bold text-emerald-600 text-sm mt-0.5">${parseFloat(item.organic_weight || 0).toFixed(1)} kg</p>
                            </div>
                            <div>
                                <span class="text-[10px] font-semibold text-slate-500 uppercase tracking-wider">Non-Org</span>
                                <p class="font-bold text-amber-600 text-sm mt-0.5">${parseFloat(item.non_organic_weight || 0).toFixed(1)} kg</p>
                            </div>
                            <div>
                                <span class="text-[10px] font-semibold text-slate-500 uppercase tracking-wider">Total</span>
                                <p class="font-bold text-slate-800 text-sm mt-0.5">${totalWeight} kg</p>
                            </div>
                        </div>
                    `;
                    mobileContainer.appendChild(card);
                }
            });
        }

        updateSummaryStats();
    }

    // Summary Statistics
    function updateSummaryStats() {
        const allRecords = window.records || [];
        const currentRtRecords = allRecords.filter(item => item.rw === window.currentRW && item.rt === window.currentRT);

        const totalCount = currentRtRecords.length;
        const totalOrganic = currentRtRecords.reduce((sum, item) => sum + parseFloat(item.organic_weight || 0), 0);
        const totalNonOrganic = currentRtRecords.reduce((sum, item) => sum + parseFloat(item.non_organic_weight || 0), 0);
        const overallTotal = totalOrganic + totalNonOrganic;

        document.getElementById('stat-total-records').innerText = totalCount;
        document.getElementById('stat-total-organik').innerText = `${totalOrganic.toFixed(1)} kg`;
        document.getElementById('stat-total-nonorganik').innerText = `${totalNonOrganic.toFixed(1)} kg`;
        document.getElementById('stat-total-overall').innerText = `${overallTotal.toFixed(1)} kg`;
    }

    // Search Handler
    function handleSearch() {
        renderTable();
    }

    // Modal Form (Tambah / Edit)
    function openFormModal() {
        document.getElementById('modal-title').innerText = 'Tambah Data Penimbangan';
        document.getElementById('garbage-form').reset();
        document.getElementById('entry-id').value = '';
        
        // Kosongkan alamat dan detail wilayah untuk pengisian awal
        document.getElementById('house-owner').value = '';
        document.getElementById('kampung-name').value = '';
        document.getElementById('rt-field').value = '';
        document.getElementById('rw-field').value = '';
        document.getElementById('kelurahan-field').value = '';
        document.getElementById('kecamatan-field').value = '';
        document.getElementById('kabupaten-field').value = '';
        document.getElementById('organic-weight').value = '';
        document.getElementById('nonorganic-weight').value = '';
        
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('weigh-date').value = today;
        document.getElementById('week-number').value = 'Minggu 1';
        document.getElementById('form-modal').classList.remove('hidden');
    }

    function openEditModal(id) {
        const item = (window.records || []).find(r => r.id === id);
        if (!item) return;

        document.getElementById('modal-title').innerText = 'Edit Data Penimbangan';
        document.getElementById('entry-id').value = item.id;
        document.getElementById('house-owner').value = item.owner_name || '';
        document.getElementById('kampung-name').value = item.address_kampung || '';
        document.getElementById('rt-field').value = item.rt || window.currentRT;
        document.getElementById('rw-field').value = item.rw || window.currentRW;
        document.getElementById('kelurahan-field').value = item.village || '';
        document.getElementById('kecamatan-field').value = item.district || '';
        document.getElementById('kabupaten-field').value = item.regency || '';
        document.getElementById('weigh-date').value = item.weigh_date ? item.weigh_date.substring(0, 10) : '';
        document.getElementById('week-number').value = item.week_number || 'Minggu 1';
        document.getElementById('organic-weight').value = item.organic_weight || 0;
        document.getElementById('nonorganic-weight').value = item.non_organic_weight || 0;

        document.getElementById('form-modal').classList.remove('hidden');
    }

    function closeFormModal() {
        document.getElementById('form-modal').classList.add('hidden');
    }

    // Save Data (Create / Update via AJAX)
    async function handleSaveData(event) {
        event.preventDefault();

        const entryId = document.getElementById('entry-id').value;
        const payload = {
            owner_name: document.getElementById('house-owner').value.trim(),
            address_kampung: document.getElementById('kampung-name').value.trim(),
            rt: document.getElementById('rt-field').value.trim(),
            rw: document.getElementById('rw-field').value.trim(),
            village: document.getElementById('kelurahan-field').value.trim(),
            district: document.getElementById('kecamatan-field').value.trim(),
            regency: document.getElementById('kabupaten-field').value.trim(),
            weigh_date: document.getElementById('weigh-date').value,
            week_number: document.getElementById('week-number').value,
            organic_weight: parseFloat(document.getElementById('organic-weight').value) || 0,
            non_organic_weight: parseFloat(document.getElementById('nonorganic-weight').value) || 0,
        };

        const saveBtn = document.getElementById('save-btn');
        saveBtn.disabled = true;
        saveBtn.innerHTML = `<i class="fa-solid fa-spinner animate-spin"></i> Menyimpan...`;

        const url = entryId ? `/records/${entryId}` : `/records`;
        const method = entryId ? 'PUT' : 'POST';

        try {
            const response = await fetch(url, {
                method: method,
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify(payload)
            });

            const result = await response.json();

            if (!response.ok) {
                const errorMsg = result.message || 'Terjadi kesalahan saat menyimpan data.';
                showToast(errorMsg, 'error');
                return;
            }

            if (entryId) {
                // Update item in local list
                const idx = window.records.findIndex(r => r.id === parseInt(entryId));
                if (idx !== -1) {
                    window.records[idx] = result.data;
                }
                showToast('Data penimbangan berhasil diperbarui!', 'success');
            } else {
                // Prepend new item
                window.records.unshift(result.data);
                showToast('Data penimbangan berhasil ditambahkan!', 'success');
            }

            closeFormModal();
            renderTable();
        } catch (error) {
            console.error('Error saving record:', error);
            showToast('Gagal menghubungi server.', 'error');
        } finally {
            saveBtn.disabled = false;
            saveBtn.innerHTML = `<span>Simpan Data</span>`;
        }
    }

    // Delete Modal & Action
    function openDeleteModal(id) {
        window.deleteTargetId = id;
        document.getElementById('delete-modal').classList.remove('hidden');
    }

    function closeDeleteModal() {
        window.deleteTargetId = null;
        document.getElementById('delete-modal').classList.add('hidden');
    }

    async function confirmDelete() {
        if (!window.deleteTargetId) return;

        const deleteBtn = document.getElementById('confirm-delete-btn');
        deleteBtn.disabled = true;
        deleteBtn.innerHTML = `<i class="fa-solid fa-spinner animate-spin"></i> Menghapus...`;

        try {
            const response = await fetch(`/records/${window.deleteTargetId}`, {
                method: 'DELETE',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                }
            });

            const result = await response.json();

            if (!response.ok) {
                showToast(result.message || 'Gagal menghapus data.', 'error');
                return;
            }

            // Remove from local list
            window.records = window.records.filter(r => r.id !== window.deleteTargetId);
            closeDeleteModal();
            renderTable();
            showToast('Data penimbangan berhasil dihapus.', 'success');
        } catch (error) {
            console.error('Error deleting record:', error);
            showToast('Gagal menghubungi server.', 'error');
        } finally {
            deleteBtn.disabled = false;
            deleteBtn.innerHTML = `<span>Ya, Hapus Data</span>`;
        }
    }

    // Export to CSV via Laravel Backend Route
    function exportToCSV() {
        const url = `/records/export/csv?rw=${encodeURIComponent(window.currentRW)}&rt=${encodeURIComponent(window.currentRT)}`;
        window.location.href = url;
    }

    // Utilities
    function formatDateString(dateStr) {
        if (!dateStr) return '-';
        // Handle format YYYY-MM-DD
        const parts = dateStr.substring(0, 10).split('-');
        if (parts.length === 3) {
            return `${parts[2]}/${parts[1]}/${parts[0]}`;
        }
        return dateStr;
    }

    function escapeHtml(text) {
        if (!text) return '';
        const div = document.createElement('div');
        div.innerText = text;
        return div.innerHTML;
    }

    // Initial setup
    document.addEventListener('DOMContentLoaded', () => {
        navigateToStep(1);
    });
</script>
@endpush
