@extends('layouts.app')

@section('content')
    @php
        $isLoggedIn = true;

        $courses = [
            [
                'title' => 'Civil 3D',
                'desc' =>
                    'Kuasai perangkat lunak desain infrastruktur standar industri untuk perencanaan jalan, drainase, dan koridor.',
                'badges' => ['AutoDesk Civil 3D', 'Corridor Design', 'Earthwork'],
                'session' => '2X',
                'session_label' => 'Sesi',
                'price' => 'Rp 199.000',
                'image' => 'assets/image/civil-3d.png',
            ],
            [
                'title' => 'SAP2000',
                'desc' =>
                    'Dari dasar hingga lanjutan. Analisis struktur beton & baja sesuai SNI terbaru dan standar internasional.',
                'badges' => ['SNI 2847', 'SNI 2847', 'SRPMK', 'Beton & Baja'],
                'session' => '2X',
                'session_label' => 'Sesi',
                'price' => 'Rp 299.000',
                'image' => 'assets/image/sap-img.png',
            ],
            [
                'title' => 'Pelatihan BIM',
                'desc' =>
                    'Paket lengkap BIM: Tekla, Revit, Ms. Project, dan perhitungan RAB digital dalam satu alur kerja proyek nyata.',
                'badges' => ['Tekla', 'Revit', 'Ms. Project', 'RAB'],
                'session' => '2X',
                'session_label' => 'Sesi',
                'price' => 'Rp 399.000',
                'image' => 'assets/image/bim-img.png',
            ],
            [
                'title' => 'Pelatihan BIM+',
                'desc' =>
                    'Paket lengkap BIM: Tekla, Revit, Ms. Project, dan perhitungan RAB digital dalam satu alur kerja proyek nyata.',
                'badges' => ['Tekla', 'Revit', 'Ms. Project', 'RAB'],
                'session' => '3X',
                'session_label' => 'Sesi',
                'price' => 'Rp 499.000',
                'image' => 'assets/image/bim-img.png',
            ],
        ];

        $steps = [
            [
                'number' => '1',
                'title' => 'Pilih / Login',
                'desc' => 'Pilih paket dan login/daftar akun Sipilsaku',
                'icon' => 'assets/icon/icon-login-orange.png',
            ],
            [
                'number' => '2',
                'title' => 'Checkout',
                'desc' => 'Isi data dan upload bukti transfer',
                'icon' => 'assets/icon/icon-cart.png',
            ],
            [
                'number' => '3',
                'title' => 'Konfirmasi WA',
                'desc' => 'Kirim info pesanan ke WA admin kami',
                'icon' => 'assets/icon/icon-wa.png',
            ],
            [
                'number' => '4',
                'title' => 'Kelas Saya',
                'desc' => 'Pantau pesanan Anda di Dashboard Pelanggan',
                'icon' => 'assets/icon/icon-bookmark.png',
            ],
        ];

        $videoTabs = [
            ['name' => 'Civil 3D', 'locked' => true],
            ['name' => 'SAP2000', 'locked' => false],
            ['name' => 'Pelatihan BIM', 'locked' => true],
        ];

        $videos = [
            [
                'title' => 'Beton Part 1',
                'duration' => '30 Menit',
                'thumbnail' => 'assets/image/thumbnail-1.jpg',
            ],
            [
                'title' => 'Beton Part 2',
                'duration' => '30 Menit',
                'thumbnail' => 'assets/image/thumbnail-2.jpg',
            ],
            [
                'title' => 'Beton Part 3',
                'duration' => '30 Menit',
                'thumbnail' => 'assets/image/thumbnail-3.jpg',
            ],
        ];
    @endphp

    {{-- HERO --}}
    <section class="relative overflow-hidden">
        <img src="{{ asset('assets/image/course-bg.png') }}" alt=""
            class="absolute inset-0 h-full w-full object-cover object-center" aria-hidden="true">

        <div class="absolute inset-0 bg-black/55"></div>

        <div class="relative mx-auto min-h-[620px] max-w-[1440px] px-6 pb-24 pt-20 lg:px-8 lg:pt-24">
            <div class="mx-auto mt-10 max-w-[760px] text-center lg:mt-16">
                <h1 class="font-heading text-[42px] font-bold leading-[1.08] text-white sm:text-[56px] lg:text-[68px]">
                    Pilih Kursus yang<br>
                    Sesuai Karir Anda
                </h1>

                <p class="mx-auto mt-5 max-w-[700px] text-sm leading-7 text-white/85 sm:text-[15px]">
                    Pilih paket kursus spesialis teknik sipil, daftar online, dan kelola semua
                    dari Dashboard Kelas Saya.
                </p>

                <div class="mt-10 flex items-center justify-center gap-8 sm:gap-12">
                    {{-- LEFT --}}
                    <div class="text-center">
                        <p class="text-[26px] font-bold leading-none text-white sm:text-[32px]">3 Paket</p>
                        <p class="mt-2 text-sm text-white/85">Spesialis</p>
                    </div>

                    {{-- DIVIDER --}}
                    <div class="h-20 w-px bg-white/40"></div>

                    {{-- RIGHT --}}
                    <div class="text-center">
                        <p class="text-[26px] font-bold leading-none text-white sm:text-[32px]">Interaktif</p>
                        <p class="mt-2 text-sm text-white/85">Via Zoom/Meet</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none">
            <svg viewBox="0 0 1440 110" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"
                class="block h-[95px] w-full">
                <path d="M0,70 C240,30 480,15 720,50 C980,90 1200,115 1440,35 L1440,120 L0,120 Z" fill="#F3F3F3" />
            </svg>
        </div>
    </section>

    {{-- PAKET YANG TERSEDIA --}}
    <section class="bg-[#F3F3F3] py-16 lg:py-20">
        <div class="mx-auto max-w-[1240px] px-6 lg:px-8">
            <div class="text-center">
                <h2 class="font-heading text-[40px] font-bold text-[#D89A53] md:text-[56px]">
                    Paket Yang Tersedia
                </h2>
                <p class="mt-4 text-sm text-[#2F241B]">
                    Pilih salah satu program kami di bawah ini.
                </p>
            </div>

            <div class="mt-12 flex items-center justify-center gap-4 lg:gap-8">
                {{-- Arrow left --}}
                <button id="coursePrev"
                    class="cursor-pointer flex h-10 w-10 shrink-0 items-center justify-center rounded-full border border-[#D4904A]/20 bg-[#F5EDE3] text-[#D4904A] shadow-sm transition duration-300 hover:-translate-y-0.5 hover:bg-[#D4904A] hover:text-white">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>

                {{-- Slider wrapper --}}
                <div class="min-w-0 flex-1 overflow-hidden" id="courseSlider">
                    <div class="flex gap-8 transition-transform duration-500 ease-in-out" id="courseTrack">
                        @foreach ($courses as $course)
                            <div class="course-slide w-full shrink-0 md:w-[calc(50%-16px)] xl:w-[calc(33.333%-21.333px)]">
                                <article
                                    class="overflow-hidden rounded-[22px] border border-[2px] border-[#4d371f] bg-[#D4904A] shadow-[0_10px_18px_rgba(0,0,0,0.10)]">
                                    <div class="flex h-[450px] flex-col px-6 pb-5 pt-6">
                                        {{-- TOP --}}
                                        <div>
                                            <h3 class="text-[28px] font-bold leading-none text-white">
                                                {{ $course['title'] }}
                                            </h3>

                                            <div class="mt-4 h-px w-full bg-black/55"></div>

                                            <p class="mt-4 max-w-[92%] text-[13px] leading-[1.5] text-white">
                                                {{ $course['desc'] }}
                                            </p>

                                            <div class="mt-4 flex max-w-[82%] flex-wrap gap-2">
                                                @foreach ($course['badges'] as $badge)
                                                    <span
                                                        class="rounded-[6px] bg-[#F7ECDD] px-2.5 py-1 text-[10px] leading-none text-[#6D533E]">
                                                        {{ $badge }}
                                                    </span>
                                                @endforeach
                                            </div>
                                        </div>

                                        {{-- MIDDLE --}}
                                        <div class="relative mt-5 flex-1">
                                            <div
                                                class="flex h-[72px] w-[66px] flex-col items-center justify-center rounded-[12px] border border-2 border-black">
                                                <span class="text-[20px] font-extrabold leading-none text-black">
                                                    {{ $course['session'] }}
                                                </span>
                                                <span class="mt-1 text-[11px] leading-none text-black">
                                                    {{ $course['session_label'] }}
                                                </span>
                                            </div>

                                            @if ($course['title'] === 'Civil 3D')
                                                <img src="{{ asset($course['image']) }}" alt="{{ $course['title'] }}"
                                                    class="absolute bottom-[-80px] right-[-80px] h-[200px] w-auto object-contain opacity-75">
                                            @elseif ($course['title'] === 'SAP2000')
                                                <img src="{{ asset($course['image']) }}" alt="{{ $course['title'] }}"
                                                    class="absolute bottom-[8px] right-[-20px] h-[58px] w-auto object-contain">
                                            @else
                                                <img src="{{ asset($course['image']) }}" alt="{{ $course['title'] }}"
                                                    class="absolute bottom-[-30px] right-[0px] h-[150px] w-auto object-contain">
                                            @endif
                                        </div>

                                        {{-- BOTTOM --}}
                                        <div class="mt-5">
                                            <p class="text-[13px] text-[#FFF4E8]">Mulai dari:</p>

                                            <p
                                                class="mt-1 text-[24px] font-extrabold leading-none text-black sm:text-[26px]">
                                                {{ $course['price'] }}
                                            </p>

                                            <button type="button"
                                                class="open-course-modal mt-5 flex h-[48px] w-full items-center justify-center gap-2 rounded-[10px] bg-[#F5EFE8] text-[18px] font-bold text-[#D4904A] transition hover:bg-white"
                                                data-title="{{ $course['title'] }}" data-desc="{{ $course['desc'] }}"
                                                data-price="{{ $course['price'] }}"
                                                data-session="{{ $course['session'] }} {{ $course['session_label'] }}"
                                                data-image="{{ asset($course['image']) }}"
                                                data-badges='@json($course['badges'])'>
                                                Lihat Kursus
                                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor" stroke-width="2.4">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Arrow right --}}
                <button id="courseNext"
                    class="cursor-pointer flex h-10 w-10 shrink-0 items-center justify-center rounded-full border border-[#D4904A]/20 bg-[#F5EDE3] text-[#D4904A] shadow-sm transition duration-300 hover:-translate-y-0.5 hover:bg-[#D4904A] hover:text-white">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>

            {{-- dots --}}
            <div class="mt-5 flex justify-center gap-2" id="courseDots"></div>
        </div>
    </section>

    {{-- COURSE MODAL --}}
    <div id="courseModal"
        class="pointer-events-none fixed inset-0 z-[999] flex items-center justify-center bg-black/50 px-4 opacity-0 transition duration-300">
        <div id="courseModalPanel"
            class="w-full max-w-[920px] scale-95 overflow-hidden rounded-[24px] bg-[#FAF6F2] shadow-2xl transition duration-300">
            <button type="button" id="closeCourseModal"
                class="absolute right-4 top-4 z-20 flex h-10 w-10 items-center justify-center rounded-full bg-[#F5EDE3] text-[#D4904A] shadow-md transition hover:bg-[#D4904A] hover:text-white">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <div class="grid md:grid-cols-[0.95fr_1.05fr]">
                {{-- left --}}
                <div class="relative bg-[#D4904A] p-8">
                    <div class="flex h-full min-h-[320px] items-center justify-center">
                        <img id="modalCourseImage" src="" alt="Course Image"
                            class="max-h-[250px] w-auto object-contain">
                    </div>
                </div>

                {{-- right --}}
                <div class="p-8">
                    <p class="text-sm font-medium uppercase tracking-[0.18em] text-[#D4904A]">
                        Detail Kursus
                    </p>

                    <h3 id="modalCourseTitle"
                        class="mt-3 font-heading text-[34px] font-bold leading-tight text-[#2B2118]">
                        Judul Kursus
                    </h3>

                    <div class="mt-4 h-px w-full bg-[#D7B18A]"></div>

                    <p id="modalCourseDesc" class="mt-5 text-[15px] leading-7 text-[#5D4A3A]">
                        Deskripsi kursus.
                    </p>

                    <div class="mt-5">
                        <p class="text-sm font-semibold text-[#2B2118]">Materi / Topik:</p>
                        <div id="modalCourseBadges" class="mt-3 flex flex-wrap gap-2"></div>
                    </div>

                    <div class="mt-6 grid grid-cols-2 gap-4">
                        <div class="rounded-[14px] bg-[#F4E7D7] px-4 py-4">
                            <p class="text-xs uppercase tracking-[0.12em] text-[#8B6A4B]">Durasi / Sesi</p>
                            <p id="modalCourseSession" class="mt-2 text-[18px] font-bold text-[#2B2118]">2X Sesi</p>
                        </div>

                        <div class="rounded-[14px] bg-[#F4E7D7] px-4 py-4">
                            <p class="text-xs uppercase tracking-[0.12em] text-[#8B6A4B]">Harga</p>
                            <p id="modalCoursePrice" class="mt-2 text-[22px] font-extrabold text-[#D4904A]">Rp 199.000</p>
                        </div>
                    </div>

                    <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                        <a id="modalBuyButton" href="#"
                            class="inline-flex h-[48px] flex-1 items-center justify-center rounded-[12px] bg-[#D4904A] px-6 text-[16px] font-bold text-white transition hover:bg-[#c7833e]">
                            Beli Sekarang
                        </a>

                        <button type="button" id="closeCourseModalSecondary"
                            class="inline-flex h-[48px] flex-1 items-center justify-center rounded-[12px] border border-[#D4904A] px-6 text-[16px] font-bold text-[#D4904A] transition hover:bg-[#fff7ef]">
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- VIDEO PEMBELAJARAN --}}
    <section class="bg-[#EFEFEF] py-16 lg:py-20">
        <div class="mx-auto max-w-[1240px] px-6 lg:px-8">
            <div class="text-center">
                <h2 class="font-heading text-[40px] font-bold text-[#D89A53] md:text-[56px]">
                    Video Pembelajaran
                </h2>
            </div>

            @if (!$isLoggedIn)
                <div
                    class="mx-auto mt-14 flex max-w-[460px] items-center justify-center rounded-[16px] bg-white px-8 py-14 shadow-sm">
                    <div class="text-center">
                        <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-[12px]">

                            <img src="{{ asset('assets/icon/icon-web-lock.png') }}" alt="Lock Icon"
                                class="object-contain">

                        </div>

                        <p class="mx-auto mt-6 max-w-[320px] text-[20px] leading-8 text-[#4E4034]">
                            Untuk dapat mengakses video, silahkan mengikuti kursus terlebih dahulu.
                        </p>
                    </div>
                </div>
            @else
                <div class="mx-auto mt-14 max-w-[1060px]">
                    {{-- top controls --}}
                    <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                        <div class="flex flex-wrap items-center gap-3">
                            @foreach ($videoTabs as $tab)
                                <button
                                    class="relative flex h-[36px] min-w-[110px] flex-col items-center justify-center rounded-[6px] border px-4 text-[13px] font-semibold leading-none shadow-sm
                                    {{ !$tab['locked'] ? 'bg-[#D89A53] text-black border-[#7A5B3C]' : 'bg-[#A9A9A9] text-[#3D3128] border-[#7A5B3C] opacity-80' }}">

                                    {{-- icon lock --}}
                                    @if ($tab['locked'])
                                        <img src="{{ asset('assets/icon/icon-lock.png') }}" alt="Locked"
                                            class="absolute top-[6px] left-1/2 z-10 h-5 w-5 -translate-x-1/2 object-contain">
                                    @endif

                                    {{-- text --}}
                                    <span class="relative z-0 mt-[2px] {{ $tab['locked'] ? 'opacity-80' : '' }}">
                                        {{ $tab['name'] }}
                                    </span>
                                </button>
                            @endforeach
                        </div>

                        <div class="relative w-full lg:w-[390px]">
                            <input type="text"
                                class="h-[34px] w-full rounded-[4px] border border-[#8C7967] bg-white px-3 pr-10 text-[13px] text-[#3D3128] outline-none"
                                placeholder="">
                            <button
                                class="absolute right-0 top-0 flex h-[34px] w-[34px] items-center justify-center border-l border-[#8C7967] text-[#6F5B4A]">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m21 21-4.35-4.35m1.85-5.15a7 7 0 1 1-14 0a7 7 0 0 1 14 0Z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    {{-- video list wrapper --}}
                    <div class="mt-3 border-y border-[#8C8C8C] py-3">
                        <div class="max-h-[360px] overflow-y-auto pr-2">
                            <div class="space-y-5">
                                @foreach ($videos as $video)
                                    <div class="rounded-[8px] bg-[#EADBC8] p-3">
                                        <div class="flex items-center gap-20">
                                            <div
                                                class="h-[96px] w-[128px] shrink-0 overflow-hidden rounded-[6px] bg-[#F2F2F2]">
                                                @if (!empty($video['thumbnail']))
                                                    <img src="{{ asset($video['thumbnail']) }}"
                                                        alt="{{ $video['title'] }}" class="h-full w-full object-cover">
                                                @endif
                                            </div>

                                            <div class="min-w-0">
                                                <h3 class="font-heading text-[22px] font-bold leading-none text-black">
                                                    {{ $video['title'] }}
                                                </h3>
                                                <p class="mt-5 text-[16px] text-black">
                                                    {{ $video['duration'] }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>

    {{-- ALUR PENDAFTARAN --}}
    <section class="relative overflow-hidden bg-[#D4904A] py-16 lg:py-20 lg:pb-50">
        <div class="mx-auto max-w-[1240px] px-6 lg:px-8">
            <div class="text-center">
                <h2 class="font-heading text-[42px] font-bold leading-none text-white md:text-[58px]">
                    Alur Pendaftaran
                </h2>

                <p class="mx-auto mt-6 max-w-[620px] text-[15px] leading-7 text-white/90">
                    Ikuti 4 langkah praktis untuk mulai tingkatkan skill konstruksi Anda
                    bersama Sipilsaku.
                </p>
            </div>

            <div class="mt-14 grid grid-cols-1 gap-y-10 md:grid-cols-2 xl:grid-cols-4 xl:gap-x-8">
                @foreach ($steps as $index => $step)
                    <div class="relative text-center text-white">
                        {{-- line connector --}}
                        @if ($index < count($steps) - 1)
                            <div
                                class="absolute top-[29px] left-[74%] hidden h-px w-[50%] translate-x-6 bg-white/40 xl:block">
                            </div>
                        @endif

                        {{-- icon + number --}}
                        <div class="relative mx-auto w-fit">
                            <div
                                class="flex h-[68px] w-[68px] items-center justify-center rounded-full bg-[#F7EFE5] shadow-[0_4px_10px_rgba(0,0,0,0.18)]">
                                <img src="{{ asset($step['icon']) }}" alt="{{ $step['title'] }}"
                                    class="h-8 w-8 object">
                            </div>

                            <div
                                class="absolute -right-[14px] top-1/2 flex h-[38px] w-[38px] -translate-y-1/2 items-center justify-center rounded-full bg-[#F3E2CC] text-[19px] font-bold text-[#6B4A29] shadow-[0_4px_8px_rgba(0,0,0,0.18)]">
                                {{ $step['number'] }}
                            </div>
                        </div>

                        {{-- text --}}
                        <h3 class="mt-4 text-[20px] font-semibold leading-none text-white md:text-[22px]">
                            {{ $step['title'] }}
                        </h3>

                        <p class="mx-auto mt-3 max-w-[230px] text-[13px] leading-6 text-white/92">
                            {{ $step['desc'] }}
                        </p>
                    </div>
                @endforeach
            </div>

            <div class="mt-14 text-center">
                <a href="https://wa.me/6281234567890"
                    class="inline-flex items-center gap-2 rounded-full bg-white px-12 py-4 text-sm font-semibold text-[#D4904A] shadow-lg shadow-[#D4904A]/30 transition hover:bg-[#f4f4f4]">
                    Hubungi Admin
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
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
    @vite('resources/js/course-carousel.js')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const modal = document.getElementById('courseModal');
            const panel = document.getElementById('courseModalPanel');
            const openButtons = document.querySelectorAll('.open-course-modal');
            const closeButton = document.getElementById('closeCourseModal');
            const closeButtonSecondary = document.getElementById('closeCourseModalSecondary');

            const modalTitle = document.getElementById('modalCourseTitle');
            const modalDesc = document.getElementById('modalCourseDesc');
            const modalPrice = document.getElementById('modalCoursePrice');
            const modalSession = document.getElementById('modalCourseSession');
            const modalImage = document.getElementById('modalCourseImage');
            const modalBadges = document.getElementById('modalCourseBadges');
            const modalBuyButton = document.getElementById('modalBuyButton');

            if (!modal || !panel || !openButtons.length) return;

            function openModal(button) {
                const title = button.dataset.title || '';
                const desc = button.dataset.desc || '';
                const price = button.dataset.price || '';
                const session = button.dataset.session || '';
                const image = button.dataset.image || '';
                const badges = JSON.parse(button.dataset.badges || '[]');

                modalTitle.textContent = title;
                modalDesc.textContent = desc;
                modalPrice.textContent = price;
                modalSession.textContent = session;
                modalImage.src = image;
                modalImage.alt = title;

                modalBadges.innerHTML = '';
                badges.forEach((badge) => {
                    const span = document.createElement('span');
                    span.className =
                        'rounded-[8px] bg-[#F8EBDC] px-3 py-1.5 text-[12px] font-medium text-[#6D533E]';
                    span.textContent = badge;
                    modalBadges.appendChild(span);
                });

                // 🔥 FIX SHIFT
                const scrollbarWidth = window.innerWidth - document.documentElement.clientWidth;
                document.body.style.paddingRight = scrollbarWidth + 'px';

                document.body.classList.add('overflow-hidden');

                modal.classList.remove('pointer-events-none', 'opacity-0');
                panel.classList.remove('scale-95');
                panel.classList.add('scale-100');
            }

            function closeModal() {
                modal.classList.add('pointer-events-none', 'opacity-0');
                panel.classList.remove('scale-100');
                panel.classList.add('scale-95');

                document.body.classList.remove('overflow-hidden');

                // 🔥 reset padding
                document.body.style.paddingRight = '';
            }

            openButtons.forEach((button) => {
                button.addEventListener('click', () => openModal(button));
            });

            closeButton?.addEventListener('click', closeModal);
            closeButtonSecondary?.addEventListener('click', closeModal);

            modal.addEventListener('click', (e) => {
                if (e.target === modal) closeModal();
            });

            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape') closeModal();
            });
        });
    </script>
@endpush
