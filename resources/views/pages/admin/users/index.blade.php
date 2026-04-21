@extends('layouts.app-no-footer')

@section('content')
<section class="bg-[#FCF5EE] py-10">
    <div class="mx-auto max-w-[1240px] px-6 lg:px-8">
        <div class="mb-6">
            <h1 class="font-heading text-[38px] text-[#4D371F]">Manajemen User</h1>
            <p class="mt-1 text-sm text-[#8A7060]">Kelola data pengguna Sipilsaku.</p>
        </div>

        @if (session('success'))
            <div class="mb-6 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
                {{ session('success') }}
            </div>
        @endif

        <div class="rounded-[22px] bg-white p-6 shadow-sm">
            <form method="GET" action="{{ route('admin.users.index') }}" class="mb-6">
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Cari nama atau email..."
                    class="auth-input max-w-md"
                >
            </form>

            <div class="overflow-x-auto">
                <table class="w-full min-w-[800px] text-left">
                    <thead>
                        <tr class="border-b border-[#E8DDD2] text-sm text-[#8A7060]">
                            <th class="px-3 py-3">Nama</th>
                            <th class="px-3 py-3">Email</th>
                            <th class="px-3 py-3">Role</th>
                            <th class="px-3 py-3">WhatsApp</th>
                            <th class="px-3 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr class="border-b border-[#F1E8DE] text-sm text-[#4D371F]">
                                <td class="px-3 py-3">{{ $user->name }}</td>
                                <td class="px-3 py-3">{{ $user->email }}</td>
                                <td class="px-3 py-3">{{ $user->role === '1' ? 'Admin' : 'User' }}</td>
                                <td class="px-3 py-3">{{ $user->whatsapp ?: '-' }}</td>
                                <td class="px-3 py-3">
                                    <div class="flex items-center gap-2">
                                        <a href="{{ route('admin.users.show', $user) }}" class="text-[#D89A53] hover:underline">Detail</a>
                                        <a href="{{ route('admin.users.edit', $user) }}" class="text-[#D89A53] hover:underline">Edit</a>
                                        <form method="POST" action="{{ route('admin.users.destroy', $user) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-3 py-6 text-center text-sm text-[#8A7060]">
                                    Belum ada data user.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</section>
@endsection