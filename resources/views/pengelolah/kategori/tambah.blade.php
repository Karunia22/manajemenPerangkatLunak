@extends('layouts.templatpengelolah')

@section('content')
@if(session('status'))
<div id="success-alert"
    class="mb-6 px-6 py-4 bg-amber-500/10 border border-amber-500/20 text-amber-400 rounded-2xl flex items-center justify-between shadow-lg transition-all duration-300">

    <div class="flex items-center gap-3">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 text-amber-500" fill="none" viewBox="0 0 24 24"
            stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <div>
            <span class="font-medium">Berhasil!</span> {{ session('status') }}
        </div>
    </div>

    <button type="button" onclick="dismissAlert('success-alert')"
        class="text-amber-400/60 hover:text-amber-400 p-1 rounded-lg hover:bg-amber-500/10 transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>

</div>
@endif
@if($errors->any())
<div id="error-alert"
    class="mb-6 px-6 py-4 bg-red-500/10 border border-red-500/20 text-red-400 rounded-2xl flex items-center justify-between shadow-lg transition-all duration-300">

    <div class="flex items-center gap-3">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 text-red-500" fill="none" viewBox="0 0 24 24"
            stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
        </svg>
        <div>
            <span class="font-medium">Gagal!</span>
            @foreach ($errors->all() as $error)
            {{ $error }}
            @endforeach
        </div>
    </div>

    <button type="button" onclick="dismissAlert('error-alert')"
        class="text-red-400/60 hover:text-red-400 p-1 rounded-lg hover:bg-red-500/10 transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
</div>
@endif
<div class="bg-[#2b1d13] border border-amber-900 rounded-[2rem] shadow-2xl overflow-hidden">

    <!-- HEADER -->
    <div class="px-8 py-7 border-b border-amber-900">

        <h2 class="text-3xl font-extralight tracking-wide text-amber-400">
            Tambah Kategori
        </h2>

        <p class="text-gray-400 mt-2">
            Tambahkan kategori baru untuk koleksi museum
        </p>

    </div>

    <!-- FORM -->
    <form action="{{route('validasiKategori')}}" method="POST" class="p-8">

        @csrf

        <div class="grid grid-cols-1 lg:grid-cols-1 gap-8">

            <!-- NAMA KATEGORI -->
            <div>
                <label class="block text-sm text-gray-300 mb-3">
                    Nama Kategori
                    <span class="text-red-400">*</span>
                </label>


                <input type="text" name="jenis_kategori" placeholder="Contoh: Pakaian Adat"
                    class="w-full bg-[#1a120b] border border-amber-900 rounded-2xl px-5 py-4 text-white placeholder:text-gray-500 focus:outline-none focus:ring-2 focus:ring-amber-700 transition">

            </div>


        </div>

        <!-- BUTTON -->
        <div class="mt-10 flex justify-end gap-4">

            <button type="submit"
                class="px-8 py-4 rounded-2xl bg-amber-700 hover:bg-amber-600 text-white shadow-xl transition">

                Simpan Kategori

            </button>

        </div>

    </form>

    <!-- TABLE KATEGORI -->
    <div class="border-t border-amber-900">

        <!-- HEADER -->
        <div class="px-8 py-7">

            <h2 class="text-2xl font-extralight tracking-wide text-amber-400">
                Daftar Kategori
            </h2>

            <p class="text-gray-400 mt-2">
                Data kategori koleksi museum yang telah ditambahkan
            </p>

        </div>

        <!-- TABLE -->
        <div class="overflow-x-auto">


            <table class="w-full table-fixed">

                <thead class="bg-[#1a120b] border-y border-amber-900">

                    <tr>

                        <th class="w-1/3 text-left px-8 py-5 font-light text-gray-300">
                            Nama Kategori
                        </th>



                        <th class="w-1/3 text-center px-8 py-5 font-light text-gray-300">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody>



                    @forelse ($kategori as $item)

                    <tr class="border-b border-amber-900/50 hover:bg-[#24170f] transition">

                        <!-- NAMA -->
                        <td class="px-8 py-6">

                            <div class="flex items-center gap-4">

                                <div>

                                    <h3 class="text-white">
                                        {{ $item->jenis_kategori }}
                                    </h3>

                                    <p class="text-sm text-gray-400">
                                        Kategori koleksi
                                    </p>

                                </div>

                            </div>

                        </td>



                        <!-- AKSI -->
                        <td class="px-8 py-6">

                            <div class="flex items-center justify-center gap-4">

                                <!-- EDIT -->
                                <a href="{{ route('kategori.edit', $item->id) }}"
                                    class="px-4 py-2 rounded-xl bg-blue-500/10 border border-blue-500/20 text-blue-300 hover:bg-blue-500/20 transition">

                                    Edit

                                </a>

                                <!-- HAPUS -->
                                <form action="{{ route('kategori.hapus', $item->id) }}" method="POST"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-4 py-2 rounded-xl bg-red-500/10 border border-red-500/20 text-red-300 hover:bg-red-500/20 transition">
                                        Hapus
                                    </button>
                                </form>

                            </div>

                        </td>

                    </tr>

                    @empty

                    <!-- DATA KOSONG -->
                    <tr>

                        <td colspan="3" class="px-8 py-16 text-center">

                            <div class="flex flex-col items-center justify-center">

                                <div
                                    class="w-24 h-24 rounded-full bg-amber-700/10 border border-amber-700/20 flex items-center justify-center text-4xl text-amber-400">

                                    📂

                                </div>

                                <h3 class="mt-6 text-2xl font-light text-amber-400">

                                    Belum Ada Kategori

                                </h3>

                                <p class="text-gray-400 mt-3 max-w-md">

                                    Data kategori museum masih kosong.
                                    Tambahkan kategori baru untuk mulai mengelola koleksi museum.

                                </p>

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
