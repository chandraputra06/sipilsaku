<header class="relative z-50 w-full bg-[#F6F2EE]">
    <div class="mx-auto flex h-[68px] max-w-[1240px] items-center justify-between px-4 sm:px-6 lg:h-[76px] lg:px-8">
        {{-- Logo --}}
        <a href="{{ route('home') }}" class="shrink-0">
            <img src="{{ asset('sipilsaku-logo.png') }}" alt="Sipilsaku Logo"
                class="h-[28px] w-auto object-contain sm:h-[34px] lg:h-[42px]">
        </a>

        {{-- Desktop Menu --}}
        <nav class="hidden items-center gap-8 lg:flex xl:gap-10">
            <a href="{{ route('home') }}"
                class="relative font-heading text-[17px] font-bold leading-none text-[#D89A53] xl:text-[19px]">
                Beranda
                @if (request()->routeIs('home'))
                    <span class="absolute left-0 top-full mt-[7px] h-[2px] w-full rounded-full bg-[#D89A53]"></span>
                @endif
            </a>

            <a href="{{ route('courses.index') }}"
                class="relative font-heading text-[17px] font-bold leading-none text-[#D89A53] xl:text-[19px]">
                Vidio
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

        {{-- Desktop Actions --}}
        <div class="hidden items-center lg:flex">
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
                            class="flex items-center gap-2 rounded-full bg-[#D4904A] px-6 py-2.5 text-sm font-bold text-white transition hover:bg-[#c07e3e]">
                            <img src="{{ asset('assets/icon/icon-logout.png') }}" alt="Icon Logout"
                                class="h-[18px] w-[18px] object-contain xl:h-[20px] xl:w-[20px]">
                            Keluar
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

        {{-- Mobile Toggle --}}
        <button id="mobileMenuToggle"
            class="relative z-[60] flex h-10 w-10 items-center justify-center rounded-lg border border-[#D89A53] text-[#D89A53] lg:hidden">
            <svg id="mobileMenuOpenIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>

            <svg id="mobileMenuCloseIcon" xmlns="http://www.w3.org/2000/svg" class="hidden h-5 w-5" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    {{-- Mobile layer starts BELOW navbar --}}
    <div id="mobileMenuLayer" class="lg:hidden">
        {{-- Overlay --}}
        <div id="mobileMenuOverlay"
            class="fixed left-0 right-0 bottom-0 top-[68px] hidden bg-black/20 sm:top-[68px] lg:top-[76px]">
        </div>

        {{-- Mobile Menu --}}
        <div id="mobileMenu"
            class="absolute left-0 right-0 top-full hidden border-t border-[#E7D7C7] bg-[#F6F2EE] shadow-lg">
            <div class="mx-auto max-w-[1240px] px-4 py-4 sm:px-6">
                <nav class="flex flex-col gap-2">
                    <a href="{{ route('home') }}"
                        class="mobile-menu-link rounded-xl px-4 py-3 text-[15px] font-semibold {{ request()->routeIs('home') ? 'bg-[#D89A53] text-white' : 'text-[#4D371F]' }}">
                        Beranda
                    </a>

                    <a href="{{ route('courses.index') }}"
                        class="mobile-menu-link rounded-xl px-4 py-3 text-[15px] font-semibold {{ request()->is('courses') || request()->is('courses/*') ? 'bg-[#D89A53] text-white' : 'text-[#4D371F]' }}">
                        Vidio
                    </a>

                    <a href="{{ route('ebooks.index') }}"
                        class="mobile-menu-link rounded-xl px-4 py-3 text-[15px] font-semibold {{ request()->routeIs('ebooks.*') ? 'bg-[#D89A53] text-white' : 'text-[#4D371F]' }}">
                        E-Book
                    </a>
                </nav>

                <div class="mt-4 border-t border-[#E7D7C7] pt-4">
                    @auth
                        <div class="flex flex-col gap-3">
                            @if (auth()->user()->role === '1')
                                <a href="{{ route('admin.dashboard') }}"
                                    class="mobile-menu-link rounded-xl border border-[#D89A53] px-4 py-3 text-center text-sm font-semibold text-[#D89A53]">
                                    Admin
                                </a>
                            @endif

                            <a href="{{ route('profile.index') }}"
                                class="mobile-menu-link flex items-center gap-3 rounded-xl bg-white px-4 py-3 text-sm font-semibold text-[#4D371F] shadow-sm">
                                <span
                                    class="flex h-10 w-10 items-center justify-center overflow-hidden rounded-full border border-[#D89A53] bg-[#FCF5EE] text-[#D89A53]">
                                    @if (auth()->user()->profile_photo)
                                        <img src="{{ asset('storage/' . auth()->user()->profile_photo) }}"
                                            alt="{{ auth()->user()->name }}" class="h-full w-full object-cover">
                                    @else
                                        <i class="fa-regular fa-user"></i>
                                    @endif
                                </span>
                                Profil Saya
                            </a>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="flex w-full items-center justify-center gap-2 rounded-xl bg-[#D4904A] px-4 py-3 text-sm font-bold text-white">
                                    <img src="{{ asset('assets/icon/icon-logout.png') }}" alt="Icon Logout"
                                        class="h-[18px] w-[18px] object-contain">
                                    Keluar
                                </button>
                            </form>
                        </div>
                    @else
                        <div class="flex flex-col gap-3">
                            <a href="{{ route('login') }}"
                                class="mobile-menu-link flex items-center justify-center gap-2 rounded-xl bg-[#D89A53] px-4 py-3 text-sm font-bold text-white">
                                <img src="{{ asset('assets/icon/icon-login.png') }}" alt="Icon Login"
                                    class="h-[18px] w-[18px] object-contain">
                                Masuk
                            </a>

                            <a href="{{ route('register') }}"
                                class="mobile-menu-link flex items-center justify-center rounded-xl border border-[#D89A53] px-4 py-3 text-sm font-bold text-[#D89A53]">
                                Daftar
                            </a>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</header>