@extends('layouts.templatpengelolah')
@section('title')
    <title>{{$title}}</title>
@endsection
@section('content')
<div class="p-4 lg:p-10">

    <!-- STATS -->
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6">

        <!-- CARD -->
        <!-- CARD -->
        <div class="bg-[#2b1d13] border border-amber-900 rounded-3xl p-6 shadow-2xl">
            <p class="text-gray-400 text-sm">Total Akun Pengelola</p>
            <h2 class="mt-4 text-4xl lg:text-5xl font-light text-amber-400" id="stat-total-pengelola">
                {{$pengelola}}
            </h2>
        </div>

        <!-- CARD -->
        <div class="bg-[#2b1d13] border border-amber-900 rounded-3xl p-6 shadow-2xl">
            <p class="text-gray-400 text-sm">Total Akun Pengunjung</p>
            <h2 class="mt-4 text-4xl lg:text-5xl font-light text-blue-400" id="stat-total-pengunjung">
                {{$pengunjung}}
            </h2>
        </div>

        <!-- CARD -->
        <div class="bg-[#2b1d13] border border-amber-900 rounded-3xl p-6 shadow-2xl">
            <p class="text-gray-400 text-sm">Total Keseluruhan Akun</p>
            <h2 class="mt-4 text-4xl lg:text-5xl font-light text-red-400" id="stat-total-user">
                {{$user}}
            </h2>
        </div>

    </div>

    <!-- GRAFIK PEMBUATAN AKUN -->
    <div class="mt-10 bg-[#2b1d13] border border-amber-900 rounded-[2rem] overflow-hidden shadow-2xl">

        <!-- HEADER -->
        <div
            class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5 px-6 lg:px-8 py-6 border-b border-blue-900">

            <div>

                <h2 class="text-2xl lg:text-3xl font-light text-blue-400">
                    Statistik Pembuatan Akun
                </h2>

                <p class="text-gray-400 mt-2 text-sm">
                    Grafik jumlah pengguna yang membuat akun
                </p>

            </div>

        </div>

        <!-- CONTENT -->
        <div class="p-6 lg:p-10">



            <!-- CHART -->
            <div class="bg-[#24170f] border border-amber-900 rounded-3xl p-6">

                <div class="relative w-full h-[400px]">
                    <canvas id="accountChart" data-pengelola="{{ json_encode($dataPengelola) }}"
                        data-pengunjung="{{ json_encode($dataPengunjung) }}">
                    </canvas>
                </div>

            </div>

        </div>

    </div>

</div>
@endsection
