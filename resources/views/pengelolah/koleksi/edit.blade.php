@extends('layouts.templatpengelolah')
@section('title')
    <title>{{$title}}</title>
@endsection
@section('content')
    <div class="p-4 lg:p-10">

        <!-- FORM CARD -->
        <div
            class="max-w-6xl mx-auto bg-[#2b1d13]/90 backdrop-blur-md border border-amber-900/40 rounded-[2rem] shadow-2xl overflow-hidden">

            <form action="#" method="POST" enctype="multipart/form-data" class="p-6 lg:p-10">

                @csrf

                <!-- GRID -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

                    <!-- LEFT -->
                    <div class="space-y-6">

                        <!-- Nama -->
                        <div>

                            <label class="block text-sm text-amber-300 mb-3">

                                Nama Koleksi
                            </label>

                            <input type="text" name="nama" placeholder="Masukkan nama koleksi"
                                class="w-full bg-[#1a120b] border border-amber-900/40 rounded-2xl px-5 py-4 text-white placeholder:text-gray-500 focus:border-amber-500 focus:ring-0">

                        </div>

                        <!-- Tahun -->
                        <div>

                            <label class="block text-sm text-amber-300 mb-3">

                                Tahun / Periode
                            </label>

                            <input type="text" name="tahun" placeholder="Contoh : Abad ke-18"
                                class="w-full bg-[#1a120b] border border-amber-900/40 rounded-2xl px-5 py-4 text-white placeholder:text-gray-500 focus:border-amber-500 focus:ring-0">

                        </div>

                        <!-- Kode -->
                        <div>

                            <label class="block text-sm text-amber-300 mb-3">

                                Kode Koleksi
                            </label>

                            <input type="text" name="kode" placeholder="Contoh : KOL-001"
                                class="w-full bg-[#1a120b] border border-amber-900/40 rounded-2xl px-5 py-4 text-white placeholder:text-gray-500 focus:border-amber-500 focus:ring-0">

                        </div>

                    </div>

                    <!-- RIGHT -->
                    <div class="space-y-6">

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

                                <option value="">
                                    Pakaian Adat
                                </option>

                                <option value="">
                                    Senjata Tradisional
                                </option>

                                <option value="">
                                    Kerajinan
                                </option>

                            </select>

                        </div>

                        <!-- Asal -->
                        <div>

                            <label class="block text-sm text-amber-300 mb-3">

                                Asal Daerah
                            </label>

                            <input type="text" name="asal" placeholder="Contoh : Mamasa"
                                class="w-full bg-[#1a120b] border border-amber-900/40 rounded-2xl px-5 py-4 text-white placeholder:text-gray-500 focus:border-amber-500 focus:ring-0">

                        </div>

                        <!-- Kondisi -->
                        <div>

                            <label class="block text-sm text-amber-300 mb-3">

                                Kondisi
                            </label>

                            <select name="kondisi"
                                class="w-full bg-[#1a120b] border border-amber-900/40 rounded-2xl px-5 py-4 text-white focus:border-amber-500 focus:ring-0">

                                <option value="">
                                    Pilih Kondisi...
                                </option>

                                <option value="">
                                    Baik
                                </option>

                                <option value="">
                                    Rusak Ringan
                                </option>

                                <option value="">
                                    Perlu Perawatan
                                </option>

                            </select>

                        </div>

                    </div>

                </div>

                <!-- DESKRIPSI -->
                <div class="mt-8">

                    <label class="block text-sm text-amber-300 mb-3">

                        Deskripsi Koleksi

                    </label>

                    <textarea rows="6" name="deskripsi" placeholder="Masukkan deskripsi lengkap koleksi..."
                        class="w-full bg-[#1a120b] border border-amber-900/40 rounded-2xl px-5 py-4 text-white placeholder:text-gray-500 focus:border-amber-500 focus:ring-0 resize-none"></textarea>

                </div>

                <!-- UPLOAD -->
                <div class="mt-8">

                    <label class="block text-sm text-amber-300 mb-3">

                        Foto Koleksi

                    </label>

                    <label
                        class="border-2 border-dashed border-amber-900/40 rounded-[2rem] bg-[#1a120b]/80 p-10 flex flex-col items-center justify-center text-center cursor-pointer hover:border-amber-600 transition">

                        <div
                            class="w-20 h-20 rounded-full bg-[#2b1d13] flex items-center justify-center text-4xl text-amber-400">

                            ↑

                        </div>

                        <h3 class="mt-6 text-xl text-white">
                            Upload Foto Koleksi
                        </h3>

                        <p class="text-gray-400 mt-2">
                            PNG, JPG maksimal 5MB
                        </p>

                        <input type="file" name="foto" class="hidden">

                    </label>

                </div>

                <!-- BUTTON -->
                <div class="mt-10 flex flex-col sm:flex-row justify-end gap-4">

                    <a href="{{ route('dashboard') }}"
                        class="px-8 py-4 rounded-2xl bg-[#1a120b] border border-amber-900 text-gray-300 hover:bg-[#24170f] transition text-center">

                        Batal

                    </a>

                    <button type="submit"
                        class="px-8 py-4 rounded-2xl bg-gradient-to-r from-amber-700 to-amber-600 hover:opacity-90 transition shadow-2xl">

                        Ubah

                    </button>

                </div>

            </form>

        </div>

    </div>
@endsection
