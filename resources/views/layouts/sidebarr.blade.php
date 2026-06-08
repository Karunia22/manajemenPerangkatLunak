<button id="openSidebarBtn"
    class="lg:hidden fixed top-4 left-4 z-[45] bg-[#1a120b] text-amber-400 p-3 rounded-xl border border-amber-900/40 shadow-lg focus:outline-none hover:text-amber-300 transition-colors">
    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
    </svg>
</button>

<div id="sidebarOverlay"
    class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm z-40 lg:hidden transition-opacity duration-300"></div>

<aside id="sidebarAdmin"
    class="flex w-72 bg-[#1a120b]/95 backdrop-blur-xl border-r border-amber-900/40 flex-col fixed left-0 top-0 h-screen z-50 shadow-[0_0_40px_rgba(0,0,0,0.4)] transition-transform duration-300 ease-in-out -translate-x-full lg:translate-x-0">

    <div
        class="h-24 border-b border-amber-900/30 flex items-center justify-between pr-4 pl-8 bg-gradient-to-r from-[#24170f] to-[#1a120b] relative">

        <div class="flex items-center gap-4">
            <div class="w-14 h-14 rounded-2xl overflow-hidden border border-amber-700/50 shadow-lg">
                <img src="{{ asset('storage/gambar/museum.jpg') }}" class="w-full h-full object-cover" alt="Museum">
            </div>
            <div>
                <h1 class="text-xl tracking-[0.15em] text-amber-400 font-extralight">
                    ADMIN PANEL
                </h1>
            </div>
        </div>

        <button id="closeSidebarBtn"
            class="lg:hidden text-amber-500 hover:text-amber-300 p-1 rounded-lg focus:outline-none transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>

    <div class="flex-1 px-6 py-8 overflow-y-auto">
        <nav class="space-y-3">
            @if (auth()->user()->role == 'pengelola')
                <a href="{{ route('index') }}"
                    class="group flex items-center gap-4 px-5 py-4 rounded-2xl transition-all duration-300
    {{ request()->routeIs('index')
        ? 'bg-gradient-to-r from-amber-700 to-amber-600 text-white shadow-xl border border-amber-500/30'
        : 'text-gray-300 hover:bg-[#2b1d13]/80 hover:text-amber-300' }}">
                    <div
                        class="w-2 h-2 rounded-full transition
        {{ request()->routeIs('index') ? 'bg-white' : 'bg-gray-600 group-hover:bg-amber-400' }}">
                    </div>
                    Dashboard
                </a>

                <a href="{{ route('indexP') }}"
                    class="group flex items-center gap-4 px-5 py-4 rounded-2xl transition-all duration-300
    {{ request()->routeIs('indexP')
        ? 'bg-gradient-to-r from-amber-700 to-amber-600 text-white shadow-xl border border-amber-500/30'
        : 'text-gray-300 hover:bg-[#2b1d13]/80 hover:text-amber-300' }}">
                    <div
                        class="w-2 h-2 rounded-full transition
        {{ request()->routeIs('indexP') ? 'bg-white' : 'bg-gray-600 group-hover:bg-amber-400' }}">
                    </div>
                    Kelola Koleksi
                </a>

                <a href="{{ route('indexK') }}"
                    class="group flex items-center gap-4 px-5 py-4 rounded-2xl transition-all duration-300
    {{ request()->routeIs('indexK')
        ? 'bg-gradient-to-r from-amber-700 to-amber-600 text-white shadow-xl border border-amber-500/30'
        : 'text-gray-300 hover:bg-[#2b1d13]/80 hover:text-amber-300' }}">
                    <div
                        class="w-2 h-2 rounded-full transition
        {{ request()->routeIs('indexK') ? 'bg-white' : 'bg-gray-600 group-hover:bg-amber-400' }}">
                    </div>
                    Kategori
                </a>
            
                <a href="{{ route('video') }}"
                    class="group flex items-center gap-4 px-5 py-4 rounded-2xl transition-all duration-300
{{ request()->routeIs('video')
    ? 'bg-gradient-to-r from-amber-700 to-amber-600 text-white shadow-xl border border-amber-500/30'
    : 'text-gray-300 hover:bg-[#2b1d13]/80 hover:text-amber-300' }}">

                    <div
                        class="w-2 h-2 rounded-full transition
{{ request()->routeIs('video') ? 'bg-white' : 'bg-gray-600 group-hover:bg-amber-400' }}">
                    </div>

                    Video Museum

                </a>
                <a href="{{ route('videoKategori') }}"
                    class="group flex items-center gap-4 px-5 py-4 rounded-2xl transition-all duration-300
{{ request()->routeIs('videoKategori')
    ? 'bg-gradient-to-r from-amber-700 to-amber-600 text-white shadow-xl border border-amber-500/30'
    : 'text-gray-300 hover:bg-[#2b1d13]/80 hover:text-amber-300' }}">

                    <div
                        class="w-2 h-2 rounded-full transition
{{ request()->routeIs('videoKategori') ? 'bg-white' : 'bg-gray-600 group-hover:bg-amber-400' }}">
                    </div>

                    Kategori Video

                </a>
            @endif

            @if (auth()->user()->role == 'admin')
                <a href="{{ route('indexA') }}"
                    class="group flex items-center gap-4 px-5 py-4 rounded-2xl transition-all duration-300
    {{ request()->routeIs('indexA')
        ? 'bg-gradient-to-r from-amber-700 to-amber-600 text-white shadow-xl border border-amber-500/30'
        : 'text-gray-300 hover:bg-[#2b1d13]/80 hover:text-amber-300' }}">
                    <div
                        class="w-2 h-2 rounded-full transition
        {{ request()->routeIs('indexA') ? 'bg-white' : 'bg-gray-600 group-hover:bg-amber-400' }}">
                    </div>
                    Dashboard
                </a>
                <a href="{{ route('akunA') }}"
                    class="group flex items-center gap-4 px-5 py-4 rounded-2xl transition-all duration-300
    {{ request()->routeIs('akunA')
        ? 'bg-gradient-to-r from-amber-700 to-amber-600 text-white shadow-xl border border-amber-500/30'
        : 'text-gray-300 hover:bg-[#2b1d13]/80 hover:text-amber-300' }}">
                    <div
                        class="w-2 h-2 rounded-full transition
        {{ request()->routeIs('akunA') ? 'bg-white' : 'bg-gray-600 group-hover:bg-amber-400' }}">
                    </div>
                    Akun Pengelolah
                </a>
                <a href="{{ route('tambahA') }}"
                    class="group flex items-center gap-4 px-5 py-4 rounded-2xl transition-all duration-300
    {{ request()->routeIs('tambahA')
        ? 'bg-gradient-to-r from-amber-700 to-amber-600 text-white shadow-xl border border-amber-500/30'
        : 'text-gray-300 hover:bg-[#2b1d13]/80 hover:text-amber-300' }}">
                    <div
                        class="w-2 h-2 rounded-full transition
        {{ request()->routeIs('tambahA') ? 'bg-white' : 'bg-gray-600 group-hover:bg-amber-400' }}">
                    </div>
                    Buat Akun Pengelolah
                </a>
            @endif
        </nav>
    </div>
</aside>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const openBtn = document.getElementById('openSidebarBtn');
        const closeBtn = document.getElementById('closeSidebarBtn');
        const sidebar = document.getElementById('sidebarAdmin');
        const overlay = document.getElementById('sidebarOverlay');

        function openSidebar() {
            sidebar.classList.remove('-translate-x-full');
            overlay.classList.remove('hidden');
            openBtn.classList.add('hidden'); // Sembunyikan tombol hamburger saat buka
        }

        function closeSidebar() {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
            openBtn.classList.remove('hidden'); // Munculkan kembali tombol hamburger saat tutup
        }

        openBtn.addEventListener('click', openSidebar);
        closeBtn.addEventListener('click', closeSidebar);
        overlay.addEventListener('click', closeSidebar);
    });
</script>
