<aside class="lg:w-[290px] lg:shrink-0">
    <div id="adminSidebarOverlay" class="fixed inset-0 z-40 hidden bg-black/25 lg:hidden"></div>

    <div id="adminSidebar"
        class="fixed left-0 top-0 z-50 flex h-screen w-[290px] -translate-x-full flex-col border-r border-[#E8DDD2] bg-white px-6 py-8 transition duration-300 lg:static lg:z-auto lg:h-screen lg:translate-x-0">
        <a href="{{ route('admin.dashboard') }}" class="shrink-0">
            <img src="{{ asset('sipilsaku-logo.png') }}" alt="Sipilsaku Logo"
                class="h-[38px] w-auto object-contain">
        </a>

        <div class="mt-10 space-y-2">
            <a href="{{ route('admin.dashboard') }}"
                class="admin-sidebar-link flex items-center rounded-xl px-4 py-3 text-sm font-medium transition {{ request()->routeIs('admin.dashboard') ? 'bg-[#F6F2EE] text-[#D89A53]' : 'text-[#4D371F] hover:bg-[#FCF5EE]' }}">
                Dashboard
            </a>

            <a href="{{ route('admin.courses.index') }}"
                class="admin-sidebar-link flex items-center rounded-xl px-4 py-3 text-sm font-medium transition {{ request()->routeIs('admin.courses.*') ? 'bg-[#F6F2EE] text-[#D89A53]' : 'text-[#4D371F] hover:bg-[#FCF5EE]' }}">
                Kelola Course / Video
            </a>

            <a href="{{ route('admin.ebooks.index') }}"
                class="admin-sidebar-link flex items-center rounded-xl px-4 py-3 text-sm font-medium transition {{ request()->routeIs('admin.ebooks.*') ? 'bg-[#F6F2EE] text-[#D89A53]' : 'text-[#4D371F] hover:bg-[#FCF5EE]' }}">
                Kelola E-Book
            </a>

            <a href="{{ route('admin.users.index') }}"
                class="admin-sidebar-link flex items-center rounded-xl px-4 py-3 text-sm font-medium transition {{ request()->routeIs('admin.users.*') ? 'bg-[#F6F2EE] text-[#D89A53]' : 'text-[#4D371F] hover:bg-[#FCF5EE]' }}">
                Kelola User
            </a>
        </div>

        <div class="mt-auto space-y-3 pt-8">
            <a href="{{ route('home') }}"
                class="admin-sidebar-link flex w-full items-center justify-center rounded-full border border-[#D89A53] px-4 py-2.5 text-sm font-medium text-[#D89A53] transition hover:bg-[#D89A53] hover:text-white">
                Kembali ke Beranda
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="flex w-full items-center justify-center rounded-full bg-[#D89A53] px-4 py-2.5 text-sm font-medium text-white transition hover:bg-[#c9863d]">
                    Keluar
                </button>
            </form>
        </div>
    </div>
</aside>