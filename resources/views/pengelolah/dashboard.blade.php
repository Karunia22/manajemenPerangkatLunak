<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard Museum</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-[#1a120b] text-white">

    <div class="flex min-h-screen">

        <!-- SIDEBAR -->
        <aside
            class="w-72 bg-[#21150e] border-r border-amber-900 flex flex-col">

            <!-- LOGO -->
            <div
                class="h-24 border-b border-amber-900 flex items-center px-8">

                <div class="flex items-center gap-4">

                    <div
                        class="w-14 h-14 rounded-2xl overflow-hidden border border-amber-700">

                        <img src="{{ asset('storage/gambar/museum.jpg') }}"
                            class="w-full h-full object-cover"
                            alt="Museum" style="width: 70px; height: 70px;">

                    </div>

                    <div>

                        <h1
                            class="text-xl tracking-wide text-amber-400 font-light">

                            Admin Panel

                        </h1>

                        <p class="text-xs text-gray-400">
                            Museum Demmatande
                        </p>

                    </div>

                </div>

            </div>

            <!-- MENU -->
            <div class="flex-1 px-6 py-8" style="padding: 20px">

                <nav class="space-y-3">

                    <a href="#"
                        class="flex items-center gap-4 px-5 py-4 rounded-2xl bg-amber-700 text-white shadow-xl">

                        Dashboard

                    </a>

                    <a href="#"
                        class="flex items-center gap-4 px-5 py-4 rounded-2xl hover:bg-[#2b1d13] transition text-gray-300">

                        Kelola Koleksi

                    </a>

                    <a href="#"
                        class="flex items-center gap-4 px-5 py-4 rounded-2xl hover:bg-[#2b1d13] transition text-gray-300">

                        Kategori

                    </a>

                    <a href="#"
                        class="flex items-center gap-4 px-5 py-4 rounded-2xl hover:bg-[#2b1d13] transition text-gray-300">

                        Pengaturan

                    </a>

                </nav>

            </div>

            <!-- LOGOUT -->
            <div
                class="p-6 border-t border-amber-900">

                <button
                    class="w-full bg-red-500/10 hover:bg-red-500/20 border border-red-500/20 text-red-400 py-4 rounded-2xl transition">

                    Keluar

                </button>

            </div>

        </aside>

        <!-- MAIN -->
        <main class="flex-1">

            <!-- HEADER -->
            <header
                class="h-24 border-b border-amber-900 px-10 flex items-center justify-between bg-[#1f140d]">

                <div>

                    <h1
                        class="text-4xl font-extralight tracking-wide">

                        Dashboard

                    </h1>

                    <p class="text-gray-400 mt-2">
                        Selamat datang kembali administrator museum
                    </p>

                </div>

                <!-- USER -->
                <div class="flex items-center gap-5">

                    <div class="text-right">

                        <h3 class="text-white">
                            Pengelola Museum
                        </h3>

                        <p class="text-sm text-gray-400">
                            Administrator
                        </p>

                    </div>

                    <div
                        class="w-14 h-14 rounded-full bg-amber-700 flex items-center justify-center text-xl">

                        PM

                    </div>

                </div>

            </header>

            <!-- CONTENT -->
            <div class="p-10" style="padding: 20px">

                <!-- STATS -->
                <div
                    class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">

                    <!-- CARD -->
                    <div
                        class="bg-[#2b1d13] border border-amber-900 rounded-3xl p-8 shadow-2xl">

                        <p class="text-gray-400">
                            Total Koleksi
                        </p>

                        <h2
                            class="mt-4 text-5xl font-light text-amber-400">

                            250

                        </h2>

                    </div>

                    <!-- CARD -->
                    <div
                        class="bg-[#2b1d13] border border-amber-900 rounded-3xl p-8 shadow-2xl">

                        <p class="text-gray-400">
                            Kategori
                        </p>

                        <h2
                            class="mt-4 text-5xl font-light text-blue-400">

                            12

                        </h2>

                    </div>

                    <!-- CARD -->
                    <div
                        class="bg-[#2b1d13] border border-amber-900 rounded-3xl p-8 shadow-2xl">

                        <p class="text-gray-400">
                            Koleksi Baru
                        </p>

                        <h2
                            class="mt-4 text-5xl font-light text-yellow-400">

                            8

                        </h2>

                    </div>

                    <!-- CARD -->
                    <div
                        class="bg-[#2b1d13] border border-amber-900 rounded-3xl p-8 shadow-2xl">

                        <p class="text-gray-400">
                            Perlu Perawatan
                        </p>

                        <h2
                            class="mt-4 text-5xl font-light text-red-400">

                            3

                        </h2>

                    </div>

                </div>

                <!-- TABLE -->
                <div
                    class="mt-12 bg-[#2b1d13] border border-amber-900 rounded-[2rem] overflow-hidden shadow-2xl">

                    <!-- HEADER -->
                    <div
                        class="flex items-center justify-between px-8 py-8 border-b border-amber-900">

                        <div>

                            <h2
                                class="text-3xl font-light text-amber-400">

                                Koleksi Terbaru

                            </h2>

                            <p class="text-gray-400 mt-2">
                                Data koleksi museum terbaru
                            </p>

                        </div>

                        <button
                            class="bg-amber-700 hover:bg-amber-600 transition px-6 py-4 rounded-2xl shadow-xl">

                            + Tambah Koleksi

                        </button>

                    </div>

                    <!-- TABLE -->
                    <div class="overflow-x-auto">

                        <table class="w-full">

                            <thead
                                class="bg-[#24170f] text-gray-300">

                                <tr>

                                    <th
                                        class="text-left px-8 py-5 font-light">
                                        Nama Koleksi
                                    </th>

                                    <th
                                        class="text-left px-8 py-5 font-light">
                                        Kategori
                                    </th>

                                    <th
                                        class="text-left px-8 py-5 font-light">
                                        Kondisi
                                    </th>

                                    <th
                                        class="text-left px-8 py-5 font-light">
                                        Tahun
                                    </th>

                                    <th
                                        class="text-left px-8 py-5 font-light">
                                        Aksi
                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                                <!-- ITEM -->
                                @for ( $i = 0; $i < 10; $i++)
                                    <tr
                                    class="border-b border-amber-900 hover:bg-[#24170f] transition">

                                    <td class="px-8 py-6">

                                        <div
                                            class="flex items-center gap-5">

                                            <div
                                                class="w-14 h-14 rounded-2xl overflow-hidden">

                                                <img src="{{ asset('storage/gambar/museum.jpg') }}"
                                                    class="w-full h-full object-cover"
                                                    alt="" style="width: 70px; height: 70px;">

                                            </div>

                                            <div>

                                                <h3>
                                                    Baju Pokko
                                                </h3>

                                                <p
                                                    class="text-sm text-gray-400">
                                                    Koleksi budaya
                                                </p>

                                            </div>

                                        </div>

                                    </td>

                                    <td class="px-8 py-6">
                                        Pakaian Adat
                                    </td>

                                    <td class="px-8 py-6">

                                        <span
                                            class="px-4 py-2 bg-green-500/20 border border-green-500 rounded-full text-green-300 text-sm">

                                            Baik

                                        </span>

                                    </td>

                                    <td class="px-8 py-6">
                                        2026
                                    </td>

                                    <td class="px-8 py-6">

                                        <div
                                            class="flex items-center gap-4">

                                            <button
                                                class="text-amber-400 hover:text-amber-300 transition">

                                                Detail

                                            </button>

                                            <button
                                                class="text-blue-400 hover:text-blue-300 transition">

                                                Edit

                                            </button>

                                            <button
                                                class="text-red-400 hover:text-red-300 transition">

                                                Hapus

                                            </button>

                                        </div>

                                    </td>

                                </tr>
                                @endfor

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </main>

    </div>

</body>

</html>