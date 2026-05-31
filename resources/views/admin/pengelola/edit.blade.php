@extends('layouts.templatpengelolah')

@section('content')
<div class="p-4 lg:p-10">

    <!-- FORM CARD -->
    <div
        class="max-w-6xl mx-auto bg-[#2b1d13]/90 backdrop-blur-md border border-amber-900/40 rounded-[2rem] shadow-2xl overflow-hidden">

        <form action="{{ route('akun.update', $user->id) }}" method="POST" class="p-6 lg:p-10">

            @csrf
            @method('PATCH')

            <div class="space-y-6">

                <!-- Username -->
                <div>

                    <label class="block text-sm text-amber-300 mb-3">
                        Username
                    </label>

                    <input type="text" name="name" value="{{ $user->name ?? '' }}" placeholder="Masukkan username"
                        class="w-full bg-[#1a120b] border border-amber-900/40 rounded-2xl px-5 py-4 text-white placeholder:text-gray-500 focus:border-amber-500 focus:ring-0">

                </div>

                <!-- Email -->
                <div>

                    <label class="block text-sm text-amber-300 mb-3">
                        Email
                    </label>

                    <input type="email" name="email" value="{{ $user->email ?? '' }}" placeholder="Masukkan email"
                        class="w-full bg-[#1a120b] border border-amber-900/40 rounded-2xl px-5 py-4 text-white placeholder:text-gray-500 focus:border-amber-500 focus:ring-0">

                </div>

                <!-- Password -->
                <!-- Password -->
                <div>
                    <label class="block text-sm text-amber-300 mb-3">
                        Password
                    </label>

                    <div class="relative">

                        <input type="password" name="password" id="password" placeholder="Masukkan password baru"
                            class="w-full bg-[#1a120b] border border-amber-900/40 rounded-2xl px-5 py-4 pr-14 text-white placeholder:text-gray-500 focus:border-amber-500 focus:ring-0">

                        <button type="button" id="togglePassword"
                            class="absolute right-4 top-1/2 -translate-y-1/2 text-amber-400 hover:text-amber-300">

                            <!-- Eye Icon -->
                            <svg id="eyeOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />

                            </svg>

                            <!-- Eye Slash Icon -->
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
                </div>

                <!-- Konfirmasi Password -->
                <div>
                    <label class="block text-sm text-amber-300 mb-3">
                        Konfirmasi Password
                    </label>

                    <div class="relative">

                        <input type="password" name="password_confirmation" id="password_confirmation"
                            placeholder="Ulangi password baru"
                            class="w-full bg-[#1a120b] border border-amber-900/40 rounded-2xl px-5 py-4 pr-14 text-white placeholder:text-gray-500 focus:border-amber-500 focus:ring-0">

                        <button type="button" id="togglePasswordConfirmation"
                            class="absolute right-4 top-1/2 -translate-y-1/2 text-amber-400 hover:text-amber-300">

                            <!-- Mata Terbuka -->
                            <svg id="eyeOpenConfirm" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />

                            </svg>

                            <!-- Mata Tertutup -->
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

            <!-- BUTTON -->
            <div class="mt-10 flex flex-col sm:flex-row justify-end gap-4">

                <a href="{{ route('akunA') }}"
                    class="px-8 py-4 rounded-2xl bg-[#1a120b] border border-amber-900 text-gray-300 hover:bg-[#24170f] transition text-center">

                    Batal

                </a>

                <button type="submit"
                    class="px-8 py-4 rounded-2xl bg-gradient-to-r from-amber-700 to-amber-600 hover:opacity-90 transition shadow-2xl">

                    Simpan Perubahan

                </button>

            </div>

        </form>

    </div>

</div>
@endsection
