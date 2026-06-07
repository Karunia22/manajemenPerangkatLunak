<x-app-layout>
    <x-slot name="title">
        {{ $title }}
    </x-slot>

    <div class="min-h-screen bg-[#1a120b] text-white pt-20">

        <section class="relative overflow-hidden border-b border-amber-900/50">
            <div class="absolute inset-0 bg-gradient-to-r from-[#1a120b] via-[#2b1d13]/50 to-[#1a120b]/70 z-0"></div>

            <div class="relative z-10 max-w-7xl mx-auto px-6 py-16">
                <span
                    class="inline-block px-4 py-2 bg-amber-700/20 border border-amber-700 rounded-full text-xs text-amber-300 tracking-wide">
                    Pengaturan Akun
                </span>
                <h1 class="mt-4 text-4xl font-extralight tracking-wide text-amber-400">
                    Profil Pengguna
                </h1>
                <p class="text-gray-400 mt-2 text-sm">
                    Kelola informasi identitas, keamanan kata sandi, dan privasi akun Anda.
                </p>
            </div>
        </section>

        <div
            class="py-16 bg-[#24170f]/30
                    [&_h2]:text-amber-400 [&_h2]:font-light [&_h2]:text-xl
                    [&_p]:text-gray-400 [&_p]:text-sm
                    [&_input]:bg-[#1a120b] [&_input]:border-amber-900 [&_input]:text-white [&_input]:rounded-xl [&_input]:mt-1 [&_input]:w-full
                    [&_input:focus]:border-amber-600 [&_input:focus]:ring-amber-600
                    [&_label]:text-gray-300 [&_label]:text-sm
                    [&_button[type=submit]]:bg-amber-700 [&_button[type=submit]]:hover:bg-amber-600 [&_button[type=submit]]:text-white [&_button[type=submit]]:rounded-xl [&_button[type=submit]]:px-6 [&_button[type=submit]]:py-3 [&_button[type=submit]]:transition">

            <div class="max-w-7xl mx-auto px-6 space-y-10">

                <div
                    class="p-8 bg-[#2b1d13] border border-amber-900 rounded-xl shadow-2xl transition hover:border-amber-800 duration-300">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <div
                    class="p-8 bg-[#2b1d13] border border-amber-900 rounded-xl shadow-2xl transition hover:border-amber-800 duration-300">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>


            </div>
        </div>

    </div>

</x-app-layout>
