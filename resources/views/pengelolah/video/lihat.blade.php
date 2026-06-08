@extends('layouts.templatpengelolah')

@section('title')
    <title>{{ $title }}</title>
@endsection

@section('content')
    <div class="p-4 lg:p-10">

        <div class="max-w-6xl mx-auto">

            <div class="bg-[#2b1d13] border border-amber-900 rounded-[2rem] overflow-hidden shadow-2xl">

                <!-- HEADER -->
                <div class="px-8 py-8 border-b border-amber-900">

                    <h1 class="text-3xl font-light text-amber-400">
                        {{ $video->title }}
                    </h1>

                    <p class="text-gray-400 mt-2">
                        Dokumentasi Budaya Museum Negeri Demmatande Mamasa
                    </p>

                </div>

                <!-- VIDEO -->
                <div class="p-8">

                    @if ($video->provider == 'youtube')
                        @php

                            preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([^&]+)/', $video->video_url, $matches);

                            $youtubeId = $matches[1] ?? '';

                        @endphp

                        <div class="flex justify-center">

                            <div
                                class="w-full max-w-4xl aspect-video rounded-3xl overflow-hidden border border-amber-900 shadow-2xl">

                                <iframe class="w-full h-full" src="https://www.youtube.com/embed/{{ $youtubeId }}"
                                    title="{{ $video->title }}" allowfullscreen>
                                </iframe>

                            </div>

                        </div>
                    @else
                        <div class="rounded-3xl overflow-hidden border border-amber-900 bg-black">

                            <video controls class="w-full">

                                <source src="{{ asset('storage/' . $video->video_url) }}" type="video/mp4">

                                Browser tidak mendukung video.

                            </video>

                        </div>
                    @endif

                </div>

                <!-- INFORMASI -->
                <div class="px-8 pb-8">

                    <div class="grid lg:grid-cols-2 gap-8">

                        <div>

                            <h2 class="text-xl text-amber-400 mb-4">
                                Deskripsi
                            </h2>

                            <div class="bg-[#24170f] border border-amber-900 rounded-2xl p-6 text-gray-300 leading-relaxed">

                                {{ $video->description ?: 'Tidak ada deskripsi.' }}

                            </div>

                        </div>

                        <div>

                            <h2 class="text-xl text-amber-400 mb-4">
                                Informasi Video
                            </h2>

                            <div class="bg-[#24170f] border border-amber-900 rounded-2xl p-6">

                                <div class="space-y-4">

                                    <div>
                                        <p class="text-gray-500 text-sm">
                                            Provider
                                        </p>

                                        <p class="text-white">
                                            {{ strtoupper($video->provider) }}
                                        </p>
                                    </div>

                                    <div>
                                        <p class="text-gray-500 text-sm">
                                            Pengelola
                                        </p>

                                        <p class="text-white">
                                            {{ $video->user->name ?? '-' }}
                                        </p>
                                    </div>

                                    <div>
                                        <p class="text-gray-500 text-sm">
                                            Tanggal Ditambahkan
                                        </p>

                                        <p class="text-white">
                                            {{ $video->created_at->format('d F Y') }}
                                        </p>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="mt-8">

                        <a href="{{ route('video') }}"
                            class="inline-flex items-center px-6 py-4 rounded-2xl bg-amber-700 hover:bg-amber-600 transition">

                            Kembali ke Daftar Video

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
