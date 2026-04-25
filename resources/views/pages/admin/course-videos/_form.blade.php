@php
    $isEdit = isset($video);
@endphp

<div class="grid gap-6 lg:grid-cols-[320px_minmax(0,1fr)]">
    <div class="rounded-[22px] bg-white p-6 shadow-sm">
        <h2 class="font-heading text-[28px] text-[#4D371F]">
            Preview Thumbnail
        </h2>

        <div class="mt-5 flex justify-center">
            <div class="flex h-[220px] w-full max-w-[260px] items-center justify-center overflow-hidden rounded-[18px] border border-[#E8DDD2] bg-[#FCF5EE]">
                <img
                    id="videoThumbnailPreview"
                    src="{{ $isEdit && $video->thumbnail ? asset('storage/' . $video->thumbnail) : asset('assets/image/course-placeholder.png') }}"
                    alt="Preview Thumbnail"
                    class="h-full w-full object-cover"
                >
            </div>
        </div>
    </div>

    <div class="rounded-[22px] bg-white p-6 shadow-sm md:p-8">
        <div class="grid gap-5">
            <div>
                <label for="title" class="mb-2 block text-sm font-medium text-[#4D371F]">Judul Video</label>
                <input id="title" type="text" name="title" value="{{ old('title', $video->title ?? '') }}" required class="auth-input">
            </div>

            <div>
                <label for="duration" class="mb-2 block text-sm font-medium text-[#4D371F]">Durasi</label>
                <input id="duration" type="text" name="duration" value="{{ old('duration', $video->duration ?? '') }}" class="auth-input" placeholder="Contoh: 30 Menit">
            </div>

            <div>
                <label for="youtube_url" class="mb-2 block text-sm font-medium text-[#4D371F]">Link YouTube</label>
                <input id="youtube_url" type="url" name="youtube_url" value="{{ old('youtube_url', $video->youtube_url ?? '') }}" required class="auth-input">
            </div>

            <div>
                <label for="sort_order" class="mb-2 block text-sm font-medium text-[#4D371F]">Urutan</label>
                <input id="sort_order" type="number" min="1" name="sort_order" value="{{ old('sort_order', $video->sort_order ?? 1) }}" class="auth-input">
            </div>

            <div>
                <label for="thumbnail" class="mb-2 block text-sm font-medium text-[#4D371F]">Thumbnail</label>
                <input
                    id="thumbnail"
                    type="file"
                    name="thumbnail"
                    accept=".jpg,.jpeg,.png,.webp"
                    class="auth-input file:mr-4 file:rounded-md file:border-0 file:bg-[#D89A53] file:px-4 file:py-2 file:text-sm file:font-medium file:text-white"
                >
            </div>

            <label class="flex items-center gap-3 rounded-xl bg-[#FCF5EE] px-4 py-3 text-sm text-[#4D371F]">
                <input
                    type="checkbox"
                    name="is_active"
                    value="1"
                    {{ old('is_active', $video->is_active ?? true) ? 'checked' : '' }}
                    class="rounded border-[#CBB8A5] text-[#DD9E59] shadow-sm focus:ring-[#DD9E59]"
                >
                <span>Aktifkan video</span>
            </label>

            <div class="flex flex-wrap items-center gap-3 pt-2">
                <button type="submit" class="btn-primary px-8">
                    {{ $isEdit ? 'Simpan Perubahan' : 'Tambah Video' }}
                </button>

                <a href="{{ route('admin.courses.videos.index', $course) }}"
                    class="inline-flex items-center gap-2 rounded-full border border-[#D89A53] px-5 py-2 text-sm font-medium text-[#D89A53] transition hover:bg-[#D89A53] hover:text-white">
                    Kembali
                </a>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const input = document.getElementById('thumbnail');
        const preview = document.getElementById('videoThumbnailPreview');

        if (!input || !preview) return;

        input.addEventListener('change', function (event) {
            const file = event.target.files[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
            };
            reader.readAsDataURL(file);
        });
    });
</script>
@endpush