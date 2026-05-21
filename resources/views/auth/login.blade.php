<x-guest-layout>


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

            <x-text-input id="password"
                class="block mt-2 w-full bg-[#1a120b] border-amber-800 text-white focus:border-amber-500 focus:ring-amber-500 rounded-xl"
                type="password" name="password" required autocomplete="current-password" />

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
