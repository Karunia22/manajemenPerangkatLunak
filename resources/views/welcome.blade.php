<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Museum Budaya Mamasa</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-[#1a120b] text-white">

    <!-- NAVBAR -->
    <nav class="fixed top-0 left-0 w-full z-50 bg-black/40 backdrop-blur-md">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

            <h1 class="text-2xl font-light tracking-widest">
                Museum Mamasa
            </h1>

            <div class="flex items-center gap-4">

                <a href="#tentang" class="hover:text-amber-400 transition">
                    Tentang
                </a>

                <a href="#jadwal" class="hover:text-amber-400 transition">
                    Jadwal
                </a>

                <a href="#lokasi" class="hover:text-amber-400 transition">
                    Lokasi
                </a>

                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="bg-amber-700 hover:bg-amber-600 px-5 py-2 rounded-lg transition">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="border border-amber-600 px-5 py-2 rounded-lg hover:bg-amber-700 transition">
                        Login
                    </a>
                @endauth

            </div>
        </div>
    </nav>

    <!-- HERO SECTION -->
    <section class="relative min-h-screen bg-cover bg-center flex items-center pt-24"
        style="
        background-image: url('{{ asset('storage/gambar/benner.png') }}');
        height: 100vh;
        background-size: cover;
        background-position: center;
    ">
        <!-- Overlay -->
        <div class="absolute inset-0 bg-gradient-to-r from-[#1a120b]/95 via-[#3b2414]/80 to-black/40"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-6 w-full">

            <div class="max-w-2xl">

                <h1 class="text-5xl md:text-7xl font-extralight leading-tight tracking-wide">
                    MUSEUM NEGERI DEMMATANDE
                    KABUPATEN MAMASA
                </h1>

                <p class="mt-8 text-lg leading-relaxed text-gray-200">
                    Sebuah perjalanan menyelami kekayaan budaya dan
                    kearifan lokal masyarakat Mamasa — dari tenun Sambu,
                    ukiran Banua Sura’, hingga semangat perjuangan
                    Demmatande yang abadi.
                </p>

                <div class="mt-10 flex gap-4">

                    <a href="#koleksi"
                        class="bg-amber-700 hover:bg-amber-600 px-8 py-4 rounded-xl text-lg transition shadow-lg">
                        Jelajahi Koleksi
                    </a>

                    <a href="#tentang"
                        class="border border-amber-600 hover:bg-amber-800/40 px-8 py-4 rounded-xl text-lg transition">
                        Pelajari Lebih Lanjut
                    </a>

                </div>

            </div>
        </div>
    </section>

    <!-- TENTANG -->
    <section id="tentang" class="py-24 bg-[#2a1b12]">
        <div class="max-w-7xl mx-auto px-6">

            <div class="grid md:grid-cols-2 gap-14 items-center">

                <div>
                    <img src="{{ asset('storage/gambar/museum.jpg') }}"
                        class="rounded-3xl shadow-2xl w-full object-cover h-[500px]" alt="">
                </div>

                <div>

                    <h2 class="text-4xl font-light mb-6 text-amber-400">
                        Tentang Museum
                    </h2>

                    <p class="text-gray-300 leading-relaxed text-lg">
                        Museum Demmatande hadir sebagai pusat pelestarian
                        budaya Mamasa yang menyimpan berbagai koleksi
                        sejarah, artefak tradisional, pakaian adat,
                        alat musik tradisional, serta dokumentasi budaya
                        masyarakat lokal.
                    </p>

                    <div class="grid grid-cols-2 gap-6 mt-10">

                        <div class="bg-[#3a2618] p-6 rounded-2xl">
                            <h3 class="text-3xl font-bold text-amber-400">
                                250+
                            </h3>
                            <p class="text-gray-300 mt-2">
                                Koleksi Budaya
                            </p>
                        </div>

                        <div class="bg-[#3a2618] p-6 rounded-2xl">
                            <h3 class="text-3xl font-bold text-amber-400">
                                15+
                            </h3>
                            <p class="text-gray-300 mt-2">
                                Galeri Pameran
                            </p>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </section>

    <!-- JADWAL -->
    <section id="jadwal" class="py-24 bg-[#1a120b]">

        <div class="max-w-5xl mx-auto px-6">

            <div class="text-center mb-14">

                <h2 class="text-4xl font-light text-amber-400">
                    Jadwal Operasional
                </h2>

                <p class="text-gray-400 mt-4">
                    Informasi jam buka museum
                </p>

            </div>

            <div class="overflow-hidden rounded-3xl border border-amber-900 shadow-2xl">

                <table class="w-full">

                    <thead class="bg-amber-800">

                        <tr>
                            <th class="p-5 text-left">Hari</th>
                            <th class="p-5 text-left">Jam Buka</th>
                            <th class="p-5 text-left">Status</th>
                        </tr>

                    </thead>

                    <tbody class="bg-[#2b1d13]">

                        <tr class="border-b border-amber-900">
                            <td class="p-5">Senin - Jumat</td>
                            <td class="p-5">08.00 - 17.00</td>
                            <td class="p-5 text-green-400">Buka</td>
                        </tr>

                        <tr class="border-b border-amber-900">
                            <td class="p-5">Sabtu</td>
                            <td class="p-5">09.00 - 16.00</td>
                            <td class="p-5 text-green-400">Buka</td>
                        </tr>

                        <tr>
                            <td class="p-5">Minggu</td>
                            <td class="p-5">Tutup</td>
                            <td class="p-5 text-red-400">Libur</td>
                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

    </section>

    <!-- GOOGLE MAP -->
    <section id="lokasi" class="py-24 bg-[#2a1b12]">

        <div class="max-w-7xl mx-auto px-6">

            <div class="text-center mb-14">

                <h2 class="text-4xl font-light text-amber-400">
                    Lokasi Museum
                </h2>

                <p class="text-gray-400 mt-4">
                    Temukan lokasi museum melalui Google Maps
                </p>

            </div>

            <div class="overflow-hidden rounded-3xl border border-amber-900 shadow-2xl">

                <!-- GANTI LINK EMBED GOOGLE MAPS DI SINI -->
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3662.886696498629!2d119.37561177456311!3d-2.9428716970333784!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d930ba1ad2cee45%3A0x7b6a813e99ace901!2sMuseum%20Dem%20Matande%20Mamasa!5e1!3m2!1sid!2sid!4v1779348820973!5m2!1sid!2sid"
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>

            </div>

        </div>

    </section>

    <!-- FOOTER -->
    <footer class="bg-black py-14 border-t border-amber-900">

        <div class="max-w-7xl mx-auto px-6">

            <div class="grid md:grid-cols-3 gap-10">

                <div>

                    <h2 class="text-2xl font-light tracking-widest text-amber-400">
                        Museum Demmatande
                    </h2>

                    <p class="mt-4 text-gray-400 leading-relaxed">
                        Menjaga warisan budaya Mamasa untuk generasi
                        masa depan melalui edukasi, dokumentasi,
                        dan pelestarian budaya lokal.
                    </p>

                </div>

                <div>

                    <h3 class="text-xl mb-4 text-amber-400">
                        Navigasi
                    </h3>

                    <ul class="space-y-3 text-gray-400">
                        <li><a href="#tentang" class="hover:text-white">Tentang</a></li>
                        <li><a href="#jadwal" class="hover:text-white">Jadwal</a></li>
                        <li><a href="#lokasi" class="hover:text-white">Lokasi</a></li>
                    </ul>

                </div>

                <div>

                    <h3 class="text-xl mb-4 text-amber-400">
                        Media Sosial
                    </h3>

                    <div class="flex gap-4 text-gray-400">

                        <a href="#" class="hover:text-white">
                            Instagram
                        </a>

                        <a href="#" class="hover:text-white">
                            Facebook
                        </a>

                        <a href="#" class="hover:text-white">
                            YouTube
                        </a>

                    </div>

                </div>

            </div>

            <div class="border-t border-gray-800 mt-12 pt-6 text-center text-gray-500">

                © {{ date('Y') }} Museum Demmatande Kabupaten Mamasa.
                All Rights Reserved.

            </div>

        </div>

    </footer>

</body>

</html>
