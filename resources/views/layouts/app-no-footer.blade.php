<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Sipilsaku' }}</title>
    <link rel="icon" type="image/png" href="{{ asset('sipilsaku-logo.png') }}">
    <link rel="shortcut icon" href="{{ asset('sipilsaku-logo.png') }}">
    @include('layouts.style.tailwind')
</head>
<body class="bg-white font-body text-[#4D371F]">
    <div class="min-h-screen bg-white">
        @include('components.navbar')

        <main>
            @yield('content')
        </main>
    </div>

    @stack('scripts')
</body>
</html>