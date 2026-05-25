@extends('layouts.templatpengelolah')
@section('content')
<div class="p-4 lg:p-10">

    <!-- STATS -->
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">

        <!-- CARD -->
        <div class="bg-[#2b1d13] border border-amber-900 rounded-3xl p-6 shadow-2xl">

            <p class="text-gray-400 text-sm">
                Total Koleksi
            </p>

            <h2 class="mt-4 text-4xl lg:text-5xl font-light text-amber-400">

                250

            </h2>

        </div>

        <!-- CARD -->
        <div class="bg-[#2b1d13] border border-amber-900 rounded-3xl p-6 shadow-2xl">

            <p class="text-gray-400 text-sm">
                Kategori
            </p>

            <h2 class="mt-4 text-4xl lg:text-5xl font-light text-blue-400">

                12

            </h2>

        </div>

        <!-- CARD -->
        <div class="bg-[#2b1d13] border border-amber-900 rounded-3xl p-6 shadow-2xl">

            <p class="text-gray-400 text-sm">
                Koleksi Baru
            </p>

            <h2 class="mt-4 text-4xl lg:text-5xl font-light text-yellow-400">

                8

            </h2>

        </div>

        <!-- CARD -->
        <div class="bg-[#2b1d13] border border-amber-900 rounded-3xl p-6 shadow-2xl">

            <p class="text-gray-400 text-sm">
                Perlu Perawatan
            </p>

            <h2 class="mt-4 text-4xl lg:text-5xl font-light text-red-400">

                3

            </h2>

        </div>

    </div>

    <!-- TABLE -->
    <div class="mt-10 bg-[#2b1d13] border border-amber-900 rounded-[2rem] overflow-hidden shadow-2xl">

        <!-- HEADER -->
        <div
            class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5 px-6 lg:px-8 py-6 border-b border-amber-900">

            <div>

                <h2 class="text-2xl lg:text-3xl font-light text-amber-400">

                    Koleksi Terbaru

                </h2>

                <p class="text-gray-400 mt-2 text-sm">
                    Data koleksi museum terbaru
                </p>

            </div>

            <a href="{{ route('tambah') }}"
                class="bg-amber-700 hover:bg-amber-600 transition px-6 py-4 rounded-2xl shadow-xl">

                Tambah Koleksi

            </a>

        </div>

        <!-- TABLE SCROLL -->
        <div class="overflow-auto max-h-[600px]">

            <table class="w-full min-w-[900px]">

                <thead class="bg-[#24170f] text-gray-300">
                    <tr>
                        <th class="text-left px-8 py-5 font-light"> Nama Koleksi </th>
                        <th class="text-left px-8 py-5 font-light"> Kategori </th>
                        <th class="text-left px-8 py-5 font-light"> Kondisi </th>
                        <th class="text-left px-8 py-5 font-light"> Tahun </th>
                        <th class="text-left px-8 py-5 font-light"> Aksi </th>
                    </tr>
                </thead>
                <tbody> <!-- ITEM -->
                    @for ($i = 0; $i < 10; $i++) <tr class="border-b border-amber-900 hover:bg-[#24170f] transition">
                        <td class="px-8 py-6">
                            <div class="flex items-center gap-5">
                                <div class="w-14 h-14 rounded-2xl overflow-hidden"> <img
                                        src="{{ asset('storage/gambar/museum.jpg') }}"
                                        class="w-full h-full object-cover" alt="" style="width: 70px; height: 70px;">
                                </div>
                                <div>
                                    <h3> Baju Pokko </h3>
                                    <p class="text-sm text-gray-400"> Koleksi budaya </p>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-6"> Pakaian Adat </td>
                        <td class="px-8 py-6"> <span
                                class="px-4 py-2 bg-green-500/20 border border-green-500 rounded-full text-green-300 text-sm">
                                Baik </span> </td>
                        <td class="px-8 py-6"> 2026 </td>
                        <td class="px-8 py-6">
                            <div class="flex items-center gap-4">
                                <button class="text-amber-400 hover:text-amber-300 transition"> Detail
                                </button>
                                <a href="{{ route('edit') }}" class="text-blue-400 hover:text-blue-300 transition">
                                    Edit
                                </a>
                                <button class="text-red-400 hover:text-red-300 transition">
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
@endsection
