<article
    data-animate="fade-up"
    data-animate-delay="{{ $animateDelay ?? '0ms' }}"
    data-animate-duration="slow"
    data-animate-ease="smooth"
    class="h-full rounded-[8px] bg-white p-3 shadow-[0_1px_2px_rgba(0,0,0,0.06)]">
    <button
        type="button"
        class="ebook-detail-trigger block h-full w-full text-left"
        data-title="{{ $book->title }}"
        data-author="{{ $book->author ?: 'Penulis belum tersedia' }}"
        data-description="{{ $book->description ?: 'Deskripsi e-book belum tersedia.' }}"
        data-price="Rp. {{ number_format($book->price, 0, ',', '.') }}"
        data-image="{{ $book->cover ? asset('storage/' . $book->cover) : asset('assets/image/book-baja.png') }}"
        data-checkout-url="{{ route('checkout.ebook', $book->slug) }}">

        <div class="flex justify-center">
            <div class="flex h-[170px] w-full items-center justify-center overflow-hidden rounded-[4px] bg-white sm:h-[185px]">
                <img
                    src="{{ $book->cover ? asset('storage/' . $book->cover) : asset('assets/image/book-baja.png') }}"
                    alt="{{ $book->title }}"
                    class="max-h-full w-auto object-contain">
            </div>
        </div>

        <div class="mt-3">
            <h3 class="line-clamp-2 text-[15px] font-semibold leading-5 text-[#2F2419]">
                {{ $book->title }}
            </h3>

            <p class="mt-1 line-clamp-2 text-[11px] leading-[1.6] text-[#6B5C4E]">
                {{ $book->author ?: 'Penulis belum tersedia' }}
            </p>

            <p class="mt-2 text-[15px] font-semibold text-[#2F2419]">
                Rp. {{ number_format($book->price, 0, ',', '.') }}
            </p>
        </div>
    </button>
</article>