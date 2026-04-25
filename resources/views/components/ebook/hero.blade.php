<section class="relative overflow-hidden bg-[#FCF5EE]">
    {{-- Background --}}
    <div class="relative min-h-[380px] sm:min-h-[460px] lg:min-h-[540px]">
        <img
            src="{{ asset('assets/image/bg-ebook.png') }}"
            alt="E-Book Hero"
            class="absolute inset-0 h-full w-full object-cover"
        >

        {{-- Overlay gelap --}}
        <div class="absolute inset-0 bg-black/45"></div>

        {{-- Content --}}
        <div
            data-animate="fade-up"
            data-animate-duration="slow"
            data-animate-ease="smooth"
            class="relative z-[2] mx-auto flex min-h-[380px] max-w-[1240px] items-center justify-center px-6 py-14 text-center sm:min-h-[460px] lg:min-h-[540px] lg:px-8">
            <div class="max-w-[760px]">
                <h1 class="font-heading text-[34px] font-bold leading-[1.08] text-white sm:text-[48px] lg:text-[60px]">
                    Perdalam Ilmu Sipil
                    <br>
                    Kapanpun dan Dimanapun
                </h1>

                <p class="mx-auto mt-4 max-w-[620px] text-[12px] leading-6 text-white/85 sm:text-[13px] lg:text-[14px]">
                    Dapatkan akses instan ke literatur berkualitas tinggi. Mulai dari konsep dasar hingga studi
                    kasus proyek nyata, semua dirancang untuk memperkuat pemahaman Anda tanpa harus repot
                    datang ke toko buku.
                </p>
            </div>
        </div>

        {{-- Wave bawah --}}
        <div class="absolute bottom-0 left-0 z-[3] w-full overflow-hidden leading-none">
            <svg viewBox="0 0 1440 120" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"
                class="block h-[68px] w-full sm:h-[78px] lg:h-[92px]">
                <path
                    d="M0,96 C180,120 340,72 520,62 C720,50 880,102 1060,92 C1220,84 1335,58 1440,46 L1440,120 L0,120 Z"
                    fill="#FCF5EE"
                />
            </svg>
        </div>
    </div>
</section>