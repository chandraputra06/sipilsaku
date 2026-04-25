@extends('layouts.admin')

@section('content')
    <section>
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h1 class="font-heading text-[38px] text-[#4D371F]">Kelola Course / Video</h1>
                <p class="mt-1 text-sm text-[#8A7060]">Tambah, edit, dan hapus course Sipilsaku.</p>
            </div>

            <a href="{{ route('admin.courses.create') }}" class="btn-primary px-6">
                Tambah Course
            </a>
        </div>

        @if (session('success'))
            <div class="mb-6 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
                {{ session('success') }}
            </div>
        @endif

        <div class="rounded-[22px] bg-white p-6 shadow-sm">
            <form method="GET" action="{{ route('admin.courses.index') }}" class="mb-6">
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Cari judul course..."
                    class="auth-input max-w-md">
            </form>

            <div class="overflow-x-auto">
                <table class="w-full min-w-[1200px] text-left">
                    <thead>
                        <tr class="border-b border-[#E8DDD2] text-sm font-semibold text-[#8A7060]">
                            <th class="px-3 py-4">Thumbnail</th>
                            <th class="px-3 py-4">Judul</th>
                            <th class="px-3 py-4">Highlight</th>
                            <th class="px-3 py-4">Sesi</th>
                            <th class="px-3 py-4">Harga</th>
                            <th class="px-3 py-4">Status</th>
                            <th class="px-3 py-4">Kelola Video</th>
                            <th class="px-3 py-4">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($courses as $course)
                            <tr class="border-b border-[#F1E8DE] align-top text-sm text-[#4D371F]">
                                {{-- Thumbnail --}}
                                <td class="px-3 py-4">
                                    <img
                                        src="{{ $course->thumbnail ? asset('storage/' . $course->thumbnail) : asset('assets/image/course-placeholder.png') }}"
                                        alt="{{ $course->title }}"
                                        class="h-16 w-24 rounded-lg object-cover">
                                </td>

                                {{-- Judul --}}
                                <td class="px-3 py-4">
                                    <p class="text-[18px] font-semibold text-[#4D371F]">
                                        {{ $course->title }}
                                    </p>

                                    @if ($course->description)
                                        <p class="mt-2 max-w-[260px] text-sm leading-7 text-[#8A7060]">
                                            {{ \Illuminate\Support\Str::limit($course->description, 80) }}
                                        </p>
                                    @endif
                                </td>

                                {{-- Highlight --}}
                                <td class="px-3 py-4">
                                    <div class="flex max-w-[220px] flex-wrap gap-2">
                                        @php
                                            $badges = is_array($course->badges) ? $course->badges : [];
                                        @endphp

                                        @forelse ($badges as $badge)
                                            <span class="rounded-full bg-[#FCF5EE] px-3 py-1 text-xs text-[#8A7060]">
                                                {{ $badge }}
                                            </span>
                                        @empty
                                            <span class="text-sm text-[#B59B88]">-</span>
                                        @endforelse
                                    </div>
                                </td>

                                {{-- Sesi --}}
                                <td class="px-3 py-4">
                                    <span class="inline-flex rounded-xl bg-[#FCF5EE] px-4 py-2 text-sm font-medium text-[#4D371F]">
                                        {{ $course->session_count ?? 0 }}X Sesi
                                    </span>
                                </td>

                                {{-- Harga --}}
                                <td class="px-3 py-4">
                                    <p class="text-[18px] font-semibold text-[#4D371F]">
                                        Rp {{ number_format($course->price, 0, ',', '.') }}
                                    </p>
                                </td>

                                {{-- Status --}}
                                <td class="px-3 py-4">
                                    @if ($course->is_active)
                                        <span class="inline-flex rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                                            Aktif
                                        </span>
                                    @else
                                        <span class="inline-flex rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">
                                            Nonaktif
                                        </span>
                                    @endif
                                </td>

                                {{-- Kelola Video --}}
                                <td class="px-3 py-4">
                                    <a
                                        href="{{ route('admin.courses.videos.index', $course) }}"
                                        class="inline-flex items-center gap-2 rounded-full bg-[#D89A53] px-4 py-2 text-sm font-semibold text-white transition hover:bg-[#c9863d]">
                                        Kelola
                                        <span>&rarr;</span>
                                    </a>
                                </td>

                                {{-- Aksi --}}
                                <td class="px-3 py-4">
                                    <div class="flex flex-col gap-2">
                                        <a
                                            href="{{ route('admin.courses.edit', $course) }}"
                                            class="text-sm font-medium text-[#D89A53] hover:underline">
                                            Edit
                                        </a>

                                        <form
                                            method="POST"
                                            action="{{ route('admin.courses.destroy', $course) }}"
                                            onsubmit="return confirm('Yakin ingin menghapus course ini?')">
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="text-left text-sm font-medium text-red-500 hover:underline">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-3 py-8 text-center text-sm text-[#8A7060]">
                                    Belum ada data course.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{ $courses->links() }}
            </div>
        </div>
    </section>
@endsection