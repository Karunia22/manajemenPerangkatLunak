<x-guest-layout>
    <x-slot name="title">
        {{ $title }}
    </x-slot>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-amber-300" />

            <x-text-input id="email"
                class="block mt-2 w-full bg-[#1a120b] border-amber-800 text-white focus:border-amber-500 focus:ring-amber-500 rounded-xl"
                type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-5">
            <x-input-label for="password" :value="__('Password')" class="text-amber-300" />
            <div class="relative mt-2">
                <x-text-input id="password"
                    class="block w-full bg-[#1a120b] border-amber-800 text-white focus:border-amber-500 focus:ring-amber-500 rounded-xl pr-12"
                    type="password" name="password" required autocomplete="current-password" />
                <button type="button" onclick="togglePassword('password')"
                    class="absolute inset-y-0 right-0 flex items-center px-4 text-amber-400 hover:text-amber-200 transition">
                    <svg id="icon-show-password" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <svg id="icon-hide-password" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 hidden"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 3l18 18M10.477 10.477A3 3 0 0013.5 13.5M6.228 6.228A10.01 10.01 0 002.458 12c1.274 4.057 5.065 7 9.542 7 1.894 0 3.661-.525 5.168-1.431M9.878 9.878A3 3 0 0114.12 14.12M17.772 17.772A10.01 10.01 0 0021.542 12c-1.274-4.057-5.065-7-9.542-7a9.956 9.956 0 00-4.186.9" />
                    </svg>
                </button>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="mt-5 flex items-center">

            <input id="remember_me" type="checkbox"
                class="rounded border-amber-700 bg-[#1a120b] text-amber-600 shadow-sm focus:ring-amber-500"
                name="remember">

            <label for="remember_me" class="ms-2 text-sm text-gray-300">
                Ingat saya
            </label>

        </div>

        <!-- Actions -->
        <div class="flex items-center justify-between mt-8">

            <div>

                @if (Route::has('password.request'))
                    <a class="text-sm text-amber-400 hover:text-amber-300 transition"
                        href="{{ route('password.request') }}">
                        Lupa password?
                    </a>
                @endif

            </div>

            <x-primary-button class="bg-amber-700 hover:bg-amber-600 text-white px-6 py-3 rounded-xl shadow-lg">
                {{ __('Masuk') }}
            </x-primary-button>

        </div>

        <!-- Register -->
        <div class="mt-8 text-center">

            <p class="text-gray-400 text-sm">
                Belum memiliki akun?
            </p>

            <a href="{{ route('register') }}" class="text-amber-400 hover:text-amber-300 transition">
                Daftar Sekarang
            </a>

        </div>

    </form>


</x-guest-layout>
