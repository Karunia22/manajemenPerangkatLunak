@extends('layouts.templatpengelolah')

@section('title')
<title>{{ $title }}</title>
@endsection

@section('content')
<div class="p-4 lg:p-10">

    {{-- SUCCESS ALERT --}}
    @if(session('success'))
    <div
        class="mb-6 px-6 py-4 bg-amber-500/10 border border-amber-500/20 text-amber-400 rounded-2xl flex items-center justify-between shadow-lg">
        <div class="flex items-center gap-3">
            <span class="font-medium">Berhasil!</span>
            {{ session('success') }}
        </div>
    </div>
    @endif

    {{-- ERROR ALERT --}}
    @if(session('error'))
    <div
        class="mb-6 px-6 py-4 bg-red-500/10 border border-red-500/20 text-red-400 rounded-2xl flex items-center justify-between shadow-lg">
        <div>
            <span class="font-medium">Gagal!</span>
            {{ session('error') }}
        </div>
    </div>
    @endif


    <!-- TABLE WRAPPER -->
    <div class="mt-10 bg-[#2b1d13] border border-amber-900 rounded-[2rem] overflow-hidden shadow-2xl">

        <!-- HEADER -->
        <div
            class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5 px-6 lg:px-8 py-6 border-b border-amber-900">

            <div>
                <h2 class="text-2xl lg:text-3xl font-light text-amber-400">
                    Daftar Video Museum
                </h2>

            </div>

            <a href="{{ route('videoTambah') }}"
                class="bg-amber-700 hover:bg-amber-600 transition px-6 py-4 rounded-2xl shadow-xl">
                Tambah Video
            </a>

        </div>

        <!-- TABLE -->
        <div class="overflow-auto max-h-[600px]">

            <table class="w-full min-w-[1000px]">

                <thead class="sticky top-0 bg-[#24170f] text-gray-300 border-b border-amber-900 z-10">

                    <tr>
                        <th class="text-left px-8 py-5 font-light">Video</th>
                        <th class="text-left px-8 py-5 font-light">Deskripsi</th>
                        <th class="text-left px-8 py-5 font-light">Provider</th>
                        <th class="text-left px-8 py-5 font-light">Pengelola</th>
                        <th class="text-left px-8 py-5 font-light">Aksi</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($videos as $video)

                    <tr class="border-b border-amber-900/30 hover:bg-[#24170f]/80 transition">

                        <!-- VIDEO -->
                        <td class="px-8 py-6">

                            <div class="flex items-center gap-5">

                                <div
                                    class="w-20 h-14 rounded-xl overflow-hidden border border-amber-900/30 flex items-center justify-center bg-black/20">

                                    {{-- YOUTUBE --}}
                                    @if($video->provider === 'youtube')
                                    🎬
                                    @elseif($video->provider === 'upload')
                                    🎥
                                    @else
                                    🔗
                                    @endif

                                </div>

                                <div>
                                    <h3 class="text-white font-medium">
                                        {{ $video->title }}
                                    </h3>

                                    <p class="text-sm text-gray-500">
                                        {{ $video->provider }}
                                    </p>
                                </div>

                            </div>

                        </td>

                        <!-- DESKRIPSI -->
                        <td class="px-8 py-6 text-gray-400">
                            {{ Str::limit($video->description, 60) ?? '-' }}
                        </td>

                        <!-- PROVIDER -->
                        <td class="px-8 py-6">

                            <span class="px-4 py-2 rounded-full text-sm
                                {{ $video->provider == 'youtube' ? 'bg-red-700/20 text-red-300 border border-red-700/30' : '' }}
                                {{ $video->provider == 'upload' ? 'bg-green-700/20 text-green-300 border border-green-700/30' : '' }}
                                {{ $video->provider == 'external' ? 'bg-blue-700/20 text-blue-300 border border-blue-700/30' : '' }}
                            ">
                                {{ strtoupper($video->provider) }}
                            </span>

                        </td>

                        <!-- USER -->
                        <td class="px-8 py-6">

                            <div class="flex items-center gap-3">

                                <div
                                    class="w-10 h-10 rounded-full bg-amber-700 flex items-center justify-center text-sm">

                                    {{ strtoupper(substr($video->user->name ?? 'U',0,1)) }}

                                </div>

                                <span class="text-gray-300">
                                    {{ $video->user->name ?? '-' }}
                                </span>

                            </div>

                        </td>

                        <!-- AKSI -->
                        <td class="px-8 py-6">

                            <div class="flex items-center gap-5">

                                <a href="{{ route('videoLihat', $video->id) }}" class="text-amber-400 hover:text-amber-300 transition">
                                    lihat
                                </a>

                                <a href="{{ route('videoEdit', $video->id) }}" class="text-blue-400 hover:text-blue-300 transition">
                                    Edit
                                </a>

                                <form action="{{ route('videoHapus', $video->id ) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus video ini?')">

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

                    <tr>
                        <td colspan="5">
                            <div class="flex flex-col items-center justify-center py-20">

                                <div
                                    class="w-24 h-24 rounded-full bg-[#24170f] flex items-center justify-center text-4xl text-amber-500">
                                    🎬
                                </div>

                                <h3 class="mt-6 text-2xl font-extralight text-amber-400">
                                    Belum Ada Video
                                </h3>

                                <p class="text-gray-500 mt-3">
                                    Tambahkan video dokumentasi budaya museum.
                                </p>

                                <a href="#"
                                    class="mt-8 px-6 py-4 rounded-2xl bg-amber-700 hover:bg-amber-600 transition">

                                    + Tambah Video

                                </a>

                            </div>
                        </td>
                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>
@endsection
