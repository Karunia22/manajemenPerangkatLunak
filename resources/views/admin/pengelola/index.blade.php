@extends('layouts.templatpengelolah')
@section('content')
@if (session('success'))
<div
    class="max-w-6xl mx-auto mb-6 p-4 bg-gradient-to-r from-amber-800/80 to-amber-700/80 backdrop-blur-md border border-amber-600/40 rounded-2xl flex items-start gap-3 shadow-2xl transition-all duration-300">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-amber-300 mt-0.5 shrink-0" fill="none"
        viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
    </svg>
    <div>
        <h4 class="text-sm font-semibold text-amber-100">Berhasil!</h4>
        <p class="text-xs text-amber-200/90 mt-0.5">{{ session('success') }}</p>
    </div>
</div>
@endif
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

                <tbody> @forelse ($user as $data => $index)
                    <tr class="border-b border-amber-900 hover:bg-[#24170f] transition">
                        <td class="px-8 py-6">
                            <div class="flex items-center gap-5">
                                <div>
                                    <h3>{{$index->name}}</h3>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-6"> {{$index->email}}</td>
                        <td class="px-8 py-6">
                            <span
                                class="px-4 py-2 bg-green-500/20 border border-green-500 rounded-full text-green-300 text-sm">
                                {{$index->role}}
                            </span>
                        </td>
                        <td class="px-8 py-6">
                            <div class="flex items-center gap-4">
                                <a href="{{ route('editA', $index->id) }}"
                                    class="text-blue-400 hover:text-blue-300 transition">
                                    Edit
                                </a>
                                <form action="{{ route('hapusAkun', $index->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus akun ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="text-red-400 hover:text-red-300 transition">
                                        Hapus
                                    </button>

                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr class="border-b border-amber-900">
                        <td colspan="4" class="px-8 py-10 text-center text-gray-400 italic">
                            Belum ada akun pengelola.
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>

        </div>

    </div>

</div>
@endsection
