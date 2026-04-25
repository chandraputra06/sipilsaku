@extends('layouts.admin')

@section('content')
<section class="bg-[#FCF5EE] py-10">
    <div class="mx-auto max-w-[1240px] px-6 lg:px-8">
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h1 class="font-heading text-[38px] text-[#4D371F]">Manajemen E-Book</h1>
                <p class="mt-1 text-sm text-[#8A7060]">Kelola data e-book Sipilsaku.</p>
            </div>

            <a href="{{ route('admin.ebooks.create') }}" class="btn-primary px-6">
                Tambah E-Book
            </a>
        </div>

        @if (session('success'))
            <div class="mb-6 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
                {{ session('success') }}
            </div>
        @endif

        <div class="rounded-[22px] bg-white p-6 shadow-sm">
            <form method="GET" action="{{ route('admin.ebooks.index') }}" class="mb-6">
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Cari judul atau penulis..."
                    class="auth-input max-w-md"
                >
            </form>

            <div class="overflow-x-auto">
                <table class="w-full min-w-[800px] text-left">
                    <thead>
                        <tr class="border-b border-[#E8DDD2] text-sm text-[#8A7060]">
                            <th class="px-3 py-3">Cover</th>
                            <th class="px-3 py-3">Judul</th>
                            <th class="px-3 py-3">Penulis</th>
                            <th class="px-3 py-3">Harga</th>
                            <th class="px-3 py-3">Popular</th>
                            <th class="px-3 py-3">Status</th>
                            <th class="px-3 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($ebooks as $ebook)
                            <tr class="border-b border-[#F1E8DE] text-sm text-[#4D371F]">
                                <td class="px-3 py-3">
                                    <img
                                        src="{{ $ebook->cover ? asset('storage/' . $ebook->cover) : asset('assets/image/ebook-placeholder.png') }}"
                                        alt="{{ $ebook->title }}"
                                        class="h-14 w-10 rounded object-cover"
                                    >
                                </td>
                                <td class="px-3 py-3">{{ $ebook->title }}</td>
                                <td class="px-3 py-3">{{ $ebook->author ?: '-' }}</td>
                                <td class="px-3 py-3">Rp {{ number_format($ebook->price, 0, ',', '.') }}</td>
                                <td class="px-3 py-3">{{ $ebook->is_popular ? 'Ya' : 'Tidak' }}</td>
                                <td class="px-3 py-3">{{ $ebook->is_active ? 'Aktif' : 'Nonaktif' }}</td>
                                <td class="px-3 py-3">
                                    <div class="flex items-center gap-2">
                                        <a href="{{ route('admin.ebooks.edit', $ebook) }}" class="text-[#D89A53] hover:underline">
                                            Edit
                                        </a>

                                        <form method="POST" action="{{ route('admin.ebooks.destroy', $ebook) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:underline">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-3 py-6 text-center text-sm text-[#8A7060]">
                                    Belum ada data e-book.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{ $ebooks->links() }}
            </div>
        </div>
    </div>
</section>
@endsection