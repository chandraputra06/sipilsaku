<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') | Sipilsaku</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/logo/sipilsaku-logo.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="overflow-x-hidden bg-[#FCF5EE] font-body text-[#4D371F]">
    <div class="min-h-screen lg:flex">
        @include('components.admin.sidebar')

        <div class="min-w-0 flex-1">
            <header class="sticky top-0 z-30 border-b border-[#E8DDD2] bg-[#FCF5EE]/95 backdrop-blur lg:hidden">
                <div class="flex items-center justify-between px-4 py-4 sm:px-6">
                    <a href="{{ route('admin.dashboard') }}">
                        <img src="{{ asset('assets/logo/sipilsaku-logo.png') }}" alt="Sipilsaku Logo"
                            class="h-[34px] w-auto object-contain">
                    </a>

                    <button id="adminSidebarToggle"
                        class="flex h-10 w-10 items-center justify-center rounded-xl border border-[#D89A53] text-[#D89A53]">
                        <svg id="adminSidebarOpenIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>

                        <svg id="adminSidebarCloseIcon" xmlns="http://www.w3.org/2000/svg"
                            class="hidden h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </header>

            <main class="min-w-0 px-4 py-5 sm:px-6 sm:py-6 lg:p-8">
                @yield('content')
            </main>
        </div>
    </div>

    @stack('scripts')
</body>
</html>