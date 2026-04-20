<footer class="relative bg-[#FAF6F2]">

    {{-- Wave divider: jembatan orange (keunggulan) → hitam → cream (footer) --}}
    <div class="absolute -top-px left-0 w-full overflow-hidden leading-none">
        
    </div>

    <div class="mx-auto max-w-[1180px] px-6 pb-10 pt-16 lg:px-8">

        {{-- Main grid --}}
        <div class="grid gap-10 md:grid-cols-4">

            {{-- Col 1: Brand --}}
            <div class="md:col-span-1">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('assets/logo/sipilsaku-logo.png') }}" alt="Sipilsaku"
                        class="h-[42px] w-auto object-contain">
                </div>

                <p class="mt-4 max-w-[280px] text-[13px] leading-6 text-[#6B5547]">
                    Ekosistem digital terintegrasi untuk mahasiswa
                    dan praktisi Teknik Sipil Indonesia. Presisi
                    dalam setiap karya.
                </p>

                {{-- Social icons --}}
                <div class="mt-5 flex items-center gap-3">
                    <a href="#"
                        class="flex h-9 w-9 items-center justify-center rounded-full bg-[#D4904A] text-white transition hover:bg-[#c07e3e]">
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                        </svg>
                    </a>
                    <a href="#"
                        class="flex h-9 w-9 items-center justify-center rounded-full bg-[#D4904A] text-white transition hover:bg-[#c07e3e]">
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M23.495 6.205a3.007 3.007 0 0 0-2.088-2.088c-1.87-.501-9.396-.501-9.396-.501s-7.507-.01-9.396.501A3.007 3.007 0 0 0 .527 6.205a31.247 31.247 0 0 0-.522 5.805 31.247 31.247 0 0 0 .522 5.783 3.007 3.007 0 0 0 2.088 2.088c1.868.502 9.396.502 9.396.502s7.506 0 9.396-.502a3.007 3.007 0 0 0 2.088-2.088 31.247 31.247 0 0 0 .5-5.783 31.247 31.247 0 0 0-.5-5.805zM9.609 15.601V8.408l6.264 3.602z" />
                        </svg>
                    </a>
                    <a href="#"
                        class="flex h-9 w-9 items-center justify-center rounded-full bg-[#D4904A] text-white transition hover:bg-[#c07e3e]">
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 0 1-2.063-2.065 2.064 2.064 0 1 1 2.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                        </svg>
                    </a>
                </div>
            </div>

            {{-- Col 2: Halaman --}}
            <div>
                <h3 class="font-heading text-[22px] font-bold text-[#D4904A]">Halaman</h3>
                <ul class="mt-4 space-y-2.5">
                    <li><a href="{{ url('/') }}"
                            class="text-sm text-[#6B5547] transition hover:text-[#D4904A]">Beranda</a></li>
                    <li><a href="{{ url('/courses') }}"
                            class="text-sm text-[#6B5547] transition hover:text-[#D4904A]">Kursus</a></li>
                    <li><a href="{{ url('/ebooks') }}"
                            class="text-sm text-[#6B5547] transition hover:text-[#D4904A]">E-Book</a></li>
                </ul>
            </div>

            {{-- Col 3: Dukungan --}}
            <div>
                <h3 class="font-heading text-[22px] font-bold text-[#D4904A]">Dukungan</h3>
                <ul class="mt-4 space-y-2.5">
                    <li><a href="{{ url('/about') }}"
                            class="text-sm text-[#6B5547] transition hover:text-[#D4904A]">Tentang Kami</a></li>
                    <li><a href="{{ url('/faq') }}"
                            class="text-sm text-[#6B5547] transition hover:text-[#D4904A]">FAQ</a></li>
                </ul>
            </div>

            {{-- Col 4: Kontak + Auth --}}
            <div>
                {{-- Contact items --}}
                <ul class="space-y-3">
                    <li class="flex items-center gap-3">
                        <svg class="h-5 w-5 shrink-0 text-[#D4904A]" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                        </svg>
                        <span class="text-sm text-[#6B5547]">hello@civilians.id</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <svg class="h-5 w-5 shrink-0 text-[#D4904A]" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                        </svg>
                        <span class="text-sm text-[#6B5547]">+62 877-6263-5300</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <svg class="h-5 w-5 shrink-0 text-[#D4904A]" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                        </svg>
                        <span class="text-sm text-[#6B5547]">Bali, Indonesia</span>
                    </li>
                </ul>

                {{-- Auth buttons --}}
                <div class="mt-6">
                    @auth
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="flex items-center gap-2 rounded-full bg-[#D4904A] px-6 py-2.5 text-sm font-bold text-white transition hover:bg-[#c07e3e]">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                Keluar
                            </button>
                        </form>
                    @else
                        {{-- Pill container --}}
                        <div class="inline-flex items-center rounded-full bg-[#D4904A] p-[5px]">
                            {{-- Masuk --}}
                            <a href="{{ route('login') }}" class="flex items-center gap-2 pl-4 pr-5 py-2">
                                <svg class="h-[18px] w-[18px] shrink-0 text-white" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                </svg>
                                <span class="text-sm font-bold text-white">Masuk</span>
                            </a>

                            {{-- Daftar --}}
                            <a href="{{ route('register') }}"
                                class="rounded-full bg-[#FAF6F2] px-6 py-2 text-sm font-bold text-[#D4904A]">
                                Daftar
                            </a>
                        </div>
                    @endauth
                </div>
            </div>

        </div>

        {{-- Copyright --}}
        <div class="mt-10 border-t border-[#E8DDD4] pt-6 text-center text-sm text-[#8A7060]">
            © 2026 <span class="font-bold text-[#4A3728]">Sipilsaku.</span> Hak cipta dilindungi undang-undang.
        </div>

    </div>
</footer>
