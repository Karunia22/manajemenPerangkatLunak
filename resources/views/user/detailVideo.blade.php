<x-app-layout>
    <x-slot name="title">
        {{ $title }}
    </x-slot>

    <div class="min-h-screen bg-[#1a120b] text-white py-12">
        <div class="max-w-7xl mx-auto px-6">
            
            <div class="mb-6">
                <a href="{{ route('visitorVideo') }}" class="inline-flex items-center text-amber-400 hover:text-amber-300 transition gap-2 text-sm">
                    ← Kembali ke Galeri Video
                </a>
            </div>

            <div class="grid lg:grid-cols-3 gap-10">
                
                <div class="lg:col-span-2">
                    
                    <div class="bg-black border border-amber-900 rounded-3xl overflow-hidden shadow-2xl aspect-video relative">
                        @if($video->provider === 'youtube')
                            @php
                                // Mengambil ID Youtube secara aman untuk dipasang di iframe embed
                                preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $video->video_url, $match);
                                $youtubeId = $match[1] ?? null;
                            @endphp
                            <iframe class="w-full h-full" 
                                    src="https://www.youtube.com/embed/{{ $youtubeId }}?autoplay=1" 
                                    title="{{ $video->title }}" 
                                    frameborder="0" 
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                    allowfullscreen>
                            </iframe>
                        @else
                            <video src="{{ asset('storage/' . $video->video_url) }}" 
                                   controls 
                                   autoplay
                                   class="w-full h-full object-contain">
                            </video>
                        @endif
                    </div>

                    <div class="mt-8 bg-[#2b1d13] border border-amber-900 rounded-3xl p-8 shadow-xl">
                        <span class="inline-block px-3 py-1 bg-amber-700/20 border border-amber-700 rounded-full text-xs text-amber-300">
                            🎬 {{ $video->category->nama_kategori ?? 'Umum' }}
                        </span>

                        <h1 class="mt-4 text-3xl font-light text-white leading-tight">
                            {{ $video->title }}
                        </h1>

                        <div class="mt-4 flex items-center gap-4 text-xs text-gray-400 border-b border-amber-900/40 pb-4">
                            <span>📅 Diupload: {{ $video->created_at->format('d M Y') }}</span>
                            <span class="capitalize px-2 py-0.5 bg-[#1a120b] border border-amber-900/40 rounded text-amber-400">
                                Media: {{ $video->provider }}
                            </span>
                        </div>

                        <div class="mt-6 text-gray-300 leading-relaxed space-y-4">
                            <h3 class="text-amber-400 font-medium text-lg">Deskripsi Video:</h3>
                            <p class="whitespace-pre-line text-justify text-sm md:text-base">
                                {{ $video->description ?? 'Tidak ada deskripsi tertulis untuk dokumentasi video budaya ini.' }}
                            </p>
                        </div>
                    </div>

                </div>

                <div class="lg:col-span-1">
                    <div class="bg-[#2b1d13] border border-amber-900 rounded-3xl p-6 shadow-xl sticky top-6">
                        <h2 class="text-xl font-light text-amber-400 mb-6 border-b border-amber-900/40 pb-3">
                            Video Budaya Terkait
                        </h2>

                        <div class="space-y-5">
                            @forelse($videoTerkait as $terkait)
                                <a href="{{ route('detailVideo', $terkait->id) }}" class="flex gap-4 group">
                                    <div class="w-28 h-20 bg-black rounded-xl overflow-hidden flex-shrink-0 border border-amber-900/50 relative">
                                        @if($terkait->provider === 'youtube')
                                            @php
                                                preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $terkait->video_url, $match);
                                                $tId = $match[1] ?? null;
                                            @endphp
                                            <img src="https://img.youtube.com/vi/{{ $tId }}/hqdefault.jpg" class="w-full h-full object-cover opacity-80" alt="">
                                        @else
                                            <video src="{{ asset('storage/' . $terkait->video_url) }}" class="w-full h-full object-cover opacity-60"></video>
                                        @endif
                                        <div class="absolute inset-0 flex items-center justify-center bg-black/20 text-white text-xs group-hover:bg-black/40">
                                            ▶
                                        </div>
                                    </div>

                                    <div class="flex flex-col justify-center">
                                        <h4 class="text-sm font-light text-white group-hover:text-amber-400 transition line-clamp-2 leading-snug">
                                            {{ $terkait->title }}
                                        </h4>
                                        <span class="text-[11px] text-gray-500 mt-1">
                                            📅 {{ $terkait->created_at->format('d M Y') }}
                                        </span>
                                    </div>
                                </a>
                            @empty
                                <div class="text-center py-8 border border-dashed border-amber-900/30 rounded-2xl bg-[#1a120b]/40">
                                    <p class="text-gray-500 text-sm">Tidak ada video sejenis lainnya.</p>
                                </div>
                            @endforelse
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>