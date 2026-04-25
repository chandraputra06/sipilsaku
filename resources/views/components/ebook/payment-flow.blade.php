<section class="relative overflow-hidden bg-[#D4904A] py-16 lg:py-20 lg:pb-50">
    @php
        $steps = [
            [
                'number' => 1,
                'title' => 'Pilih / Login',
                'desc' => 'Pilih e-book yang Anda minati lalu masuk ke akun Sipilsaku Anda.',
                'icon' => 'assets/icon/icon-login-orange.png',
            ],
            [
                'number' => 2,
                'title' => 'Checkout',
                'desc' => 'Lanjutkan ke proses checkout dan pastikan data pesanan Anda sudah benar.',
                'icon' => 'assets/icon/icon-cart.png',
            ],
            [
                'number' => 3,
                'title' => 'Konfirmasi WA',
                'desc' => 'Kirim bukti pembayaran ke admin melalui WhatsApp untuk verifikasi pesanan.',
                'icon' => 'assets/icon/icon-wa.png',
            ],
            [
                'number' => 4,
                'title' => 'Terima File',
                'desc' => 'E-book akan dikirim setelah pembayaran diverifikasi oleh admin Sipilsaku.',
                'icon' => 'assets/icon/icon-bookmark.png',
            ],
        ];
    @endphp

    <div class="mx-auto max-w-[1240px] px-6 lg:px-8">
        <div
            data-animate="fade-up"
            data-animate-duration="slow"
            data-animate-ease="smooth"
            class="text-center">
            <h2 class="font-heading text-[42px] font-bold leading-none text-white md:text-[58px]">
                Alur Pembayaran
            </h2>

            <p class="mx-auto mt-6 max-w-[620px] text-[15px] leading-7 text-white/90">
                Ikuti 4 langkah praktis untuk membeli e-book Sipilsaku
                dengan proses yang cepat, aman, dan mudah.
            </p>
        </div>

        <div class="mt-14 grid grid-cols-1 gap-y-10 md:grid-cols-2 xl:grid-cols-4 xl:gap-x-8">
            @foreach ($steps as $index => $step)
                <div
                    data-animate="soft"
                    data-animate-delay="{{ $index * 180 }}ms"
                    data-animate-duration="slow"
                    data-animate-ease="smooth"
                    class="relative text-center text-white">
                    @if ($index < count($steps) - 1)
                        <div
                            class="absolute top-[29px] left-[74%] hidden h-px w-[50%] translate-x-6 bg-white/40 xl:block">
                        </div>
                    @endif

                    <div class="relative mx-auto w-fit">
                        <div
                            class="flex h-[68px] w-[68px] items-center justify-center rounded-full bg-[#F7EFE5] shadow-[0_4px_10px_rgba(0,0,0,0.18)]">
                            <img src="{{ asset($step['icon']) }}" alt="{{ $step['title'] }}"
                                class="h-8 w-8 object-contain">
                        </div>

                        <div
                            class="absolute -right-[14px] top-1/2 flex h-[38px] w-[38px] -translate-y-1/2 items-center justify-center rounded-full bg-[#F3E2CC] text-[19px] font-bold text-[#6B4A29] shadow-[0_4px_8px_rgba(0,0,0,0.18)]">
                            {{ $step['number'] }}
                        </div>
                    </div>

                    <h3 class="mt-4 text-[20px] font-semibold leading-none text-white md:text-[22px]">
                        {{ $step['title'] }}
                    </h3>

                    <p class="mx-auto mt-3 max-w-[230px] text-[13px] leading-6 text-white/92">
                        {{ $step['desc'] }}
                    </p>
                </div>
            @endforeach
        </div>

        <div
            data-animate="fade-up"
            data-animate-delay="280ms"
            data-animate-duration="slow"
            data-animate-ease="smooth"
            class="mt-14 text-center">
            <a href="https://wa.me/6281916113700"
                class="inline-flex items-center gap-2 rounded-full bg-white px-12 py-4 text-sm font-semibold text-[#D4904A] shadow-lg shadow-[#D4904A]/30 transition hover:bg-[#f4f4f4]">
                Hubungi Admin
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>
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