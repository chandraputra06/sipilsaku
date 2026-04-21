@extends('layouts.app')

@section('content')
    @php
        $values = [
            [
                'title' => 'Praktis & Relevan',
                'desc' =>
                    'Materi dirancang berdasarkan kebutuhan nyata di dunia kerja teknik sipil, bukan sekadar teori.',
            ],
            [
                'title' => 'Mentor Berpengalaman',
                'desc' => 'Belajar langsung dari praktisi yang telah terlibat dalam proyek infrastruktur dan bangunan.',
            ],
            [
                'title' => 'Siap Pakai di Industri',
                'desc' =>
                    'Setiap topik diarahkan agar peserta mampu menerapkan software dan metode kerja pada proyek nyata.',
            ],
        ];

        $stats = [
            ['number' => '2.400+', 'label' => 'Peserta Aktif'],
            ['number' => '5+', 'label' => 'Mentor Praktisi'],
            ['number' => '98%', 'label' => 'Tingkat Kepuasan'],
            ['number' => '150+', 'label' => 'Alumni Bertumbuh'],
        ];

        $person = [
            [
                'name' => 'Angger Pratama',
                'role' => 'Senior Engineer',
                'desc' => 'Berpengalaman dalam perencanaan dan pelaksanaan proyek infrastruktur jalan dan drainase.',
                'image' => 'assets/image/team-1.png',
            ],
            [
                'name' => 'Arimantara',
                'role' => 'Structural Engineer',
                'desc' => 'Fokus pada analisis dan desain struktur bangunan dengan pendekatan yang efisien dan aman.',
                'image' => 'assets/image/team-2.png',
            ],
            [
                'name' => 'Bagaskara',
                'role' => 'Construction Planner',
                'desc' => 'Berpengalaman dalam manajemen proyek konstruksi dan pengendalian waktu pelaksanaan.',
                'image' => 'assets/image/team-3.png',
            ],
            [
                'name' => 'Eka Juniarta',
                'role' => 'Project Engineer',
                'desc' =>
                    'Terlibat dalam berbagai proyek konstruksi dengan fokus pada koordinasi dan implementasi lapangan.',
                'image' => 'assets/image/team-4.png',
            ],
        ];

    @endphp

    {{-- HERO --}}
    <section class="relative overflow-hidden bg-[#FAF6F2] py-16 lg:py-20">

        {{-- Ornamen kiri --}}
        <div class="pointer-events-none absolute left-0 top-0 opacity-30">
            <div
                class="absolute -left-[70px] -top-[40px] h-[220px] w-[220px] rounded-[90px] border-[40px] border-[#D89A53]/30 rotate-[35deg] lg:h-[280px] lg:w-[280px] lg:border-[46px]">
            </div>
        </div>

        {{-- Ornamen kanan --}}
        <div class="pointer-events-none absolute right-0 top-0 opacity-30">
            <div
                class="absolute -right-[40px] -top-[20px] h-[220px] w-[220px] rounded-[90px] border-[40px] border-[#D89A53]/30 rotate-[35deg] lg:h-[280px] lg:w-[280px] lg:border-[46px]">
            </div>
        </div>

        <div class="relative mx-auto max-w-[1240px] px-6 text-center lg:px-8">
            <h1 class="font-heading text-[44px] font-bold text-[#2B2118] sm:text-[60px] lg:text-[72px]">
                Tentang Kami
            </h1>
            <div class="mx-auto h-[2px] w-[120px] bg-[#D89A53]"></div>

            <p class="mx-auto mt-5 max-w-[640px] text-sm leading-7 text-[#6B5C4E] sm:text-[15px]">
                Mengenal lebih dekat Sipilsaku sebagai platform pembelajaran teknik sipil
                yang berfokus pada praktik, relevansi industri, dan pengembangan karir.
            </p>
        </div>
    </section>

    {{-- SIAPA KAMI --}}
    <section class="bg-[#FAF6F2] py-16 lg:py-20">
        <div class="mx-auto grid max-w-[1240px] items-center gap-12 px-6 lg:grid-cols-[1.05fr_0.95fr] lg:px-8">
            <div>
                <h2 class="mt-4 font-heading text-[38px] font-bold leading-tight text-[#2B2118] md:text-[50px]">
                    Sipilsaku adalah ruang belajar digital untuk perkembangan karir teknik sipil.
                </h2>

                <p class="mt-6 text-sm leading-7 text-[#5E4C3D] sm:text-[15px]">
                    Kami percaya bahwa pembelajaran teknik sipil harus lebih dekat dengan dunia kerja.
                    Karena itu, Sipilsaku dirancang sebagai jembatan antara teori, software, dan
                    praktik profesional yang benar-benar digunakan di lapangan.
                </p>

                <p class="mt-4 text-sm leading-7 text-[#5E4C3D] sm:text-[15px]">
                    Melalui kursus yang fokus, mentor berpengalaman, dan studi kasus yang relevan,
                    kami membantu peserta membangun kompetensi yang lebih aplikatif dan bernilai
                    untuk masa depan karir mereka.
                </p>
            </div>

            <div class="relative">
                <div class="overflow-hidden rounded-[26px] shadow-[0_16px_35px_rgba(0,0,0,0.10)]">
                    <img src="{{ asset('assets/image/siapa-kami.jpg') }}" alt="Tentang Sipilsaku"
                        class="h-[420px] w-full object-cover">
                </div>

                <div class="absolute -bottom-6 -left-4 rounded-[18px] bg-[#D89A53] px-6 py-5 shadow-xl">
                    <p class="font-heading text-[32px] font-bold leading-none text-white">Praktis</p>
                    <p class="mt-2 text-sm text-white/90">Materi relevan untuk kebutuhan industri</p>
                </div>
            </div>
        </div>
    </section>

    {{-- STATISTIK --}}
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

    {{-- VISI MISI --}}
    <section class="bg-[#FAF6F2] py-16 lg:py-20">
        <div class="mx-auto max-w-[1240px] px-6 lg:px-8">

            {{-- Heading --}}
            <div class="text-center">
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-[#D89A53]">
                    Visi & Misi
                </p>

                <h2 class="mt-4 font-heading text-[38px] font-bold text-[#2B2118] md:text-[52px]">
                    Arah dan Tujuan Kami
                </h2>

                <p class="mx-auto mt-5 max-w-[640px] text-sm leading-7 text-[#5E4C3D] sm:text-[15px]">
                    Kami memiliki visi dan misi yang jelas untuk membangun ekosistem pembelajaran
                    teknik sipil yang relevan dengan kebutuhan industri modern.
                </p>
            </div>

            {{-- Content --}}
            <div class="mt-12 grid gap-8 lg:grid-cols-2">

                {{-- VISI --}}
                <div
                    class="relative overflow-hidden rounded-[26px] bg-white px-8 py-8 shadow-[0_12px_28px_rgba(0,0,0,0.06)]">

                    {{-- Accent --}}
                    <div class="absolute left-0 top-0 h-full w-[6px] bg-[#D89A53]"></div>

                    <h3 class="font-heading text-[30px] font-bold text-[#2B2118]">
                        Visi
                    </h3>

                    <p class="mt-5 text-sm leading-7 text-[#5E4C3D] sm:text-[15px]">
                        Menjadi platform pembelajaran teknik sipil yang terpercaya dalam
                        membantu mahasiswa dan praktisi mengembangkan keterampilan yang relevan
                        dengan kebutuhan industri konstruksi modern.
                    </p>
                </div>

                {{-- MISI --}}
                <div
                    class="relative overflow-hidden rounded-[26px] bg-white px-8 py-8 shadow-[0_12px_28px_rgba(0,0,0,0.08)]">

                    {{-- Accent --}}
                    <div class="absolute left-0 top-0 h-full w-[6px] bg-[#D89A53]"></div>

                    <h3 class="font-heading text-[30px] font-bold text-[#2B2118]">
                        Misi
                    </h3>

                    <ul class="mt-5 space-y-2 pb-10">
                        <li class="flex gap-3">
                            <span class="mt-[7px] h-2.5 w-2.5 rounded-full bg-[#2B2118]"></span>
                            <p class="text-sm leading-7 text-[#2B2118] sm:text-[15px]">
                                Menyediakan pembelajaran software teknik sipil yang praktis dan aplikatif.
                            </p>
                        </li>

                        <li class="flex gap-3">
                            <span class="mt-[7px] h-2.5 w-2.5 rounded-full bg-[#2B2118]"></span>
                            <p class="text-sm leading-7 text-[#2B2118] sm:text-[15px]">
                                Menghadirkan mentor berpengalaman dari dunia industri.
                            </p>
                        </li>

                        <li class="flex gap-3">
                            <span class="mt-[7px] h-2.5 w-2.5 rounded-full bg-[#2B2118]"></span>
                            <p class="text-sm leading-7 text-[#2B2118] sm:text-[15px]">
                                Membantu peserta memahami alur kerja proyek nyata.
                            </p>
                        </li>

                        <li class="flex gap-3">
                            <span class="mt-[7px] h-2.5 w-2.5 rounded-full bg-[#2B2118]"></span>
                            <p class="text-sm leading-7 text-[#2B2118] sm:text-[15px]">
                                Meningkatkan kesiapan kerja di bidang konstruksi dan infrastruktur.
                            </p>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </section>

    {{-- NILAI KAMI --}}
    <section class="bg-white py-16 lg:py-20">
        <div class="mx-auto max-w-[1240px] px-6 lg:px-8">
            <div class="text-center">
                <h2 class="mt-4 font-heading text-[38px] font-bold text-[#2B2118] md:text-[52px]">
                    Prinsip yang Kami Bawa
                </h2>
                <p class="mx-auto mt-5 max-w-[640px] text-sm leading-7 text-[#5E4C3D] sm:text-[15px]">
                    Setiap program dirancang dengan pendekatan yang bertujuan memberikan manfaat nyata
                    bagi proses belajar dan perkembangan karir peserta.
                </p>
            </div>

            <div class="mt-12 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
                @foreach ($values as $value)
                    <div
                        class="rounded-[24px] border border-[#E7D7C7] bg-[#FFF9F3] px-7 py-8 shadow-[0_10px_24px_rgba(0,0,0,0.05)]">
                        <h3 class="mt-6 font-heading text-[28px] font-bold text-[#2B2118]">
                            {{ $value['title'] }}
                        </h3>

                        <p class="mt-4 text-sm leading-7 text-[#5E4C3D] sm:text-[15px]">
                            {{ $value['desc'] }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- TIM / MENTOR --}}
    <section class="bg-[#FAF6F2] py-16 lg:py-20">
        <div class="mx-auto max-w-[1240px] px-6 lg:px-8">

            {{-- Heading --}}
            <div class="text-center">
                <h2 class="font-heading text-[38px] font-bold text-[#2B2118] md:text-[52px]">
                    Tim Kami
                </h2>

                <p class="mx-auto mt-5 max-w-[640px] text-sm leading-7 text-[#5E4C3D] sm:text-[15px]">
                    Tim kami terdiri dari praktisi yang berpengalaman di bidang teknik sipil
                    dan konstruksi, dengan latar belakang proyek nyata di berbagai sektor.
                </p>
            </div>

            {{-- Cards --}}
            <div class="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($person as $p)
                    <article
                        class="rounded-[22px] border border-[#E7D7C7] bg-white px-6 py-6 shadow-[0_8px_20px_rgba(0,0,0,0.05)] transition duration-300 hover:-translate-y-1 hover:shadow-[0_12px_28px_rgba(0,0,0,0.08)]">

                        {{-- TOP --}}
                        <div class="flex items-center gap-4">

                            {{-- Avatar --}}
                            <div
                                class="flex h-[64px] w-[64px] shrink-0 items-center justify-center rounded-[18px] bg-[#D89A53] text-[22px] font-bold text-white">
                                {{ strtoupper(substr($p['name'], 0, 1)) }}
                            </div>

                            {{-- Info --}}
                            <div class="min-w-0">
                                <h3 class="truncate text-[18px] font-bold text-[#2B2118]">
                                    {{ $p['name'] }}
                                </h3>

                                <p class="mt-1 text-[14px] font-medium text-[#8A7060]">
                                    {{ $p['role'] }}
                                </p>
                            </div>
                        </div>

                        {{-- Divider --}}
                        <div class="mt-5 h-px w-full bg-[#E7D7C7]"></div>

                        {{-- Bottom --}}
                        @if (!empty($p['desc']))
                            <p class="mt-5 text-[14px] leading-7 text-[#6B5C4E]">
                                {{ $p['desc'] }}
                            </p>
                        @endif

                    </article>
                @endforeach
            </div>

        </div>
    </section>

    {{-- CTA --}}
    <section class="relative overflow-hidden bg-[#D89A53] py-16 pb-24 lg:py-20 lg:pb-40">
        <div class="mx-auto max-w-[920px] px-6 text-center lg:px-8">
            <h2 class="font-heading text-[40px] font-bold leading-tight text-white md:text-[56px]">
                Siap Bertumbuh Bersama Sipilsaku?
            </h2>

            <p class="mx-auto mt-5 max-w-[700px] text-sm leading-7 text-white/90 sm:text-[15px]">
                Mulai perjalanan belajar Anda dengan program yang dirancang untuk memperkuat
                skill software, pemahaman proyek, dan kesiapan profesional di bidang teknik sipil.
            </p>

            <div class="mt-8 flex flex-wrap items-center justify-center gap-3">
                <a href="{{ url('/courses') }}"
                    class="inline-flex items-center gap-2 rounded-full bg-white px-10 py-3.5 text-sm font-semibold text-[#2B2118] shadow-md transition hover:bg-[#FAF3EC]">
                    Pilih Kursus
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </a>

                <a href="{{ url('/contact') }}"
                    class="inline-flex items-center gap-2 rounded-full border border-white/70 px-10 py-3.5 text-sm font-semibold text-white transition hover:bg-white/10">
                    Konsultasi
                </a>
            </div>
        </div>

        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none">
            <svg viewBox="0 0 1440 70" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"
                class="block h-[60px] w-full">
                <path d="M0,35 C360,70 720,0 1080,35 C1260,52 1380,28 1440,35 L1440,70 L0,70 Z" fill="#FAF6F2" />
            </svg>
        </div>
    </section>
@endsection
