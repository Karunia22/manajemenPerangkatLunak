<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard Museum</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-[#1a120b] text-white overflow-hidden">

    <div class="flex h-screen">

        <!-- SIDEBAR -->
        @include('layouts.sidebarr')



        <!-- MAIN -->
        <main class="flex-1 lg:ml-72 h-screen overflow-y-auto">

            <!-- HEADER -->
            <header
                class="sticky top-0 z-40 h-24 border-b border-amber-900/30 px-6 lg:px-10 flex items-center justify-between bg-[#1a120b]/80 backdrop-blur-xl shadow-lg">

                <!-- LEFT -->
                <div>


                </div>

                <!-- RIGHT -->
                <div class="flex items-center gap-5">

                    <div class="relative" x-data="{ dropdownOpen: false }">

                        <button @click="dropdownOpen = !dropdownOpen" class="flex items-center gap-3">

                            <div
                                class="w-11 h-11 rounded-full bg-amber-700 flex items-center justify-center text-white font-semibold">

                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}

                            </div>

                            <div class="text-left">

                                <div class="text-sm text-white">
                                    {{ Auth::user()->name }}
                                </div>

                                <div class="text-xs text-gray-300">
                                    Administrator
                                </div>

                            </div>

                        </button>

                        <!-- DROPDOWN -->
                        <div x-show="dropdownOpen" @click.away="dropdownOpen = false" x-transition
                            class="absolute right-0 mt-4 w-56 bg-[#2b1d13] border border-amber-900 rounded-2xl shadow-2xl overflow-hidden">

                            <form method="POST" action="{{ route('logout') }}">

                                @csrf

                                <button type="submit"
                                    class="w-full text-left px-5 py-4 text-red-400 hover:bg-red-500/10 transition">

                                    Logout

                                </button>

                            </form>


                        </div>

                    </div>

                </div>

            </header>

            <!-- CONTENT -->
            @yield('content')

        </main>

    </div>

</body>

</html>
