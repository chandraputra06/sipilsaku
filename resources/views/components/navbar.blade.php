<header class="w-full bg-[#F6F2EE]">
    <div class="mx-auto flex h-[68px] max-w-[1240px] items-center justify-between px-4 sm:px-6 lg:h-[76px] lg:px-8">
        {{-- Logo --}}
        <a href="{{ route('home') }}" class="shrink-0">
            <img src="{{ asset('assets/logo/sipilsaku-logo.png') }}" alt="Sipilsaku Logo"
                class="h-[28px] w-auto object-contain sm:h-[34px] lg:h-[42px]">
        </a>

        {{-- Menu --}}
        <nav class="hidden items-center gap-8 lg:flex xl:gap-10">
            <a href="{{ route('home') }}"
                class="relative font-heading text-[17px] font-bold leading-none text-[#D89A53] xl:text-[19px]">
                Beranda
                @if (request()->routeIs('home'))
                    <span class="absolute left-0 top-full mt-[7px] h-[2px] w-full rounded-full bg-[#D89A53]"></span>
                @endif
            </a>

            <a href="{{ url('/courses') }}"
                class="relative font-heading text-[17px] font-bold leading-none text-[#D89A53] xl:text-[19px]">
                Kursus
                @if (request()->is('courses') || request()->is('courses/*'))
                    <span class="absolute left-0 top-full mt-[7px] h-[2px] w-full rounded-full bg-[#D89A53]"></span>
                @endif
            </a>

            <a href="{{ route('ebooks.index') }}"
                class="relative font-heading text-[17px] font-bold leading-none text-[#D89A53] xl:text-[19px]">
                E-Book
                @if (request()->routeIs('ebooks.*'))
                    <span class="absolute left-0 top-full mt-[7px] h-[2px] w-full rounded-full bg-[#D89A53]"></span>
                @endif
            </a>
        </nav>

        {{-- Actions --}}
        <div class="hidden lg:flex items-center">
            @auth
                <div class="flex items-center gap-3">
                    @if (auth()->user()->role === '1')
                        <a href="{{ route('admin.dashboard') }}"
                            class="inline-flex items-center gap-2 rounded-full border border-[#D89A53] px-4 py-2 text-[11px] font-semibold text-[#D89A53] transition hover:bg-[#D89A53] hover:text-white xl:px-5">
                            Admin
                        </a>
                    @endif

                    <a href="{{ route('profile.index') }}"
                        class="flex h-[38px] w-[38px] items-center justify-center overflow-hidden rounded-full border-[2px] border-[#D89A53] bg-[#FCF5EE] text-[#D89A53] transition hover:bg-[#D89A53]/10 xl:h-[42px] xl:w-[42px]">
                        @if (auth()->user()->profile_photo)
                            <img src="{{ asset('storage/' . auth()->user()->profile_photo) }}"
                                alt="{{ auth()->user()->name }}" class="h-full w-full object-cover">
                        @else
                            <i class="fa-regular fa-user text-[15px] xl:text-[16px]"></i>
                        @endif
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="inline-flex items-center gap-2 rounded-full bg-[#D89A53] px-4 py-2 text-[11px] font-semibold text-white shadow-sm transition hover:bg-[#c9863d] xl:px-5">
                            Keluar
                            <span>&rarr;</span>
                        </button>
                    </form>
                </div>
            @else
                <div class="flex items-center rounded-full bg-[#D89A53] p-[5px] xl:p-[6px]">
                    <a href="{{ route('login') }}"
                        class="flex h-[38px] items-center gap-2.5 pl-4 pr-5 xl:h-[42px] xl:pl-5 xl:pr-6">
                        <img src="{{ asset('assets/icon/icon-login.png') }}" alt="Icon Login"
                            class="h-[18px] w-[18px] object-contain xl:h-[20px] xl:w-[20px]">
                        <span class="font-heading text-[15px] font-bold leading-none text-white xl:text-[17px]">
                            Masuk
                        </span>
                    </a>

                    <a href="{{ route('register') }}"
                        class="flex h-[38px] items-center rounded-full bg-[#F6F2EE] px-7 xl:h-[42px] xl:px-8">
                        <span class="font-heading text-[15px] font-bold leading-none text-[#D89A53] xl:text-[17px]">
                            Daftar
                        </span>
                    </a>
                </div>
            @endauth
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