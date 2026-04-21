<section class="bg-[#FCF5EE]">
    <div class="mx-auto max-w-[1240px] px-6 pb-8 pt-6 lg:px-8">
        <div class="text-center">
            <h2 class="font-heading text-[34px] font-bold text-[#C17F3A] sm:text-[40px] lg:text-[46px]">
                Semua E-Book
            </h2>
        </div>

        <div class="mt-8 flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
            <div class="flex items-center gap-3 text-[#C17F3A]">
                <span class="text-sm text-[#9E8A77]">
                    Total: {{ $ebooks->total() }} e-book
                </span>
            </div>

            <form method="GET" action="{{ route('ebooks.index') }}" class="flex w-full flex-col gap-3 lg:w-auto lg:flex-row lg:items-center">
                <div class="relative">
                    <select name="sort" class="h-[38px] w-full cursor-pointer appearance-none rounded-md border border-[#CBB8A5] bg-white px-4 pr-10 text-sm text-[#4D371F] outline-none lg:w-[140px]">
                        <option value="nama" {{ request('sort') === 'nama' ? 'selected' : '' }}>Nama</option>
                        <option value="terbaru" {{ request('sort') === 'terbaru' ? 'selected' : '' }}>Terbaru</option>
                        <option value="termahal" {{ request('sort') === 'termahal' ? 'selected' : '' }}>Termahal</option>
                        <option value="termurah" {{ request('sort') === 'termurah' ? 'selected' : '' }}>Termurah</option>
                    </select>
                    <span class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 text-xs text-[#8A7060]">⌄</span>
                </div>

                <div class="relative w-full lg:w-[320px]">
                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Cari e-book..."
                        class="h-[38px] w-full rounded-md border border-[#CBB8A5] bg-white px-4 pr-10 text-sm text-[#4D371F] outline-none"
                    >
                    <span class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 text-[#8A7060]">
                        ⌕
                    </span>
                </div>

                <button type="submit" class="btn-primary h-[38px] px-5 py-0">
                    Cari
                </button>
            </form>
        </div>
    </div>
</section>