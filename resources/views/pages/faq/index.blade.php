@extends('layouts.app')

@section('title', 'FAQ')

@section('content')
    @php
        $faqs = [
            [
                'question' => 'Bagaimana cara mendaftar kursus di Sipilsaku?',
                'answer' =>
                    'Anda dapat memilih kursus yang diinginkan melalui halaman course, kemudian melakukan login atau registrasi akun. Setelah itu, lanjutkan ke proses pembayaran untuk mendapatkan akses ke materi pembelajaran.',
            ],
            [
                'question' => 'Apakah kursus dilakukan secara online?',
                'answer' =>
                    'Ya, seluruh pembelajaran dilakukan secara online melalui platform yang telah disediakan. Beberapa sesi juga dilakukan secara live menggunakan Zoom atau Google Meet.',
            ],
            [
                'question' => 'Apakah saya akan mendapatkan sertifikat?',
                'answer' =>
                    'Peserta yang telah menyelesaikan seluruh materi dan memenuhi ketentuan yang berlaku akan mendapatkan sertifikat sebagai bukti telah mengikuti pelatihan.',
            ],
            [
                'question' => 'Berapa lama saya bisa mengakses kursus?',
                'answer' =>
                    'Durasi akses kursus tergantung pada paket yang dipilih. Informasi detail mengenai masa akses akan ditampilkan pada halaman course sebelum Anda melakukan pendaftaran.',
            ],
            [
                'question' => 'Apakah tersedia bantuan jika saya mengalami kendala?',
                'answer' =>
                    'Tentu. Tim kami siap membantu Anda jika mengalami kendala teknis maupun terkait materi. Anda dapat menghubungi kami melalui WhatsApp atau kontak yang tersedia di website.',
            ],
            [
                'question' => 'Apakah materi dapat diakses kembali setelah selesai?',
                'answer' =>
                    'Selama masa akses kursus masih berlaku, Anda dapat mengakses kembali seluruh materi pembelajaran kapan saja sesuai kebutuhan.',
            ],
            [
                'question' => 'Apakah kursus ini cocok untuk pemula?',
                'answer' =>
                    'Ya, beberapa program dirancang untuk pemula yang ingin memahami dasar terlebih dahulu. Namun, tersedia juga kelas lanjutan untuk peserta dengan pengalaman sebelumnya.',
            ],
        ];
    @endphp

    {{-- HERO --}}
    <section class="bg-[#FAF6F2] py-16 lg:py-20">
        <div
            data-animate="fade-up"
            data-animate-duration="slow"
            data-animate-ease="smooth"
            class="mx-auto max-w-[1240px] px-6 text-center lg:px-8">
            <h1 class="font-heading text-[40px] font-bold text-[#2B2118] md:text-[56px]">
                Frequently Asked Questions
            </h1>

            <p class="mx-auto mt-5 max-w-[640px] text-sm leading-7 text-[#6B5C4E] sm:text-[15px]">
                Temukan jawaban atas pertanyaan yang paling sering ditanyakan terkait
                kursus, pendaftaran, dan penggunaan platform Sipilsaku.
            </p>
        </div>
    </section>

    {{-- FAQ LIST --}}
    <section class="bg-white py-16 lg:py-20">
        <div class="mx-auto max-w-[900px] px-6 lg:px-8">
            <div class="space-y-4">
                @foreach ($faqs as $index => $faq)
                    <div
                        data-animate="fade-up"
                        data-animate-delay="{{ $index * 180 }}ms"
                        data-animate-duration="slow"
                        data-animate-ease="smooth"
                        class="faq-item overflow-hidden rounded-[18px] border border-[#E7D7C7] bg-white">
                        <button type="button"
                            class="faq-question flex w-full items-center justify-between px-6 py-5 text-left">
                            <span class="pr-4 text-[16px] font-semibold text-[#2B2118]">
                                {{ $faq['question'] }}
                            </span>

                            <span
                                class="faq-icon text-[24px] leading-none text-[#D4904A] transition-transform duration-300">
                                +
                            </span>
                        </button>

                        <div class="faq-answer max-h-0 overflow-hidden opacity-0 transition-all duration-300 ease-in-out">
                            <div class="px-6 pb-5 text-sm leading-7 text-[#6B5C4E]">
                                {{ $faq['answer'] }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="relative overflow-hidden bg-[#D4904A] py-16 lg:py-20 lg:pb-30">
        <div
            data-animate="fade-up"
            data-animate-delay="220ms"
            data-animate-duration="slow"
            data-animate-ease="smooth"
            class="mx-auto max-w-[700px] px-6 text-center lg:px-8">

            <h2 class="font-heading text-[32px] font-bold text-white md:text-[40px]">
                Masih ada pertanyaan?
            </h2>

            <p class="mx-auto mt-4 max-w-[520px] text-sm leading-7 text-white/85">
                Jika Anda belum menemukan jawaban yang dicari, tim kami siap membantu Anda
                kapan saja melalui layanan pelanggan kami.
            </p>

            <a href="https://wa.me/6281916113700"
                class="mt-8 inline-flex items-center gap-2 rounded-[12px] bg-white px-8 py-4 text-sm font-semibold text-[#D4904A] shadow-lg shadow-black/10 transition hover:bg-[#FAF3EC]">
                Hubungi Admin
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>

        {{-- Wave bawah: orange → cream --}}
        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none">
            <svg viewBox="0 0 1440 70" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"
                class="block h-[60px] w-full">
                <path d="M0,35 C360,70 720,0 1080,35 C1260,52 1380,28 1440,35 L1440,70 L0,70 Z" fill="#FAF6F2" />
            </svg>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const items = document.querySelectorAll('.faq-item');

            items.forEach((item) => {
                const button = item.querySelector('.faq-question');
                const answer = item.querySelector('.faq-answer');
                const icon = item.querySelector('.faq-icon');

                button.addEventListener('click', () => {
                    const isOpen = answer.classList.contains('open');

                    items.forEach((otherItem) => {
                        const otherAnswer = otherItem.querySelector('.faq-answer');
                        const otherIcon = otherItem.querySelector('.faq-icon');

                        otherAnswer.classList.remove('open');
                        otherAnswer.style.maxHeight = '0px';
                        otherAnswer.style.opacity = '0';
                        otherIcon.textContent = '+';
                        otherIcon.style.transform = 'rotate(0deg)';
                    });

                    if (!isOpen) {
                        answer.classList.add('open');
                        answer.style.maxHeight = answer.scrollHeight + 'px';
                        answer.style.opacity = '1';
                        icon.textContent = '−';
                        icon.style.transform = 'rotate(180deg)';
                    }
                });
            });
        });
    </script>
@endpush