@extends('layouts.admin')

@section('content')
    <section>
        <div class="mb-6">
            <h1 class="font-heading text-[38px] text-[#4D371F]">Kelola User</h1>
            <p class="mt-1 text-sm text-[#8A7060]">Lihat dan kelola data pengguna Sipilsaku.</p>
        </div>

        @if (session('success'))
            <div class="mb-6 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
                {{ session('success') }}
            </div>
        @endif

        <div class="rounded-[22px] bg-white p-6 shadow-sm">
            <form id="adminUserSearchForm" method="GET" action="{{ route('admin.users.index') }}" class="mb-6">
                <input id="adminUserSearchInput" type="text" name="search" value="{{ request('search') }}"
                    placeholder="Cari nama atau email..." class="auth-input max-w-md">
            </form>

            <div class="overflow-x-auto">
                <table class="w-full min-w-[1100px] text-left">
                    <thead>
                        <tr class="border-b border-[#E8DDD2] text-sm text-[#8A7060]">
                            <th class="px-3 py-3">Nama</th>
                            <th class="px-3 py-3">Email</th>
                            <th class="px-3 py-3">Role</th>
                            <th class="px-3 py-3">WhatsApp</th>
                            <th class="px-3 py-3">Pekerjaan</th>
                            <th class="px-3 py-3">Aksi</th>
                            <th class="px-3 py-3">Akses</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr class="border-b border-[#F1E8DE] text-sm text-[#4D371F]">
                                <td class="px-3 py-3">{{ $user->name }}</td>
                                <td class="px-3 py-3">{{ $user->email }}</td>
                                <td class="px-3 py-3">{{ $user->role === '1' ? 'Admin' : 'User' }}</td>
                                <td class="px-3 py-3">{{ $user->whatsapp ?: '-' }}</td>
                                <td class="px-3 py-3">{{ $user->profession ?: '-' }}</td>

                                {{-- AKSI --}}
                                <td class="px-3 py-3">
                                    <div class="flex items-center gap-3">
                                        <a href="{{ route('admin.users.show', $user) }}"
                                            class="text-[#D89A53] hover:underline">
                                            Detail
                                        </a>

                                        <a href="{{ route('admin.users.edit', $user) }}"
                                            class="text-[#D89A53] hover:underline">
                                            Edit
                                        </a>

                                        <form method="POST" action="{{ route('admin.users.destroy', $user) }}"
                                            onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:underline">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>

                                {{-- AKSES --}}
                                <td class="px-3 py-3">
                                    @if ($user->role === '2')
                                        <a href="{{ route('admin.users.show', $user) }}"
                                            class="inline-flex items-center rounded-full bg-[#D89A53] px-4 py-2 text-xs font-medium text-white transition hover:bg-[#c9863d]">
                                            Atur Akses
                                        </a>
                                    @else
                                        <span class="text-xs text-[#8A7060]">-</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-3 py-6 text-center text-sm text-[#8A7060]">
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
    </section>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const form = document.getElementById('adminUserSearchForm');
                const input = document.getElementById('adminUserSearchInput');

                if (!form || !input) return;

                let debounceTimer = null;

                input.addEventListener('input', function() {
                    clearTimeout(debounceTimer);

                    debounceTimer = setTimeout(function() {
                        form.submit();
                    }, 400);
                });
            });
        </script>
    @endpush
@endsection
