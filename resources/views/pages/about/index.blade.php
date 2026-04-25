@extends('layouts.app')

@section('title', 'Tentang Kami')

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
    <section class="relative overflow-hidden bg-[#FAF6F2] py-12 sm:py-14 lg:py-20">
        <div class="pointer-events-none absolute left-0 top-0 opacity-20 sm:opacity-30">
            <div
                class="absolute -left-[56px] -top-[34px] h-[150px] w-[150px] rounded-[70px] border-[28px] border-[#D89A53]/30 rotate-[35deg] sm:-left-[70px] sm:-top-[40px] sm:h-[220px] sm:w-[220px] sm:rounded-[90px] sm:border-[40px] lg:h-[280px] lg:w-[280px] lg:border-[46px]">
            </div>
        </div>

        <div class="pointer-events-none absolute right-0 top-0 opacity-20 sm:opacity-30">
            <div
                class="absolute -right-[30px] -top-[12px] h-[150px] w-[150px] rounded-[70px] border-[28px] border-[#D89A53]/30 rotate-[35deg] sm:-right-[40px] sm:-top-[20px] sm:h-[220px] sm:w-[220px] sm:rounded-[90px] sm:border-[40px] lg:h-[280px] lg:w-[280px] lg:border-[46px]">
            </div>
        </div>

        <div data-animate="fade-up" data-animate-duration="slow" data-animate-ease="smooth"
            class="relative mx-auto max-w-[1240px] px-5 text-center sm:px-6 lg:px-8">
            <h1 class="font-heading text-[34px] font-bold leading-none text-[#2B2118] sm:text-[48px] lg:text-[72px]">
                Tentang Kami
            </h1>

            <div class="mx-auto mt-4 h-[2px] w-[90px] bg-[#D89A53] sm:w-[120px]"></div>

            <p class="mx-auto mt-5 max-w-[640px] text-[14px] leading-7 text-[#6B5C4E] sm:text-[15px]">
                Mengenal lebih dekat Sipilsaku sebagai platform pembelajaran teknik sipil
                yang berfokus pada praktik, relevansi industri, dan pengembangan karir.
            </p>
        </div>
    </section>

    {{-- SIAPA KAMI --}}
    <section class="bg-[#FAF6F2] py-12 sm:py-14 lg:py-20">
        <div class="mx-auto grid max-w-[1240px] items-center gap-10 px-5 sm:px-6 lg:grid-cols-[1.05fr_0.95fr] lg:gap-12 lg:px-8">
            <div data-animate="fade-right" data-animate-duration="slow" data-animate-ease="smooth">
                <h2 class="mt-2 font-heading text-[28px] font-bold leading-tight text-[#2B2118] sm:text-[36px] lg:mt-4 lg:text-[50px]">
                    Sipilsaku adalah ruang belajar digital untuk perkembangan karir teknik sipil.
                </h2>

                <p class="mt-5 text-[14px] leading-7 text-[#5E4C3D] sm:text-[15px]">
                    Kami percaya bahwa pembelajaran teknik sipil harus lebih dekat dengan dunia kerja.
                    Karena itu, Sipilsaku dirancang sebagai jembatan antara teori, software, dan
                    praktik profesional yang benar-benar digunakan di lapangan.
                </p>

                <p class="mt-4 text-[14px] leading-7 text-[#5E4C3D] sm:text-[15px]">
                    Melalui kursus yang fokus, mentor berpengalaman, dan studi kasus yang relevan,
                    kami membantu peserta membangun kompetensi yang lebih aplikatif dan bernilai
                    untuk masa depan karir mereka.
                </p>
            </div>

            <div data-animate="fade-left" data-animate-delay="180ms" data-animate-duration="slow"
                data-animate-ease="smooth" class="relative pb-10 sm:pb-14">
                <div class="overflow-hidden rounded-[22px] shadow-[0_16px_35px_rgba(0,0,0,0.10)] sm:rounded-[26px]">
                    <img src="{{ asset('assets/image/siapa-kami.jpg') }}" alt="Tentang Sipilsaku"
                        class="h-[280px] w-full object-cover sm:h-[360px] lg:h-[420px]">
                </div>

                <div
                    class="absolute bottom-0 left-4 right-4 rounded-[16px] bg-[#D89A53] px-5 py-4 shadow-xl sm:-bottom-6 sm:left-6 sm:right-auto sm:max-w-[260px] sm:px-6 sm:py-5 sm:rounded-[18px]">
                    <p class="font-heading text-[24px] font-bold leading-none text-white sm:text-[32px]">Praktis</p>
                    <p class="mt-2 text-[13px] leading-6 text-white/90 sm:text-sm">
                        Materi relevan untuk kebutuhan industri
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- STATISTIK --}}
    <section class="bg-white">
        <div class="mx-auto max-w-[1240px] px-5 py-10 sm:px-6 sm:py-12 lg:px-8">
            <div class="grid grid-cols-2 gap-y-8 md:grid-cols-4 md:gap-y-0">
                @foreach ([['num' => '2.406+', 'label' => 'Mahasiswa Aktif', 'icon' => 'icon-mhs.png'], ['num' => '5', 'label' => 'Mentor Expert', 'icon' => 'icon-mentor.png'], ['num' => '98%', 'label' => 'Tingkat Kepuasan', 'icon' => 'icon-kepuasan.png'], ['num' => '150+', 'label' => 'Alumni Berhasil', 'icon' => 'icon-alumni.png']] as $stat)
                    <div data-animate="soft" data-animate-delay="{{ $loop->index * 180 }}ms"
                        data-animate-duration="slow" data-animate-ease="smooth"
                        class="relative flex min-h-[150px] flex-col items-center justify-center px-4 py-6 text-center md:px-6 md:py-8 {{ $loop->index < 3 ? 'md:border-r md:border-[#D9B387]' : '' }}">

                        <img src="{{ asset('assets/icon/' . $stat['icon']) }}" alt="" aria-hidden="true"
                            class="pointer-events-none absolute left-1/2 top-[44%] z-[1] h-[90px] w-[90px] -translate-x-1/2 -translate-y-1/2 object-contain opacity-[0.88] sm:h-[100px] sm:w-[100px] sm:opacity-[0.38] md:h-[108px] md:w-[108px] md:opacity-[0.32] lg:h-[118px] lg:w-[118px] lg:opacity-[0.28]">

                        <span
                            class="relative z-[2] font-heading text-[32px] font-extrabold leading-none text-[#111111] sm:text-[38px] md:text-[42px] lg:text-[48px]">
                            {{ $stat['num'] }}
                        </span>

                        <span class="relative z-[2] mt-3 text-[13px] font-medium leading-5 text-[#2B2118] sm:text-sm">
                            {{ $stat['label'] }}
                        </span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- VISI MISI --}}
    <section class="bg-[#FAF6F2] py-12 sm:py-14 lg:py-20">
        <div class="mx-auto max-w-[1240px] px-5 sm:px-6 lg:px-8">
            <div data-animate="fade-up" data-animate-duration="slow" data-animate-ease="smooth" class="text-center">
                <p class="text-[12px] font-semibold tracking-[0.16em] text-[#D89A53] sm:text-sm sm:tracking-[0.2em]">
                    Visi & Misi
                </p>

                <h2 class="mt-4 font-heading text-[30px] font-bold text-[#2B2118] sm:text-[38px] lg:text-[52px]">
                    Arah dan Tujuan Kami
                </h2>

                <p class="mx-auto mt-5 max-w-[640px] text-[14px] leading-7 text-[#5E4C3D] sm:text-[15px]">
                    Kami memiliki visi dan misi yang jelas untuk membangun ekosistem pembelajaran
                    teknik sipil yang relevan dengan kebutuhan industri modern.
                </p>
            </div>

            <div class="mt-10 grid gap-5 lg:mt-12 lg:grid-cols-2 lg:gap-8">
                <div data-animate="fade-right" data-animate-delay="120ms" data-animate-duration="slow"
                    data-animate-ease="smooth"
                    class="relative overflow-hidden rounded-[22px] bg-white px-6 py-6 shadow-[0_12px_28px_rgba(0,0,0,0.06)] sm:px-8 sm:py-8 sm:rounded-[26px]">
                    <div class="absolute left-0 top-0 h-full w-[5px] bg-[#D89A53] sm:w-[6px]"></div>

                    <h3 class="font-heading text-[24px] font-bold text-[#2B2118] sm:text-[30px]">
                        Visi
                    </h3>

                    <p class="mt-4 text-[14px] leading-7 text-[#5E4C3D] sm:mt-5 sm:text-[15px]">
                        Menjadi platform pembelajaran teknik sipil yang terpercaya dalam
                        membantu mahasiswa dan praktisi mengembangkan keterampilan yang relevan
                        dengan kebutuhan industri konstruksi modern.
                    </p>
                </div>

                <div data-animate="fade-left" data-animate-delay="240ms" data-animate-duration="slow"
                    data-animate-ease="smooth"
                    class="relative overflow-hidden rounded-[22px] bg-white px-6 py-6 shadow-[0_12px_28px_rgba(0,0,0,0.08)] sm:px-8 sm:py-8 sm:rounded-[26px]">
                    <div class="absolute left-0 top-0 h-full w-[5px] bg-[#D89A53] sm:w-[6px]"></div>

                    <h3 class="font-heading text-[24px] font-bold text-[#2B2118] sm:text-[30px]">
                        Misi
                    </h3>

                    <ul class="mt-4 space-y-3 sm:mt-5">
                        <li class="flex gap-3">
                            <span class="mt-[8px] h-2.5 w-2.5 shrink-0 rounded-full bg-[#2B2118]"></span>
                            <p class="text-[14px] leading-7 text-[#2B2118] sm:text-[15px]">
                                Menyediakan pembelajaran software teknik sipil yang praktis dan aplikatif.
                            </p>
                        </li>

                        <li class="flex gap-3">
                            <span class="mt-[8px] h-2.5 w-2.5 shrink-0 rounded-full bg-[#2B2118]"></span>
                            <p class="text-[14px] leading-7 text-[#2B2118] sm:text-[15px]">
                                Menghadirkan mentor berpengalaman dari dunia industri.
                            </p>
                        </li>

                        <li class="flex gap-3">
                            <span class="mt-[8px] h-2.5 w-2.5 shrink-0 rounded-full bg-[#2B2118]"></span>
                            <p class="text-[14px] leading-7 text-[#2B2118] sm:text-[15px]">
                                Membantu peserta memahami alur kerja proyek nyata.
                            </p>
                        </li>

                        <li class="flex gap-3">
                            <span class="mt-[8px] h-2.5 w-2.5 shrink-0 rounded-full bg-[#2B2118]"></span>
                            <p class="text-[14px] leading-7 text-[#2B2118] sm:text-[15px]">
                                Meningkatkan kesiapan kerja di bidang konstruksi dan infrastruktur.
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- NILAI KAMI --}}
    <section class="bg-white py-12 sm:py-14 lg:py-20">
        <div class="mx-auto max-w-[1240px] px-5 sm:px-6 lg:px-8">
            <div data-animate="fade-up" data-animate-duration="slow" data-animate-ease="smooth" class="text-center">
                <h2 class="mt-2 font-heading text-[30px] font-bold text-[#2B2118] sm:text-[38px] lg:text-[52px]">
                    Prinsip yang Kami Bawa
                </h2>
                <p class="mx-auto mt-5 max-w-[640px] text-[14px] leading-7 text-[#5E4C3D] sm:text-[15px]">
                    Setiap program dirancang dengan pendekatan yang bertujuan memberikan manfaat nyata
                    bagi proses belajar dan perkembangan karir peserta.
                </p>
            </div>

            <div class="mt-10 grid gap-5 md:grid-cols-2 xl:mt-12 xl:grid-cols-3 xl:gap-6">
                @foreach ($values as $value)
                    <div data-animate="fade-up" data-animate-delay="{{ $loop->index * 180 }}ms"
                        data-animate-duration="slow" data-animate-ease="smooth"
                        class="rounded-[20px] border border-[#E7D7C7] bg-[#FFF9F3] px-6 py-6 shadow-[0_10px_24px_rgba(0,0,0,0.05)] sm:px-7 sm:py-8 sm:rounded-[24px]">
                        <h3 class="font-heading text-[22px] font-bold text-[#2B2118] sm:mt-2 sm:text-[28px]">
                            {{ $value['title'] }}
                        </h3>

                        <p class="mt-4 text-[14px] leading-7 text-[#5E4C3D] sm:text-[15px]">
                            {{ $value['desc'] }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- TIM / MENTOR --}}
    <section class="bg-[#FAF6F2] py-12 sm:py-14 lg:py-20">
        <div class="mx-auto max-w-[1240px] px-5 sm:px-6 lg:px-8">
            <div data-animate="fade-up" data-animate-duration="slow" data-animate-ease="smooth" class="text-center">
                <h2 class="font-heading text-[30px] font-bold text-[#2B2118] sm:text-[38px] lg:text-[52px]">
                    Tim Kami
                </h2>

                <p class="mx-auto mt-5 max-w-[640px] text-[14px] leading-7 text-[#5E4C3D] sm:text-[15px]">
                    Tim kami terdiri dari praktisi yang berpengalaman di bidang teknik sipil
                    dan konstruksi, dengan latar belakang proyek nyata di berbagai sektor.
                </p>
            </div>

            <div class="mt-10 grid gap-5 md:grid-cols-2 lg:mt-12 lg:grid-cols-3 lg:gap-6">
                @foreach ($person as $p)
                    <article data-animate="fade-up" data-animate-delay="{{ $loop->index * 180 }}ms"
                        data-animate-duration="slow" data-animate-ease="smooth"
                        class="rounded-[20px] border border-[#E7D7C7] bg-white px-5 py-5 shadow-[0_8px_20px_rgba(0,0,0,0.05)] transition duration-300 hover:-translate-y-1 hover:shadow-[0_12px_28px_rgba(0,0,0,0.08)] sm:px-6 sm:py-6 sm:rounded-[22px]">

                        <div class="flex items-center gap-4">
                            <div
                                class="flex h-[56px] w-[56px] shrink-0 items-center justify-center rounded-[16px] bg-[#D89A53] text-[20px] font-bold text-white sm:h-[64px] sm:w-[64px] sm:rounded-[18px] sm:text-[22px]">
                                {{ strtoupper(substr($p['name'], 0, 1)) }}
                            </div>

                            <div class="min-w-0">
                                <h3 class="truncate text-[17px] font-bold text-[#2B2118] sm:text-[18px]">
                                    {{ $p['name'] }}
                                </h3>

                                <p class="mt-1 text-[13px] font-medium text-[#8A7060] sm:text-[14px]">
                                    {{ $p['role'] }}
                                </p>
                            </div>
                        </div>

                        <div class="mt-4 h-px w-full bg-[#E7D7C7] sm:mt-5"></div>

                        @if (!empty($p['desc']))
                            <p class="mt-4 text-[14px] leading-7 text-[#6B5C4E] sm:mt-5">
                                {{ $p['desc'] }}
                            </p>
                        @endif
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="relative overflow-hidden bg-[#D89A53] py-12 pb-20 sm:py-14 sm:pb-24 lg:py-20 lg:pb-40">
        <div data-animate="fade-up" data-animate-delay="220ms" data-animate-duration="slow"
            data-animate-ease="smooth" class="mx-auto max-w-[920px] px-5 text-center sm:px-6 lg:px-8">
            <h2 class="font-heading text-[30px] font-bold leading-tight text-white sm:text-[40px] lg:text-[56px]">
                Siap Bertumbuh Bersama Sipilsaku?
            </h2>

            <p class="mx-auto mt-5 max-w-[700px] text-[14px] leading-7 text-white/90 sm:text-[15px]">
                Mulai perjalanan belajar Anda dengan program yang dirancang untuk memperkuat
                skill software, pemahaman proyek, dan kesiapan profesional di bidang teknik sipil.
            </p>

            <div class="mt-8 flex flex-col items-center justify-center gap-3 sm:flex-row sm:flex-wrap">
                <a href="{{ url('/courses') }}"
                    class="inline-flex w-full items-center justify-center gap-2 rounded-full bg-white px-8 py-3.5 text-sm font-semibold text-[#2B2118] shadow-md transition hover:bg-[#FAF3EC] sm:w-auto sm:px-10">
                    Pilih Kursus
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </a>

                <a href="https://wa.me/6281916113700"
                    class="inline-flex w-full items-center justify-center gap-2 rounded-full border border-white/70 px-8 py-3.5 text-sm font-semibold text-white transition hover:bg-white/10 sm:w-auto sm:px-10">
                    Konsultasi
                </a>
            </div>
        </div>

        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none">
            <svg viewBox="0 0 1440 70" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"
                class="block h-[50px] w-full sm:h-[60px]">
                <path d="M0,35 C360,70 720,0 1080,35 C1260,52 1380,28 1440,35 L1440,70 L0,70 Z" fill="#FAF6F2" />
            </svg>
        </div>
    </section>
@endsection