<section class="relative overflow-hidden bg-[#D89A53]">
    <div class="mx-auto max-w-[1240px] px-6 py-12 text-center lg:px-8">
        <h2 class="font-heading text-[34px] text-white sm:text-[40px]">
            Alur Pembayaran
        </h2>

        <p class="mx-auto mt-3 max-w-[520px] text-[11px] leading-5 text-white/85 sm:text-[12px]">
            Selesaikan pesanan Anda melalui layanan WhatsApp resmi kami
            untuk verifikasi pembayaran yang lebih cepat dan aman.
        </p>

        <div class="mt-10 grid gap-6 md:grid-cols-4">
            @foreach ([
                ['num' => '1', 'title' => 'Pilih / Login', 'desc' => 'Pilih buku yang Anda minati sesuai kebutuhan.'],
                ['num' => '2', 'title' => 'Checkout', 'desc' => 'Isi form data diri dan lanjutkan ke pembayaran.'],
                ['num' => '3', 'title' => 'Konfirmasi WA', 'desc' => 'Konfirmasi ke admin setelah pembayaran selesai.'],
                ['num' => '4', 'title' => 'Terima File', 'desc' => 'File akan dikirim setelah admin mengecek data Anda.'],
            ] as $step)
                <div class="relative text-center">
                    <div class="mx-auto flex h-10 w-10 items-center justify-center rounded-full bg-white text-sm font-bold text-[#D89A53]">
                        {{ $step['num'] }}
                    </div>

                    <h3 class="mt-3 text-sm font-semibold text-white">
                        {{ $step['title'] }}
                    </h3>

                    <p class="mx-auto mt-2 max-w-[180px] text-[11px] leading-5 text-white/80">
                        {{ $step['desc'] }}
                    </p>
                </div>
            @endforeach
        </div>

        <div class="mt-8">
            <a href="#"
                class="inline-flex items-center gap-2 rounded-full bg-white px-8 py-2.5 text-[11px] font-medium text-[#4D371F] shadow-sm transition hover:opacity-90">
                Hubungi Admin
                <span>&rarr;</span>
            </a>
        </div>
    </div>

    <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none">
        <svg viewBox="0 0 1440 70" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" class="block h-[55px] w-full">
            <path d="M0,25 C280,70 560,0 840,30 C1100,58 1280,40 1440,20 L1440,70 L0,70 Z" fill="#FCF5EE"/>
        </svg>
    </div>
</section>