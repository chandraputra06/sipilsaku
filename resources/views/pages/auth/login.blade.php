@extends('layouts.guest')

@section('title', 'Masuk')

@section('content')

<style>
    /* ── Nuke every possible wrapper background & border ── */
    html, body {
        background: #FDF6EE !important;
        min-height: 100vh;
    }
    body::before {
        content: '';
        position: fixed;
        inset: 0;
        background: #FDF6EE;
        z-index: -2;
    }
    /*
     * Strip background / border / shadow from every ancestor
     * the guest layout might inject (up to 3 levels deep).
     */
    body > *,
    body > * > *,
    body > * > * > * {
        background-color: transparent !important;
        border: none !important;
        box-shadow: none !important;
        border-radius: 0 !important;
    }
    /* Common Tailwind / Laravel guest layout class names */
    .min-h-screen,
    .antialiased,
    main, section,
    .container,
    .guest-wrapper,
    .flex.flex-col,
    .items-center.justify-center {
        background-color: transparent !important;
        border: none !important;
        box-shadow: none !important;
    }

    /* ── Keyframes ── */
    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(20px); }
        to   { opacity: 1; transform: translateY(0); }
    }
    @keyframes fadeIn {
        from { opacity: 0; }
        to   { opacity: 1; }
    }
    @keyframes slideLeft {
        from { opacity: 0; transform: translateX(-28px); }
        to   { opacity: 1; transform: translateX(0); }
    }
    @keyframes slideRight {
        from { opacity: 0; transform: translateX(28px); }
        to   { opacity: 1; transform: translateX(0); }
    }
    @keyframes floatA {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50%       { transform: translateY(-14px) rotate(3deg); }
    }
    @keyframes floatB {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50%       { transform: translateY(-10px) rotate(-4deg); }
    }
    @keyframes floatC {
        0%, 100% { transform: translateY(0px); }
        50%       { transform: translateY(-8px); }
    }
    @keyframes badgeIn {
        from { opacity: 0; transform: translateX(-16px); }
        to   { opacity: 1; transform: translateX(0); }
    }
    @keyframes shimmer {
        0%   { background-position: -200% center; }
        100% { background-position: 200% center; }
    }
    @keyframes inputFocus {
        from { box-shadow: 0 0 0 0 rgba(221,158,89,0); }
        to   { box-shadow: 0 0 0 3px rgba(221,158,89,0.18); }
    }
    @keyframes orb1 {
        0%, 100% { transform: scale(1) translate(0, 0); }
        50%       { transform: scale(1.08) translate(20px, -10px); }
    }
    @keyframes orb2 {
        0%, 100% { transform: scale(1) translate(0, 0); }
        50%       { transform: scale(1.06) translate(-15px, 12px); }
    }

    /* ── Delay utilities ── */
    .d1  { animation-delay: 60ms; }
    .d2  { animation-delay: 130ms; }
    .d3  { animation-delay: 200ms; }
    .d4  { animation-delay: 270ms; }
    .d5  { animation-delay: 340ms; }
    .d6  { animation-delay: 420ms; }
    .d7  { animation-delay: 500ms; }
    .d8  { animation-delay: 580ms; }
    .d9  { animation-delay: 660ms; }

    /* ── Background orbs ── */
    .bg-orb {
        position: fixed;
        border-radius: 9999px;
        filter: blur(90px);
        pointer-events: none;
        z-index: 0;
    }
    .bg-orb-1 {
        width: 480px; height: 480px;
        background: radial-gradient(circle, rgba(216,154,83,0.18) 0%, transparent 70%);
        top: -100px; right: -100px;
        animation: orb1 9s ease-in-out infinite;
    }
    .bg-orb-2 {
        width: 400px; height: 400px;
        background: radial-gradient(circle, rgba(199,136,61,0.13) 0%, transparent 70%);
        bottom: -80px; left: -80px;
        animation: orb2 11s ease-in-out infinite;
    }
    .bg-orb-3 {
        width: 260px; height: 260px;
        background: radial-gradient(circle, rgba(216,154,83,0.10) 0%, transparent 70%);
        top: 40%; left: 40%;
        animation: floatC 14s ease-in-out infinite;
    }

    /* ── Floating decorative shapes ── */
    .deco-shape {
        position: absolute;
        pointer-events: none;
        border-radius: 9999px;
    }

    /* ── Tab toggle ── */
    .btn-tab-active {
        display: inline-block;
        border-radius: 9999px;
        background: white;
        padding: 8px 28px;
        font-size: 0.875rem;
        font-weight: 600;
        color: #D79A58;
        box-shadow: 0 2px 8px rgba(0,0,0,0.10);
        transition: all 0.25s ease;
    }
    .btn-tab {
        display: inline-block;
        border-radius: 9999px;
        padding: 8px 28px;
        font-size: 0.875rem;
        font-weight: 500;
        color: white;
        transition: all 0.25s ease;
    }
    .btn-tab:hover { background: rgba(255,255,255,0.15); }

    /* ── Auth badge ── */
    .auth-badge {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: white;
        border: 1px solid #EFE2D5;
        border-radius: 9999px;
        padding: 9px 18px;
        font-size: 0.8125rem;
        font-weight: 500;
        color: #4D371F;
        box-shadow: 0 2px 10px rgba(77,55,31,0.06);
        transition: transform 0.25s ease, box-shadow 0.25s ease;
    }
    .auth-badge:hover {
        transform: translateX(4px);
        box-shadow: 0 4px 14px rgba(77,55,31,0.10);
    }
    .auth-badge::before {
        content: '';
        display: block;
        flex-shrink: 0;
        width: 7px; height: 7px;
        border-radius: 9999px;
        background: #D89A53;
    }

    /* ── Form card ── */
    .form-card {
        background: white;
        border: 1px solid #EFE2D5;
        border-radius: 28px;
        padding: 36px;
        box-shadow: 0 8px 40px rgba(77,55,31,0.09), 0 2px 8px rgba(77,55,31,0.05);
    }

    /* ── Input ── */
    .auth-input {
        display: block;
        width: 100%;
        border: 1.5px solid #E8D9CC;
        border-radius: 12px;
        padding: 11px 16px;
        font-size: 0.9rem;
        color: #1F140F;
        background: #FFFAF6;
        outline: none;
        transition: border-color 0.2s ease, box-shadow 0.2s ease, background 0.2s ease;
    }
    .auth-input:focus {
        border-color: #DD9E59;
        background: white;
        animation: inputFocus 0.2s ease forwards;
    }
    .auth-input::placeholder { color: #B5A090; }

    /* ── Primary button ── */
    .btn-primary {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 9999px;
        background: linear-gradient(135deg, #D89A53 0%, #C9863D 100%);
        padding: 11px 32px;
        font-size: 0.9rem;
        font-weight: 600;
        color: white;
        cursor: pointer;
        position: relative;
        overflow: hidden;
        transition: transform 0.25s cubic-bezier(.22,.68,0,1.2),
                    box-shadow 0.25s ease;
        box-shadow: 0 4px 16px rgba(216,154,83,0.35);
    }
    .btn-primary::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.18), transparent);
        background-size: 200% auto;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    .btn-primary:hover {
        transform: translateY(-2px) scale(1.02);
        box-shadow: 0 8px 28px rgba(216,154,83,0.45);
    }
    .btn-primary:hover::after {
        opacity: 1;
        animation: shimmer 0.8s linear;
    }
    .btn-primary:active { transform: translateY(0) scale(0.98); }

    /* ── Checkbox ── */
    .auth-checkbox {
        width: 16px; height: 16px;
        border: 1.5px solid #CBB8A5;
        border-radius: 4px;
        accent-color: #DD9E59;
        cursor: pointer;
        transition: border-color 0.2s ease;
    }
    .auth-checkbox:checked { border-color: #DD9E59; }

    /* ── Divider ── */
    .form-divider {
        border: none;
        border-top: 1px solid #F0E5DA;
        margin: 4px 0;
    }

    /* ── Animation classes ── */
    .anim-fade-up    { animation: fadeUp   0.55s cubic-bezier(.22,.68,0,1.2) both; }
    .anim-fade-in    { animation: fadeIn   0.5s  ease both; }
    .anim-slide-left { animation: slideLeft  0.55s cubic-bezier(.22,.68,0,1.2) both; }
    .anim-slide-right{ animation: slideRight 0.55s cubic-bezier(.22,.68,0,1.2) both; }
    .anim-badge      { animation: badgeIn  0.5s  cubic-bezier(.22,.68,0,1.2) both; }
    .anim-float-a    { animation: floatA   6s ease-in-out infinite; }
    .anim-float-b    { animation: floatB   8s ease-in-out infinite; }
    .anim-float-c    { animation: floatC   10s ease-in-out infinite; }
</style>

{{-- Background orbs --}}
<div class="bg-orb bg-orb-1"></div>
<div class="bg-orb bg-orb-2"></div>
<div class="bg-orb bg-orb-3"></div>

<div class="relative z-10 flex min-h-[520px] items-center py-10">
    <div class="mx-auto w-full max-w-5xl px-4">

        {{-- Tab toggle --}}
        <div class="anim-fade-up mb-10 flex justify-center">
            <div class="inline-flex rounded-full bg-[#D79A58] p-1 shadow-md shadow-[rgba(216,154,83,0.25)]">
                <a href="{{ route('login') }}" class="btn-tab-active">Masuk</a>
                <a href="{{ route('register') }}" class="btn-tab">Daftar</a>
            </div>
        </div>

        <div class="grid items-center gap-12 md:grid-cols-2">

            {{-- ── Left: Marketing copy ── --}}
            <div class="anim-slide-left d2 max-w-md">
                <h1 class="font-heading text-5xl leading-none text-[#1F140F] md:text-6xl">
                    Tingkatkan Karir Teknik Sipil Anda
                </h1>

                <p class="mt-6 max-w-sm text-sm leading-7 text-[#5F4A37] md:text-base">
                    Akses materi software standar industri, layanan perancangan profesional,
                    dan konsultasi interaktif dengan expert aktif di lapangan.
                </p>

                <div class="mt-8 space-y-3">
                    <div class="auth-badge anim-badge d4">Standar industri SNI &amp; internasional</div>
                    <div class="auth-badge anim-badge d5">Interaksi langsung dengan mentor expert</div>
                    <div class="auth-badge anim-badge d6">Sertifikat penyelesaian modul pelatihan</div>
                </div>
            </div>

            {{-- ── Right: Form card ── --}}
            <div class="anim-slide-right d3 w-full max-w-md md:ml-auto">
                <div class="form-card">

                    {{-- Card header --}}
                    <div class="mb-7">
                        <h2 class="font-heading text-[28px] leading-tight text-[#1F140F]">Selamat Datang</h2>
                        <p class="mt-1 text-sm text-[#8A7060]">Masuk ke akun Sipilsaku kamu</p>
                    </div>

                    @if (session('success'))
                        <div class="mb-5 rounded-xl bg-green-50 border border-green-200 px-4 py-3 text-sm text-green-700">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}" class="space-y-5">
                        @csrf

                        {{-- Email --}}
                        <div class="anim-fade-up d4">
                            <label for="email" class="mb-2 block text-sm font-medium text-[#4D371F]">
                                Alamat Email
                            </label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}"
                                required autofocus
                                placeholder="kamu@email.com"
                                class="auth-input">
                            @error('email')
                                <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div class="anim-fade-up d5">
                            <label for="password" class="mb-2 block text-sm font-medium text-[#4D371F]">
                                Password
                            </label>
                            <div class="relative">
                                <input id="password" type="password" name="password" required
                                    placeholder="••••••••"
                                    class="auth-input pr-12">
                                <button type="button" id="togglePassword"
                                    class="absolute right-3.5 top-1/2 -translate-y-1/2 text-[#B5A090] transition hover:text-[#4D371F]"
                                    aria-label="Tampilkan password">
                                    <i id="togglePasswordIcon" class="fa-regular fa-eye"></i>
                                </button>
                            </div>
                            @error('password')
                                <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Remember me --}}
                        <div class="anim-fade-up d6 flex items-center justify-between">
                            <label for="remember" class="inline-flex cursor-pointer items-center gap-2 text-sm text-[#5F4A37]">
                                <input id="remember" type="checkbox" name="remember"
                                    class="auth-checkbox">
                                <span>Remember me</span>
                            </label>
                        </div>

                        <hr class="form-divider">

                        {{-- Submit --}}
                        <div class="anim-fade-up d7">
                            <button type="submit" class="btn-primary w-full">
                                Masuk
                            </button>
                        </div>

                        {{-- Footer links --}}
                        <div class="anim-fade-up d8 space-y-2 pt-1">
                            <p class="text-sm text-[#5F4A37]">
                                Belum punya akun?
                                <a href="{{ route('register') }}" class="font-semibold text-[#DD9E59] transition hover:underline">
                                    Daftar Gratis
                                </a>
                            </p>
                            <a href="{{ url('/') }}"
                                class="inline-flex items-center gap-1.5 text-sm text-[#8A7060] transition hover:text-[#4D371F]">
                                <span>&lsaquo;</span>
                                <span>Kembali ke Beranda</span>
                            </a>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Toggle password visibility
        const passwordInput = document.getElementById('password');
        const toggleButton  = document.getElementById('togglePassword');
        const toggleIcon    = document.getElementById('togglePasswordIcon');

        if (passwordInput && toggleButton && toggleIcon) {
            toggleButton.addEventListener('click', function () {
                const isPassword = passwordInput.type === 'password';
                passwordInput.type = isPassword ? 'text' : 'password';
                toggleIcon.classList.toggle('fa-eye',       !isPassword);
                toggleIcon.classList.toggle('fa-eye-slash',  isPassword);
                toggleButton.setAttribute('aria-label', isPassword ? 'Sembunyikan password' : 'Tampilkan password');
            });
        }

        // Input label float-up micro-interaction
        document.querySelectorAll('.auth-input').forEach(input => {
            input.addEventListener('focus', () => {
                input.closest('div')?.querySelector('label')?.style
                    && (input.closest('div').querySelector('label').style.color = '#D89A53');
            });
            input.addEventListener('blur', () => {
                input.closest('div')?.querySelector('label')?.style
                    && (input.closest('div').querySelector('label').style.color = '');
            });
        });
    });
</script>
@endpush

@endsection