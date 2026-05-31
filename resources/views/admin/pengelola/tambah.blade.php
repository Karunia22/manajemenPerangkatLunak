@extends('layouts.templatpengelolah')

@section('content')
@if ($errors->any())
<div
    class="mx-6 lg:mx-10 mt-6 lg:mt-10 p-4 bg-red-950/80 border border-red-800/50 rounded-2xl flex items-start gap-3 shadow-lg">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-red-400 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24"
        stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
    </svg>
    <div>
        <h4 class="text-sm font-semibold text-red-200">Gagal Membuat Akun</h4>
        <p class="text-xs text-red-300/90 mt-0.5">Silakan periksa kembali data yang kamu masukkan di bawah ini.
        </p>
    </div>
</div>
@endif
<div class="p-4 lg:p-10">

    <div
        class="max-w-6xl mx-auto bg-[#2b1d13]/90 backdrop-blur-md border border-amber-900/40 rounded-[2rem] shadow-2xl overflow-hidden">



        <form action="{{ route('validasiUser') }}" method="POST" class="p-6 lg:p-10">

            @csrf

            <div class="space-y-6">

                <div>
                    <label class="block text-sm text-amber-300 mb-3">
                        Username
                    </label>
                    <input type="text" name="name" value="{{ old('name', $user->name ?? '') }}"
                        placeholder="Masukkan username"
                        class="w-full bg-[#1a120b] border @error('name') border-red-500/80 focus:border-red-500 @else border-amber-900/40 focus:border-amber-500 @enderror rounded-2xl px-5 py-4 text-white placeholder:text-gray-500 focus:ring-0 transition">

                    @error('name')
                    <p class="mt-2 text-xs text-red-400 flex items-center gap-1.5 px-1">
                        <span class="inline-block w-1 h-1 rounded-full bg-red-400"></span>
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm text-amber-300 mb-3">
                        Email
                    </label>
                    <input type="email" name="email" value="{{ old('email', $user->email ?? '') }}"
                        placeholder="Masukkan email"
                        class="w-full bg-[#1a120b] border @error('email') border-red-500/80 focus:border-red-500 @else border-amber-900/40 focus:border-amber-500 @enderror rounded-2xl px-5 py-4 text-white placeholder:text-gray-500 focus:ring-0 transition">

                    @error('email')
                    <p class="mt-2 text-xs text-red-400 flex items-center gap-1.5 px-1">
                        <span class="inline-block w-1 h-1 rounded-full bg-red-400"></span>
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm text-amber-300 mb-3">
                        Password
                    </label>
                    <div class="relative">
                        <input type="password" name="password" id="password" placeholder="Masukkan password baru"
                            class="w-full bg-[#1a120b] border @error('password') border-red-500/80 focus:border-red-500 @else border-amber-900/40 focus:border-amber-500 @enderror rounded-2xl px-5 py-4 pr-14 text-white placeholder:text-gray-500 focus:ring-0 transition">

                        <button type="button" id="togglePassword"
                            class="absolute right-4 top-1/2 -translate-y-1/2 text-amber-400 hover:text-amber-300">
                            <svg id="eyeOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <svg id="eyeClose" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 hidden" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13.875 18.825A10.05 10.05 0 0112 19c-5 0-9.27-3.11-11-7 1.02-2.29 2.84-4.2 5.11-5.39M9.88 9.88a3 3 0 104.24 4.24" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6.1 6.1A10.94 10.94 0 0112 5c5 0 9.27 3.11 11 7a11.05 11.05 0 01-4.04 4.88" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18" />
                            </svg>
                        </button>
                    </div>

                    @error('password')
                    <p class="mt-2 text-xs text-red-400 flex items-center gap-1.5 px-1">
                        <span class="inline-block w-1 h-1 rounded-full bg-red-400"></span>
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm text-amber-300 mb-3">
                        Konfirmasi Password
                    </label>
                    <div class="relative">
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            placeholder="Ulangi password baru"
                            class="w-full bg-[#1a120b] border border-amber-900/40 rounded-2xl px-5 py-4 pr-14 text-white placeholder:text-gray-500 focus:border-amber-500 focus:ring-0 transition">

                        <button type="button" id="togglePasswordConfirmation"
                            class="absolute right-4 top-1/2 -translate-y-1/2 text-amber-400 hover:text-amber-300">
                            <svg id="eyeOpenConfirm" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <svg id="eyeCloseConfirm" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 hidden"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13.875 18.825A10.05 10.05 0 0112 19c-5 0-9.27-3.11-11-7 1.02-2.29 2.84-4.2 5.11-5.39" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6.1 6.1A10.94 10.94 0 0112 5c5 0 9.27 3.11 11 7a11.05 11.05 0 01-4.04 4.88" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18" />
                            </svg>
                        </button>
                    </div>
                </div>

            </div>

            <div class="mt-10 flex flex-col sm:flex-row justify-end gap-4">
                <button type="submit"
                    class="px-8 py-4 rounded-2xl bg-gradient-to-r from-amber-700 to-amber-600 hover:opacity-90 text-white font-medium transition shadow-2xl">
                    Buat Akun
                </button>
            </div>

        </form>

    </div>

</div>
@endsection
