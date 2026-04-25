<section class="bg-[#FAF6F2] py-12">
    <div class="mx-auto max-w-[1240px] px-6 lg:px-8">
        <div class="grid items-start gap-8 lg:grid-cols-[240px_minmax(0,1fr)]">
            <div data-animate="fade-right" data-animate-duration="slow" data-animate-ease="smooth">
                <h2 class="font-heading text-[38px] leading-[1.05] text-[#D4904A] md:text-[46px]">
                    E-Book yang
                    <br>
                    banyak di
                    <br>
                    cari
                </h2>
            </div>

            <div data-animate="fade-left" data-animate-delay="140ms" data-animate-duration="slow" data-animate-ease="smooth"
                class="grid grid-cols-2 gap-5 sm:grid-cols-3">
                @forelse ($popularEbooks as $book)
                    @include('components.ebook.book-card', [
                        'book' => $book,
                        'animateDelay' => (($loop->index % 6) * 140) . 'ms'
                    ])
                @empty
                    <div class="col-span-full rounded-[12px] bg-white px-6 py-10 text-center text-sm text-[#8A7060]">
                        Belum ada e-book populer.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</section>