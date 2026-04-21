<section class="bg-[#FCF5EE]">
    <div class="mx-auto max-w-[1240px] px-6 py-10 lg:px-8">
        <div class="grid gap-8 lg:grid-cols-[260px_minmax(0,1fr)] lg:items-start">
            <div>
                <h2 class="font-heading text-[34px] leading-[1.05] text-[#C17F3A] sm:text-[40px]">
                    E-Book yang
                    <br>
                    banyak di
                    <br>
                    cari
                </h2>
            </div>

            <div class="grid grid-cols-2 gap-4 sm:grid-cols-3">
                @foreach ($popularEbooks as $book)
                    @include('components.ebook.book-card', [
                        'cover' => $book->cover,
                        'title' => $book->title,
                        'author' => $book->author,
                        'price' => 'Rp. ' . number_format($book->price, 0, ',', '.'),
                        'slug' => $book->slug,
                    ])
                @endforeach
            </div>
        </div>
    </div>
</section>