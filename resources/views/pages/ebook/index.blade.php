@extends('layouts.app')

@section('title', 'E-Book')

@section('content')
    @include('components.ebook.hero')
    @include('components.ebook.filter-bar')
    @include('components.ebook.book-grid')
    @include('components.ebook.popular-section')
    @include('components.ebook.payment-flow')

    {{-- Modal Detail E-Book --}}
    <div id="ebookDetailModal"
        class="pointer-events-none fixed inset-0 z-[999] overflow-y-auto overflow-x-hidden overscroll-contain bg-black/45 px-3 py-4 opacity-0 transition duration-300 sm:px-4 sm:py-6">

        <div class="flex min-h-full items-start justify-center sm:items-center">
            <div id="ebookDetailPanel"
                class="relative my-auto w-full max-w-[920px] translate-y-6 rounded-[24px] bg-[#FAF6F2] opacity-0 shadow-[0_20px_60px_rgba(0,0,0,0.25)] transition duration-300 max-h-[calc(100vh-32px)] overflow-y-auto overflow-x-hidden sm:rounded-[28px] sm:max-h-[calc(100vh-48px)]">

                <button id="ebookModalClose"
                    class="absolute right-3 top-3 z-20 flex h-10 w-10 items-center justify-center rounded-full bg-[#F3E9DD] text-[22px] text-[#D4904A] shadow-md transition hover:scale-105 sm:right-4 sm:top-4 sm:h-11 sm:w-11 sm:text-[24px]">
                    ×
                </button>

                <div class="grid md:grid-cols-[1.02fr_1fr]">
                    <div
                        class="flex min-h-[160px] items-center justify-center overflow-hidden bg-[#D4904A] px-5 py-6 sm:min-h-[200px] sm:px-8 sm:py-8 md:min-h-[508px] md:p-10">
                        <img id="ebookModalImage" src="" alt="Detail E-Book"
                            class="max-h-[148px] w-auto object-contain sm:max-h-[190px] md:max-h-[320px]">
                    </div>

                    <div class="p-5 sm:p-6 md:p-10">
                        <h2 id="ebookModalTitle"
                            class="mt-1 font-heading text-[22px] leading-tight text-[#3E2B1D] sm:text-[28px] md:mt-3 md:text-[48px] md:leading-none">
                            Judul E-Book
                        </h2>

                        <div class="mt-4 h-px w-full bg-[#D7B28A] md:mt-6"></div>

                        <p id="ebookModalAuthor"
                            class="mt-4 text-[13px] font-medium leading-7 text-[#7A5B40] md:mt-6 md:text-[14px]">
                            Penulis
                        </p>

                        <p id="ebookModalDescription"
                            class="mt-3 text-[14px] leading-7 text-[#5A4636] md:mt-4 md:text-[16px] md:leading-8">
                            Deskripsi e-book
                        </p>

                        <div class="mt-5 grid gap-3 sm:grid-cols-2 md:mt-7 md:gap-4">
                            <div class="rounded-[14px] bg-[#F3E9DD] px-4 py-4 sm:rounded-[18px] sm:px-5">
                                <p class="text-[10px] tracking-[0.14em] text-[#A78463] sm:text-[12px] sm:tracking-[0.2em]">
                                    Format
                                </p>
                                <p class="mt-2 text-[14px] font-semibold text-[#3E2B1D] sm:text-[16px]">
                                    PDF Digital
                                </p>
                            </div>

                            <div class="rounded-[14px] bg-[#F3E9DD] px-4 py-4 sm:rounded-[18px] sm:px-5">
                                <p class="text-[10px] tracking-[0.14em] text-[#A78463] sm:text-[12px] sm:tracking-[0.2em]">
                                    Harga
                                </p>
                                <p id="ebookModalPrice" class="mt-2 text-[18px] font-bold text-[#D4904A] sm:text-[20px]">
                                    Rp. 100.000
                                </p>
                            </div>
                        </div>

                        <div class="mt-6 grid gap-3 sm:grid-cols-2 md:mt-8">
                            <a href="#" id="ebookModalCheckoutLink"
                                class="inline-flex items-center justify-center rounded-[14px] bg-[#D4904A] px-6 py-3 text-[15px] font-semibold text-white transition hover:bg-[#c9853c] sm:rounded-[16px] sm:py-4">
                                Beli Sekarang
                            </a>

                            <button type="button" id="ebookModalCloseSecondary"
                                class="inline-flex items-center justify-center rounded-[14px] border border-[#D4904A] px-6 py-3 text-[15px] font-semibold text-[#D4904A] transition hover:bg-[#fff7ef] sm:rounded-[16px] sm:py-4">
                                Tutup
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const triggers = document.querySelectorAll('.ebook-detail-trigger');
            const modal = document.getElementById('ebookDetailModal');
            const panel = document.getElementById('ebookDetailPanel');
            const closeBtn = document.getElementById('ebookModalClose');
            const closeBtnSecondary = document.getElementById('ebookModalCloseSecondary');
            const checkoutLink = document.getElementById('ebookModalCheckoutLink');

            const titleEl = document.getElementById('ebookModalTitle');
            const authorEl = document.getElementById('ebookModalAuthor');
            const descriptionEl = document.getElementById('ebookModalDescription');
            const priceEl = document.getElementById('ebookModalPrice');
            const imageEl = document.getElementById('ebookModalImage');

            if (!modal || !panel || !titleEl || !authorEl || !descriptionEl || !priceEl || !imageEl) return;

            function openModal(data) {
                titleEl.textContent = data.title || 'Judul E-Book';
                authorEl.textContent = data.author || 'Penulis belum tersedia';
                descriptionEl.textContent = data.description || 'Deskripsi e-book belum tersedia.';
                priceEl.textContent = data.price || 'Rp. 0';
                imageEl.src = data.image || '';
                imageEl.alt = data.title || 'Detail E-Book';

                modal.classList.remove('pointer-events-none', 'opacity-0');
                modal.classList.add('opacity-100');

                panel.classList.remove('translate-y-6', 'opacity-0');
                panel.classList.add('translate-y-0', 'opacity-100');

                document.documentElement.classList.add('overflow-hidden');
                document.body.classList.add('overflow-hidden');

                checkoutLink.href = data.checkoutUrl || '#';
            }

            function closeModal() {
                modal.classList.add('pointer-events-none', 'opacity-0');
                modal.classList.remove('opacity-100');

                panel.classList.add('translate-y-6', 'opacity-0');
                panel.classList.remove('translate-y-0', 'opacity-100');

                document.documentElement.classList.remove('overflow-hidden');
                document.body.classList.remove('overflow-hidden');
            }

            triggers.forEach((trigger) => {
                trigger.addEventListener('click', function() {
                    openModal({
                        title: this.dataset.title,
                        author: this.dataset.author,
                        description: this.dataset.description,
                        price: this.dataset.price,
                        image: this.dataset.image,
                        checkoutUrl: this.dataset.checkoutUrl,
                    });
                });
            });

            if (closeBtn) closeBtn.addEventListener('click', closeModal);
            if (closeBtnSecondary) closeBtnSecondary.addEventListener('click', closeModal);

            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    closeModal();
                }
            });

            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    closeModal();
                }
            });
        });

        if ('scrollRestoration' in history) {
            history.scrollRestoration = 'manual';
        }

        window.addEventListener('pageshow', function() {
            window.scrollTo(0, 0);
        });
    </script>
@endpush
