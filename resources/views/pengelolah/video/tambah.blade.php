@extends('layouts.templatpengelolah')

@section('title')
    <title>{{ $title }}</title>
@endsection

@section('content')
    <div class="p-4 lg:p-10">

        <div class="max-w-4xl mx-auto">

            <div class="bg-[#2b1d13] border border-amber-900 rounded-[2rem] shadow-2xl overflow-hidden">

                <!-- HEADER -->
                <div class="px-8 py-8 border-b border-amber-900">

                    <h1 class="text-3xl font-light text-amber-400">
                        Tambah Video Museum
                    </h1>

                    <p class="text-gray-400 mt-2">
                        Tambahkan dokumentasi budaya, sejarah, atau video edukasi museum.
                    </p>

                </div>

                <!-- FORM -->
                <form action="{{ route('validasiVideo') }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-8">

                    @csrf

                    <!-- JUDUL -->
                    <div>
                        <label class="block text-amber-300 mb-3">
                            Judul Video
                        </label>

                        <input type="text" name="title" value="{{ old('title') }}"
                            class="w-full bg-[#24170f] border border-amber-900 rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-amber-500"
                            placeholder="Masukkan judul video">

                        @error('title')
                            <p class="text-red-400 text-sm mt-2">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div>
                        <label for="video_category_id" class="block mb-3 text-amber-400 text-lg">
                            Kategori Video
                        </label>

                        <select id="video_category_id" name="video_category_id"
                            class="w-full px-5 py-4 rounded-2xl
               bg-[#24170f]
               border border-amber-900
               text-gray-300
               focus:outline-none
               focus:border-amber-500
               focus:ring-2
               focus:ring-amber-700/30
               transition">

                            <option value="" class="bg-[#24170f]">
                                Pilih Kategori Video
                            </option>

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" class="bg-[#24170f] text-gray-300">

                                    {{ $category->nama_kategori }}

                                </option>
                            @endforeach

                        </select>

                        @error('video_category_id')
                            <p class="mt-2 text-sm text-red-400">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <!-- DESKRIPSI -->
                    <div>
                        <label class="block text-amber-300 mb-3">
                            Deskripsi
                        </label>

                        <textarea name="description" rows="5"
                            class="w-full bg-[#24170f] border border-amber-900 rounded-2xl px-5 py-4 text-white resize-none focus:outline-none focus:border-amber-500"
                            placeholder="Masukkan deskripsi video">{{ old('description') }}</textarea>

                        @error('description')
                            <p class="text-red-400 text-sm mt-2">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- LINK VIDEO -->
                    <div>
                        <label class="block text-amber-300 mb-3">
                            Link YouTube / Video Eksternal
                        </label>

                        <input type="url" name="video_url" value="{{ old('video_url') }}"
                            class="w-full bg-[#24170f] border border-amber-900 rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-amber-500"
                            placeholder="https://youtube.com/...">

                        <p class="text-gray-500 text-sm mt-2">
                            Isi jika ingin menggunakan video dari YouTube.
                        </p>

                        @error('video_url')
                            <p class="text-red-400 text-sm mt-2">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- PEMBATAS -->
                    <div class="flex items-center gap-4">
                        <div class="h-px flex-1 bg-amber-900"></div>
                        <span class="text-gray-500 text-sm">ATAU</span>
                        <div class="h-px flex-1 bg-amber-900"></div>
                    </div>

                    <!-- UPLOAD VIDEO -->
                    <div>

                        <label class="block text-amber-300 mb-3">
                            Upload Video
                        </label>

                        <div class="border-2 border-dashed border-amber-800 rounded-2xl p-8">

                            <input type="file" name="video_file" accept="video/*" class="w-full text-gray-300">

                            <p class="text-gray-500 text-sm mt-3">
                                Format yang diperbolehkan:
                                MP4, AVI, MOV, WMV (Maks. 50 MB)
                            </p>

                        </div>

                        @error('video_file')
                            <p class="text-red-400 text-sm mt-2">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                    <!-- BUTTON -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-4">

                        <button type="submit"
                            class="px-8 py-4 bg-amber-700 hover:bg-amber-600 rounded-2xl text-white transition">

                            Simpan Video

                        </button>

                        <a href="{{ route('video') }}"
                            class="px-8 py-4 bg-[#24170f] border border-amber-900 hover:bg-[#302015] rounded-2xl text-center text-gray-300 transition">

                            Kembali

                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>
@endsection
