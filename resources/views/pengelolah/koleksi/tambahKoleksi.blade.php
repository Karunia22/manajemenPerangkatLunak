@extends('layouts.templatpengelolah')

@section('content')
<div class="p-4 lg:p-10">

    <!-- FORM CARD -->
    <div
        class="max-w-6xl mx-auto bg-[#2b1d13]/90 backdrop-blur-md border border-amber-900/40 rounded-[2rem] shadow-2xl overflow-hidden">


        <form action="{{route('validasiKoleksi')}}" method="POST" enctype="multipart/form-data" class="p-6 lg:p-10">
            @csrf

            <!-- GRID INPUT -->
            <!-- GRID INPUT -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

                <!-- KOLOM KIRI -->
                <div class="space-y-6">

                    <!-- Nama Koleksi -->
                    <div>
                        <label class="block text-sm text-amber-300 mb-3">
                            Nama Koleksi
                        </label>

                        <input type="text" name="nama_koleksi" placeholder="Masukkan nama koleksi"
                            class="w-full bg-[#1a120b] border border-amber-900/40 rounded-2xl px-5 py-4 text-white placeholder:text-gray-500 focus:border-amber-500 focus:ring-0">
                    </div>

                    <!-- Kategori -->
                    <div>
                        <label class="block text-sm text-amber-300 mb-3">
                            Nama Kategori
                        </label>

                        <select name="kategori"
                            class="w-full bg-[#1a120b] border border-amber-900/40 rounded-2xl px-5 py-4 text-white focus:border-amber-500 focus:ring-0">

                            <option value="">
                                Pilih Kategori...
                            </option>

                            @foreach ($kategori as $indeks)
                            <option value="{{ $indeks->id }}">
                                {{ $indeks->jenis_kategori }}
                            </option>
                            @endforeach

                        </select>
                    </div>

                </div>

                <!-- KOLOM KANAN -->
                <div>

                    <label class="block text-sm text-amber-300 mb-3">
                        Asal Daerah
                    </label>

                    <input type="text" name="asal_daerah" placeholder="Contoh: Mamasa, Sulawesi Barat"
                        class="w-full bg-[#1a120b] border border-amber-900/40 rounded-2xl px-5 py-4 text-white placeholder:text-gray-500 focus:border-amber-500 focus:ring-0">

                </div>

            </div>

            <!-- DESKRIPSI -->
            <div class="mt-8">

                <label class="block text-sm text-amber-300 mb-3">
                    Deskripsi Koleksi
                </label>

                <textarea name="deskripsi" rows="5" placeholder="Tuliskan deskripsi singkat mengenai koleksi ini..."
                    class="w-full bg-[#1a120b] border border-amber-900/40 rounded-2xl px-5 py-4 text-white placeholder:text-gray-500 focus:border-amber-500 focus:ring-0 resize-none"></textarea>

            </div>

            <!-- SEJARAH -->
            <div class="mt-8">

                <label class="block text-sm text-amber-300 mb-3">
                    Sejarah Koleksi
                </label>

                <textarea name="sejarah" rows="8"
                    placeholder="Tuliskan sejarah, asal-usul, atau nilai budaya dari koleksi ini..."
                    class="w-full bg-[#1a120b] border border-amber-900/40 rounded-2xl px-5 py-4 text-white placeholder:text-gray-500 focus:border-amber-500 focus:ring-0 resize-none"></textarea>

            </div>


            <!-- UPLOAD CENTER -->

            <div class="mt-10 flex justify-center">

                <div class="w-full max-w-2xl">

                    <label class="block text-sm text-amber-300 mb-3">
                        Foto Koleksi
                    </label>

                    <label
                        class="border-2 border-dashed border-amber-900/40 rounded-[2rem] bg-[#1a120b]/80 p-10 flex flex-col items-center justify-center text-center cursor-pointer hover:border-amber-600 transition">


                        <div
                            class="w-20 h-20 rounded-full bg-[#2b1d13] flex items-center justify-center text-4xl text-amber-400">
                            ↑
                        </div>

                        <h3 id="uploadText" class="mt-6 text-xl text-white">
                            Upload Foto Koleksi
                        </h3>

                        <p id="fileName" class="text-gray-400 mt-2">
                            PNG, JPG maksimal 5MB
                        </p>

                        <input type="file" name="gambar" id="gambar" class="hidden" accept="image/*">

                    </label>

                </div>

            </div>


            <!-- BUTTON -->
            <div class="mt-10 flex flex-col sm:flex-row justify-end gap-4">

                <a href="{{ route('dashboard') }}"
                    class="px-8 py-4 rounded-2xl bg-[#1a120b] border border-amber-900 text-gray-300 hover:bg-[#24170f] transition text-center">

                    Batal

                </a>

                <button type="submit"
                    class="px-8 py-4 rounded-2xl bg-gradient-to-r from-amber-700 to-amber-600 hover:opacity-90 transition shadow-2xl">

                    Simpan Koleksi

                </button>

            </div>

        </form>



    </div>

</div>
@endsection
