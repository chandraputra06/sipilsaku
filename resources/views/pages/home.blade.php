@extends('layouts.app')

@section('content')
    {{-- HERO --}}
    <section class="relative overflow-hidden">

        {{-- Background image --}}
        <img src="{{ asset('assets/image/bg-hero.png') }}" alt=""
            class="absolute inset-0 h-full w-full object-cover object-center" aria-hidden="true">

        {{-- Dark overlay --}}
        <div class="absolute inset-0 bg-black/55"></div>

        {{-- Content --}}
        <div
            class="relative mx-auto grid min-h-[580px] max-w-[1240px] grid-cols-1 items-stretch gap-8 px-6 py-16 lg:min-h-[640px] lg:grid-cols-2 lg:gap-12 lg:px-8 lg:py-20">

            {{-- ── Left ── --}}
            <div class="flex flex-col justify-center">
                <h1 class="font-heading text-[48px] font-bold leading-[1.05] text-white sm:text-[56px] lg:text-[68px]">
                    Kuasai Software<br>
                    Teknik Sipil<br>
                    Bersama Praktisi
                </h1>

                <p class="mt-5 max-w-[520px] text-sm leading-7 text-white/75 sm:text-[15px]">
                    Akses kursus profesional Civil 3D, SAP2000, dan BIM. Belajar langsung
                    dari ahlinya untuk siap hadapi proyek nyata dengan standar industri
                    konstruksi.
                </p>

                {{-- SNI Badge --}}
                <div class="mt-5 flex items-center gap-2.5">
                    <div class="flex h-5 w-5 items-center justify-center rounded-full border border-white/60">
                        <svg class="h-3 w-3 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <span class="text-sm font-semibold text-white">Standar SNI &amp; Internasional</span>
                </div>

                {{-- Buttons --}}
                <div class="mt-7 flex flex-wrap gap-3">
                    <a href="{{ url('/courses') }}"
                        class="rounded-xl bg-[#D89A53] px-7 py-3.5 text-sm font-bold text-white shadow-lg shadow-[#D89A53]/30 transition hover:bg-[#c98a43]">
                        Mulai Belajar
                    </a>
                    <a href="{{ url('/about') }}"
                        class="rounded-xl border-2 border-white/70 bg-transparent px-7 py-3.5 text-sm font-bold text-white transition hover:bg-white/10">
                        Lihat Pengajar
                    </a>
                </div>
            </div>

            {{-- ── Right ── --}}
            <div class="relative hidden lg:block">
                <div class="relative h-[420px] w-[380px] xl:h-[450px] xl:w-[420px]">

                    {{-- Image --}}
                    <div
                        class="absolute left-1/2 top-[40%] -translate-x-1/2 -translate-y-1/2 overflow-hidden rounded-[20px] shadow-2xl shadow-black/40">
                        <img src="{{ asset('assets/image/hero-img.png') }}" alt="Sipilsaku"
                            class="h-[250px] w-[340px] object-cover xl:h-[270px] xl:w-[380px]">
                    </div>

                    {{-- Stats --}}
                    <div class="absolute bottom-[28px] left-1/2 flex -translate-x-1/2 items-center gap-8 xl:bottom-[34px]">
                        <div class="text-center">
                            <p class="font-heading text-[32px] font-bold leading-none text-white xl:text-[36px]">2.4K+</p>
                            <p class="mt-1.5 text-sm text-white/65">Member aktif</p>
                        </div>

                        <div class="h-12 w-px bg-white/35"></div>

                        <div class="text-center">
                            <p class="font-heading text-[32px] font-bold leading-none text-white xl:text-[36px]">4.9/5</p>
                            <p class="mt-1.5 text-sm text-white/65">Rating Terverivikasi</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="bg-white">
        <div class="mx-auto max-w-[1240px] px-6 py-12 lg:px-8">
            <div class="grid grid-cols-2 divide-x divide-[#D9B387] md:grid-cols-4">
                @foreach ([['num' => '2.406+', 'label' => 'Mahasiswa Aktif', 'icon' => 'icon-mhs.png'], ['num' => '5', 'label' => 'Mentor Expert', 'icon' => 'icon-mentor.png'], ['num' => '98%', 'label' => 'Tingkat Kepuasan', 'icon' => 'icon-kepuasan.png'], ['num' => '150+', 'label' => 'Alumni Berhasil', 'icon' => 'icon-alumni.png']] as $stat)
                    <div class="relative flex min-h-[150px] flex-col items-center justify-center px-6 py-8 text-center">

                        {{-- Background icon --}}
                        <img src="{{ asset('assets/icon/' . $stat['icon']) }}" alt="" aria-hidden="true"
                            class="pointer-events-none absolute left-1/2 top-[44%] z-[1] h-[108px] w-[108px] -translate-x-1/2 -translate-y-1/2 object-contain opacity-[0.88] sm:h-[118px] sm:w-[118px]">

                        {{-- Number --}}
                        <span
                            class="relative z-[2] font-heading text-[36px] font-extrabold leading-none text-[#111111] sm:text-[42px] lg:text-[48px]">
                            {{ $stat['num'] }}
                        </span>

                        {{-- Label --}}
                        <span class="relative z-[2] mt-3 text-sm font-medium text-[#2B2118]">
                            {{ $stat['label'] }}
                        </span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- PILIHAN PROGRAM --}}
    <section class="bg-[#FCF5EE]">
        <div class="mx-auto max-w-[1240px] px-6 py-16 lg:px-8">

            {{-- Heading --}}
            <div class="text-center">
                <h2 class="font-heading text-[42px] font-bold text-[#C17F3A] md:text-[52px]">Pilihan Program</h2>
                <p class="mx-auto mt-4 max-w-[560px] text-sm leading-7 text-[#6B5C4E] sm:text-[15px]">
                    Setiap paket dirancang khusus untuk membawa Anda dari pemahaman
                    dasar hingga mahir dalam studi kasus perancangan.
                </p>
            </div>

            {{-- Cards --}}
            <div class="mt-10 grid gap-5 md:grid-cols-3">
                @foreach ([
            [
                'title' => 'Civil 3D',
                'desc' => 'Konstruksi jalan serta manajemen cut and fill sesuai standar industri.',
                'features' => ['Corridor Design', 'Earthwork Calculation', 'Layouting'],
                'image' => 'assets/image/civil3d-img.png',
                'price' => 'Rp 199.000',
            ],
            [
                'title' => 'SAP2000',
                'desc' => 'Analisis beton dan baja: Dasar–Ahli, standar SNI terbaru.',
                'features' => ['Pelatihan Dasar ASSTT', 'Beton SNI 2847', 'Analisis SRPMK'],
                'image' => 'assets/image/sap-img.png',
                'price' => 'Rp 249.000',
            ],
            [
                'title' => 'Pelatihan BIM',
                'desc' => 'Paket lengkap BIM: Tekla, Revit, Ms. Project, dan perhitungan RAB digital dalam satu alur kerja proyek nyata.',
                'features' => ['Corridor Design', 'Earthwork Calculation', 'Layouting'],
                'image' => 'assets/image/bim-img.png',
                'price' => 'Rp 399.000',
            ],
        ] as $course)
                    <article class="flex h-full flex-col overflow-hidden rounded-[20px] border border-[#D9A066] shadow-sm">
                        <div
                            class="relative flex min-h-[365px] flex-1 flex-col overflow-hidden bg-[#D4904A] px-6 pb-0 pt-6">

                            {{-- Title + underline --}}
                            <div class="relative z-[3]">
                                <h3 class="font-heading text-[28px] font-bold text-white">
                                    {{ $course['title'] }}
                                </h3>
                                <div class="mt-2 h-[2px] w-full bg-white/25"></div>
                            </div>

                            {{-- Description --}}
                            <p class="relative z-[3] mt-4 max-w-[92%] text-[13px] leading-6 text-white/80">
                                {{ $course['desc'] }}
                            </p>

                            {{-- Checklist --}}
                            <ul class="relative z-[3] mt-5 space-y-2.5 pb-6">
                                @foreach ($course['features'] as $feature)
                                    <li class="flex items-center gap-2.5">
                                        <svg class="h-4 w-4 shrink-0 text-white/70" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span class="text-[13px] text-white/85">{{ $feature }}</span>
                                    </li>
                                @endforeach
                            </ul>

                            {{-- Decorative image behind content --}}
                            <div
                                class="
                pointer-events-none absolute z-[1]
                {{ $course['title'] === 'Civil 3D' ? 'bottom-0 right-0' : '' }}
                {{ $course['title'] === 'SAP2000' ? 'bottom-3 right-5' : '' }}
                {{ $course['title'] === 'Pelatihan BIM' ? 'bottom-3 right-5' : '' }}
            ">
                                <img src="{{ asset($course['image']) }}" alt="{{ $course['title'] }}"
                                    class="
                    w-auto object-contain opacity-[0.88]
                    {{ $course['title'] === 'Civil 3D' ? 'h-[180px] sm:h-[200px] lg:h-[220px]' : '' }}
                    {{ $course['title'] === 'SAP2000' ? 'h-[64px] sm:h-[72px] lg:h-[78px]' : '' }}
                    {{ $course['title'] === 'Pelatihan BIM' ? 'h-[78px] sm:h-[120px] lg:h-[140px]' : '' }}
                ">
                            </div>

                            {{-- Soft shadow/fade at bottom --}}
                            <div
                                class="pointer-events-none absolute inset-x-0 bottom-0 z-[2] h-[90px] bg-gradient-to-t from-black/18 via-black/6 to-transparent">
                            </div>
                        </div>

                        <div class="bg-white px-6 py-5">
                            <p class="text-xs text-[#8A7060]">Mulai dari:</p>
                            <p class="mt-1 font-heading text-[26px] font-bold text-[#D4904A]">
                                {{ $course['price'] }}
                            </p>
                        </div>
                    </article>
                @endforeach
            </div>

            {{-- Button --}}
            <div class="mt-10 text-center">
                <a href="{{ url('/courses') }}"
                    class="inline-flex items-center gap-2 rounded-full bg-[#D4904A] px-12 py-4 text-sm font-semibold text-white shadow-lg shadow-[#D4904A]/30 transition hover:bg-[#c07e3e]">
                    Lihat Semua Kursus
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>

        </div>
    </section>

    {{-- E-BOOK --}}
    <section class="bg-white">
        <div class="mx-auto max-w-[1240px] px-6 py-16 lg:px-8">

            {{-- Heading --}}
            <div class="text-center">
                <h2 class="font-heading text-[42px] font-bold text-[#C17F3A] md:text-[52px]">E-Book Populer</h2>
                <p class="mx-auto mt-4 max-w-[520px] text-sm leading-7 text-[#6B5C4E] sm:text-[15px]">
                    Jelajahi koleksi literatur konstruksi digital yang disusun sesuai
                    dengan standar industri terkini.
                </p>
            </div>

            {{-- Carousel wrapper --}}
            <div class="mt-10 flex items-center gap-3 lg:gap-5">

                {{-- Prev button --}}
                <button id="ebookPrev"
                    class="cursor-pointer flex h-10 w-10 shrink-0 items-center justify-center rounded-full border border-[#D4904A]/20 bg-[#F5EDE3] text-[#D4904A] shadow-sm transition duration-300 hover:-translate-y-0.5 hover:bg-[#D4904A] hover:text-white">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>

                {{-- Card --}}
                <div
                    class="relative min-w-0 flex-1 overflow-hidden rounded-[28px] border border-[#E8D8C8] bg-[#F5EDE3] shadow-[0_10px_30px_rgba(0,0,0,0.06)]">
                    <div class="ebook-track flex transition-transform duration-500 ease-in-out" id="ebookTrack">

                        @foreach ([
            [
                'cover' => 'assets/image/book-baja.png',
                'title' => 'STRUKTUR BAJA I',
                'author' => 'Tri Widya Swastika, S.T., M.T, Erlina Yanuarini, S.T., M.T',
                'desc' => 'Struktur baja adalah material yang memiliki kekuatan tinggi dengan berat sendiri yang ringan. Semakin ringan suatu struktur maka gaya gempa yang terjadi juga semakin kecil dan sebaliknya, maka struktur baja sangat baik digunakan untuk konstruksi didaerah berpotensi gempa terutama di Indonesia, dimana sebagian besar wilayahnya adalah daerah rawan gempa....',
            ],
            [
                'cover' => 'assets/image/book-geometri.png',
                'title' => 'BETON BERTULANG DASAR',
                'author' => 'Tim Penulis Sipilsaku',
                'desc' => 'Panduan komprehensif perencanaan dan perhitungan elemen beton bertulang sesuai SNI terbaru. Dilengkapi contoh soal dan studi kasus konstruksi gedung bertingkat yang aplikatif....',
            ],
            [
                'cover' => 'assets/image/book-statistika.png',
                'title' => 'MEKANIKA TANAH',
                'author' => 'Tim Penulis Sipilsaku',
                'desc' => 'Memahami perilaku tanah sebagai material konstruksi, mulai dari klasifikasi, konsolidasi, hingga analisis stabilitas lereng dan daya dukung pondasi....',
            ],
        ] as $ebook)
                            <div class="ebook-slide min-w-full px-7 py-8 sm:px-10 sm:py-10 lg:px-12 lg:py-12">
                                <div class="flex flex-col items-start gap-6 sm:flex-row sm:items-center sm:gap-8">

                                    {{-- Book cover --}}
                                    <div class="shrink-0">
                                        <img src="{{ asset($ebook['cover']) }}" alt="{{ $ebook['title'] }}"
                                            class="h-[180px] w-auto rounded-[6px] object-contain shadow-lg shadow-black/15 sm:h-[220px] lg:h-[235px]">
                                    </div>

                                    {{-- Book info --}}
                                    <div class="flex-1 min-w-0">
                                        <h3
                                            class="font-heading text-[24px] font-bold leading-tight text-[#111111] sm:text-[28px] lg:text-[32px]">
                                            {{ $ebook['title'] }}
                                        </h3>
                                        <div class="mt-3 h-px w-full bg-[#C4A882]"></div>

                                        <p class="mt-3 text-sm font-medium text-[#4A3728]">
                                            Penulis: {{ $ebook['author'] }}
                                        </p>

                                        <p class="mt-4 text-sm leading-7 text-[#5C4A38] lg:pr-4">
                                            {{ $ebook['desc'] }}
                                        </p>
                                    </div>

                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

                {{-- Next button --}}
                <button id="ebookNext"
                    class="cursor-pointer flex h-10 w-10 shrink-0 items-center justify-center rounded-full border border-[#D4904A]/20 bg-[#F5EDE3] text-[#D4904A] shadow-sm transition duration-300 hover:-translate-y-0.5 hover:bg-[#D4904A] hover:text-white">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>

            </div>

            {{-- Dots indicator --}}
            <div class="mt-5 flex justify-center gap-2" id="ebookDots"></div>

            {{-- CTA Button --}}
            <div class="mt-8 text-center">
                <a href="{{ url('/ebooks') }}"
                    class="inline-flex items-center gap-2 rounded-full bg-[#D4904A] px-12 py-4 text-sm font-semibold text-white shadow-lg shadow-[#D4904A]/30 transition hover:bg-[#c07e3e]">
                    Lihat Semua E-Book
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>

        </div>
    </section>

    {{-- KEUNGGULAN --}}
    <section class="relative overflow-hidden bg-[#D4904A] py-16">

        {{-- Decorative pattern kiri --}}
        <div class="pointer-events-none absolute left-0 top-1/2 -translate-y-1/2 opacity-30">
            <img src="{{ asset('assets/images/pattern-left.png') }}" alt="" class="h-[280px] w-auto">
        </div>

        {{-- Decorative pattern kanan --}}
        <div class="pointer-events-none absolute right-0 top-1/2 -translate-y-1/2 opacity-30">
            <img src="{{ asset('assets/images/pattern-right.png') }}" alt="" class="h-[280px] w-auto">
        </div>

        <div class="relative mx-auto max-w-[1240px] px-6 lg:px-8">

            {{-- Heading --}}
            <div class="text-center">
                <h2 class="font-heading text-[42px] font-bold text-white md:text-[52px]">Keunggulan</h2>
                <p class="mt-4 text-lg font-bold text-black sm:text-[15px]">
                    Metode Praktis, Siap Terjun ke Industri.
                </p>
                <p class="mx-auto mt-2 max-w-[520px] text-sm leading-7 text-black/80">
                    Berbeda dengan platform edukasi umum, kami membimbing peserta dengan
                    studi kasus perancangan infrastruktur dan gedung.
                </p>
            </div>
        </div>

        {{-- Carousel (full width, overflow hidden) --}}
        <div class="mt-10 overflow-hidden" id="keunggulanOuter">
            <div class="keunggulan-track flex gap-5 will-change-transform" id="keunggulanTrack">

                {{-- Items x3 untuk loop mulus --}}
                @foreach ([1, 2, 3] as $loop)
                    @foreach ([['icon' => 'icon-paper.png', 'title' => 'Standar SNI', 'desc' => 'Materi up-to-date'], ['icon' => 'icon-target.png', 'title' => 'To-The-Point', 'desc' => 'Belajar lebih efisien'], ['icon' => 'icon-profile.png', 'title' => 'Bimbingan Mentor', 'desc' => 'Tanya jawab intensif'], ['icon' => 'icon-kasus.png', 'title' => 'Kasus Relatable', 'desc' => 'Studi kasus di Indonesia']] as $item)
                        <div
                            class="keunggulan-item flex w-[280px] shrink-0 items-center gap-4 rounded-2xl bg-[#FAF3EC] px-5 py-5 sm:w-[300px]">
                            <div class="flex h-12 w-12 shrink-0 items-center justify-center">
                                <img src="{{ asset('assets/icon/' . $item['icon']) }}" alt="{{ $item['title'] }}"
                                    class="h-10 w-10 object-contain"
                                    style="filter: invert(57%) sepia(40%) saturate(600%) hue-rotate(5deg) brightness(85%);">
                            </div>
                            <div>
                                <h4 class="font-heading text-[17px] font-bold text-[#2C1F12]">{{ $item['title'] }}</h4>
                                <p class="mt-0.5 text-sm text-[#8A6237]">{{ $item['desc'] }}</p>
                            </div>
                        </div>
                    @endforeach
                @endforeach

            </div>
        </div>

        {{-- CTA --}}
        <div class="relative mt-10 text-center">
            <a href="{{ url('/courses') }}"
                class="inline-flex items-center gap-2 rounded-full bg-white px-10 py-3.5 text-sm font-semibold text-[#2C1F12] shadow-md transition hover:bg-[#FAF3EC]">
                Pilih Paket Kursus
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>

        {{-- Wave bawah: orange → cream --}}
        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none">
            <svg viewBox="0 0 1440 70" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"
                class="block h-[60px] w-full">
                <path d="M0,35 C360,70 720,0 1080,35 C1260,52 1380,28 1440,35 L1440,70 L0,70 Z" fill="#FAF6F2" />
            </svg>
        </div>

    </section>
@endsection

@push('scripts')
    @vite(['resources/js/ebook-carousel.js', 'resources/js/keunggulan-carousel.js'])
@endpush
