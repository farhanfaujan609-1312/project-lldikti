@extends('layouts.app')

@section('title', 'Daftar Akun Petugas Baru')

@section('content')
<div class="min-h-[80vh] flex flex-col justify-center items-center py-6 px-4 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md text-center mb-6">
        <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-emerald-600 text-white shadow-lg mb-3">
            <i class="fa-solid fa-user-plus text-3xl"></i>
        </div>
        <h2 class="text-2xl font-extrabold text-slate-800 tracking-tight">
            Pendaftaran Petugas
        </h2>
        <p class="text-sm text-slate-500 mt-1">
            Buat akun baru untuk mengelola pencatatan dan penimbangan sampah warga
        </p>
    </div>

    <div class="w-full max-w-md">
        <!-- Registration Form Card -->
        <div class="bg-white py-6 px-4 shadow-md rounded-2xl border border-slate-200/80 sm:py-8 sm:px-10">
            <form action="{{ route('register.post') }}" method="POST" class="space-y-3 sm:space-y-4">
                @csrf

                <!-- Nama Lengkap -->
                <div>
                    <label for="name" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">
                        Nama Lengkap
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <i class="fa-solid fa-user text-sm"></i>
                        </div>
                        <input id="name" 
                               name="name" 
                               type="text" 
                               autocomplete="name" 
                               required 
                               value="{{ old('name') }}"
                               placeholder="Contoh: Rahmat Hidayat"
                               class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border @error('name') border-red-400 bg-red-50/50 @else border-slate-300 @enderror rounded-xl text-base sm:text-sm text-slate-800 placeholder-slate-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all">
                    </div>
                    @error('name')
                        <p class="mt-1.5 text-xs text-red-600 font-medium flex items-center gap-1">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            <span>{{ $message }}</span>
                        </p>
                    @enderror
                </div>

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
                               class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border @error('email') border-red-400 bg-red-50/50 @else border-slate-300 @enderror rounded-xl text-base sm:text-sm text-slate-800 placeholder-slate-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all">
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
                               autocomplete="new-password" 
                               required 
                               placeholder="Minimal 8 karakter"
                               class="w-full pl-10 pr-10 py-2.5 bg-slate-50 border @error('password') border-red-400 bg-red-50/50 @else border-slate-300 @enderror rounded-xl text-base sm:text-sm text-slate-800 placeholder-slate-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all">
                        <button type="button" onclick="togglePasswordVisibility('password', 'toggle-password-icon')" class="absolute inset-y-0 right-0 pr-3 flex items-center text-slate-400 hover:text-slate-600">
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

                <!-- Password Confirmation Input -->
                <div>
                    <label for="password_confirmation" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">
                        Ulangi Kata Sandi
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <i class="fa-solid fa-lock-check text-sm"></i>
                        </div>
                        <input id="password_confirmation" 
                               name="password_confirmation" 
                               type="password" 
                               autocomplete="new-password" 
                               required 
                               placeholder="Ulangi kata sandi"
                               class="w-full pl-10 pr-10 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-base sm:text-sm text-slate-800 placeholder-slate-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all">
                        <button type="button" onclick="togglePasswordVisibility('password_confirmation', 'toggle-password-confirm-icon')" class="absolute inset-y-0 right-0 pr-3 flex items-center text-slate-400 hover:text-slate-600">
                            <i class="fa-regular fa-eye" id="toggle-password-confirm-icon"></i>
                        </button>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="pt-2">
                    <button type="submit" class="w-full py-3 px-4 rounded-xl text-sm font-bold text-white bg-emerald-600 hover:bg-emerald-700 active:bg-emerald-800 shadow-md hover:shadow-lg transition-all duration-200 flex items-center justify-center gap-2">
                        <i class="fa-solid fa-user-check"></i>
                        <span>Daftar Akun Baru</span>
                    </button>
                </div>
            </form>

            <!-- Link back to Login -->
            <div class="mt-6 pt-5 border-t border-slate-100 text-center text-xs text-slate-500">
                Sudah memiliki akun petugas?
                <a href="{{ route('login') }}" class="font-bold text-emerald-600 hover:text-emerald-700 ml-1 underline">
                    Masuk di sini
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function togglePasswordVisibility(inputId, iconId) {
        const input = document.getElementById(inputId);
        const icon = document.getElementById(iconId);
        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }
</script>
@endpush

