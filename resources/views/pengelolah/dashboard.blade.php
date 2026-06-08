@extends('layouts.templatpengelolah')
@section('title')
    <title>{{$title}}</title>
@endsection

@section('content')
<div class="p-4 lg:p-10">

    <div class="mb-6">
        <h3 class="text-sm font-semibold text-amber-500 uppercase tracking-wider mb-3">Koleksi Artefak</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6">
            <div class="bg-[#2b1d13] border border-amber-900 rounded-3xl p-6 shadow-2xl">
                <p class="text-gray-400 text-sm">Total Koleksi</p>
                <h2 class="mt-4 text-4xl lg:text-5xl font-light text-amber-400">{{$totalKoleksi}}</h2>
            </div>

            <div class="bg-[#2b1d13] border border-amber-900 rounded-3xl p-6 shadow-2xl">
                <p class="text-gray-400 text-sm">Kategori Koleksi</p>
                <h2 class="mt-4 text-4xl lg:text-5xl font-light text-blue-400">{{$totalKategori}}</h2>
            </div>

            <div class="bg-[#2b1d13] border border-amber-900 rounded-3xl p-6 shadow-2xl">
                <p class="text-gray-400 text-sm">Koleksi Baru (7 Hari Terakhir)</p>
                <h2 class="mt-4 text-4xl lg:text-5xl font-light text-yellow-400">{{$koleksiBaru}}</h2>
            </div>
        </div>
    </div>

    <div class="mb-10">
        <h3 class="text-sm font-semibold text-amber-500 uppercase tracking-wider mb-3">Video & Audio Visual</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6">
            <div class="bg-[#2b1d13] border border-amber-900 rounded-3xl p-6 shadow-2xl">
                <p class="text-gray-400 text-sm">Total Video Budaya</p>
                <h2 class="mt-4 text-4xl lg:text-5xl font-light text-amber-400">{{$totalVideo}}</h2>
            </div>

            <div class="bg-[#2b1d13] border border-amber-900 rounded-3xl p-6 shadow-2xl">
                <p class="text-gray-400 text-sm">Kategori Video</p>
                <h2 class="mt-4 text-4xl lg:text-5xl font-light text-blue-400">{{$totalKategoriVideo}}</h2>
            </div>

            <div class="bg-[#2b1d13] border border-amber-900 rounded-3xl p-6 shadow-2xl">
                <p class="text-gray-400 text-sm">Video Baru (7 Hari Terakhir)</p>
                <h2 class="mt-4 text-4xl lg:text-5xl font-light text-yellow-400">{{$videoBaru}}</h2>
            </div>
        </div>
    </div>

    <div class="bg-[#2b1d13] border border-amber-900 rounded-[2rem] overflow-hidden shadow-2xl">

        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5 px-6 lg:px-8 py-6 border-b border-amber-900">
            <div>
                <h2 class="text-2xl lg:text-3xl font-light text-amber-400">Statistik Pengunjung</h2>
                <p class="text-gray-400 mt-2 text-sm">Grafik jumlah pengunjung website museum</p>
            </div>
        </div>

        <div class="p-6 lg:p-10">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div class="bg-[#24170f] border border-amber-900 rounded-3xl p-6">
                    <p class="text-gray-400 text-sm">Total Pengunjung</p>
                    <h2 class="text-4xl text-amber-400 mt-3 font-light" id="stat-total-pengunjung">
                        {{ number_format($totalPengunjung, 0, ',', '.') }}
                    </h2>
                </div>

                <div class="bg-[#24170f] border border-amber-900 rounded-3xl p-6">
                    <p class="text-gray-400 text-sm">Pengunjung Hari Ini</p>
                    <h2 class="text-4xl text-green-400 mt-3 font-light" id="stat-pengunjung-hari-ini">
                        {{ number_format($pengunjungHariIni, 0, ',', '.') }}
                    </h2>
                </div>
            </div>

            <div class="bg-[#24170f] border border-amber-900 rounded-3xl p-6">
                <div class="relative w-full h-[400px]">
                    <canvas id="visitorChart" data-stats="{{ json_encode($dataGrafik) }}"></canvas>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection