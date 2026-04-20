<header class="w-full bg-[#F6F2EE]">
    <div class="mx-auto flex h-[68px] max-w-[1240px] items-center justify-between px-4 sm:px-6 lg:h-[76px] lg:px-8">
        {{-- Logo --}}
        <a href="{{ url('/') }}" class="shrink-0">
            <img src="{{ asset('assets/logo/sipilsaku-logo.png') }}" alt="Sipilsaku Logo"
                class="h-[28px] w-auto object-contain sm:h-[34px] lg:h-[42px]">
        </a>

        {{-- Menu --}}
        <nav class="hidden items-center gap-8 lg:flex xl:gap-10">
            <a href="{{ url('/') }}"
                class="relative font-heading text-[17px] font-bold leading-none text-[#D89A53] xl:text-[19px]">
                Beranda
                <span class="absolute left-0 top-full mt-[7px] h-[2px] w-full rounded-full bg-[#D89A53]"></span>
            </a>

            <a href="{{ url('/courses') }}"
                class="font-heading text-[17px] font-bold leading-none text-[#D89A53] xl:text-[19px]">
                Kursus
            </a>

            <a href="{{ url('/ebooks') }}"
                class="font-heading text-[17px] font-bold leading-none text-[#D89A53] xl:text-[19px]">
                E-Book
            </a>
        </nav>

        {{-- Actions --}}
        <div class="hidden lg:flex items-center">
            <div class="flex items-center rounded-full bg-[#D89A53] p-[5px] xl:p-[6px]">
                {{-- Masuk --}}
                <a href="{{ route('login') }}"
                    class="flex h-[38px] items-center gap-2.5 pl-4 pr-5 xl:h-[42px] xl:pl-5 xl:pr-6">
                    <img src="{{ asset('assets/icon/icon-login.png') }}" alt="Icon Login"
                        class="h-[18px] w-[18px] object-contain xl:h-[20px] xl:w-[20px]">
                    <span class="font-heading text-[15px] font-bold leading-none text-white xl:text-[17px]">
                        Masuk
                    </span>
                </a>

                {{-- Daftar --}}
                <a href="{{ route('register') }}"
                    class="flex h-[38px] items-center rounded-full bg-[#F6F2EE] px-7 xl:h-[42px] xl:px-8">
                    <span class="font-heading text-[15px] font-bold leading-none text-[#D89A53] xl:text-[17px]">
                        Daftar
                    </span>
                </a>
            </div>
        </div>

        {{-- Mobile --}}
        <button
            class="flex h-9 w-9 items-center justify-center rounded-lg border border-[#D89A53] text-[#D89A53] lg:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>
</header>
