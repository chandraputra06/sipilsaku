@extends('layouts.admin')

@section('content')
<section class="space-y-8 lg:space-y-10">
    <div class="flex flex-col gap-4 lg:flex-row lg:items-end lg:justify-between">
        <div>
            <h1 class="font-heading text-[32px] leading-none text-[#4D371F] sm:text-[38px] lg:text-[52px]">
                Dashboard Admin
            </h1>
            <p class="mt-4 max-w-[620px] text-sm leading-7 text-[#8A7060]">
                Kelola course, video, e-book, dan pengguna Sipilsaku dari satu halaman yang lebih ringkas dan nyaman dilihat.
            </p>
        </div>

        <div class="flex flex-col gap-3 sm:flex-row sm:flex-wrap">
            <a href="{{ route('admin.courses.create') }}"
                class="inline-flex items-center justify-center gap-2 rounded-full bg-[#D89A53] px-6 py-3 text-sm font-semibold text-white shadow-sm transition duration-300 hover:-translate-y-0.5 hover:bg-[#c9863d] hover:shadow-[0_8px_24px_-4px_rgba(216,154,83,0.45)]">
                Tambah Course
                <i class="fa-solid fa-arrow-right text-xs"></i>
            </a>

            <a href="{{ route('admin.ebooks.create') }}"
                class="inline-flex items-center justify-center gap-2 rounded-full border border-[#D89A53] px-6 py-3 text-sm font-semibold text-[#D89A53] transition duration-300 hover:-translate-y-0.5 hover:bg-[#D89A53] hover:text-white hover:shadow-[0_8px_20px_-6px_rgba(216,154,83,0.35)]">
                Tambah E-Book
            </a>
        </div>
    </div>

    <hr class="border-t border-[#F0E5DA]">

    <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
        <div class="group rounded-[22px] bg-white p-5 shadow-sm ring-1 ring-[#F0E5DA] transition duration-300 hover:-translate-y-[5px] hover:scale-[1.015] hover:shadow-[0_16px_40px_-8px_rgba(77,55,31,0.14)] sm:rounded-[26px] sm:p-6">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-sm text-[#8A7060]">Total user</p>
                    <h2 class="mt-3 font-heading text-[38px] leading-none text-[#4D371F] sm:text-[48px]">
                        {{ $totalUsers ?? 0 }}
                    </h2>
                </div>
                <div class="flex h-11 w-11 items-center justify-center rounded-full bg-[#FCF5EE] text-[#D89A53] transition duration-300 group-hover:scale-110 sm:h-12 sm:w-12">
                    <i class="fa-solid fa-users text-[16px] sm:text-[18px]"></i>
                </div>
            </div>
        </div>

        <div class="group rounded-[22px] bg-white p-5 shadow-sm ring-1 ring-[#F0E5DA] transition duration-300 hover:-translate-y-[5px] hover:scale-[1.015] hover:shadow-[0_16px_40px_-8px_rgba(77,55,31,0.14)] sm:rounded-[26px] sm:p-6">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-sm text-[#8A7060]">Total e-book</p>
                    <h2 class="mt-3 font-heading text-[38px] leading-none text-[#4D371F] sm:text-[48px]">
                        {{ $totalEbooks ?? 0 }}
                    </h2>
                </div>
                <div class="flex h-11 w-11 items-center justify-center rounded-full bg-[#FCF5EE] text-[#D89A53] transition duration-300 group-hover:scale-110 sm:h-12 sm:w-12">
                    <i class="fa-solid fa-book text-[16px] sm:text-[18px]"></i>
                </div>
            </div>
        </div>

        <div class="group rounded-[22px] bg-white p-5 shadow-sm ring-1 ring-[#F0E5DA] transition duration-300 hover:-translate-y-[5px] hover:scale-[1.015] hover:shadow-[0_16px_40px_-8px_rgba(77,55,31,0.14)] sm:rounded-[26px] sm:p-6">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-sm text-[#8A7060]">Total course</p>
                    <h2 class="mt-3 font-heading text-[38px] leading-none text-[#4D371F] sm:text-[48px]">
                        {{ $totalCourses ?? 0 }}
                    </h2>
                </div>
                <div class="flex h-11 w-11 items-center justify-center rounded-full bg-[#FCF5EE] text-[#D89A53] transition duration-300 group-hover:scale-110 sm:h-12 sm:w-12">
                    <i class="fa-solid fa-graduation-cap text-[16px] sm:text-[18px]"></i>
                </div>
            </div>
        </div>

        <div class="group rounded-[22px] bg-white p-5 shadow-sm ring-1 ring-[#F0E5DA] transition duration-300 hover:-translate-y-[5px] hover:scale-[1.015] hover:shadow-[0_16px_40px_-8px_rgba(77,55,31,0.14)] sm:rounded-[26px] sm:p-6">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-sm text-[#8A7060]">Total admin</p>
                    <h2 class="mt-3 font-heading text-[38px] leading-none text-[#4D371F] sm:text-[48px]">
                        {{ $totalAdmins ?? 0 }}
                    </h2>
                </div>
                <div class="flex h-11 w-11 items-center justify-center rounded-full bg-[#FCF5EE] text-[#D89A53] transition duration-300 group-hover:scale-110 sm:h-12 sm:w-12">
                    <i class="fa-solid fa-user-shield text-[16px] sm:text-[18px]"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="grid gap-6 xl:grid-cols-[1.25fr_0.75fr]">
        <div class="rounded-[24px] bg-white p-5 shadow-sm ring-1 ring-[#F0E5DA] sm:rounded-[28px] sm:p-7">
            <div class="flex items-start justify-between gap-4">
                <div>
                    <h2 class="font-heading text-[24px] leading-tight text-[#4D371F] sm:text-[30px]">Menu utama</h2>
                    <p class="mt-2 max-w-[400px] text-sm leading-7 text-[#8A7060]">
                        Akses cepat ke halaman yang paling sering dipakai saat mengelola Sipilsaku.
                    </p>
                </div>

                <div class="hidden shrink-0 grid-cols-3 gap-[5px] opacity-20 lg:grid">
                    @for($r = 0; $r < 3; $r++)
                        @for($c = 0; $c < 3; $c++)
                            <div class="h-[5px] w-[5px] rounded-full bg-[#D89A53]"></div>
                        @endfor
                    @endfor
                </div>
            </div>

            <div class="mt-6 grid gap-4 md:grid-cols-2 xl:grid-cols-3">
                <a href="{{ route('admin.courses.index') }}"
                    class="group relative overflow-hidden rounded-[20px] border border-[#EFE2D5] bg-[#FCF5EE] p-5 transition duration-300 hover:-translate-y-[6px] hover:scale-[1.012] hover:shadow-[0_20px_44px_-10px_rgba(77,55,31,0.16)] sm:rounded-[22px]">
                    <div class="absolute inset-0 bg-[linear-gradient(135deg,rgba(216,154,83,0.08)_0%,transparent_60%)] opacity-0 transition duration-300 group-hover:opacity-100"></div>
                    <div class="relative">
                        <div class="flex h-11 w-11 items-center justify-center rounded-full bg-white text-[#D89A53] shadow-sm">
                            <i class="fa-solid fa-video text-[17px]"></i>
                        </div>
                        <h3 class="mt-5 text-[19px] font-semibold text-[#4D371F]">Kelola Course</h3>
                        <p class="mt-2 text-sm leading-6 text-[#8A7060]">
                            Tambah, edit course, dan kelola video pembelajaran.
                        </p>
                        <div class="mt-5 inline-flex items-center gap-2 text-sm font-semibold text-[#D89A53]">
                            Buka
                            <i class="fa-solid fa-arrow-right text-xs transition duration-300 group-hover:translate-x-1"></i>
                        </div>
                    </div>
                </a>

                <a href="{{ route('admin.ebooks.index') }}"
                    class="group relative overflow-hidden rounded-[20px] border border-[#EFE2D5] bg-[#FCF5EE] p-5 transition duration-300 hover:-translate-y-[6px] hover:scale-[1.012] hover:shadow-[0_20px_44px_-10px_rgba(77,55,31,0.16)] sm:rounded-[22px]">
                    <div class="absolute inset-0 bg-[linear-gradient(135deg,rgba(216,154,83,0.08)_0%,transparent_60%)] opacity-0 transition duration-300 group-hover:opacity-100"></div>
                    <div class="relative">
                        <div class="flex h-11 w-11 items-center justify-center rounded-full bg-white text-[#D89A53] shadow-sm">
                            <i class="fa-solid fa-book-open text-[17px]"></i>
                        </div>
                        <h3 class="mt-5 text-[19px] font-semibold text-[#4D371F]">Kelola E-Book</h3>
                        <p class="mt-2 text-sm leading-6 text-[#8A7060]">
                            Atur katalog e-book, harga, dan status publikasi.
                        </p>
                        <div class="mt-5 inline-flex items-center gap-2 text-sm font-semibold text-[#D89A53]">
                            Buka
                            <i class="fa-solid fa-arrow-right text-xs transition duration-300 group-hover:translate-x-1"></i>
                        </div>
                    </div>
                </a>

                <a href="{{ route('admin.users.index') }}"
                    class="group relative overflow-hidden rounded-[20px] border border-[#EFE2D5] bg-[#FCF5EE] p-5 transition duration-300 hover:-translate-y-[6px] hover:scale-[1.012] hover:shadow-[0_20px_44px_-10px_rgba(77,55,31,0.16)] sm:rounded-[22px]">
                    <div class="absolute inset-0 bg-[linear-gradient(135deg,rgba(216,154,83,0.08)_0%,transparent_60%)] opacity-0 transition duration-300 group-hover:opacity-100"></div>
                    <div class="relative">
                        <div class="flex h-11 w-11 items-center justify-center rounded-full bg-white text-[#D89A53] shadow-sm">
                            <i class="fa-solid fa-user-gear text-[17px]"></i>
                        </div>
                        <h3 class="mt-5 text-[19px] font-semibold text-[#4D371F]">Kelola User</h3>
                        <p class="mt-2 text-sm leading-6 text-[#8A7060]">
                            Lihat data user dan atur akses course pembelajaran.
                        </p>
                        <div class="mt-5 inline-flex items-center gap-2 text-sm font-semibold text-[#D89A53]">
                            Buka
                            <i class="fa-solid fa-arrow-right text-xs transition duration-300 group-hover:translate-x-1"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="relative overflow-hidden rounded-[24px] bg-gradient-to-br from-[#D89A53] to-[#C9863D] p-6 text-white shadow-sm sm:rounded-[28px] sm:p-7">
            <div class="pointer-events-none absolute -right-10 -top-10 h-40 w-40 rounded-full bg-white/10"></div>
            <div class="pointer-events-none absolute -bottom-8 -left-8 h-32 w-32 rounded-full bg-white/8"></div>
            <div class="pointer-events-none absolute bottom-16 right-4 h-16 w-16 rounded-full bg-white/10"></div>

            <div class="relative">
                <h2 class="font-heading text-[26px] leading-tight sm:text-[32px]">
                    Ringkasan dashboard
                </h2>
                <p class="mt-3 text-sm leading-7 text-white/85">
                    Pantau jumlah konten dan pengguna sebelum masuk ke pengelolaan detail.
                </p>

                <div class="mt-7 space-y-3">
                    <div class="flex items-center justify-between rounded-[18px] bg-white/15 px-5 py-4 backdrop-blur-sm transition duration-300 hover:translate-x-1 hover:bg-white/20">
                        <div>
                            <p class="text-sm text-white/80">Total konten</p>
                            <p class="mt-1 text-[24px] font-bold leading-none sm:text-[26px]">
                                {{ ($totalCourses ?? 0) + ($totalEbooks ?? 0) }}
                            </p>
                        </div>
                        <div class="flex h-9 w-9 items-center justify-center rounded-full bg-white/20">
                            <i class="fa-solid fa-layer-group text-sm"></i>
                        </div>
                    </div>

                    <div class="flex items-center justify-between rounded-[18px] bg-white/15 px-5 py-4 backdrop-blur-sm transition duration-300 hover:translate-x-1 hover:bg-white/20">
                        <div>
                            <p class="text-sm text-white/80">Pengguna terdaftar</p>
                            <p class="mt-1 text-[24px] font-bold leading-none sm:text-[26px]">
                                {{ $totalUsers ?? 0 }}
                            </p>
                        </div>
                        <div class="flex h-9 w-9 items-center justify-center rounded-full bg-white/20">
                            <i class="fa-solid fa-users text-sm"></i>
                        </div>
                    </div>

                    <div class="flex items-center justify-between rounded-[18px] bg-white/15 px-5 py-4 backdrop-blur-sm transition duration-300 hover:translate-x-1 hover:bg-white/20">
                        <div>
                            <p class="text-sm text-white/80">Administrator</p>
                            <p class="mt-1 text-[24px] font-bold leading-none sm:text-[26px]">
                                {{ $totalAdmins ?? 0 }}
                            </p>
                        </div>
                        <div class="flex h-9 w-9 items-center justify-center rounded-full bg-white/20">
                            <i class="fa-solid fa-user-shield text-sm"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection