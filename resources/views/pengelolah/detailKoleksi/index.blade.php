@extends('layouts.templatpengelolah')

@section('content')
{{-- CONTAINER UNTUK NOTIFIKASI --}}
<div class="p-4 lg:px-10 lg:pt-10 lg:pb-0">

    {{-- 1. NOTIFIKASI BERHASIL --}}
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

    {{-- 2. NOTIFIKASI GAGAL SYSTEM / EXCEPTION --}}
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

    {{-- 3. NOTIFIKASI ERROR VALIDASI (MISAL: GAMBAR > 5MB ATAU FORM KOSONG) --}}
    @if($errors->any())
    <div id="validation-alert"
        class="mb-6 px-6 py-4 bg-red-500/10 border border-red-500/20 text-red-400 rounded-2xl flex items-center justify-between shadow-lg transition-all duration-300">
        <div class="flex items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 text-red-500" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
            <div>
                <span class="font-medium">Periksa Input Anda:</span>
                <ul class="list-disc list-inside text-sm mt-1">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <button type="button" onclick="dismissAlert('validation-alert')"
            class="text-red-400/60 hover:text-red-400 p-1 rounded-lg hover:bg-red-500/10 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
    @endif

</div>

<div class="p-4 lg:p-10">
    <div class="p-4 lg:p-10">

        <div
            class="bg-[#2b1d13]/90 backdrop-blur-md border border-amber-900/40 rounded-[2rem] shadow-2xl overflow-hidden">

            <!-- HEADER -->
            <div class="px-8 py-7 border-b border-amber-900/40">

                <h2 class="text-3xl font-extralight tracking-wide text-amber-400">

                    Detail Koleksi

                </h2>

                <p class="text-gray-400 mt-2">

                    Informasi lengkap mengenai koleksi museum.

                </p>

            </div>

            <!-- CONTENT -->
            <div class="p-8">

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">

                    <!-- KIRI -->
                    <div>

                        <!-- FOTO -->
                        <div class="rounded-[2rem] overflow-hidden border border-amber-900/40 bg-[#1a120b] shadow-xl">

                            <img src="{{ asset('storage/' . $koleksi->gambar) }}" alt="{{ $koleksi->nama_koleksi }}"
                                class="w-full h-[450px] object-cover">

                        </div>

                        <!-- NAMA KOLEKSI -->
                        <div class="mt-6">

                            <h1 class="text-3xl lg:text-4xl font-extralight text-white">

                                {{ $koleksi->nama_koleksi }}

                            </h1>



                        </div>

                    </div>

                    <!-- KANAN -->
                    <div class="space-y-6">

                        <!-- KATEGORI -->
                        <div class="bg-[#1a120b]/80 border border-amber-900/30 rounded-3xl p-6">

                            <h3 class="text-xl text-amber-400 font-light mb-4">
                                Kategori
                            </h3>

                            <span
                                class="inline-block px-5 py-2 rounded-full bg-amber-700/20 border border-amber-700 text-amber-300">

                                {{ $koleksi->kategori->jenis_kategori ?? '-' }}

                            </span>

                        </div>

                        <!-- ASAL DAERAH -->
                        <div class="bg-[#1a120b]/80 border border-amber-900/30 rounded-3xl p-6">

                            <h3 class="text-xl text-amber-400 font-light mb-4">
                                Asal Daerah
                            </h3>

                            <p class="text-gray-300 text-lg leading-relaxed">
                                {{ $koleksi->detail->asal_daerah }}
                            </p>

                        </div>

                        <!-- DESKRIPSI -->
                        <div class="bg-[#1a120b]/80 border border-amber-900/30 rounded-3xl p-6">

                            <h3 class="text-xl text-amber-400 font-light mb-4">
                                Deskripsi
                            </h3>

                            <p class="text-gray-300 text-lg leading-relaxed text-justify">
                                {{ $koleksi->detail->deskripsi }}
                            </p>

                        </div>

                        <!-- SEJARAH -->
                        <div class="bg-[#1a120b]/80 border border-amber-900/30 rounded-3xl p-6">

                            <h3 class="text-xl text-amber-400 font-light mb-4">
                                Sejarah
                            </h3>

                            <p class="text-gray-300 text-lg leading-relaxed text-justify">
                                {{ $koleksi->detail->sejarah }}
                            </p>

                        </div>

                    </div>

                </div>



            </div>

        </div>
        <!-- FORM EDIT -->
        <div class="mt-12 border-t border-amber-900/40 pt-10">

            <h2 class="text-3xl font-extralight text-amber-400 mb-8">
                Edit Informasi Koleksi
            </h2>

            <form action="{{route('koleksiUpdate', $koleksi->id) }}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PATCH')

                <div class="space-y-6">

                    <!-- Nama -->
                    <div>
                        <label class="block text-amber-300 mb-2">
                            Nama Koleksi
                        </label>

                        <input type="text" name="nama_koleksi" value="{{ $koleksi->nama_koleksi }}"
                            class="w-full bg-[#1a120b] border border-amber-900 rounded-2xl px-5 py-4 text-white">
                    </div>

                    <!-- Asal -->
                    <div>
                        <label class="block text-amber-300 mb-2">
                            Asal Daerah
                        </label>

                        <input type="text" name="asal_daerah" value="{{ $koleksi->detail->asal_daerah }}"
                            class="w-full bg-[#1a120b] border border-amber-900 rounded-2xl px-5 py-4 text-white">
                    </div>

                    <!-- Deskripsi -->
                    <div>
                        <label class="block text-amber-300 mb-2">
                            Deskripsi
                        </label>

                        <textarea name="deskripsi" rows="5"
                            class="w-full bg-[#1a120b] border border-amber-900 rounded-2xl px-5 py-4 text-white">{{
                            $koleksi->detail->deskripsi }}</textarea>
                    </div>

                    <!-- Sejarah -->
                    <div>
                        <label class="block text-amber-300 mb-2">
                            Sejarah
                        </label>

                        <textarea name="sejarah" rows="5"
                            class="w-full bg-[#1a120b] border border-amber-900 rounded-2xl px-5 py-4 text-white">{{
                            $koleksi->detail->sejarah }}</textarea>
                    </div>
                    <!-- Gambar Koleksi -->
                    <div>

                        <label class="block text-sm text-amber-300 mb-3">
                            Gambar Koleksi
                        </label>

                        <label
                            class="border-2 border-dashed border-amber-900/40 rounded-[2rem] bg-[#1a120b]/80 p-10 flex flex-col items-center justify-center text-center cursor-pointer hover:border-amber-600 transition">

                            <!-- Preview gambar lama -->
                            <img src="{{ asset('storage/' . $koleksi->gambar) }}" alt="{{ $koleksi->nama_koleksi }}"
                                class="w-40 h-40 object-cover rounded-2xl mb-6 border border-amber-900">

                            <div
                                class="w-20 h-20 rounded-full bg-[#2b1d13] flex items-center justify-center text-4xl text-amber-400">

                                ↑

                            </div>

                            <h3 class="mt-6 text-xl text-white">
                                Ganti Foto Koleksi
                            </h3>

                            <p id="nama-file" class="text-gray-400 mt-2">

                                PNG, JPG maksimal 5MB

                            </p>

                            <input type="file" name="gambar" id="gambar" class="hidden">

                        </label>

                    </div>
                    <div class="flex justify-end">
                        <button type="submit"
                            class="px-8 py-4 rounded-2xl bg-amber-700 hover:bg-amber-600 transition shadow-xl">

                            Simpan Perubahan

                        </button>
                    </div>

                </div>

            </form>

        </div>
    </div>

    @endsection
