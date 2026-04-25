<section class="bg-[#FAF6F2] pt-6 pb-10">
    <div class="mx-auto max-w-[1240px] px-6 lg:px-8">
        <div class="text-center">
            <h2 class="font-heading text-[36px] font-bold text-[#D4904A] md:text-[46px]">
                Semua E-Book
            </h2>
        </div>

        <div class="mt-8 flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
            <div class="flex items-center gap-3 text-[#D4904A]">
                <button type="button" class="text-[24px] leading-none">‹</button>

                <div class="text-[15px] text-[#B7A18A]">
                    {{ $ebooks->firstItem() ?? 0 }}-{{ $ebooks->lastItem() ?? 0 }} dari {{ $ebooks->total() }}
                </div>

                <button type="button" class="text-[24px] leading-none">›</button>
            </div>

            <form id="ebookFilterForm" method="GET" action="{{ route('ebooks.index') }}"
                class="flex w-full flex-col gap-3 lg:w-auto lg:flex-row lg:items-center">
                <div class="relative">
                    <select id="ebookSort" name="sort"
                        class="h-[40px] w-full cursor-pointer appearance-none rounded-[6px] border border-[#CDBAA7] bg-white px-4 pr-10 text-[14px] text-[#4D371F] outline-none lg:w-[148px]">
                        <option value="semua" {{ request('sort', 'semua') === 'semua' ? 'selected' : '' }}>Semua</option>
                        <option value="nama" {{ request('sort') === 'nama' ? 'selected' : '' }}>Nama</option>
                        <option value="terbaru" {{ request('sort') === 'terbaru' ? 'selected' : '' }}>Terbaru</option>
                        <option value="termurah" {{ request('sort') === 'termurah' ? 'selected' : '' }}>Termurah</option>
                        <option value="termahal" {{ request('sort') === 'termahal' ? 'selected' : '' }}>Termahal</option>
                    </select>

                    <span class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 text-[10px] text-[#8B745E]">
                        ▼
                    </span>
                </div>

                <div class="relative w-full lg:w-[330px]">
                    <input
                        id="ebookSearch"
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Cari e-book..."
                        class="h-[40px] w-full rounded-[6px] border border-[#CDBAA7] bg-white px-4 pr-10 text-[14px] text-[#4D371F] outline-none"
                    >

                    <button type="submit"
                        class="absolute right-3 top-1/2 -translate-y-1/2 text-[#8B745E]">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m21 21-4.35-4.35M10.5 18a7.5 7.5 0 1 1 0-15 7.5 7.5 0 0 1 0 15Z" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('ebookFilterForm');
        const searchInput = document.getElementById('ebookSearch');
        const sortSelect = document.getElementById('ebookSort');

        if (!form || !searchInput || !sortSelect) return;

        let debounceTimer = null;

        sortSelect.addEventListener('change', function () {
            form.submit();
        });

        searchInput.addEventListener('input', function () {
            clearTimeout(debounceTimer);

            debounceTimer = setTimeout(function () {
                form.submit();
            }, 400);
        });
    });
</script>
@endpush