<x-guest-layout>


            <!-- Logo / Title -->
            <div class="text-center mb-8">

                <p class="text-gray-400 mt-3 text-sm">
                    Registrasi akun untuk menjelajahi
                    kekayaan budaya Mamasa
                </p>

            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Nama Lengkap')"
                        class="text-amber-300" />

                    <x-text-input id="name"
                        class="block mt-2 w-full bg-[#1a120b] border-amber-800 text-white focus:border-amber-500 focus:ring-amber-500 rounded-xl"
                        type="text"
                        name="name"
                        :value="old('name')"
                        required
                        autofocus
                        autocomplete="name" />

                    <x-input-error :messages="$errors->get('name')"
                        class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-5">
                    <x-input-label for="email"
                        :value="__('Email')"
                        class="text-amber-300" />

                    <x-text-input id="email"
                        class="block mt-2 w-full bg-[#1a120b] border-amber-800 text-white focus:border-amber-500 focus:ring-amber-500 rounded-xl"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        autocomplete="username" />

                    <x-input-error :messages="$errors->get('email')"
                        class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-5">
                    <x-input-label for="password"
                        :value="__('Password')"
                        class="text-amber-300" />

                    <x-text-input id="password"
                        class="block mt-2 w-full bg-[#1a120b] border-amber-800 text-white focus:border-amber-500 focus:ring-amber-500 rounded-xl"
                        type="password"
                        name="password"
                        required
                        autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')"
                        class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-5">
                    <x-input-label for="password_confirmation"
                        :value="__('Konfirmasi Password')"
                        class="text-amber-300" />

                    <x-text-input id="password_confirmation"
                        class="block mt-2 w-full bg-[#1a120b] border-amber-800 text-white focus:border-amber-500 focus:ring-amber-500 rounded-xl"
                        type="password"
                        name="password_confirmation"
                        required
                        autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')"
                        class="mt-2" />
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-between mt-8">

                    <a class="text-sm text-amber-400 hover:text-amber-300 transition"
                        href="{{ route('login') }}">
                        Sudah punya akun?
                    </a>

                    <x-primary-button
                        class="bg-amber-700 hover:bg-amber-600 text-white px-6 py-3 rounded-xl shadow-lg">
                        {{ __('Daftar') }}
                    </x-primary-button>

                </div>
            </form>


</x-guest-layout>
