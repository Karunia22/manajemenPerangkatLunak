<aside
    class="hidden lg:flex w-72 bg-[#1a120b]/95 backdrop-blur-xl border-r border-amber-900/40 flex-col fixed left-0 top-0 h-screen z-50 shadow-[0_0_40px_rgba(0,0,0,0.4)]">

    <!-- LOGO -->
    <div class="h-24 border-b border-amber-900/30 flex items-center px-8 bg-gradient-to-r from-[#24170f] to-[#1a120b]">

        <div class="flex items-center gap-4">

            <div class="w-14 h-14 rounded-2xl overflow-hidden border border-amber-700/50 shadow-lg">

                <img src="{{ asset('storage/gambar/museum.jpg') }}" class="w-full h-full object-cover" alt="Museum">

            </div>

            <div>

                <h1 class="text-xl tracking-[0.15em] text-amber-400 font-extralight">

                    ADMIN PANEL

                </h1>

                <p class="text-xs text-gray-500 mt-1">
                    Museum Demmatande
                </p>

            </div>

        </div>

    </div>

    <!-- MENU -->
    <div class="flex-1 px-6 py-8 overflow-y-auto">

        <nav class="space-y-3">
            @if(auth()->user()->role=='pengelola')
            <a href="{{ route('index') }}" class="group flex items-center gap-4 px-5 py-4 rounded-2xl transition-all duration-300
    {{ request()->routeIs('index')
        ? 'bg-gradient-to-r from-amber-700 to-amber-600 text-white shadow-xl border border-amber-500/30'
        : 'text-gray-300 hover:bg-[#2b1d13]/80 hover:text-amber-300' }}">

                <div class="w-2 h-2 rounded-full transition
        {{ request()->routeIs('index') ? 'bg-white' : 'bg-gray-600 group-hover:bg-amber-400' }}">
                </div>

                Dashboard

            </a>

            <!-- KOLEKSI -->
            <a href="{{ route('indexP') }}" class="group flex items-center gap-4 px-5 py-4 rounded-2xl transition-all duration-300
    {{ request()->routeIs('indexP')
        ? 'bg-gradient-to-r from-amber-700 to-amber-600 text-white shadow-xl border border-amber-500/30'
        : 'text-gray-300 hover:bg-[#2b1d13]/80 hover:text-amber-300' }}">

                <div class="w-2 h-2 rounded-full transition
        {{ request()->routeIs('indexP') ? 'bg-white' : 'bg-gray-600 group-hover:bg-amber-400' }}">
                </div>

                Kelola Koleksi

            </a>

            <!-- KATEGORI -->
            <a href="{{ route('indexK') }}" class="group flex items-center gap-4 px-5 py-4 rounded-2xl transition-all duration-300
    {{ request()->routeIs('indexK')
        ? 'bg-gradient-to-r from-amber-700 to-amber-600 text-white shadow-xl border border-amber-500/30'
        : 'text-gray-300 hover:bg-[#2b1d13]/80 hover:text-amber-300' }}">

                <div class="w-2 h-2 rounded-full transition
        {{ request()->routeIs('indexK') ? 'bg-white' : 'bg-gray-600 group-hover:bg-amber-400' }}">
                </div>

                Kategori

            </a>

            @endif
            <!-- DASHBOARD -->
            @if(auth()->user()->role=='admin')
            <a href="{{ route('indexA') }}" class="group flex items-center gap-4 px-5 py-4 rounded-2xl transition-all duration-300
    {{ request()->routeIs('indexA')
        ? 'bg-gradient-to-r from-amber-700 to-amber-600 text-white shadow-xl border border-amber-500/30'
        : 'text-gray-300 hover:bg-[#2b1d13]/80 hover:text-amber-300' }}">

                <div class="w-2 h-2 rounded-full transition
        {{ request()->routeIs('indexA') ? 'bg-white' : 'bg-gray-600 group-hover:bg-amber-400' }}">
                </div>

                Dashboard

            </a>
            <a href="{{ route('akunA') }}" class="group flex items-center gap-4 px-5 py-4 rounded-2xl transition-all duration-300
    {{ request()->routeIs('akunA')
        ? 'bg-gradient-to-r from-amber-700 to-amber-600 text-white shadow-xl border border-amber-500/30'
        : 'text-gray-300 hover:bg-[#2b1d13]/80 hover:text-amber-300' }}">

                <div class="w-2 h-2 rounded-full transition
        {{ request()->routeIs('akunA') ? 'bg-white' : 'bg-gray-600 group-hover:bg-amber-400' }}">
                </div>

                Akun Pengelolah

            </a>
            <a href="{{ route('tambahA') }}" class="group flex items-center gap-4 px-5 py-4 rounded-2xl transition-all duration-300
    {{ request()->routeIs('tambahA')
        ? 'bg-gradient-to-r from-amber-700 to-amber-600 text-white shadow-xl border border-amber-500/30'
        : 'text-gray-300 hover:bg-[#2b1d13]/80 hover:text-amber-300' }}">

                <div class="w-2 h-2 rounded-full transition
        {{ request()->routeIs('tambahA') ? 'bg-white' : 'bg-gray-600 group-hover:bg-amber-400' }}">
                </div>

                Buat Akun Pengelolah

            </a>

            @endif
        </nav>

    </div>



</aside>
