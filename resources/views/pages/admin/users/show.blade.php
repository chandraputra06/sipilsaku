@extends('layouts.admin')

@section('content')
    <section>
        <div class="mb-6">
            <h1 class="font-heading text-[38px] text-[#4D371F]">Detail User</h1>
            <p class="mt-1 text-sm text-[#8A7060]">Informasi lengkap pengguna Sipilsaku.</p>
        </div>

        @if (session('success'))
            <div class="mb-6 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
                {{ session('success') }}
            </div>
        @endif

        <div class="rounded-[22px] bg-white p-6 shadow-sm md:p-8">
            <div class="grid gap-5 md:grid-cols-2">
                <div class="rounded-xl bg-[#FCF5EE] px-4 py-4">
                    <p class="text-xs text-[#8A7060]">Nama</p>
                    <p class="mt-1 text-sm font-medium text-[#4D371F]">{{ $user->name }}</p>
                </div>

                <div class="rounded-xl bg-[#FCF5EE] px-4 py-4">
                    <p class="text-xs text-[#8A7060]">Email</p>
                    <p class="mt-1 text-sm font-medium text-[#4D371F]">{{ $user->email }}</p>
                </div>

                <div class="rounded-xl bg-[#FCF5EE] px-4 py-4">
                    <p class="text-xs text-[#8A7060]">Role</p>
                    <p class="mt-1 text-sm font-medium text-[#4D371F]">{{ $user->role === '1' ? 'Admin' : 'User' }}</p>
                </div>

                <div class="rounded-xl bg-[#FCF5EE] px-4 py-4">
                    <p class="text-xs text-[#8A7060]">WhatsApp</p>
                    <p class="mt-1 text-sm font-medium text-[#4D371F]">{{ $user->whatsapp ?: '-' }}</p>
                </div>

                <div class="rounded-xl bg-[#FCF5EE] px-4 py-4 md:col-span-2">
                    <p class="text-xs text-[#8A7060]">Status / Pekerjaan</p>
                    <p class="mt-1 text-sm font-medium text-[#4D371F]">{{ $user->profession ?: '-' }}</p>
                </div>
            </div>

            <div class="mt-6">
                <a href="{{ route('admin.users.index') }}"
                    class="inline-flex items-center gap-2 rounded-full border border-[#D89A53] px-5 py-2 text-sm font-medium text-[#D89A53] transition hover:bg-[#D89A53] hover:text-white">
                    Kembali
                </a>
            </div>
        </div>

        @if ($user->courseOrders->count())
            <div class="mt-8 rounded-[22px] bg-white p-6 shadow-sm">
                <h2 class="font-heading text-[28px] text-[#4D371F]">Akses Course User</h2>

                @if ($user->courseOrders->count())
                    <div class="mt-5 space-y-4">
                        @foreach ($user->courseOrders as $order)
                            <form method="POST" action="{{ route('admin.users.course-orders.update', [$user, $order]) }}"
                                class="rounded-xl border border-[#E8DDD2] p-4">
                                @csrf
                                @method('PUT')

                                <div class="mb-4">
                                    <p class="font-medium text-[#4D371F]">{{ $order->course->title }}</p>
                                    <p class="text-xs text-[#8A7060]">Qty: {{ $order->qty }}</p>
                                </div>

                                <div class="grid gap-4 md:grid-cols-2">
                                    <div>
                                        <label class="mb-2 block text-sm font-medium text-[#4D371F]">Status Bayar</label>
                                        <select name="payment_status" class="auth-input">
                                            <option value="pending"
                                                {{ $order->payment_status === 'pending' ? 'selected' : '' }}>Pending
                                            </option>
                                            <option value="paid"
                                                {{ $order->payment_status === 'paid' ? 'selected' : '' }}>Paid</option>
                                            <option value="cancelled"
                                                {{ $order->payment_status === 'cancelled' ? 'selected' : '' }}>Cancelled
                                            </option>
                                        </select>
                                    </div>

                                    <div class="flex items-end">
                                        <label
                                            class="flex items-center gap-3 rounded-xl bg-[#FCF5EE] px-4 py-3 text-sm text-[#4D371F]">
                                            <input type="checkbox" name="access_granted" value="1"
                                                {{ $order->access_granted ? 'checked' : '' }}
                                                class="rounded border-[#CBB8A5] text-[#DD9E59] shadow-sm focus:ring-[#DD9E59]">
                                            <span>Buka akses video</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <button type="submit" class="btn-primary px-5 py-2 text-sm">
                                        Simpan Akses
                                    </button>
                                </div>
                            </form>
                        @endforeach
                    </div>
                @else
                    <div class="mt-5 rounded-xl bg-[#FCF5EE] px-4 py-4 text-sm text-[#8A7060]">
                        User ini belum melakukan order course, jadi belum ada akses yang bisa diatur.
                    </div>
                @endif
            </div>
        @endif
    </section>
@endsection
