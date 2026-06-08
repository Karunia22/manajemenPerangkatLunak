@extends('layouts.templatpengelolah')

@section('title')
<title>{{ $title }}</title>
@endsection

@section('content')

<div class="p-4 lg:p-10">

    <div class="max-w-4xl mx-auto">

        <div class="bg-[#2b1d13] border border-amber-900 rounded-[2rem] overflow-hidden shadow-2xl">

            <!-- HEADER -->
            <div class="px-8 py-8 border-b border-amber-900">

                <h1 class="text-3xl font-light text-amber-400">
                    Edit Video Museum
                </h1>

                <p class="text-gray-400 mt-2">
                    Perbarui informasi video dokumentasi museum.
                </p>

            </div>

            <!-- FORM -->
            <form
                action="{{ route('videoUpdate', $video->id) }}"
                method="POST"
                enctype="multipart/form-data"
                class="p-8 space-y-8">

                @csrf
                @method('PATCH')

                <!-- JUDUL -->
                <div>

                    <label for="title" class="block text-amber-300 mb-3">
                        Judul Video
                    </label>

                    <input
                        type="text"
                        id="title"
                        name="title"
                        value="{{ old('title', $video->title) }}"
                        class="w-full bg-[#24170f] border border-amber-900 rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-amber-600">

                    @error('title')
                    <p class="text-red-400 mt-2 text-sm">{{ $message }}</p>
                    @enderror

                </div>

                <!-- DESKRIPSI -->
                <div>

                    <label for="description" class="block text-amber-300 mb-3">
                        Deskripsi
                    </label>

                    <textarea
                        id="description"
                        name="description"
                        rows="6"
                        class="w-full bg-[#24170f] border border-amber-900 rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-amber-600">{{ old('description', $video->description) }}</textarea>

                    @error('description')
                    <p class="text-red-400 mt-2 text-sm">{{ $message }}</p>
                    @enderror

                </div>

                <!-- LINK YOUTUBE -->
                <div>

                    <label for="video_url" class="block text-amber-300 mb-3">
                        Link YouTube / Video Eksternal
                    </label>

                    <input
                        type="url"
                        id="video_url"
                        name="video_url"
                        value="{{ old('video_url', $video->provider != 'upload' ? $video->video_url : '') }}"
                        class="w-full bg-[#24170f] border border-amber-900 rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-amber-600">

                    <p class="text-gray-500 mt-2 text-sm">
                        Kosongkan jika ingin menggunakan video upload.
                    </p>

                </div>

                <!-- VIDEO FILE -->
                <div>

                    <label for="video_file" class="block text-amber-300 mb-3">
                        Upload Video Baru
                    </label>

                    <input
                        type="file"
                        id="video_file"
                        name="video_file"
                        accept="video/*"
                        class="w-full bg-[#24170f] border border-dashed border-amber-700 rounded-2xl px-5 py-4 text-white">

                    <p class="text-gray-500 mt-2 text-sm">
                        Kosongkan jika tidak ingin mengganti video saat ini.
                    </p>

                </div>

                <!-- VIDEO SAAT INI -->
                <div>

                    <h3 class="text-amber-300 mb-4">
                        Video Saat Ini
                    </h3>

                    @if($video->provider == 'youtube')

                        @php
                            preg_match(
                                '/(?:youtube\.com\/watch\?v=|youtu\.be\/)([^&]+)/',
                                $video->video_url,
                                $matches
                            );

                            $youtubeId = $matches[1] ?? '';
                        @endphp

                        <div class="aspect-video rounded-2xl overflow-hidden border border-amber-900">

                            <iframe
                                class="w-full h-full"
                                src="https://www.youtube.com/embed/{{ $youtubeId }}"
                                allowfullscreen>
                            </iframe>

                        </div>

                    @else

                        <video controls class="w-full rounded-2xl border border-amber-900">

                            <source
                                src="{{ asset('storage/' . $video->video_url) }}"
                                type="video/mp4">

                        </video>

                    @endif

                </div>

                <!-- BUTTON -->
                <div class="flex flex-wrap gap-4">

                    <button
                        type="submit"
                        class="px-8 py-4 bg-amber-700 hover:bg-amber-600 rounded-2xl transition">

                        Simpan Perubahan

                    </button>

                    <a
                        href="{{ route('video') }}"
                        class="px-8 py-4 border border-amber-900 rounded-2xl text-gray-300 hover:bg-[#24170f] transition">

                        Batal

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection