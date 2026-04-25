@extends('layouts.app')

@section('content')
<section class="bg-[#FAF6F2] py-12">
    <div class="mx-auto max-w-[1240px] px-6 lg:px-8">
        <div class="mb-8">
            <h1 class="font-heading text-[38px] text-[#4D371F] md:text-[48px]">
                Checkout E-Book
            </h1>
            <p class="mt-2 text-sm text-[#8A7060]">
                Pastikan detail pesanan Anda sudah sesuai sebelum melanjutkan ke WhatsApp admin.
            </p>
        </div>

        <div class="grid gap-6 lg:grid-cols-[1.05fr_0.95fr]">
            <div class="rounded-[24px] bg-white p-6 shadow-sm md:p-8">
                <div class="grid gap-6 md:grid-cols-[180px_minmax(0,1fr)]">
                    <div class="flex justify-center rounded-[18px] bg-[#F7EFE5] p-4">
                        <img
                            src="{{ $ebook->cover ? asset('storage/' . $ebook->cover) : asset('assets/image/book-baja.png') }}"
                            alt="{{ $ebook->title }}"
                            class="h-[240px] w-auto object-contain"
                        >
                    </div>

                    <div>
                        <p class="text-[12px] uppercase tracking-[0.18em] text-[#B48659]">
                            Detail Produk
                        </p>

                        <h2 class="mt-2 font-heading text-[34px] text-[#4D371F]">
                            {{ $ebook->title }}
                        </h2>

                        <p class="mt-3 text-sm text-[#7F6A58]">
                            Penulis: {{ $ebook->author ?: '-' }}
                        </p>

                        <p class="mt-5 text-sm leading-7 text-[#5A4636]">
                            {{ $ebook->description ?: 'Deskripsi e-book belum tersedia.' }}
                        </p>

                        <div class="mt-6 rounded-[18px] bg-[#F7EFE5] px-5 py-4">
                            <p class="text-[12px] tracking-[0.16em] text-[#A78463]">
                                Harga Satuan
                            </p>
                            <p class="mt-2 font-heading text-[30px] text-[#D4904A]">
                                Rp {{ number_format($ebook->price, 0, ',', '.') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="rounded-[24px] bg-white p-6 shadow-sm md:p-8">
                <h2 class="font-heading text-[30px] text-[#4D371F]">
                    Detail Pemesan
                </h2>

                <div class="mt-6 space-y-4">
                    <div class="rounded-[16px] bg-[#F7EFE5] px-4 py-3">
                        <p class="text-[12px] text-[#A78463]">Nama</p>
                        <p class="mt-1 text-sm font-medium text-[#4D371F]">{{ $user->name }}</p>
                    </div>

                    <div class="rounded-[16px] bg-[#F7EFE5] px-4 py-3">
                        <p class="text-[12px] text-[#A78463]">Email</p>
                        <p class="mt-1 text-sm font-medium text-[#4D371F]">{{ $user->email }}</p>
                    </div>

                    <div class="rounded-[16px] bg-[#F7EFE5] px-4 py-3">
                        <p class="text-[12px] text-[#A78463]">WhatsApp</p>
                        <p class="mt-1 text-sm font-medium text-[#4D371F]">{{ $user->whatsapp ?: '-' }}</p>
                    </div>

                    <div class="rounded-[16px] bg-[#F7EFE5] px-4 py-3">
                        <p class="text-[12px] text-[#A78463]">Status / Pekerjaan</p>
                        <p class="mt-1 text-sm font-medium text-[#4D371F]">{{ $user->profession ?: '-' }}</p>
                    </div>
                </div>

                <form method="POST" action="{{ route('checkout.ebook.whatsapp', $ebook->slug) }}" class="mt-8">
                    @csrf

                    <div>
                        <label class="mb-2 block text-sm font-medium text-[#4D371F]">
                            Jumlah
                        </label>

                        <div class="flex w-fit items-center rounded-[16px] border border-[#D9C4B0] bg-[#FAF6F2]">
                            <button type="button" id="qtyMinus"
                                class="flex h-[46px] w-[46px] items-center justify-center text-[22px] text-[#D4904A]">
                                -
                            </button>

                            <input
                                id="qtyInput"
                                type="number"
                                name="qty"
                                value="{{ $qty }}"
                                min="1"
                                class="h-[46px] w-[72px] border-x border-[#D9C4B0] bg-transparent text-center text-[16px] font-semibold text-[#4D371F] outline-none"
                            >

                            <button type="button" id="qtyPlus"
                                class="flex h-[46px] w-[46px] items-center justify-center text-[22px] text-[#D4904A]">
                                +
                            </button>
                        </div>
                    </div>

                    <div class="mt-6 rounded-[18px] bg-[#F7EFE5] px-5 py-4">
                        <p class="text-[12px] tracking-[0.16em] text-[#A78463]">
                            Subtotal
                        </p>
                        <p id="subtotalText" class="mt-2 font-heading text-[30px] text-[#D4904A]">
                            Rp {{ number_format($subtotal, 0, ',', '.') }}
                        </p>
                    </div>

                    <div class="mt-6 grid gap-3 sm:grid-cols-2">
                        <button type="submit"
                            class="inline-flex items-center justify-center rounded-[16px] bg-[#D4904A] px-6 py-4 text-[15px] font-semibold text-white transition hover:bg-[#c9853c]">
                            Bayar via WhatsApp
                        </button>

                        <a href="{{ route('ebooks.index') }}"
                            class="inline-flex items-center justify-center rounded-[16px] border border-[#D4904A] px-6 py-4 text-[15px] font-semibold text-[#D4904A] transition hover:bg-[#fff7ef]">
                            Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const minusBtn = document.getElementById('qtyMinus');
        const plusBtn = document.getElementById('qtyPlus');
        const qtyInput = document.getElementById('qtyInput');
        const subtotalText = document.getElementById('subtotalText');
        const unitPrice = {{ (int) $ebook->price }};

        function formatRupiah(number) {
            return 'Rp ' + new Intl.NumberFormat('id-ID').format(number);
        }

        function updateSubtotal() {
            let qty = parseInt(qtyInput.value || 1);

            if (qty < 1 || isNaN(qty)) {
                qty = 1;
                qtyInput.value = 1;
            }

            subtotalText.textContent = formatRupiah(unitPrice * qty);
        }

        minusBtn.addEventListener('click', function () {
            let qty = parseInt(qtyInput.value || 1);
            qty = Math.max(1, qty - 1);
            qtyInput.value = qty;
            updateSubtotal();
        });

        plusBtn.addEventListener('click', function () {
            let qty = parseInt(qtyInput.value || 1);
            qty += 1;
            qtyInput.value = qty;
            updateSubtotal();
        });

        qtyInput.addEventListener('input', updateSubtotal);
    });
</script>
@endpush
@endsection