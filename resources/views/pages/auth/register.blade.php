@extends('layouts.guest')

@section('content')
<div class="min-h-[520px]">
    <div class="mb-8">
        <a href="{{ url('/') }}" class="inline-flex items-center gap-2 text-sm text-[#4D371F] hover:text-[#DD9E59]">
            <span>&lsaquo;</span>
            <span>Kembali ke Beranda</span>
        </a>
    </div>

    <div class="mx-auto max-w-5xl">
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
                        <input
                            id="name"
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            class="auth-input"
                        >
                        @error('name')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="whatsapp" class="mb-2 block text-sm font-medium text-[#4D371F]">
                            Nomor Whatsapp
                        </label>
                        <input
                            id="whatsapp"
                            type="text"
                            name="whatsapp"
                            value="{{ old('whatsapp') }}"
                            class="auth-input"
                        >
                    </div>

                    <div>
                        <label for="profession" class="mb-2 block text-sm font-medium text-[#4D371F]">
                            Status Pekerjaan
                        </label>
                        <input
                            id="profession"
                            type="text"
                            name="profession"
                            value="{{ old('profession') }}"
                            class="auth-input"
                        >
                    </div>

                    <div>
                        <label for="email" class="mb-2 block text-sm font-medium text-[#4D371F]">
                            Alamat Email
                        </label>
                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            class="auth-input"
                        >
                        @error('email')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="mb-2 block text-sm font-medium text-[#4D371F]">
                            Password
                        </label>
                        <input
                            id="password"
                            type="password"
                            name="password"
                            required
                            class="auth-input"
                        >
                        @error('password')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="mb-2 block text-sm font-medium text-[#4D371F]">
                            Konfirmasi Password
                        </label>
                        <input
                            id="password_confirmation"
                            type="password"
                            name="password_confirmation"
                            required
                            class="auth-input"
                        >
                    </div>

                    <div class="pt-1">
                        <button type="submit" class="btn-primary w-32">
                            Daftar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection