<x-app-layout>

    <div class="min-h-screen bg-[#1a120b] text-white">

        <!-- HERO -->
        <section class="relative overflow-hidden">

            <!-- Background -->
            <div class="absolute inset-0">

                <img src="{{ asset('storage/gambar/benner.png') }}"
                    class="w-full h-full object-cover opacity-25"
                    alt="">

            </div>

            <!-- Overlay -->
            <div
                class="absolute inset-0 bg-gradient-to-r from-[#1a120b] via-[#2b1d13]/90 to-[#1a120b]/70">
            </div>

            <!-- Content -->
            <div class="relative z-10 max-w-7xl mx-auto px-6 py-28">

                <div class="max-w-3xl">

                    <span
                        class="inline-block px-4 py-2 bg-amber-700/20 border border-amber-700 rounded-full text-sm text-amber-300">

                        Museum Negeri Demmatande

                    </span>

                    <h1
                        class="mt-8 text-5xl md:text-6xl font-extralight tracking-wide leading-tight">

                        Koleksi Budaya
                        & Sejarah Mamasa

                    </h1>

                    <p class="mt-8 text-lg text-gray-300 leading-relaxed">

                        Jelajahi berbagai artefak budaya,
                        pakaian adat, senjata tradisional,
                        dokumen sejarah, hingga kerajinan khas
                        masyarakat Mamasa.

                    </p>

                </div>

            </div>

        </section>

        <!-- SEARCH -->
        <section class="py-12 bg-[#24170f] border-b border-amber-900">

            <div class="max-w-7xl mx-auto px-6">

                <div
                    class="bg-[#2b1d13] border border-amber-900 rounded-3xl p-5 shadow-2xl">

                    <div class="flex flex-col lg:flex-row gap-5">

                        <!-- Search -->
                        <div class="flex-1 relative">

                            <input type="text"
                                placeholder="Cari koleksi museum..."
                                class="w-full bg-[#1a120b] border border-amber-900 rounded-2xl px-6 py-4 pl-14 text-white placeholder-gray-500 focus:outline-none focus:border-amber-600">

                            <!-- Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-5 h-5 absolute left-5 top-1/2 -translate-y-1/2 text-gray-500"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M21 21l-4.35-4.35m1.85-5.15a7 7 0 11-14 0 7 7 0 0114 0z" />

                            </svg>

                        </div>

                        <!-- Button -->
                        <button
                            class="bg-amber-700 hover:bg-amber-600 transition px-8 py-4 rounded-2xl shadow-xl">

                            Cari Koleksi

                        </button>

                    </div>

                    <!-- Categories -->
                    <div class="flex flex-wrap gap-4 mt-8">

                        <button
                            class="bg-amber-700 text-white px-5 py-3 rounded-2xl">

                            Semua

                        </button>

                        <button
                            class="bg-[#1a120b] border border-amber-900 hover:border-amber-600 transition px-5 py-3 rounded-2xl text-gray-300">

                            Pakaian Adat

                        </button>

                        <button
                            class="bg-[#1a120b] border border-amber-900 hover:border-amber-600 transition px-5 py-3 rounded-2xl text-gray-300">

                            Senjata Tradisional

                        </button>

                        <button
                            class="bg-[#1a120b] border border-amber-900 hover:border-amber-600 transition px-5 py-3 rounded-2xl text-gray-300">

                            Kerajinan

                        </button>

                        <button
                            class="bg-[#1a120b] border border-amber-900 hover:border-amber-600 transition px-5 py-3 rounded-2xl text-gray-300">

                            Dokumen Sejarah

                        </button>

                    </div>

                </div>

            </div>

        </section>

        <!-- COLLECTION -->
        <section class="py-24">

            <div class="max-w-7xl mx-auto px-6">

                <!-- Heading -->
                <div class="mb-14">

                    <h2 class="text-4xl font-light text-amber-400">
                        Menampilkan Koleksi
                    </h2>

                    <p class="text-gray-400 mt-4">
                        Koleksi budaya pilihan Museum Demmatande
                    </p>

                </div>

                <!-- Grid -->
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10">

                    <!-- Card -->
                    <div
                        class="group bg-[#2b1d13] border border-amber-900 rounded-3xl overflow-hidden shadow-2xl hover:-translate-y-2 transition duration-500">

                        <!-- Image -->
                        <div class="h-72 overflow-hidden">

                            <img src="{{ asset('storage/gambar/museum.jpg') }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition duration-700"
                                alt="">

                        </div>

                        <!-- Content -->
                        <div class="p-8">

                            <span
                                class="px-3 py-1 bg-amber-700/20 border border-amber-700 rounded-full text-xs text-amber-300">

                                Pakaian Adat

                            </span>

                            <h3 class="mt-5 text-2xl">
                                Baju Pokko
                            </h3>

                            <p class="mt-4 text-gray-400 leading-relaxed">

                                Pakaian adat perempuan khas Mamasa
                                yang digunakan dalam upacara budaya.

                            </p>

                            <button
                                class="mt-8 w-full bg-amber-700 hover:bg-amber-600 transition py-4 rounded-2xl">

                                Lihat Detail

                            </button>

                        </div>

                    </div>

                    <!-- Card -->
                    <div
                        class="group bg-[#2b1d13] border border-amber-900 rounded-3xl overflow-hidden shadow-2xl hover:-translate-y-2 transition duration-500">

                        <div class="h-72 overflow-hidden">

                            <img src="{{ asset('storage/gambar/benner.png') }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition duration-700"
                                alt="">

                        </div>

                        <div class="p-8">

                            <span
                                class="px-3 py-1 bg-amber-700/20 border border-amber-700 rounded-full text-xs text-amber-300">

                                Senjata Tradisional

                            </span>

                            <h3 class="mt-5 text-2xl">
                                Mandau Mamasa
                            </h3>

                            <p class="mt-4 text-gray-400 leading-relaxed">

                                Senjata tradisional khas masyarakat
                                Mamasa yang memiliki nilai sejarah.

                            </p>

                            <button
                                class="mt-8 w-full bg-amber-700 hover:bg-amber-600 transition py-4 rounded-2xl">

                                Lihat Detail

                            </button>

                        </div>

                    </div>

                    <!-- Card -->
                    <div
                        class="group bg-[#2b1d13] border border-amber-900 rounded-3xl overflow-hidden shadow-2xl hover:-translate-y-2 transition duration-500">

                        <div class="h-72 overflow-hidden">

                            <img src="{{ asset('storage/gambar/museum.jpg') }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition duration-700"
                                alt="">

                        </div>

                        <div class="p-8">

                            <span
                                class="px-3 py-1 bg-amber-700/20 border border-amber-700 rounded-full text-xs text-amber-300">

                                Kerajinan

                            </span>

                            <h3 class="mt-5 text-2xl">
                                Anyaman Tradisional
                            </h3>

                            <p class="mt-4 text-gray-400 leading-relaxed">

                                Kerajinan tangan khas Mamasa yang
                                diwariskan turun-temurun.

                            </p>

                            <button
                                class="mt-8 w-full bg-amber-700 hover:bg-amber-600 transition py-4 rounded-2xl">

                                Lihat Detail

                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </section>

    </div>

</x-app-layout>