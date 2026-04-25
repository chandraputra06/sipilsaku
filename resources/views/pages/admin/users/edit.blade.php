@extends('layouts.admin')

@section('content')
<section>
    <div class="mb-6">
        <h1 class="font-heading text-[38px] text-[#4D371F]">Edit User</h1>
        <p class="mt-1 text-sm text-[#8A7060]">Perbarui data pengguna Sipilsaku.</p>
    </div>

    <div class="rounded-[22px] bg-white p-6 shadow-sm md:p-8">
        <form method="POST" action="{{ route('admin.users.update', $user) }}" class="grid gap-5">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="mb-2 block text-sm font-medium text-[#4D371F]">Nama</label>
                <input
                    id="name"
                    type="text"
                    name="name"
                    value="{{ old('name', $user->name) }}"
                    required
                    class="auth-input"
                >
                @error('name')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="mb-2 block text-sm font-medium text-[#4D371F]">Email</label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email', $user->email) }}"
                    required
                    class="auth-input"
                >
                @error('email')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="role" class="mb-2 block text-sm font-medium text-[#4D371F]">Role</label>
                <select id="role" name="role" class="auth-input">
                    <option value="1" {{ old('role', $user->role) === '1' ? 'selected' : '' }}>Admin</option>
                    <option value="2" {{ old('role', $user->role) === '2' ? 'selected' : '' }}>User</option>
                </select>
                @error('role')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="whatsapp" class="mb-2 block text-sm font-medium text-[#4D371F]">WhatsApp</label>
                <input
                    id="whatsapp"
                    type="text"
                    name="whatsapp"
                    value="{{ old('whatsapp', $user->whatsapp) }}"
                    class="auth-input"
                >
                @error('whatsapp')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="profession" class="mb-2 block text-sm font-medium text-[#4D371F]">Status / Pekerjaan</label>
                <input
                    id="profession"
                    type="text"
                    name="profession"
                    value="{{ old('profession', $user->profession) }}"
                    class="auth-input"
                >
                @error('profession')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-wrap items-center gap-3 pt-2">
                <button type="submit" class="btn-primary px-8">
                    Simpan Perubahan
                </button>

                <a href="{{ route('admin.users.index') }}"
                    class="inline-flex items-center gap-2 rounded-full border border-[#D89A53] px-5 py-2 text-sm font-medium text-[#D89A53] transition hover:bg-[#D89A53] hover:text-white">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</section>
@endsection