<x-app-layout>
    <x-slot name="title">
        {{ $title }}
    </x-slot>
    <div class="min-h-screen bg-[#1a120b] text-white">

        <section class="relative overflow-hidden">
            <div class="absolute inset-0">
                <img src="{{ asset('storage/gambar/benner.png') }}" class="w-full h-full object-cover opacity-25"
                    alt="">
            </div>

            <div class="absolute inset-0 bg-gradient-to-r from-[#1a120b] via-[#2b1d13]/90 to-[#1a120b]/70"></div>

            <div class="relative z-10 max-w-7xl mx-auto px-6 py-28">
                <div class="max-w-3xl">
                    <span
                        class="inline-block px-4 py-2 bg-amber-700/20 border border-amber-700 rounded-full text-sm text-amber-300">
                        Museum Negeri Demmatande
                    </span>
                    <h1 class="mt-8 text-5xl md:text-6xl font-extralight tracking-wide leading-tight">
                        Koleksi Budaya <br>& Sejarah Mamasa
                    </h1>
                    <p class="mt-8 text-lg text-gray-300 leading-relaxed">
                        Jelajahi berbagai artefak budaya, pakaian adat, senjata tradisional, dokumen sejarah, hingga
                        kerajinan khas masyarakat Mamasa.
                    </p>
                </div>
            </div>
        </section>

        <section class="py-12 bg-[#24170f] border-b border-amber-900">
            <div class="max-w-7xl mx-auto px-6">
                <div class="bg-[#2b1d13] border border-amber-900 rounded-3xl p-5 shadow-2xl">

                    <form action="{{ url()->current() }}" method="GET">

                        @if (request()->filled('kategori'))
                            <input type="hidden" name="kategori" value="{{ request('kategori') }}">
                        @endif

                        <div class="flex flex-col lg:flex-row gap-5">
                            <div class="flex-1 relative">
                                <input type="text" name="search" value="{{ request('search') }}"
                                    placeholder="Cari koleksi museum..."
                                    class="w-full bg-[#1a120b] border border-amber-900 rounded-2xl px-6 py-4 pl-14 text-white placeholder-gray-500 focus:outline-none focus:border-amber-600">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-5 h-5 absolute left-5 top-1/2 -translate-y-1/2 text-gray-500"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-4.35-4.35m1.85-5.15a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>

                            <button type="submit"
                                class="bg-amber-700 hover:bg-amber-600 text-white transition px-8 py-4 rounded-2xl shadow-xl font-medium">
                                Cari Koleksi
                            </button>
                        </div>
                    </form>

                    <div class="flex flex-wrap gap-4 mt-8">

                        <a href="{{ url()->current() }}"
                            class="{{ !request()->filled('kategori') ? 'bg-amber-700 text-white' : 'bg-[#1a120b] border border-amber-900 text-gray-300 hover:border-amber-600' }} transition px-5 py-3 rounded-2xl text-center text-sm min-w-[100px]">
                            Semua
                        </a>

                        @foreach ($kategori as $kat)
                            <a href="{{ url()->current() . '?kategori=' . $kat->id }}"
                                class="{{ request('kategori') == $kat->id ? 'bg-amber-700 text-white' : 'bg-[#1a120b] border border-amber-900 text-gray-300 hover:border-amber-600' }} transition px-5 py-3 rounded-2xl text-center text-sm">
                                {{ $kat->jenis_kategori }}
                            </a>
                        @endforeach

                    </div>
                </div>
            </div>
        </section>

        <section class="py-24">
            <div class="max-w-7xl mx-auto px-6">

                <div class="mb-14">
                    <h2 class="text-4xl font-light text-amber-400">
                        Menampilkan Koleksi
                    </h2>
                    <p class="text-gray-400 mt-4">
                        Koleksi budaya pilihan Museum Demmatande
                    </p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10">

                    @forelse ($koleksi as $item)
                        <a href="{{ route('detailKoleksi', $item->id) }}">
                            <div
                                class="bg-[#2b1d13] border border-amber-900 rounded-3xl overflow-hidden shadow-2xl group hover:-translate-y-2 transition duration-500 h-full flex flex-col">

                                <div class="h-72 overflow-hidden">
                                    <img src="{{ asset('storage/' . $item->gambar) }}"
                                        class="w-full h-full object-cover group-hover:scale-110 transition duration-700"
                                        alt="{{ $item->nama_koleksi }}">
                                </div>

                                <div class="p-8 flex-1 flex flex-col justify-between">
                                    <div>
                                        <span
                                            class="inline-block px-3 py-1 bg-amber-700/20 border border-amber-700 rounded-full text-xs text-amber-300">
                                            {{ $item->kategori->jenis_kategori ?? 'Umum' }}
                                        </span>

                                        <h3
                                            class="mt-5 text-2xl font-light text-white group-hover:text-amber-400 transition">
                                            {{ $item->nama_koleksi }}
                                        </h3>

                                        <p class="mt-4 text-gray-400 leading-relaxed text-sm line-clamp-3">
                                            {{ $item->detail->deskripsi ?? 'Tidak ada deskripsi.' }}
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </a>
                    @empty
                        <div
                            class="col-span-full text-center py-16 border border-dashed border-amber-900/40 rounded-3xl bg-[#2b1d13]/30">
                            <p class="text-gray-400 text-lg">Koleksi museum tidak ditemukan.</p>
                            <a href="{{ route('koleksi') }}"
                                class="inline-block mt-4 text-sm text-amber-400 hover:underline">Reset Filter</a>
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
