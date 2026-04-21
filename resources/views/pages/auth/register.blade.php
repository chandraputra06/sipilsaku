@extends('layouts.guest')

@section('content')
    <div class="min-h-[520px] flex items-center">
        <div class="mx-auto max-w-5xl w-full">
            <div class="mb-10 flex justify-center">
                <div class="inline-flex rounded-full bg-[#D79A58] p-1">
                    <a href="{{ route('login') }}" class="btn-tab">Masuk</a>
                    <a href="{{ route('register') }}" class="btn-tab-active">Daftar</a>
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
                    <form method="POST" action="{{ route('register') }}" class="space-y-4">
                        @csrf

                        <div>
                            <label for="name" class="mb-2 block text-sm font-medium text-[#4D371F]">
                                Nama Lengkap
                            </label>
                            <input id="name" type="text" name="name" value="{{ old('name') }}" required
                                class="auth-input">
                            @error('name')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="whatsapp" class="mb-2 block text-sm font-medium text-[#4D371F]">
                                Nomor Whatsapp
                            </label>
                            <input id="whatsapp" type="text" name="whatsapp" value="{{ old('whatsapp') }}"
                                class="auth-input">
                            @error('whatsapp')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="profession" class="mb-2 block text-sm font-medium text-[#4D371F]">
                                Status Pekerjaan
                            </label>
                            <input id="profession" type="text" name="profession" value="{{ old('profession') }}"
                                class="auth-input">
                            @error('profession')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="mb-2 block text-sm font-medium text-[#4D371F]">
                                Alamat Email
                            </label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                class="auth-input">
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

                                <button type="button" id="toggleRegisterPassword"
                                    class="absolute right-3 top-1/2 -translate-y-1/2 text-[#8B7A6B] hover:text-[#4D371F]"
                                    aria-label="Tampilkan password">
                                    <i id="toggleRegisterPasswordIcon" class="fa-regular fa-eye"></i>
                                </button>
                            </div>

                            @error('password')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="password_confirmation" class="mb-2 block text-sm font-medium text-[#4D371F]">
                                Konfirmasi Password
                            </label>

                            <div class="relative">
                                <input id="password_confirmation" type="password" name="password_confirmation" required
                                    class="auth-input pr-11">

                                <button type="button" id="toggleRegisterPasswordConfirmation"
                                    class="absolute right-3 top-1/2 -translate-y-1/2 text-[#8B7A6B] hover:text-[#4D371F]"
                                    aria-label="Tampilkan konfirmasi password">
                                    <i id="toggleRegisterPasswordConfirmationIcon" class="fa-regular fa-eye"></i>
                                </button>
                            </div>

                            @error('password_confirmation')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="pt-2 flex items-center gap-4">
                            <button type="submit" class="btn-primary w-32">
                                Daftar
                            </button>

                            <a href="{{ url('/') }}"
                                class="inline-flex items-center gap-2 text-sm text-[#4D371F] hover:text-[#DD9E59]">
                                <span>&lsaquo;</span>
                                <span>Kembali ke Beranda</span>
                            </a>
                        </div>

                        <p class="text-sm text-[#5F4A37]">
                            Sudah punya akun?
                            <a href="{{ route('login') }}" class="font-medium text-[#DD9E59] hover:underline">
                                Masuk
                            </a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                function setupPasswordToggle(inputId, buttonId, iconId, showLabel, hideLabel) {
                    const input = document.getElementById(inputId);
                    const button = document.getElementById(buttonId);
                    const icon = document.getElementById(iconId);

                    if (!input || !button || !icon) return;

                    button.addEventListener('click', function() {
                        const isPassword = input.type === 'password';

                        input.type = isPassword ? 'text' : 'password';

                        if (isPassword) {
                            icon.classList.remove('fa-eye');
                            icon.classList.add('fa-eye-slash');
                            button.setAttribute('aria-label', hideLabel);
                        } else {
                            icon.classList.remove('fa-eye-slash');
                            icon.classList.add('fa-eye');
                            button.setAttribute('aria-label', showLabel);
                        }
                    });
                }

                setupPasswordToggle(
                    'password',
                    'toggleRegisterPassword',
                    'toggleRegisterPasswordIcon',
                    'Tampilkan password',
                    'Sembunyikan password'
                );

                setupPasswordToggle(
                    'password_confirmation',
                    'toggleRegisterPasswordConfirmation',
                    'toggleRegisterPasswordConfirmationIcon',
                    'Tampilkan konfirmasi password',
                    'Sembunyikan konfirmasi password'
                );
            });
        </script>
    @endpush
@endsection
