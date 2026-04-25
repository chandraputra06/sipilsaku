@php
    $isEdit = isset($course);
@endphp

<div class="grid gap-6 lg:grid-cols-[320px_minmax(0,1fr)]">
    <div class="rounded-[22px] bg-white p-6 shadow-sm">
        <h2 class="font-heading text-[28px] text-[#4D371F]">
            Preview Thumbnail
        </h2>

        <div class="mt-5 flex justify-center">
            <div
                class="flex h-[300px] w-full max-w-[220px] items-center justify-center overflow-hidden rounded-[18px] border border-[#E8DDD2] bg-[#FCF5EE]">
                <img id="thumbnailPreview"
                    src="{{ $isEdit && $course->thumbnail ? asset('storage/' . $course->thumbnail) : asset('assets/image/course-placeholder.png') }}"
                    alt="Preview Thumbnail" class="h-full w-full object-cover">
            </div>
        </div>
    </div>

    <div class="rounded-[22px] bg-white p-6 shadow-sm md:p-8">
        <div class="grid gap-5">
            <div>
                <label for="title" class="mb-2 block text-sm font-medium text-[#4D371F]">Judul Course</label>
                <input id="title" type="text" name="title" value="{{ old('title', $course->title ?? '') }}"
                    required class="auth-input">
                @error('title')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="thumbnail" class="mb-2 block text-sm font-medium text-[#4D371F]">Thumbnail</label>
                <input id="thumbnail" type="file" name="thumbnail" accept=".jpg,.jpeg,.png,.webp"
                    class="auth-input file:mr-4 file:rounded-md file:border-0 file:bg-[#D89A53] file:px-4 file:py-2 file:text-sm file:font-medium file:text-white">
                @error('thumbnail')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="price" class="mb-2 block text-sm font-medium text-[#4D371F]">Harga</label>
                <input id="price" type="number" name="price" min="0" step="1000"
                    value="{{ old('price', $course->price ?? '') }}" required class="auth-input">
                @error('price')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="description" class="mb-2 block text-sm font-medium text-[#4D371F]">Deskripsi</label>
                <textarea id="description" name="description" rows="6" class="auth-input !py-3">{{ old('description', $course->description ?? '') }}</textarea>
                @error('description')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="badges" class="mb-2 block text-sm font-medium text-[#4D371F]">
                    Highlight / Topik
                </label>
                <input id="badges" type="text" name="badges"
                    value="{{ old('badges', isset($course) && !empty($course->badges) ? implode(', ', $course->badges) : '') }}"
                    class="auth-input" placeholder="Contoh: AutoDesk Civil 3D, Corridor Design, Earthwork">
                <p class="mt-1 text-xs text-[#8A7060]">
                    Pisahkan dengan koma.
                </p>
                @error('badges')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid gap-4 sm:grid-cols-2">
                <div>
                    <label for="session_total" class="mb-2 block text-sm font-medium text-[#4D371F]">
                        Total Sesi
                    </label>
                    <input id="session_total" type="text" name="session_total"
                        value="{{ old('session_total', $course->session_total ?? '2X') }}" class="auth-input"
                        placeholder="Contoh: 2X">
                    @error('session_total')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="session_label" class="mb-2 block text-sm font-medium text-[#4D371F]">
                        Label Sesi
                    </label>
                    <input id="session_label" type="text" name="session_label"
                        value="{{ old('session_label', $course->session_label ?? 'Sesi') }}" class="auth-input"
                        placeholder="Contoh: Sesi">
                    @error('session_label')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <label class="flex items-center gap-3 rounded-xl bg-[#FCF5EE] px-4 py-3 text-sm text-[#4D371F]">
                <input type="checkbox" name="is_active" value="1"
                    {{ old('is_active', $course->is_active ?? true) ? 'checked' : '' }}
                    class="rounded border-[#CBB8A5] text-[#DD9E59] shadow-sm focus:ring-[#DD9E59]">
                <span>Aktifkan course</span>
            </label>

            <div class="flex flex-wrap items-center gap-3 pt-2">
                <button type="submit" class="btn-primary px-8">
                    {{ $isEdit ? 'Simpan Perubahan' : 'Tambah Course' }}
                </button>

                <a href="{{ route('admin.courses.index') }}"
                    class="inline-flex items-center gap-2 rounded-full border border-[#D89A53] px-5 py-2 text-sm font-medium text-[#D89A53] transition hover:bg-[#D89A53] hover:text-white">
                    Kembali
                </a>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const input = document.getElementById('thumbnail');
            const preview = document.getElementById('thumbnailPreview');

            if (!input || !preview) return;

            input.addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (!file) return;

                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            });
        });
    </script>
@endpush
