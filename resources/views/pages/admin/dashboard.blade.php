@extends('layouts.app-no-footer')

@section('content')
<section class="bg-[#FCF5EE] py-10">
    <div class="mx-auto max-w-[1240px] px-6 lg:px-8">
        <div class="mb-8">
            <h1 class="font-heading text-[42px] text-[#4D371F]">Dashboard Admin</h1>
            <p class="mt-1 text-sm text-[#8A7060]">
                Kelola konten dan pengguna Sipilsaku.
            </p>
        </div>

        <div class="grid gap-5 md:grid-cols-2 xl:grid-cols-4">
            <div class="rounded-[22px] bg-white p-6 shadow-sm">
                <p class="text-sm text-[#8A7060]">Total User</p>
                <h2 class="mt-2 font-heading text-[42px] text-[#4D371F]">{{ $totalUsers }}</h2>
            </div>

            <div class="rounded-[22px] bg-white p-6 shadow-sm">
                <p class="text-sm text-[#8A7060]">Total E-Book</p>
                <h2 class="mt-2 font-heading text-[42px] text-[#4D371F]">{{ $totalEbooks }}</h2>
            </div>

            <div class="rounded-[22px] bg-white p-6 shadow-sm">
                <p class="text-sm text-[#8A7060]">Total Course</p>
                <h2 class="mt-2 font-heading text-[42px] text-[#4D371F]">{{ $totalCourses }}</h2>
            </div>

            <div class="rounded-[22px] bg-white p-6 shadow-sm">
                <p class="text-sm text-[#8A7060]">Total Admin</p>
                <h2 class="mt-2 font-heading text-[42px] text-[#4D371F]">{{ $totalAdmins }}</h2>
            </div>
        </div>

        <div class="mt-8 grid gap-5 md:grid-cols-3">
            <a href="{{ route('admin.courses.index') }}" class="rounded-[22px] bg-white p-6 shadow-sm transition hover:-translate-y-1">
                <h3 class="font-heading text-[28px] text-[#4D371F]">Kelola Course</h3>
                <p class="mt-2 text-sm text-[#8A7060]">Tambah, edit, dan hapus course.</p>
            </a>

            <a href="{{ route('admin.ebooks.index') }}" class="rounded-[22px] bg-white p-6 shadow-sm transition hover:-translate-y-1">
                <h3 class="font-heading text-[28px] text-[#4D371F]">Kelola E-Book</h3>
                <p class="mt-2 text-sm text-[#8A7060]">Tambah, edit, dan hapus e-book.</p>
            </a>

            <a href="{{ route('admin.users.index') }}" class="rounded-[22px] bg-white p-6 shadow-sm transition hover:-translate-y-1">
                <h3 class="font-heading text-[28px] text-[#4D371F]">Kelola User</h3>
                <p class="mt-2 text-sm text-[#8A7060]">Lihat dan atur data pengguna.</p>
            </a>
        </div>
    </div>
</section>
@endsection