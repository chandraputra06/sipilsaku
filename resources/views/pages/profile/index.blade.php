@extends('layouts.app-no-footer')

@section('content')
    <section class="bg-[#FCF5EE] py-12">
        <div class="mx-auto max-w-[1240px] px-6 lg:px-8">
            <div class="mb-10">
                <h1 class="font-heading text-[38px] font-bold text-[#4D371F] md:text-[48px]">
                    Profil Saya
                </h1>
                <p class="mt-2 text-sm text-[#6B5C4E]">
                    Kelola informasi akun Anda di Sipilsaku.
                </p>
            </div>

            @if (session('success'))
                <div class="mb-6 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid gap-6 lg:grid-cols-[320px_minmax(0,1fr)]">
                <div class="rounded-[22px] bg-white p-6 shadow-sm">
                    <div class="flex flex-col items-center text-center">
                        <div id="profilePreviewWrapper"
                            class="flex h-[96px] w-[96px] items-center justify-center overflow-hidden rounded-full border-2 border-[#D89A53] bg-[#FCF5EE]">
                            @if ($user->profile_photo)
                                <img id="profilePreviewImage" src="{{ asset('storage/' . $user->profile_photo) }}"
                                    alt="{{ $user->name }}" class="h-full w-full object-cover">
                                <i id="profilePreviewIcon" class="fa-regular fa-user hidden text-[34px] text-[#D89A53]"></i>
                            @else
                                <img id="profilePreviewImage" src="" alt="{{ $user->name }}"
                                    class="hidden h-full w-full object-cover">
                                <i id="profilePreviewIcon" class="fa-regular fa-user text-[34px] text-[#D89A53]"></i>
                            @endif
                        </div>

                        <h2 class="mt-4 font-heading text-[28px] text-[#4D371F]">
                            {{ $user->name }}
                        </h2>

                        <p class="mt-1 text-sm text-[#8A7060]">
                            {{ $user->email }}
                        </p>

                        @if ($user->profile_photo)
                            <form method="POST" action="{{ route('profile.photo.destroy') }}" class="mt-4">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="inline-flex items-center gap-2 rounded-full bg-[#D89A53] px-4 py-2 text-[11px] font-semibold text-white shadow-sm transition hover:bg-[#c9863d]">
                                    Hapus Foto
                                    <span>&rarr;</span>
                                </button>
                            </form>
                        @endif
                    </div>

                    <div class="mt-8 space-y-4">
                        <div class="rounded-xl bg-[#FCF5EE] px-4 py-3">
                            <p class="text-xs text-[#8A7060]">Nomor WhatsApp</p>
                            <p class="mt-1 text-sm font-medium text-[#4D371F]">
                                {{ $user->whatsapp ?: '-' }}
                            </p>
                        </div>

                        <div class="rounded-xl bg-[#FCF5EE] px-4 py-3">
                            <p class="text-xs text-[#8A7060]">Status Pekerjaan</p>
                            <p class="mt-1 text-sm font-medium text-[#4D371F]">
                                {{ $user->profession ?: '-' }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="rounded-[22px] bg-white p-6 shadow-sm md:p-8">
                        <div class="mb-6">
                            <h2 class="font-heading text-[30px] text-[#4D371F]">
                                Edit Profil
                            </h2>
                            <p class="mt-1 text-sm text-[#8A7060]">
                                Perbarui data akun Anda agar tetap akurat.
                            </p>
                        </div>

                        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data"
                            class="space-y-5">
                            @csrf
                            @method('PUT')

                            <div>
                                <label for="profile_photo" class="mb-2 block text-sm font-medium text-[#4D371F]">
                                    Foto Profil
                                </label>
                                <input id="profile_photo" type="file" name="profile_photo" accept=".jpg,.jpeg,.png,.webp"
                                    class="auth-input file:mr-4 file:rounded-md file:border-0 file:bg-[#D89A53] file:px-4 file:py-2 file:text-sm file:font-medium file:text-white">
                                @error('profile_photo')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="name" class="mb-2 block text-sm font-medium text-[#4D371F]">
                                    Nama Lengkap
                                </label>
                                <input id="name" type="text" name="name" value="{{ old('name', $user->name) }}"
                                    required class="auth-input">
                                @error('name')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="whatsapp" class="mb-2 block text-sm font-medium text-[#4D371F]">
                                    Nomor Whatsapp
                                </label>
                                <input id="whatsapp" type="text" name="whatsapp"
                                    value="{{ old('whatsapp', $user->whatsapp) }}" class="auth-input">
                                @error('whatsapp')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="profession" class="mb-2 block text-sm font-medium text-[#4D371F]">
                                    Status Pekerjaan
                                </label>
                                <input id="profession" type="text" name="profession"
                                    value="{{ old('profession', $user->profession) }}" class="auth-input">
                                @error('profession')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="email" class="mb-2 block text-sm font-medium text-[#4D371F]">
                                    Alamat Email
                                </label>
                                <input id="email" type="email" name="email"
                                    value="{{ old('email', $user->email) }}" required class="auth-input">
                                @error('email')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="pt-2">
                                <button type="submit" class="btn-primary px-8">
                                    Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="rounded-[22px] bg-white p-6 shadow-sm md:p-8">
                        <div class="mb-6">
                            <h2 class="font-heading text-[30px] text-[#4D371F]">
                                Ganti Password
                            </h2>
                            <p class="mt-1 text-sm text-[#8A7060]">
                                Gunakan password yang kuat agar akun Anda lebih aman.
                            </p>
                        </div>

                        <form method="POST" action="{{ route('profile.password.update') }}" class="space-y-5">
                            @csrf
                            @method('PUT')

                            <div>
                                <label for="current_password" class="mb-2 block text-sm font-medium text-[#4D371F]">
                                    Password Saat Ini
                                </label>

                                <div class="relative">
                                    <input id="current_password" type="password" name="current_password" required
                                        class="auth-input pr-11">

                                    <button type="button" id="toggleCurrentPassword"
                                        class="absolute right-3 top-1/2 -translate-y-1/2 text-[#8B7A6B] hover:text-[#4D371F]"
                                        aria-label="Tampilkan password saat ini">
                                        <i id="toggleCurrentPasswordIcon" class="fa-regular fa-eye"></i>
                                    </button>
                                </div>

                                @error('current_password')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="new_password" class="mb-2 block text-sm font-medium text-[#4D371F]">
                                    Password Baru
                                </label>

                                <div class="relative">
                                    <input id="new_password" type="password" name="password" required
                                        class="auth-input pr-11">

                                    <button type="button" id="toggleNewPassword"
                                        class="absolute right-3 top-1/2 -translate-y-1/2 text-[#8B7A6B] hover:text-[#4D371F]"
                                        aria-label="Tampilkan password baru">
                                        <i id="toggleNewPasswordIcon" class="fa-regular fa-eye"></i>
                                    </button>
                                </div>

                                @error('password')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="new_password_confirmation"
                                    class="mb-2 block text-sm font-medium text-[#4D371F]">
                                    Konfirmasi Password Baru
                                </label>

                                <div class="relative">
                                    <input id="new_password_confirmation" type="password" name="password_confirmation"
                                        required class="auth-input pr-11">

                                    <button type="button" id="toggleNewPasswordConfirmation"
                                        class="absolute right-3 top-1/2 -translate-y-1/2 text-[#8B7A6B] hover:text-[#4D371F]"
                                        aria-label="Tampilkan konfirmasi password baru">
                                        <i id="toggleNewPasswordConfirmationIcon" class="fa-regular fa-eye"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="pt-2">
                                <button type="submit" class="btn-primary px-8">
                                    Perbarui Password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const fileInput = document.getElementById('profile_photo');
                const previewImage = document.getElementById('profilePreviewImage');
                const previewIcon = document.getElementById('profilePreviewIcon');

                if (fileInput && previewImage && previewIcon) {
                    fileInput.addEventListener('change', function(event) {
                        const file = event.target.files[0];
                        if (!file) return;

                        const reader = new FileReader();

                        reader.onload = function(e) {
                            previewImage.src = e.target.result;
                            previewImage.classList.remove('hidden');
                            previewIcon.classList.add('hidden');
                        };

                        reader.readAsDataURL(file);
                    });
                }

                function setupPasswordToggle(inputId, buttonId, iconId, showLabel, hideLabel) {
                    const input = document.getElementById(inputId);
                    const button = document.getElementById(buttonId);
                    const icon = document.getElementById(iconId);

                    if (!input || !button || !icon) return;

                    button.addEventListener('click', function() {
                        const isPassword = input.type === 'password';

                        input.type = isPassword ? 'text' : 'password';

                        if (isPassword) {
                            icon.classList.remove('fa-eye');
                            icon.classList.add('fa-eye-slash');
                            button.setAttribute('aria-label', hideLabel);
                        } else {
                            icon.classList.remove('fa-eye-slash');
                            icon.classList.add('fa-eye');
                            button.setAttribute('aria-label', showLabel);
                        }
                    });
                }

                setupPasswordToggle(
                    'current_password',
                    'toggleCurrentPassword',
                    'toggleCurrentPasswordIcon',
                    'Tampilkan password saat ini',
                    'Sembunyikan password saat ini'
                );

                setupPasswordToggle(
                    'new_password',
                    'toggleNewPassword',
                    'toggleNewPasswordIcon',
                    'Tampilkan password baru',
                    'Sembunyikan password baru'
                );

                setupPasswordToggle(
                    'new_password_confirmation',
                    'toggleNewPasswordConfirmation',
                    'toggleNewPasswordConfirmationIcon',
                    'Tampilkan konfirmasi password baru',
                    'Sembunyikan konfirmasi password baru'
                );
            });
        </script>
    @endpush
@endsection
