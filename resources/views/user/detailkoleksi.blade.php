<x-app-layout>
<x-slot name="title">
        {{ $title }}
    </x-slot>
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
                <!-- Detail -->
                <div class="grid lg:grid-cols-2 gap-16 items-start">

                    <!-- Image -->
                    <div>

                        <div class="rounded-[2rem] overflow-hidden border border-amber-900 shadow-2xl">

                            <img src="{{ asset('storage/'. $koleksi->gambar) }}"
                                class="w-full h-[600px] object-cover hover:scale-105 transition duration-700" alt="">

                        </div>

                    </div>


                    <!-- Information -->

                    <div>

                        <!-- Category -->
                        <span
                            class="px-4 py-2 bg-amber-700/20 border border-amber-700 rounded-full text-sm text-amber-300">

                            {{$koleksi->kategori->jenis_kategori}}

                        </span>

                        <!-- Title -->
                        <h1 class="mt-8 text-5xl font-extralight tracking-wide">

                            {{$koleksi->nama_koleksi}}

                        </h1>

                        <!-- DESKRIPSI -->
                        <div class="mt-10">

                            <h2 class="text-2xl text-amber-400 font-light">
                                Deskripsi </h2>

                            <p class="mt-5 text-lg text-gray-300 leading-relaxed">

                                {{$koleksi->detail->deskripsi}}

                            </p>

                        </div>

                        <!-- SEJARAH -->
                        <div class="mt-10">

                            <h2 class="text-2xl text-amber-400 font-light">
                                Sejarah </h2>

                            <p class="mt-5 text-lg text-gray-300 leading-relaxed">

                                {{$koleksi->detail->sejarah}}

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
                                    {{$koleksi->detail->asal_daerah}}
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
                    @forelse ($koleksiTerkait as $item)
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
                    @empty
                    <div
                        class="col-span-full text-center py-12 border border-dashed border-amber-900/30 rounded-xl bg-[#2b1d13]/20">
                        <p class="text-gray-400 text-base">Koleksi belum ada.</p>
                    </div>
                    @endforelse



                </div>

            </div>

        </section>

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
