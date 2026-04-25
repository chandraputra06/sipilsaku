@extends('layouts.app')

@section('content')
<section class="bg-[#FAF6F2] py-10 sm:py-12 lg:py-14">
    <div class="mx-auto max-w-[1100px] px-5 sm:px-6 lg:px-8">
        <div class="grid items-start gap-6 lg:grid-cols-[280px_minmax(0,1fr)] lg:gap-8 xl:grid-cols-[320px_minmax(0,1fr)]">
            <div class="rounded-[20px] bg-white p-4 shadow-sm ring-1 ring-[#F0E5DA] sm:p-5 lg:sticky lg:top-24">
                <div class="flex justify-center rounded-[16px] bg-[#FCF5EE] p-4 sm:p-5">
                    <img
                        src="{{ $ebook->cover ? asset('storage/' . $ebook->cover) : asset('assets/image/book-baja.png') }}"
                        alt="{{ $ebook->title }}"
                        class="h-[220px] w-auto object-contain sm:h-[260px] lg:h-[320px]"
                    >
                </div>
            </div>

            <div class="rounded-[20px] bg-white p-5 shadow-sm ring-1 ring-[#F0E5DA] sm:p-6 lg:p-8">
                <p class="text-[12px] tracking-[0.16em] text-[#B48659] sm:text-sm">
                    E-Book Sipilsaku
                </p>

                <h1 class="mt-2 font-heading text-[28px] leading-tight text-[#4D371F] sm:text-[34px] lg:text-[42px]">
                    {{ $ebook->title }}
                </h1>

                <p class="mt-3 text-[14px] leading-7 text-[#6B5C4E] sm:text-sm">
                    Penulis: {{ $ebook->author ?: '-' }}
                </p>

                <div class="mt-5 h-px w-full bg-[#E8DCCF]"></div>

                <p class="mt-5 text-[15px] leading-8 text-[#4D371F] sm:text-base">
                    {{ $ebook->description ?: 'Deskripsi e-book belum tersedia.' }}
                </p>

                <div class="mt-6 grid gap-3 sm:grid-cols-2 lg:max-w-[460px]">
                    <div class="rounded-[16px] bg-[#FCF5EE] px-4 py-4">
                        <p class="text-[11px] tracking-[0.14em] text-[#A78463] sm:text-xs">
                            Format
                        </p>
                        <p class="mt-2 text-sm font-semibold text-[#4D371F] sm:text-[15px]">
                            PDF Digital
                        </p>
                    </div>

                    <div class="rounded-[16px] bg-[#FCF5EE] px-4 py-4">
                        <p class="text-[11px] tracking-[0.14em] text-[#A78463] sm:text-xs">
                            Harga
                        </p>
                        <p class="mt-2 font-heading text-[24px] leading-none text-[#D89A53] sm:text-[28px] lg:text-[32px]">
                            Rp {{ number_format($ebook->price, 0, ',', '.') }}
                        </p>
                    </div>
                </div>

                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    <a href="{{ route('checkout.ebook', $ebook->slug) }}"
                        class="inline-flex items-center justify-center rounded-[16px] bg-[#D89A53] px-8 py-3.5 text-sm font-semibold text-white transition hover:bg-[#c9863d]">
                        Beli Sekarang
                    </a>

                    <a href="{{ route('ebooks.index') }}"
                        class="inline-flex items-center justify-center rounded-[16px] border border-[#D89A53] px-8 py-3.5 text-sm font-semibold text-[#D89A53] transition hover:bg-[#fff7ef]">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection