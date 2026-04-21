<section class="bg-[#DCC09B]">
    <div class="mx-auto max-w-[1240px] px-6 py-8 lg:px-8">
        <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
            @foreach ($ebooks as $book)
                @include('components.ebook.book-card', [
                    'cover' => $book->cover,
                    'title' => $book->title,
                    'author' => $book->author,
                    'price' => 'Rp. ' . number_format($book->price, 0, ',', '.'),
                    'slug' => $book->slug,
                ])
            @endforeach
        </div>

        <div class="mt-8">
            {{ $ebooks->links() }}
        </div>
    </div>
</section>