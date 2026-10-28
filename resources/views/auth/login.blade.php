@extends('layouts.app')

@section('title', 'Masuk Petugas')

@section('content')
<div class="min-h-[75vh] flex flex-col justify-center items-center py-6 px-4 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md text-center mb-6">
        <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-emerald-600 text-white shadow-lg mb-3">
            <i class="fa-solid fa-recycle text-3xl"></i>
        </div>
        <h2 class="text-2xl font-extrabold text-slate-800 tracking-tight">
            Bank Sampah Warga
        </h2>
        <p class="text-sm text-slate-500 mt-1">
            Masuk untuk mencatat dan mengolah data penimbangan sampah
        </p>
    </div>

    <div class="w-full max-w-md">
        <!-- Demo Credentials Helper Banner -->
        <div class="bg-emerald-50 border border-emerald-200 rounded-2xl p-4 mb-6 shadow-sm">
            <div class="flex items-start gap-3">
                <div class="text-emerald-600 mt-0.5 text-base">
                    <i class="fa-solid fa-key"></i>
                </div>
                <div class="text-xs text-emerald-900 flex-grow">
                    <p class="font-bold text-emerald-800 mb-1">Akun Demo Petugas / Admin:</p>
                    <div class="font-mono bg-white/80 p-2 rounded-lg border border-emerald-200/80 space-y-0.5 text-[11px]">
                        <div>Email: <strong class="text-emerald-700">admin@banksampah.id</strong></div>
                        <div>Password: <strong class="text-emerald-700">password</strong></div>
                    </div>
                    <button type="button" onclick="fillDemoCredentials()" class="mt-2.5 inline-flex items-center gap-1.5 text-xs font-semibold text-emerald-700 hover:text-emerald-900 underline">
                        <i class="fa-solid fa-wand-magic-sparkles"></i>
                        <span>Isi Otomatis Akun Demo</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Login Form Card -->
        <div class="bg-white py-6 px-4 shadow-md rounded-2xl border border-slate-200/80 sm:py-8 sm:px-10">
            <form action="{{ route('login.post') }}" method="POST" class="space-y-4 sm:space-y-5">
                @csrf

                <!-- Email Input -->
                <div>
                    <label for="email" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">
                        Alamat Email
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <i class="fa-solid fa-envelope text-sm"></i>
                        </div>
                        <input id="email" 
                               name="email" 
                               type="email" 
                               autocomplete="email" 
                               required 
                               value="{{ old('email') }}"
                               placeholder="nama@email.com"
                               class="w-full pl-10 pr-4 py-2.5 sm:py-2.5 bg-slate-50 border @error('email') border-red-400 bg-red-50/50 @else border-slate-300 @enderror rounded-xl text-base sm:text-sm text-slate-800 placeholder-slate-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all">
                    </div>
                    @error('email')
                        <p class="mt-1.5 text-xs text-red-600 font-medium flex items-center gap-1">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            <span>{{ $message }}</span>
                        </p>
                    @enderror
                </div>

                <!-- Password Input -->
                <div>
                    <label for="password" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">
                        Kata Sandi
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <i class="fa-solid fa-lock text-sm"></i>
                        </div>
                        <input id="password" 
                               name="password" 
                               type="password" 
                               autocomplete="current-password" 
                               required 
                               placeholder="••••••••"
                               class="w-full pl-10 pr-10 py-2.5 sm:py-2.5 bg-slate-50 border @error('password') border-red-400 bg-red-50/50 @else border-slate-300 @enderror rounded-xl text-base sm:text-sm text-slate-800 placeholder-slate-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all">
                        <button type="button" onclick="togglePasswordVisibility()" class="absolute inset-y-0 right-0 pr-3 flex items-center text-slate-400 hover:text-slate-600">
                            <i class="fa-regular fa-eye" id="toggle-password-icon"></i>
                        </button>
                    </div>
                    @error('password')
                        <p class="mt-1.5 text-xs text-red-600 font-medium flex items-center gap-1">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            <span>{{ $message }}</span>
                        </p>
                    @enderror
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember" 
                               name="remember" 
                               type="checkbox" 
                               class="h-4 w-4 rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
                        <label for="remember" class="ml-2 block text-xs text-slate-600 select-none">
                            Ingat saya di perangkat ini
                        </label>
                    </div>
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit" class="w-full py-3 px-4 rounded-xl text-sm font-bold text-white bg-emerald-600 hover:bg-emerald-700 active:bg-emerald-800 shadow-md hover:shadow-lg transition-all duration-200 flex items-center justify-center gap-2">
                        <i class="fa-solid fa-right-to-bracket"></i>
                        <span>Masuk ke Sistem</span>
                    </button>
                </div>
            </form>

            <!-- Link to Register -->
            <div class="mt-6 pt-5 border-t border-slate-100 text-center text-xs text-slate-500">
                Belum memiliki akun petugas?
                <a href="{{ route('register') }}" class="font-bold text-emerald-600 hover:text-emerald-700 ml-1 underline">
                    Daftar di sini
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function fillDemoCredentials() {
        document.getElementById('email').value = 'admin@banksampah.id';
        document.getElementById('password').value = 'password';
        showToast('Akun demo berhasil diisi!', 'info');
    }

    function togglePasswordVisibility() {
        const passwordInput = document.getElementById('password');
        const icon = document.getElementById('toggle-password-icon');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }
</script>
@endpush

