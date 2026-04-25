@extends('layouts.app')

@section('content')
<section class="bg-[#FAF6F2] py-10 sm:py-12 lg:py-14">
    <div class="mx-auto max-w-[980px] px-5 sm:px-6 lg:px-8">
        <div class="mb-7 sm:mb-8">
            <h1 class="font-heading text-[30px] leading-none text-[#4D371F] sm:text-[36px] lg:text-[40px]">
                Checkout Course
            </h1>
            <p class="mt-3 max-w-[680px] text-[14px] leading-7 text-[#8A7060] sm:text-sm">
                Periksa detail pesanan course Anda sebelum melanjutkan ke WhatsApp admin.
            </p>
        </div>

        <div class="grid gap-5 lg:grid-cols-[minmax(0,1fr)_320px] xl:grid-cols-[minmax(0,1fr)_340px]">
            {{-- Data Pemesan --}}
            <div class="rounded-[22px] bg-white p-5 shadow-sm ring-1 ring-[#F0E5DA] sm:p-6">
                <h2 class="font-heading text-[24px] text-[#4D371F] sm:text-[26px] lg:text-[28px]">
                    Data Pemesan
                </h2>

                <div class="mt-5 grid gap-3 sm:grid-cols-2 sm:gap-4">
                    <div class="rounded-xl bg-[#FCF5EE] px-4 py-4">
                        <p class="text-[11px] text-[#8A7060] sm:text-xs">Nama</p>
                        <p class="mt-1 text-sm font-medium text-[#4D371F]">{{ $user->name }}</p>
                    </div>

                    <div class="rounded-xl bg-[#FCF5EE] px-4 py-4">
                        <p class="text-[11px] text-[#8A7060] sm:text-xs">Email</p>
                        <p class="mt-1 break-words text-sm font-medium text-[#4D371F]">{{ $user->email }}</p>
                    </div>

                    <div class="rounded-xl bg-[#FCF5EE] px-4 py-4">
                        <p class="text-[11px] text-[#8A7060] sm:text-xs">WhatsApp</p>
                        <p class="mt-1 text-sm font-medium text-[#4D371F]">{{ $user->whatsapp ?: '-' }}</p>
                    </div>

                    <div class="rounded-xl bg-[#FCF5EE] px-4 py-4">
                        <p class="text-[11px] text-[#8A7060] sm:text-xs">Status / Pekerjaan</p>
                        <p class="mt-1 text-sm font-medium text-[#4D371F]">{{ $user->profession ?: '-' }}</p>
                    </div>
                </div>
            </div>

            {{-- Ringkasan Pesanan --}}
            <div class="rounded-[22px] bg-white p-5 shadow-sm ring-1 ring-[#F0E5DA] sm:p-6">
                <h2 class="font-heading text-[24px] text-[#4D371F] sm:text-[26px] lg:text-[28px]">
                    Ringkasan Pesanan
                </h2>

                <div class="mt-5 space-y-3 sm:space-y-4">
                    <div class="rounded-xl bg-[#FCF5EE] p-4">
                        <p class="text-[11px] text-[#8A7060] sm:text-xs">Produk</p>
                        <p class="mt-1 text-[15px] font-semibold leading-6 text-[#4D371F] sm:text-base">
                            {{ $course->title }}
                        </p>
                    </div>

                    <div class="rounded-xl bg-[#FCF5EE] p-4">
                        <p class="text-[11px] text-[#8A7060] sm:text-xs">Jenis pembelian</p>
                        <p class="mt-1 text-sm font-medium text-[#4D371F]">1 Akses Course</p>
                    </div>

                    <div class="rounded-xl bg-[#FCF5EE] p-4">
                        <p class="text-[11px] text-[#8A7060] sm:text-xs">Harga</p>
                        <p class="mt-1 text-[22px] font-bold leading-none text-[#4D371F] sm:text-[24px]">
                            Rp {{ number_format($subtotal, 0, ',', '.') }}
                        </p>
                    </div>
                </div>

                <form method="POST" action="{{ route('checkout.course.whatsapp', $course->slug) }}" class="mt-6">
                    @csrf

                    <button type="submit"
                        class="inline-flex w-full items-center justify-center gap-2 rounded-full bg-[#D89A53] px-6 py-3 text-sm font-semibold text-white transition hover:bg-[#c9863d]">
                        Lanjut ke WhatsApp
                        <i class="fa-solid fa-arrow-right text-xs"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection