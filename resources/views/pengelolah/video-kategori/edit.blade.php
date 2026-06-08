@extends('layouts.templatpengelolah')

@section('title')
    <title>Edit Kategori Video - {{ $title }}</title>
@endsection

@section('content')
    <div class="p-4 lg:p-10">

        <div class="max-w-4xl mx-auto">

            <div class="bg-[#2b1d13] border border-amber-900 rounded-[2rem] overflow-hidden shadow-2xl">

                <div class="px-8 py-8 border-b border-amber-900">
                    <div class="flex items-center gap-3">
                        <span class="text-2xl">📝</span>
                        <h1 class="text-3xl font-light text-amber-400">
                            Edit Kategori Video
                        </h1>
                    </div>
                    <p class="text-gray-400 mt-2">
                        Ubah nama kategori video budaya museum yang sudah ada.
                    </p>
                </div>

                <form action="{{ route('videoKategoriUpdate', $category->id) }}" method="POST" class="p-8">
                    @csrf
                    @method('PATCH') <div>
                        <label for="nama_kategori" class="block text-amber-400 mb-3 text-lg">
                            Nama Kategori
                        </label>

                        <input type="text" id="nama_kategori" name="nama_kategori" 
                            value="{{ old('nama_kategori', $category->nama_kategori) }}"
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
                            class="px-6 py-4 rounded-2xl bg-amber-700 hover:bg-amber-600 transition text-white shadow-xl font-medium">
                            Perbarui Kategori
                        </button>

                        <a href="{{ route('videoKategori') }}"
                            class="px-6 py-4 rounded-2xl border border-amber-900 text-gray-300 hover:bg-[#24170f] transition text-center">
                            Batal
                        </a>
                    </div>
                </form>

            </div>

        </div>

    </div>
@endsection