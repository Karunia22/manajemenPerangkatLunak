@extends('layouts.templatpengelolah')

@section('content')
<div class="p-4 lg:p-10">

    <!-- FORM CARD -->
    <div
        class="max-w-6xl mx-auto bg-[#2b1d13]/90 backdrop-blur-md border border-amber-900/40 rounded-[2rem] shadow-2xl overflow-hidden">

        <form action="{{ route('validasiUser') }}" method="POST" class="p-6 lg:p-10">

            @csrf

            <!-- GRID -->
            <div>

                <label class="block text-sm text-amber-300 mb-3">

                    Nama
                </label>

                <input type="text" name="name" placeholder="Masukkan nama koleksi"
                    class="w-full bg-[#1a120b] border border-amber-900/40 rounded-2xl px-5 py-4 text-white placeholder:text-gray-500 focus:border-amber-500 focus:ring-0">

            </div>
            <div>

                <label class="block text-sm text-amber-300 mb-3">
                    E-mail
                </label>

                <input type="email" name="email" placeholder="Masukkan email"
                    class="w-full bg-[#1a120b] border border-amber-900/40 rounded-2xl px-5 py-4 text-white placeholder:text-gray-500 focus:border-amber-500 focus:ring-0">

            </div>
            <div>

                <label class="block text-sm text-amber-300 mb-3">
                    Password
                </label>

                <input type="password" name="password" placeholder="Masukkan password"
                    class="w-full bg-[#1a120b] border border-amber-900/40 rounded-2xl px-5 py-4 text-white placeholder:text-gray-500 focus:border-amber-500 focus:ring-0">

            </div>
            <!-- BUTTON -->
            <div class="mt-10 flex flex-col sm:flex-row justify-end gap-4">

                <button type="submit"
                    class="px-8 py-4 rounded-2xl bg-gradient-to-r from-amber-700 to-amber-600 hover:opacity-90 transition shadow-2xl">

                    Buat Akun

                </button>

            </div>

        </form>

    </div>

</div>
@endsection
