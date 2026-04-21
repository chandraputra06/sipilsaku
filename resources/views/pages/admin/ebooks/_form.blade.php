@php
    $isEdit = isset($ebook);
@endphp

<div class="grid gap-6 lg:grid-cols-[320px_minmax(0,1fr)]">
    <div class="rounded-[22px] bg-white p-6 shadow-sm">
        <h2 class="font-heading text-[28px] text-[#4D371F]">
            Preview Cover
        </h2>

        <div class="mt-5 flex justify-center">
            <div class="flex h-[360px] w-[240px] items-center justify-center overflow-hidden rounded-[18px] border border-[#E8DDD2] bg-[#FCF5EE]">
                <img
                    id="coverPreview"
                    src="{{ $isEdit && $ebook->cover ? asset('storage/' . $ebook->cover) : asset('assets/image/ebook-placeholder.png') }}"
                    alt="Preview Cover"
                    class="h-full w-full object-cover"
                >
            </div>
        </div>

        <p class="mt-4 text-center text-sm text-[#8A7060]">
            Upload cover e-book agar tampil di halaman user.
        </p>
    </div>

    <div class="rounded-[22px] bg-white p-6 shadow-sm md:p-8">
        <div class="grid gap-5">
            <div>
                <label for="title" class="mb-2 block text-sm font-medium text-[#4D371F]">
                    Judul E-Book
                </label>
                <input
                    id="title"
                    type="text"
                    name="title"
                    value="{{ old('title', $ebook->title ?? '') }}"
                    required
                    class="auth-input"
                >
                @error('title')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="author" class="mb-2 block text-sm font-medium text-[#4D371F]">
                    Penulis
                </label>
                <input
                    id="author"
                    type="text"
                    name="author"
                    value="{{ old('author', $ebook->author ?? '') }}"
                    class="auth-input"
                >
                @error('author')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="cover" class="mb-2 block text-sm font-medium text-[#4D371F]">
                    Cover E-Book
                </label>
                <input
                    id="cover"
                    type="file"
                    name="cover"
                    accept=".jpg,.jpeg,.png,.webp"
                    class="auth-input file:mr-4 file:rounded-md file:border-0 file:bg-[#D89A53] file:px-4 file:py-2 file:text-sm file:font-medium file:text-white"
                >
                @error('cover')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="price" class="mb-2 block text-sm font-medium text-[#4D371F]">
                    Harga
                </label>
                <input
                    id="price"
                    type="number"
                    name="price"
                    min="0"
                    step="1000"
                    value="{{ old('price', $ebook->price ?? '') }}"
                    required
                    class="auth-input"
                >
                @error('price')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="description" class="mb-2 block text-sm font-medium text-[#4D371F]">
                    Deskripsi
                </label>
                <textarea
                    id="description"
                    name="description"
                    rows="6"
                    class="auth-input !py-3"
                >{{ old('description', $ebook->description ?? '') }}</textarea>
                @error('description')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid gap-4 sm:grid-cols-2">
                <label class="flex items-center gap-3 rounded-xl bg-[#FCF5EE] px-4 py-3 text-sm text-[#4D371F]">
                    <input
                        type="checkbox"
                        name="is_popular"
                        value="1"
                        {{ old('is_popular', $ebook->is_popular ?? false) ? 'checked' : '' }}
                        class="rounded border-[#CBB8A5] text-[#DD9E59] shadow-sm focus:ring-[#DD9E59]"
                    >
                    <span>Tandai sebagai populer</span>
                </label>

                <label class="flex items-center gap-3 rounded-xl bg-[#FCF5EE] px-4 py-3 text-sm text-[#4D371F]">
                    <input
                        type="checkbox"
                        name="is_active"
                        value="1"
                        {{ old('is_active', $ebook->is_active ?? true) ? 'checked' : '' }}
                        class="rounded border-[#CBB8A5] text-[#DD9E59] shadow-sm focus:ring-[#DD9E59]"
                    >
                    <span>Aktifkan e-book</span>
                </label>
            </div>

            <div class="flex flex-wrap items-center gap-3 pt-2">
                <button type="submit" class="btn-primary px-8">
                    {{ $isEdit ? 'Simpan Perubahan' : 'Tambah E-Book' }}
                </button>

                <a href="{{ route('admin.ebooks.index') }}"
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
        const input = document.getElementById('cover');
        const preview = document.getElementById('coverPreview');

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