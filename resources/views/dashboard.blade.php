<x-app-layout>

    <div class="min-h-screen bg-[#1a120b] text-white">

        <!-- HERO -->
        <section class="relative overflow-hidden">

            <!-- Background -->
            <div class="absolute inset-0">
                <img src="{{ asset('storage/gambar/benner.png') }}" class="w-full h-full object-cover opacity-30"
                    alt="">
            </div>

            <!-- Overlay -->
            <div class="absolute inset-0 bg-gradient-to-r from-[#1a120b] via-[#2b1d13]/90 to-[#1a120b]/70"></div>

            <!-- Content -->
            <div class="relative z-10 max-w-7xl mx-auto px-6 py-28">

                <div class="grid lg:grid-cols-2 gap-16 items-center">

                    <!-- Left -->
                    <div>

                        <span
                            class="inline-block px-4 py-2 bg-amber-700/30 border border-amber-600 rounded-full text-sm text-amber-300">
                            Mamasa, Sulawesi Barat
                        </span>

                        <h1 class="mt-8 text-5xl md:text-6xl font-extralight leading-tight tracking-wide">

                            Jelajahi Kekayaan
                            Budaya &
                            Sejarah Mamasa

                        </h1>

                        <p class="mt-8 text-lg text-gray-300 leading-relaxed max-w-xl">

                            Museum Negeri Demmatande hadir secara digital
                            untuk memperkenalkan warisan budaya Mamasa,
                            sejarah perjuangan, serta kekayaan tradisi
                            lokal kepada generasi masa kini.

                        </p>

                        <div class="mt-10 flex flex-wrap gap-4">

                            <a href="#koleksi"
                                class="bg-amber-700 hover:bg-amber-600 transition px-8 py-4 rounded-2xl shadow-2xl">

                                Jelajahi Koleksi

                            </a>



                        </div>

                    </div>

                    <!-- Right -->
                    <div class="hidden lg:flex justify-center">

                        <div
                            class="w-[420px] h-[500px] rounded-[3rem] overflow-hidden border border-amber-800 shadow-2xl">

                            <img src="{{ asset('storage/gambar/museum.jpg') }}" class="w-full h-full object-cover"
                                alt="">

                        </div>

                    </div>

                </div>

            </div>

        </section>

        <!-- STATISTIC -->
        <section class="py-16 bg-[#24170f]">

            <div class="max-w-7xl mx-auto px-6">

                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">

                    <!-- Item -->
                    <div class="bg-[#2f2117] border border-amber-900 rounded-3xl p-8 text-center shadow-xl">

                        <h2 class="text-4xl font-light text-amber-400">
                            250+
                        </h2>

                        <p class="mt-3 text-gray-400">
                            Total Koleksi
                        </p>

                    </div>

                    <!-- Item -->
                    <div class="bg-[#2f2117] border border-amber-900 rounded-3xl p-8 text-center shadow-xl">

                        <h2 class="text-4xl font-light text-amber-400">
                            15
                        </h2>

                        <p class="mt-3 text-gray-400">
                            Kategori
                        </p>

                    </div>

                    <!-- Item -->
                    <div class="bg-[#2f2117] border border-amber-900 rounded-3xl p-8 text-center shadow-xl">

                        <h2 class="text-4xl font-light text-amber-400">
                            120+
                        </h2>

                        <p class="mt-3 text-gray-400">
                            Artefak Sejarah
                        </p>

                    </div>

                    <!-- Item -->
                    <div class="bg-[#2f2117] border border-amber-900 rounded-3xl p-8 text-center shadow-xl">

                        <h2 class="text-4xl font-light text-amber-400">
                            Digital
                        </h2>

                        <p class="mt-3 text-gray-400">
                            Akses Museum
                        </p>

                    </div>

                </div>

            </div>

        </section>

        <!-- KOLEKSI -->
        <section id="koleksi" class="py-24">

            <div class="max-w-7xl mx-auto px-6">

                <!-- Heading -->
                <div class="mb-16">

                    <h2 class="text-4xl font-light text-amber-400">
                        Koleksi Unggulan
                    </h2>

                    <p class="text-gray-400 mt-4">
                        Beberapa koleksi budaya khas Mamasa
                    </p>

                </div>

                <!-- Cards -->
                <div class="grid md:grid-cols-3 gap-10">

                    <!-- Card -->
                    <div
                        class="bg-[#2b1d13] border border-amber-900 rounded-3xl overflow-hidden shadow-2xl group hover:-translate-y-2 transition duration-500">

                        <div class="h-72 overflow-hidden">

                            <img src="{{ asset('storage/gambar/museum.jpg') }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition duration-700" alt="">

                        </div>

                        <div class="p-8">

                            <span
                                class="px-3 py-1 bg-amber-700/20 border border-amber-700 rounded-full text-xs text-amber-300">

                                Pakaian Adat

                            </span>

                            <h3 class="mt-5 text-2xl">
                                Baju Pokko
                            </h3>

                            <p class="mt-4 text-gray-400 leading-relaxed">

                                Pakaian adat khas Mamasa yang digunakan
                                pada berbagai acara budaya dan upacara adat.

                            </p>

                        </div>

                    </div>

                    <!-- Card -->


                    <!-- Card -->
                    <div
                        class="bg-[#2b1d13] border border-amber-900 rounded-3xl overflow-hidden shadow-2xl group hover:-translate-y-2 transition duration-500">

                        <div class="h-72 overflow-hidden">

                            <img src="{{ asset('storage/gambar/museum.jpg') }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition duration-700" alt="">

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

                                Kerajinan anyaman khas Mamasa yang diwariskan
                                turun-temurun oleh masyarakat lokal.

                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </section>

        <!-- FOOTER -->
        <footer class="bg-black border-t border-amber-900 py-14">

            <div class="max-w-7xl mx-auto px-6">

                <div class="grid md:grid-cols-3 gap-10">

                    <!-- About -->
                    <div>

                        <h2 class="text-2xl font-light tracking-widest text-amber-400">

                            Museum Demmatande

                        </h2>

                        <p class="mt-5 text-gray-400 leading-relaxed">

                            Platform digital untuk menjelajahi
                            budaya dan sejarah Kabupaten Mamasa.

                        </p>

                    </div>

                    <!-- Navigation -->
                    <div>

                        <h3 class="text-xl text-amber-400 mb-5">
                            Navigasi
                        </h3>

                        <ul class="space-y-3 text-gray-400">

                            <li>
                                <a href="#" class="hover:text-white">
                                    Beranda
                                </a>
                            </li>

                            <li>
                                <a href="#koleksi" class="hover:text-white">
                                    Koleksi
                                </a>
                            </li>

                            <li>
                                <a href="#tentang" class="hover:text-white">
                                    Tentang
                                </a>
                            </li>

                        </ul>

                    </div>

                    <!-- Contact -->
                    <div>

                        <h3 class="text-xl text-amber-400 mb-5">
                            Kontak
                        </h3>

                        <div class="space-y-3 text-gray-400">

                            <p>
                                Mamasa, Sulawesi Barat
                            </p>

                            <p>
                                info@museum.id
                            </p>

                            <p>
                                0821 0000 0000
                            </p>

                        </div>

                    </div>

                </div>

                <!-- Bottom -->
                <div class="border-t border-gray-800 mt-14 pt-8 text-center text-gray-500">

                    © {{ date('Y') }}
                    Museum Negeri Demmatande Mamasa —
                    Universitas Sulawesi Barat

                </div>

            </div>

        </footer>

    </div>

</x-app-layout>
