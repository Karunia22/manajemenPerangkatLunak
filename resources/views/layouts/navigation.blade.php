<nav x-data="{ open: false }"
    class="fixed top-0 left-0 w-full z-50 bg-black/40 backdrop-blur-md border-b border-amber-900/40">

    <div class="max-w-7xl mx-auto px-6">

        <div class="flex justify-between items-center h-20">

            <!-- LEFT -->
            <div class="flex items-center gap-10">

                <!-- LOGO -->
                <a href="{{ route('dashboard') }}" class="flex items-center gap-4">

                    <div class="w-12 h-12 rounded-2xl overflow-hidden border border-amber-700 shadow-lg">

                        <img src="{{ asset('storage/gambar/museum.jpg') }}" class="w-full h-full object-cover"
                            alt="Museum">

                    </div>

                    <div>

                        <h1 class="text-lg tracking-[0.2em] text-white font-light">

                            MUSEUM

                        </h1>

                        <p class="text-xs text-gray-300">
                            Demmatande Mamasa
                        </p>

                    </div>

                </a>

                <!-- MENU -->
                <div class="hidden sm:flex items-center gap-8">

                    <a href="{{ route('dashboard') }}" class="text-gray-100 hover:text-amber-400 transition">

                        Beranda

                    </a>

                    <a href="{{ route('koleksi') }}" class="text-gray-100 hover:text-amber-400 transition">

                        Koleksi

                    </a>

                </div>

            </div>

            <!-- RIGHT -->
            <div class="hidden sm:flex items-center">

                <!-- USER DROPDOWN -->
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

                        </div>

                    </button>

                    <!-- DROPDOWN -->
                    <div x-show="dropdownOpen" @click.away="dropdownOpen = false" x-transition
                        class="absolute right-0 mt-4 w-56 bg-[#2b1d13] border border-amber-900 rounded-2xl shadow-2xl overflow-hidden">

                        <a href="{{ route('profile.edit') }}"
                            class="block px-5 py-4 text-gray-100 hover:bg-amber-700/20 transition">
                            Profile
                        </a>


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

            <!-- MOBILE BUTTON -->
            <div class="sm:hidden">

                <button @click="open = !open" class="text-white">

                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">

                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />

                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />

                    </svg>

                </button>

            </div>

        </div>

    </div>

    <!-- MOBILE MENU -->
    <div x-show="open" x-transition class="sm:hidden bg-[#24170f]/95 backdrop-blur-md border-t border-amber-900">

        <div class="px-6 py-6 space-y-5">

            <a href="{{ route('dashboard') }}" class="block text-gray-100 hover:text-amber-400 transition">

                Beranda

            </a>

            <a href="{{ route('koleksi') }}" class="block text-gray-100 hover:text-amber-400 transition">

                Koleksi

            </a>


            <a href="{{ route('profile.edit') }}" class="block text-gray-100 hover:text-amber-400 transition">

                Profile

            </a>

            <form method="POST" action="{{ route('logout') }}">

                @csrf

                <button type="submit" class="text-red-400">

                    Logout

                </button>

            </form>

        </div>

    </div>

</nav>
