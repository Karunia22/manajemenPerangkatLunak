@extends('layouts.templatpengelolah')
@section('content')
<div class="p-4 lg:p-10">

    {{-- 1. NOTIFIKASI BERHASIL HAPUS / TAMBAH --}}
    @if(session('success'))
    <div id="success-alert"
        class="mb-6 px-6 py-4 bg-amber-500/10 border border-amber-500/20 text-amber-400 rounded-2xl flex items-center justify-between shadow-lg transition-all duration-300">
        <div class="flex items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 text-amber-500" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <div>
                <span class="font-medium">Berhasil!</span> {{ session('success') }}
            </div>
        </div>
        <button type="button" onclick="dismissAlert('success-alert')"
            class="text-amber-400/60 hover:text-amber-400 p-1 rounded-lg hover:bg-amber-500/10 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
    @endif

    {{-- 2. NOTIFIKASI GAGAL SYSTEM --}}
    @if(session('error'))
    <div id="error-system-alert"
        class="mb-6 px-6 py-4 bg-red-500/10 border border-red-500/20 text-red-400 rounded-2xl flex items-center justify-between shadow-lg transition-all duration-300">
        <div class="flex items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 text-red-500" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
            <div>
                <span class="font-medium">Gagal!</span> {{ session('error') }}
            </div>
        </div>
        <button type="button" onclick="dismissAlert('error-system-alert')"
            class="text-red-400/60 hover:text-red-400 p-1 rounded-lg hover:bg-red-500/10 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
    @endif
    <!-- TABLE -->
    <div class="mt-10 bg-[#2b1d13] border border-amber-900 rounded-[2rem] overflow-hidden shadow-2xl">

        <!-- HEADER -->
        <div
            class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5 px-6 lg:px-8 py-6 border-b border-amber-900">

            <div>

                <h2 class="text-2xl lg:text-3xl font-light text-amber-400">

                    Daftar Koleksi

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

            <table class="w-full min-w-[1000px]">

                <thead class="sticky top-0 bg-[#24170f] text-gray-300 border-b border-amber-900 z-10">

                    <tr>

                        <th class="text-left px-8 py-5 font-light">
                            Koleksi
                        </th>

                        <th class="text-left px-8 py-5 font-light">
                            Kategori
                        </th>

                        <th class="text-left px-8 py-5 font-light">
                            Pengelola
                        </th>

                        <th class="text-left px-8 py-5 font-light">
                            Tanggal Ditambahkan
                        </th>

                        <th class="text-left px-8 py-5 font-light">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse ($koleksi as $item)

                    <tr class="border-b border-amber-900/30 hover:bg-[#24170f]/80 transition">

                        <!-- KOLEKSI -->
                        <td class="px-8 py-6">

                            <div class="flex items-center gap-5">

                                <div class="w-14 h-14 rounded-2xl overflow-hidden border border-amber-900/30">

                                    <img src="{{ asset('storage/' . $item->gambar) }}"
                                        class="w-full h-full object-cover" alt="{{ $item->nama_koleksi }}">

                                </div>

                                <div>

                                    <h3 class="text-white">
                                        {{ $item->nama_koleksi }}
                                    </h3>

                                    <p class="text-sm text-gray-500">
                                        Koleksi Museum
                                    </p>

                                </div>

                            </div>

                        </td>

                        <!-- KATEGORI -->
                        <td class="px-8 py-6">

                            <span
                                class="px-4 py-2 rounded-full bg-amber-700/10 border border-amber-700/20 text-amber-300 text-sm">

                                {{ $item->kategori->jenis_kategori ?? '-' }}

                            </span>

                        </td>

                        <!-- USER -->
                        <td class="px-8 py-6">

                            <div class="flex items-center gap-3">

                                <div
                                    class="w-10 h-10 rounded-full bg-amber-700 flex items-center justify-center text-sm">

                                    {{ strtoupper(substr($item->user->name ?? 'U',0,1)) }}

                                </div>

                                <span class="text-gray-300">

                                    {{ $item->user->name ?? '-' }}

                                </span>

                            </div>

                        </td>

                        <!-- TANGGAL -->
                        <td class="px-8 py-6 text-gray-400">

                            {{ $item->created_at->format('d M Y') }}

                        </td>

                        <!-- AKSI -->
                        <td class="px-8 py-6">

                            <div class="flex items-center gap-5">

                                <a href="{{ route('detailKoleksiPengelola', $item->id) }}"
                                    class="text-amber-400 hover:text-amber-300 transition">

                                    Detail

                                </a>


                                <form action="{{ route('koleksiHapus', $item->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus koleksi ini? Seluruh detail data dan gambar juga akan dihapus permanen.')">

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

                                    🏺

                                </div>

                                <h3 class="mt-6 text-2xl font-extralight text-amber-400">

                                    Belum Ada Koleksi

                                </h3>

                                <p class="text-gray-500 mt-3">

                                    Tambahkan koleksi pertama museum untuk mulai mengelola data.

                                </p>

                                <a href="{{ route('tambah') }}"
                                    class="mt-8 px-6 py-4 rounded-2xl bg-amber-700 hover:bg-amber-600 transition">

                                    + Tambah Koleksi

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
