<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Sistem Penimbangan Sampah Warga') - Bank Sampah</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        emerald: {
                            50: '#ecfdf5',
                            100: '#d1fae5',
                            500: '#10b981',
                            600: '#059669',
                            700: '#047857',
                            800: '#065f46',
                            900: '#064e3b',
                        }
                    }
                }
            }
        }
    </script>

    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
    <!-- Google Font: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
        [x-cloak] { display: none !important; }
    </style>
    @stack('styles')
</head>
<body class="bg-slate-50 text-slate-800 min-h-screen flex flex-col justify-between antialiased">

    <!-- HEADER / NAVBAR -->
    <header class="bg-emerald-600 text-white shadow-lg sticky top-0 z-30">
        <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8 min-h-16 py-2 sm:py-0 flex items-center justify-between gap-2">
            <!-- Brand Logo -->
            <div class="flex items-center space-x-2.5 sm:space-x-3 cursor-pointer shrink-0" onclick="if(typeof navigateToStep === 'function') navigateToStep(1)">
                <div class="bg-white p-1.5 sm:p-2 rounded-xl text-emerald-600 font-bold shadow-inner flex items-center justify-center">
                    <i class="fa-solid fa-recycle text-lg sm:text-xl"></i>
                </div>
                <div>
                    <h1 class="font-bold text-base sm:text-lg leading-tight flex items-center gap-1.5 sm:gap-2">
                        <span>Bank Sampah</span>
                        <span id="sync-indicator" class="inline-flex items-center gap-1 text-[10px] bg-emerald-800/60 px-2 py-0.5 rounded-full font-normal">
                            <span class="w-2 h-2 rounded-full bg-emerald-400" id="status-dot"></span>
                            <span id="status-text" class="hidden xs:inline sm:inline">Terhubung</span>
                        </span>
                    </h1>
                    <p class="text-[11px] sm:text-xs text-emerald-100 hidden sm:block">Sistem Pencatatan & Penimbangan Sampah</p>
                </div>
            </div>

            <!-- BREADCRUMB INDICATOR (Shown on desktop) -->
            @hasSection('breadcrumb')
                <nav id="breadcrumb-nav" class="hidden lg:flex items-center space-x-2 text-sm text-emerald-100">
                    @yield('breadcrumb')
                </nav>
            @endif

            <!-- USER MENU & LOGOUT -->
            <div class="flex items-center space-x-2 sm:space-x-3 shrink-0">
                @auth
                    <div class="hidden md:flex flex-col text-right">
                        <span class="text-xs font-semibold text-white leading-tight truncate max-w-[150px]">{{ Auth::user()->name }}</span>
                        <span class="text-[11px] text-emerald-100 truncate max-w-[150px]">{{ Auth::user()->email }}</span>
                    </div>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" title="Keluar dari sistem" class="inline-flex items-center gap-1.5 bg-emerald-700 hover:bg-emerald-800 text-white text-xs font-semibold px-2.5 py-1.5 sm:px-3 sm:py-2 rounded-lg transition-all shadow-sm">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            <span class="hidden sm:inline">Keluar</span>
                        </button>
                    </form>
                @else
                    <a href="{{ route('register') }}" class="inline-flex items-center gap-1 bg-emerald-700/80 hover:bg-emerald-800 text-white text-xs font-semibold px-2.5 py-1.5 sm:px-3 sm:py-2 rounded-lg transition-all shadow-sm">
                        <i class="fa-solid fa-user-plus text-xs"></i>
                        <span>Daftar</span>
                    </a>
                    <a href="{{ route('login') }}" class="inline-flex items-center gap-1 bg-white text-emerald-700 hover:bg-emerald-50 text-xs font-semibold px-2.5 py-1.5 sm:px-3 sm:py-2 rounded-lg transition-all shadow-sm">
                        <i class="fa-solid fa-arrow-right-to-bracket text-xs"></i>
                        <span>Masuk</span>
                    </a>
                @endauth
            </div>
        </div>
    </header>

    <!-- NOTIFICATION FLASH ALERTS -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 w-full">
        @if (session('success'))
            <div id="flash-success" class="flex items-center justify-between p-4 mb-4 text-sm text-emerald-800 rounded-xl bg-emerald-50 border border-emerald-200 shadow-sm" role="alert">
                <div class="flex items-center gap-2">
                    <i class="fa-solid fa-circle-check text-emerald-600 text-base"></i>
                    <span>{{ session('success') }}</span>
                </div>
                <button type="button" onclick="this.parentElement.remove()" class="text-emerald-500 hover:text-emerald-700">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
        @endif

        @if (session('error'))
            <div id="flash-error" class="flex items-center justify-between p-4 mb-4 text-sm text-red-800 rounded-xl bg-red-50 border border-red-200 shadow-sm" role="alert">
                <div class="flex items-center gap-2">
                    <i class="fa-solid fa-circle-exclamation text-red-600 text-base"></i>
                    <span>{{ session('error') }}</span>
                </div>
                <button type="button" onclick="this.parentElement.remove()" class="text-red-500 hover:text-red-700">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
        @endif

        @if (session('info'))
            <div id="flash-info" class="flex items-center justify-between p-4 mb-4 text-sm text-blue-800 rounded-xl bg-blue-50 border border-blue-200 shadow-sm" role="alert">
                <div class="flex items-center gap-2">
                    <i class="fa-solid fa-circle-info text-blue-600 text-base"></i>
                    <span>{{ session('info') }}</span>
                </div>
                <button type="button" onclick="this.parentElement.remove()" class="text-blue-500 hover:text-blue-700">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
        @endif

        <!-- Floating Toast Container for AJAX Actions -->
        <div id="toast-container" class="fixed top-20 right-4 z-50 space-y-2 pointer-events-none"></div>
    </div>

    <!-- MAIN CONTENT CONTAINER -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 flex-grow w-full">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="bg-white border-t border-slate-200 py-4 mt-auto">
        <div class="max-w-7xl mx-auto px-4 text-center text-xs text-slate-500">
            &copy; {{ date('Y') }} Sistem Informasi Bank Sampah Warga. Berbasis Laravel & SQLite Realtime Data Storage.
        </div>
    </footer>

    <!-- Toast Helper JS -->
    <script>
        function showToast(message, type = 'success') {
            const container = document.getElementById('toast-container');
            if (!container) return;

            const toast = document.createElement('div');
            toast.className = `pointer-events-auto flex items-center gap-2.5 px-4 py-3 rounded-xl shadow-lg border text-sm font-medium transition-all duration-300 transform translate-x-full ${
                type === 'success' 
                    ? 'bg-emerald-600 text-white border-emerald-700' 
                    : type === 'error'
                    ? 'bg-red-600 text-white border-red-700'
                    : 'bg-slate-800 text-white border-slate-900'
            }`;

            const iconClass = type === 'success' ? 'fa-circle-check' : type === 'error' ? 'fa-circle-exclamation' : 'fa-info-circle';
            toast.innerHTML = `
                <i class="fa-solid ${iconClass}"></i>
                <span>${message}</span>
            `;

            container.appendChild(toast);

            // Animate slide-in
            setTimeout(() => {
                toast.classList.remove('translate-x-full');
            }, 10);

            // Auto remove after 3.5s
            setTimeout(() => {
                toast.classList.add('opacity-0', 'translate-x-full');
                setTimeout(() => toast.remove(), 300);
            }, 3500);
        }
    </script>
    @stack('scripts')
</body>
</html>

