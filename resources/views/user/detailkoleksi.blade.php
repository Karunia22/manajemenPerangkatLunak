<x-app-layout>

    <div class="min-h-screen bg-[#1a120b] text-white">

        <!-- HERO -->
        <section class="relative overflow-hidden border-b border-amber-900">

            <!-- Background -->
            <div class="absolute inset-0">

                <img src="{{ asset('storage/gambar/benner.png') }}" class="w-full h-full object-cover opacity-20"
                    alt="">

            </div>

            <!-- Overlay -->
            <div class="absolute inset-0 bg-gradient-to-r from-[#1a120b] via-[#2b1d13]/90 to-[#1a120b]/70">
            </div>

            <!-- Content -->
            <div class="relative z-10 max-w-7xl mx-auto px-6 pt-32 pb-20">
                <!-- Back -->
                <a href="{{ route('koleksi') }}"
                    class="inline-flex items-center gap-3 text-gray-300 hover:text-amber-400 transition mb-12">

                    <!-- Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />

                    </svg>

                    Kembali ke Koleksi

                </a>

                <!-- Detail -->
                <div class="grid lg:grid-cols-2 gap-16 items-start">

                    <!-- Image -->
                    <div>

                        <div class="rounded-[2rem] overflow-hidden border border-amber-900 shadow-2xl">

                            <img src="{{ asset('storage/gambar/museum.jpg') }}"
                                class="w-full h-[600px] object-cover hover:scale-105 transition duration-700" alt="">

                        </div>

                    </div>


                    <!-- Information -->

                    <div>

                        <!-- Category -->
                        <span
                            class="px-4 py-2 bg-amber-700/20 border border-amber-700 rounded-full text-sm text-amber-300">

                            Pakaian Adat

                        </span>

                        <!-- Title -->
                        <h1 class="mt-8 text-5xl font-extralight tracking-wide">

                            Baju Pokko

                        </h1>

                        <!-- DESKRIPSI -->
                        <div class="mt-10">

                            <h2 class="text-2xl text-amber-400 font-light">
                                Deskripsi Koleksi
                            </h2>

                            <p class="mt-5 text-lg text-gray-300 leading-relaxed">

                                Baju Pokko merupakan pakaian adat perempuan khas Mamasa
                                yang memiliki bentuk sederhana namun elegan. Pakaian ini
                                dibuat menggunakan kain tradisional dengan motif khas budaya
                                Mamasa yang diwariskan secara turun-temurun.

                            </p>

                        </div>

                        <!-- SEJARAH -->
                        <div class="mt-10">

                            <h2 class="text-2xl text-amber-400 font-light">
                                Sejarah Koleksi
                            </h2>

                            <p class="mt-5 text-lg text-gray-300 leading-relaxed">

                                Baju Pokko digunakan masyarakat Mamasa sejak zaman dahulu
                                dalam berbagai kegiatan adat, ritual budaya, serta acara
                                penting masyarakat setempat. Hingga kini koleksi ini menjadi
                                simbol identitas budaya Mamasa.

                            </p>

                        </div>

                        <!-- INFORMATION -->
                        <div class="mt-10 bg-[#2b1d13] border border-amber-900 rounded-3xl overflow-hidden">

                            <!-- Asal -->
                            <div class="flex justify-between items-center px-8 py-5 border-b border-amber-900">

                                <span class="text-gray-400">
                                    Asal Daerah
                                </span>

                                <span class="text-white">
                                    Mamasa, Sulawesi Barat
                                </span>

                            </div>

                            <!-- Kategori -->
                            <div class="flex justify-between items-center px-8 py-5">

                                <span class="text-gray-400">
                                    Kategori
                                </span>

                                <span class="text-white">
                                    Pakaian Adat
                                </span>

                            </div>

                        </div>

                        <!-- BUTTON -->
                    </div>



                </div>

            </div>

        </section>

        <!-- RELATED -->
        <section class="py-24">

            <div class="max-w-7xl mx-auto px-6">

                <!-- Heading -->
                <div class="mb-14">

                    <h2 class="text-4xl font-light text-amber-400">
                        Koleksi Terkait
                    </h2>

                    <p class="text-gray-400 mt-4">
                        Koleksi budaya lain yang mungkin menarik
                    </p>

                </div>

                <!-- Grid -->
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">

                    <!-- Card -->
                    <div
                        class="group bg-[#2b1d13] border border-amber-900 rounded-3xl overflow-hidden shadow-2xl hover:-translate-y-2 transition duration-500">

                        <!-- Image -->
                        <div class="h-64 overflow-hidden">

                            <img src="{{ asset('storage/gambar/museum.jpg') }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition duration-700" alt="">

                        </div>

                        <!-- Content -->
                        <div class="p-6">

                            <span
                                class="px-3 py-1 bg-amber-700/20 border border-amber-700 rounded-full text-xs text-amber-300">

                                Pakaian Adat

                            </span>

                            <h3 class="mt-4 text-xl">
                                Mahkota Adat
                            </h3>

                        </div>

                    </div>

                    <!-- Card -->
                    <div
                        class="group bg-[#2b1d13] border border-amber-900 rounded-3xl overflow-hidden shadow-2xl hover:-translate-y-2 transition duration-500">

                        <div class="h-64 overflow-hidden">

                            <img src="{{ asset('storage/gambar/benner.png') }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition duration-700" alt="">

                        </div>

                        <div class="p-6">

                            <span
                                class="px-3 py-1 bg-amber-700/20 border border-amber-700 rounded-full text-xs text-amber-300">

                                Alat Musik

                            </span>

                            <h3 class="mt-4 text-xl">
                                Kecapi Tradisional
                            </h3>

                        </div>

                    </div>

                    <!-- Card -->
                    <div
                        class="group bg-[#2b1d13] border border-amber-900 rounded-3xl overflow-hidden shadow-2xl hover:-translate-y-2 transition duration-500">

                        <div class="h-64 overflow-hidden">

                            <img src="{{ asset('storage/gambar/museum.jpg') }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition duration-700" alt="">

                        </div>

                        <div class="p-6">

                            <span
                                class="px-3 py-1 bg-amber-700/20 border border-amber-700 rounded-full text-xs text-amber-300">

                                Senjata Tradisional

                            </span>

                            <h3 class="mt-4 text-xl">
                                Mandau Mamasa
                            </h3>

                        </div>

                    </div>

                    <!-- Card -->
                    <div
                        class="group bg-[#2b1d13] border border-amber-900 rounded-3xl overflow-hidden shadow-2xl hover:-translate-y-2 transition duration-500">

                        <div class="h-64 overflow-hidden">

                            <img src="{{ asset('storage/gambar/benner.png') }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition duration-700" alt="">

                        </div>

                        <div class="p-6">

                            <span
                                class="px-3 py-1 bg-amber-700/20 border border-amber-700 rounded-full text-xs text-amber-300">

                                Kerajinan

                            </span>

                            <h3 class="mt-4 text-xl">
                                Keranjang Anyaman
                            </h3>

                        </div>

                    </div>

                </div>

            </div>

        </section>

    </div>

</x-app-layout>
