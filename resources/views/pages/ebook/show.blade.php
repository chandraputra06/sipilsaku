@extends('layouts.app')

@section('content')
<section class="bg-[#FCF5EE] py-12">
    <div class="mx-auto max-w-[1240px] px-6 lg:px-8">
        <div class="grid gap-10 lg:grid-cols-[320px_minmax(0,1fr)]">
            <div class="rounded-[18px] bg-white p-6 shadow-sm">
                <div class="flex justify-center">
                    <img src="{{ asset($ebook->cover) }}" alt="{{ $ebook->title }}" class="h-[320px] w-auto object-contain">
                </div>
            </div>

            <div>
                <p class="text-sm text-[#8A7060]">E-Book Sipilsaku</p>
                <h1 class="mt-2 font-heading text-[38px] text-[#4D371F]">
                    {{ $ebook->title }}
                </h1>

                <p class="mt-3 text-sm text-[#6B5C4E]">
                    Penulis: {{ $ebook->author ?: '-' }}
                </p>

                <p class="mt-6 text-base leading-8 text-[#4D371F]">
                    {{ $ebook->description ?: 'Deskripsi e-book belum tersedia.' }}
                </p>

                <div class="mt-8">
                    <p class="text-sm text-[#8A7060]">Harga</p>
                    <p class="mt-1 font-heading text-[32px] text-[#D89A53]">
                        Rp. {{ number_format($ebook->price, 0, ',', '.') }}
                    </p>
                </div>

                <div class="mt-8">
                    <a href="#" class="btn-primary px-8">
                        Beli Sekarang
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection