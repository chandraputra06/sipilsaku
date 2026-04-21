@extends('layouts.guest')

@section('content')
    <div class="min-h-[520px] flex items-center">
        <div class="mx-auto max-w-5xl w-full">
            <div class="mb-10 flex justify-center">
                <div class="inline-flex rounded-full bg-[#D79A58] p-1">
                    <a href="{{ route('login') }}" class="btn-tab-active">Masuk</a>
                    <a href="{{ route('register') }}" class="btn-tab">Daftar</a>
                </div>
            </div>

            <div class="grid items-center gap-10 md:grid-cols-2">
                <div class="max-w-md">
                    <h1 class="font-heading text-5xl leading-none text-[#1F140F] md:text-6xl">
                        Tingkatkan Karir
                        <br>
                        Teknik Sipil Anda
                    </h1>

                    <p class="mt-6 max-w-md text-sm leading-7 text-[#5F4A37] md:text-base">
                        Akses materi software standar industri, layanan perancangan profesional,
                        dan konsultasi interaktif dengan expert aktif di lapangan.
                    </p>

                    <div class="mt-8 space-y-3">
                        <div class="auth-badge">Standar industri SNI &amp; internasional</div>
                        <div class="auth-badge">Interaksi langsung dengan mentor expert</div>
                        <div class="auth-badge">Sertifikat penyelesaian modul pelatihan</div>
                    </div>
                </div>

                <div class="w-full max-w-md md:ml-auto">
                    @if (session('success'))
                        <div class="mb-4 rounded-md bg-green-50 px-4 py-3 text-sm text-green-700">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}" class="space-y-5">
                        @csrf

                        <div>
                            <label for="email" class="mb-2 block text-sm font-medium text-[#4D371F]">
                                Alamat Email
                            </label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                autofocus class="auth-input">
                            @error('email')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="password" class="mb-2 block text-sm font-medium text-[#4D371F]">
                                Password
                            </label>

                            <div class="relative">
                                <input id="password" type="password" name="password" required class="auth-input pr-11">

                                <button type="button" id="togglePassword"
                                    class="absolute right-3 top-1/2 -translate-y-1/2 text-[#8B7A6B] hover:text-[#4D371F]"
                                    aria-label="Tampilkan password">
                                    <i id="togglePasswordIcon" class="fa-regular fa-eye"></i>
                                </button>
                            </div>

                            @error('password')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-between gap-4">
                            <label for="remember" class="inline-flex items-center gap-2 text-sm text-[#5F4A37]">
                                <input id="remember" type="checkbox" name="remember"
                                    class="rounded border-[#CBB8A5] text-[#DD9E59] shadow-sm focus:ring-[#DD9E59]">
                                <span>Remember me</span>
                            </label>
                        </div>

                        <div class="pt-1">
                            <button type="submit" class="btn-primary w-32">
                                Masuk
                            </button>
                        </div>

                        <div class="space-y-2">
                            <p class="text-sm text-[#5F4A37]">
                                Belum punya akun?
                                <a href="{{ route('register') }}" class="font-medium text-[#DD9E59] hover:underline">
                                    Daftar Gratis
                                </a>
                            </p>

                            <a href="{{ url('/') }}"
                                class="inline-flex items-center gap-2 text-sm text-[#4D371F] hover:text-[#DD9E59]">
                                <span>&lsaquo;</span>
                                <span>Kembali ke Beranda</span>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const passwordInput = document.getElementById('password');
                const toggleButton = document.getElementById('togglePassword');
                const toggleIcon = document.getElementById('togglePasswordIcon');

                if (!passwordInput || !toggleButton || !toggleIcon) return;

                toggleButton.addEventListener('click', function() {
                    const isPassword = passwordInput.type === 'password';

                    passwordInput.type = isPassword ? 'text' : 'password';

                    if (isPassword) {
                        toggleIcon.classList.remove('fa-eye');
                        toggleIcon.classList.add('fa-eye-slash');
                        toggleButton.setAttribute('aria-label', 'Sembunyikan password');
                    } else {
                        toggleIcon.classList.remove('fa-eye-slash');
                        toggleIcon.classList.add('fa-eye');
                        toggleButton.setAttribute('aria-label', 'Tampilkan password');
                    }
                });
            });
        </script>
    @endpush
@endsection
