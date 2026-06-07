@extends('layouts.templatpengelolah')
@section('title')
    <title>{{$title}}</title>
@endsection
@section('content')
<div class="bg-[#2b1d13] border border-amber-900 rounded-[2rem] shadow-2xl overflow-hidden">

    <div class="px-8 py-7 border-b border-amber-900">
        <h2 class="text-3xl font-extralight tracking-wide text-amber-400">
            Edit Kategori
        </h2>
    </div>

    <form action="{{ route('kategori.update', $kategori->id) }}" method="POST" class="p-8">

        @csrf
        @method('PATCH')

        <div class="grid grid-cols-1 gap-8">

            <div>
                <label class="block text-sm text-gray-300 mb-3">
                    Nama Jenis Kategori Baru
                    <span class="text-red-400">*</span>
                </label>

                <input type="text" name="jenis_kategori" value="{{ old('jenis_kategori', $kategori->jenis_kategori) }}"
                    placeholder="Contoh: Pakaian Adat"
                    class="w-full bg-[#1a120b] border border-amber-900 rounded-2xl px-5 py-4 text-white placeholder:text-gray-500 focus:outline-none focus:ring-2 focus:ring-amber-700 transition @error('jenis_kategori') border-red-500 @enderror">

                @error('jenis_kategori')
                <span class="text-red-400 text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>

        </div>

        <div class="mt-10 flex justify-end gap-4">
            <a href="{{ route('kategori.index') }}"
                class="px-6 py-4 rounded-2xl bg-[#1a120b] border border-amber-900 text-gray-300 hover:bg-[#24170f] transition">
                Batal
            </a>

            <button type="submit"
                class="px-8 py-4 rounded-2xl bg-amber-700 hover:bg-amber-600 text-white shadow-xl transition">
                Simpan Perubahan
            </button>
        </div>

    </form>
</div>
@endsection
