@extends('layouts.templatpengelolah')
@section('content')
<div class="p-4 lg:p-10">


    <!-- TABLE -->
    <div class="mt-10 bg-[#2b1d13] border border-amber-900 rounded-[2rem] overflow-hidden shadow-2xl">

        <!-- HEADER -->
        <div
            class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5 px-6 lg:px-8 py-6 border-b border-amber-900">

            <div>

                <h2 class="text-2xl lg:text-3xl font-light text-amber-400">

                    Akun Pengelola

                </h2>

                <p class="text-gray-400 mt-2 text-sm">
                    Data pengelola museum terbaru
                </p>

            </div>


        </div>

        <!-- TABLE SCROLL -->
        <div class="overflow-auto max-h-[600px]">

            <table class="w-full min-w-[900px]">

                <thead class="bg-[#24170f] text-gray-300">
                    <tr>
                        <th class="text-left px-8 py-5 font-light"> Nama </th>
                        <th class="text-left px-8 py-5 font-light"> Email</th>
                        <th class="text-left px-8 py-5 font-light"> Role </th>

                        <th class="text-left px-8 py-5 font-light"> Aksi </th>
                    </tr>
                </thead>
                <tbody> <!-- ITEM -->
                    @foreach ($user as $data => $index)
                    <tr class="border-b border-amber-900 hover:bg-[#24170f] transition">
                        <td class="px-8 py-6">
                            <div class="flex items-center gap-5">
                                <div>
                                    <h3>{{$index->name}}</h3>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-6"> {{$index->email}}</td>
                        <td class="px-8 py-6"> <span
                                class="px-4 py-2 bg-green-500/20 border border-green-500 rounded-full text-green-300 text-sm">
                                {{$index->role}} </span> </td>
                        <td class="px-8 py-6">
                            <div class="flex items-center gap-4">
                                <a href="{{ route('editA') }}" class="text-blue-400 hover:text-blue-300 transition">
                                    Edit
                                </a>
                                <button class="text-red-400 hover:text-red-300 transition">
                                    Hapus
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>

        </div>

    </div>

</div>
@endsection
