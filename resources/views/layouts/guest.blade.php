<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="font-sans text-gray-100 antialiased bg-cover bg-center min-h-screen relative"
    style="background-image: url('{{ asset('storage/gambar/benner.png') }}')">

    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/70 backdrop-blur-sm"></div>

    <!-- Container -->
    <div class="relative z-10 min-h-screen flex flex-col items-center justify-center px-6">

        <!-- Logo / Title -->
        <div class="mb-8 text-center">

            <a href="/" class="inline-block">

                <h1 class="text-5xl font-light tracking-[0.25em] text-amber-400">
                    MUSEUM
                </h1>

                <p class="mt-3 text-gray-300 text-sm tracking-wide">
                    Museum Negeri Demmatande Kabupaten Mamasa
                </p>

            </a>

        </div>

        <!-- Card -->
        <div
            class="w-full sm:max-w-md px-10 py-10 bg-[#2b1d13]/90 border border-amber-900 shadow-2xl rounded-3xl">

            {{ $slot }}

        </div>

    </div>

</body>

</html>