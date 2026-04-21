<aside class="hidden w-[280px] shrink-0 border-r border-[#E8DDD2] bg-white lg:block">
    <div class="flex h-full flex-col px-6 py-8">
        <a href="{{ route('admin.dashboard') }}" class="shrink-0">
            <img src="{{ asset('assets/logo/sipilsaku-logo.png') }}" alt="Sipilsaku Logo"
                class="h-[38px] w-auto object-contain">
        </a>

        <div class="mt-10 space-y-2">
            <a href="{{ route('admin.dashboard') }}"
                class="flex items-center rounded-xl px-4 py-3 text-sm font-medium transition
                {{ request()->routeIs('admin.dashboard') ? 'bg-[#F6F2EE] text-[#D89A53]' : 'text-[#4D371F] hover:bg-[#FCF5EE]' }}">
                Dashboard
            </a>

            <a href="{{ route('admin.courses.index') }}"
                class="flex items-center rounded-xl px-4 py-3 text-sm font-medium transition
                {{ request()->routeIs('admin.courses.*') ? 'bg-[#F6F2EE] text-[#D89A53]' : 'text-[#4D371F] hover:bg-[#FCF5EE]' }}">
                Course
            </a>

            <a href="{{ route('admin.ebooks.index') }}"
                class="flex items-center rounded-xl px-4 py-3 text-sm font-medium transition
                {{ request()->routeIs('admin.ebooks.*') ? 'bg-[#F6F2EE] text-[#D89A53]' : 'text-[#4D371F] hover:bg-[#FCF5EE]' }}">
                E-Book
            </a>

            <a href="{{ route('admin.users.index') }}"
                class="flex items-center rounded-xl px-4 py-3 text-sm font-medium transition
                {{ request()->routeIs('admin.users.*') ? 'bg-[#F6F2EE] text-[#D89A53]' : 'text-[#4D371F] hover:bg-[#FCF5EE]' }}">
                User
            </a>
        </div>

        <div class="mt-auto space-y-3">
            <a href="{{ route('homepage') }}"
                class="flex w-full items-center justify-center rounded-full border border-[#D89A53] px-4 py-2 text-sm font-medium text-[#D89A53] transition hover:bg-[#D89A53] hover:text-white">
                Kembali ke Halaman Utama
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="flex w-full items-center justify-center rounded-full bg-[#D89A53] px-4 py-2 text-sm font-medium text-white transition hover:bg-[#c9863d]">
                    Keluar
                </button>
            </form>
        </div>
    </div>
</aside>