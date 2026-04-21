<article class="rounded-[6px] bg-white p-3 shadow-[0_1px_2px_rgba(0,0,0,0.06)]">
    <a href="{{ route('ebooks.show', $slug) }}" class="block">
        <div class="flex justify-center">
            <img
                src="{{ $cover ? asset('storage/' . $cover) : asset('assets/image/ebook-placeholder.png') }}"
                alt="{{ $title }}"
                class="h-[150px] w-auto object-contain"
            >
        </div>

        <div class="mt-3">
            <h3 class="line-clamp-1 text-[11px] font-semibold leading-4 text-[#2F2419]">
                {{ $title }}
            </h3>

            <p class="mt-1 line-clamp-2 text-[8px] leading-[1.45] text-[#6B5C4E]">
                {{ $author }}
            </p>

            <p class="mt-2 text-[10px] font-semibold text-[#2F2419]">
                {{ $price }}
            </p>
        </div>
    </a>
</article>