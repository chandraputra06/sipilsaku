<section class="bg-[#E7CCAA] py-12">
    <div class="mx-auto max-w-[1240px] px-6 lg:px-8">
        <div class="grid grid-cols-2 gap-x-5 gap-y-6 sm:grid-cols-3 lg:grid-cols-4">
            @forelse ($ebooks as $book)
                @include('components.ebook.book-card', [
                    'book' => $book,
                    'animateDelay' => (($loop->index % 8) * 120) . 'ms'
                ])
            @empty
                <div class="col-span-full rounded-[12px] bg-white px-6 py-12 text-center text-sm text-[#8A7060]">
                    E-Book tidak ditemukan.
                </div>
            @endforelse
        </div>

        <div data-animate="fade-up" data-animate-delay="260ms" data-animate-duration="slow" data-animate-ease="smooth" class="mt-8">
            {{ $ebooks->links() }}
        </div>
    </div>
</section>