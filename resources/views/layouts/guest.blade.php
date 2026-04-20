<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Sipilsaku' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white font-body">
    <main class="min-h-screen bg-white flex items-center justify-center px-4 py-6 md:px-6 md:py-8">
        <div class="w-full max-w-[1180px] rounded-sm bg-[#F4EEE8] p-4 md:p-6">
            @yield('content')
        </div>
    </main>
</body>
</html>