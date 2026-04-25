@extends('layouts.admin')

@section('content')
<section>
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h1 class="font-heading text-[38px] text-[#4D371F]">Kelola Video</h1>
            <p class="mt-1 text-sm text-[#8A7060]">Course: {{ $course->title }}</p>
        </div>

        <a href="{{ route('admin.courses.videos.create', $course) }}" class="btn-primary px-6">
            Tambah Video
        </a>
    </div>

    @if (session('success'))
        <div class="mb-6 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
            {{ session('success') }}
        </div>
    @endif

    <div class="rounded-[22px] bg-white p-6 shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[980px] text-left">
                <thead>
                    <tr class="border-b border-[#E8DDD2] text-sm text-[#8A7060]">
                        <th class="px-3 py-3">Thumbnail</th>
                        <th class="px-3 py-3">Judul</th>
                        <th class="px-3 py-3">Durasi</th>
                        <th class="px-3 py-3">Urutan</th>
                        <th class="px-3 py-3">Status</th>
                        <th class="px-3 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($videos as $video)
                        <tr class="border-b border-[#F1E8DE] text-sm text-[#4D371F]">
                            <td class="px-3 py-3">
                                <img
                                    src="{{ $video->thumbnail ? asset('storage/' . $video->thumbnail) : asset('assets/image/course-placeholder.png') }}"
                                    alt="{{ $video->title }}"
                                    class="h-16 w-24 rounded object-cover"
                                >
                            </td>
                            <td class="px-3 py-3">{{ $video->title }}</td>
                            <td class="px-3 py-3">{{ $video->duration ?: '-' }}</td>
                            <td class="px-3 py-3">{{ $video->sort_order }}</td>
                            <td class="px-3 py-3">{{ $video->is_active ? 'Aktif' : 'Nonaktif' }}</td>
                            <td class="px-3 py-3">
                                <div class="flex items-center gap-3">
                                    <a href="{{ route('admin.courses.videos.edit', $video) }}" class="text-[#D89A53] hover:underline">
                                        Edit
                                    </a>

                                    <a href="{{ $video->youtube_url }}" target="_blank" rel="noopener noreferrer" class="text-[#D89A53] hover:underline">
                                        Lihat
                                    </a>

                                    <form method="POST" action="{{ route('admin.courses.videos.destroy', $video) }}">
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
                            <td colspan="6" class="px-3 py-6 text-center text-sm text-[#8A7060]">
                                Belum ada video untuk course ini.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $videos->links() }}
        </div>

        <div class="mt-6">
            <a href="{{ route('admin.courses.index') }}"
                class="inline-flex items-center gap-2 rounded-full border border-[#D89A53] px-5 py-2 text-sm font-medium text-[#D89A53] transition hover:bg-[#D89A53] hover:text-white">
                Kembali ke Course
            </a>
        </div>
    </div>
</section>
@endsection