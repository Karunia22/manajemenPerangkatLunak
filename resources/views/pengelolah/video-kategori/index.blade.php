@extends('layouts.templatpengelolah')

@section('title')
    <title>{{ $title }}</title>
@endsection

@section('content')
    <div class="p-4 lg:p-10">

        <div class="max-w-4xl mx-auto">

            <!-- KOTAK 1: FORM INPUT -->
            <!-- Menambahkan mb-8 untuk memberikan jarak (margin-bottom) ke kotak bawahnya -->
            <div class="bg-[#2b1d13] border border-amber-900 rounded-[2rem] overflow-hidden shadow-2xl mb-8">

                <!-- HEADER FORM -->
                <div class="px-8 py-8 border-b border-amber-900">
                    <h1 class="text-3xl font-light text-amber-400">
                        Tambah Kategori Video
                    </h1>
                    <p class="text-gray-400 mt-2">
                        Tambahkan kategori baru untuk mengelompokkan video budaya museum.
                    </p>
                </div>

                <!-- FORM INPUT -->
                <form action="{{ route('videoKategoriSimpan') }}" method="POST" class="p-8">
                    @csrf

                    <div>
                        <label for="nama_kategori" class="block text-amber-400 mb-3 text-lg">
                            Nama Kategori
                        </label>

                        <input type="text" id="nama_kategori" name="nama_kategori" value="{{ old('nama_kategori') }}"
                            placeholder="Contoh: Upacara Adat"
                            class="w-full px-5 py-4 rounded-2xl bg-[#24170f] border border-amber-900 text-gray-300 focus:outline-none focus:border-amber-500 transition">

                        @error('nama_kategori')
                            <p class="text-red-400 mt-2 text-sm">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="flex gap-4 mt-8">
                        <button type="submit"
                            class="px-6 py-4 rounded-2xl bg-amber-700 hover:bg-amber-600 transition text-white shadow-xl">
                            Simpan Kategori
                        </button>

                        <a href="{{ route('videoKategori') }}"
                            class="px-6 py-4 rounded-2xl border border-amber-900 text-gray-300 hover:bg-[#24170f] transition">
                            Batal
                        </a>
                    </div>
                </form>

            </div>

            <!-- GARIS PEMBATAS ESTETIK (Optional, bisa dihapus jika tidak ingin ada garis) -->
            <hr class="border-amber-900/40 my-8 max-w-xl mx-auto">


            <!-- KOTAK 2: DAFTAR KATEGORI (TABEL) -->
            <div class="bg-[#2b1d13] border border-amber-900 rounded-[2rem] overflow-hidden shadow-2xl p-8">

                <div class="mb-6">
                    <h2 class="text-2xl font-light text-amber-400">
                        Daftar Kategori Video
                    </h2>
                    <p class="text-gray-400 mt-2">
                        Kategori yang digunakan untuk mengelompokkan video budaya museum.
                    </p>
                </div>

                @if($categories->isNotEmpty())
                    <!-- Wrapper untuk Responsive Mobile Scroll -->
                    <div class="overflow-x-auto rounded-2xl border border-amber-900/40">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-[#24170f] border-b border-amber-900 text-amber-400 text-sm tracking-wider uppercase">
                                    <th class="p-5 w-16 text-center">No</th>
                                    <th class="p-5">Nama Kategori</th>
                                    <th class="p-5">Tanggal Dibuat</th>
                                    <th class="p-5 text-center w-48">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-amber-900/30 bg-[#1e130c]/40">
                                @foreach($categories as $index => $category)
                                    <tr class="hover:bg-[#24170f]/50 transition">
                                        <!-- NOMOR -->
                                        <td class="p-5 text-center text-gray-400 text-sm">
                                            {{ $index + 1 }}
                                        </td>
                                        
                                        <!-- NAMA KATEGORI -->
                                        <td class="p-5">
                                            <div class="flex items-center gap-3">
                                                <span class="text-xl">🎬</span>
                                                <span class="font-medium text-white">{{ $category->nama_kategori }}</span>
                                            </div>
                                        </td>
                                        
                                        <!-- TANGGAL -->
                                        <td class="p-5 text-gray-400 text-sm">
                                            {{ $category->created_at->format('d M Y') }}
                                        </td>
                                        
                                        <!-- AKSI -->
                                        <td class="p-5">
                                            <div class="flex items-center justify-center gap-2">
                                                <a href="{{ route('videoKategoriEdit', $category->id) }}"
                                                    class="px-4 py-2 text-sm font-medium rounded-xl bg-amber-700 text-white hover:bg-amber-600 transition">
                                                    Edit
                                                </a>

                                                <form action="{{ route('videoKategoriHapus', $category->id) }}" method="POST"
                                                    onsubmit="return confirm('Yakin ingin menghapus kategori ini?')" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="px-4 py-2 text-sm font-medium rounded-xl bg-red-700 text-white hover:bg-red-600 transition">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <!-- TAMPILAN JIKA KOSONG -->
                    <div class="bg-[#24170f] border border-amber-900/40 rounded-3xl p-16 text-center">
                        <div class="w-24 h-24 mx-auto rounded-full bg-[#2b1d13] flex items-center justify-center text-4xl">
                            🎥
                        </div>
                        <h3 class="mt-6 text-2xl font-light text-amber-400">
                            Belum Ada Kategori
                        </h3>
                        <p class="text-gray-500 mt-3">
                            Tambahkan kategori video pertama untuk museum.
                        </p>
                    </div>
                @endif

            </div>
        </div>

    </div>
@endsection