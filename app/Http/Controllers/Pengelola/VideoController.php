<?php

namespace App\Http\Controllers\Pengelola;

use App\Http\Controllers\Controller;
use App\Models\Video;
use App\Models\VideoKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    //
    public function index()
    {
        $videos = Video::with('user')->latest()->get();

        return view('pengelolah.video.index', [
            'title' => 'Manajemen Video',
            'videos' => $videos,
        ]);
    }

    public function tambah()
    {
        $title = 'Tambah Video';

        $categories = VideoKategori::all();

        return view(
            'pengelolah.video.tambah',
            compact('title', 'categories')
        );
    }

    public function validasi(Request $request)
    {
    // 1. Jalankan Validasi Terlebih Dahulu (Termasuk video_category_id)
    $request->validate([
        'video_category_id' => 'required|exists:video_categories,id', // Pastikan nama tabel kategori sesuai (misal: video_categories)
        'title'             => 'required|string|max:255',
        'description'       => 'nullable|string',
        'video_url'         => 'nullable|url|required_without:video_file',
        'video_file'        => 'nullable|file|mimes:mp4,mov,avi,wmv|max:51200|required_without:video_url',
    ], [
        'video_category_id.required'   => 'Kategori video wajib dipilih.',
        'video_category_id.exists'     => 'Kategori yang dipilih tidak valid.',
        'video_url.required_without'   => 'Masukkan link YouTube atau upload video.',
        'video_file.required_without'  => 'Upload video atau masukkan link YouTube.',
    ]);

    DB::beginTransaction();

    try {
        $provider = 'external';
        $videoUrl = null;
        $path     = null; // Inisialisasi variabel path untuk melacak file terupload

        // 2. Proses upload file HANYA dilakukan di sini (tidak double)
        if ($request->hasFile('video_file')) {
            $path = $request->file('video_file')->store('videos', 'public');
            $videoUrl = $path;
            $provider = 'upload';
        } else {
            $videoUrl = $request->video_url;

            if (str_contains($videoUrl, 'youtube.com') || str_contains($videoUrl, 'youtu.be')) {
                $provider = 'youtube';
            }
        }

        // 3. Simpan ke Database (Sudah ditambahkan video_category_id)
        Video::create([
            'user_id'           => auth()->id(),
            'video_category_id' => $request->video_category_id, // <-- Field baru ditangkap di sini
            'title'             => $request->title,
            'description'       => $request->description,
            'video_url'         => $videoUrl,
            'provider'          => $provider,
        ]);

        DB::commit();

        return redirect()
            ->route('video')
            ->with('success', 'Video berhasil ditambahkan.');

    } catch (\Exception $e) {
        DB::rollBack();

        // Hapus file yang terupload jika query database gagal
        if ($path && \Storage::disk('public')->exists($path)) {
            \Storage::disk('public')->delete($path);
        }

        return back()
            ->withInput()
            ->with('error', 'Gagal menyimpan video: ' . $e->getMessage());
    }
}

    public function show($id)
    {

        $video = Video::with('user')->findOrFail($id);

        return view('pengelolah.video.lihat', [
            'title' => $video->title,
            'video' => $video,
        ]);
    }

    public function edit($id)
    {
        $video = Video::findOrFail($id);

        return view('pengelolah.video.edit', [
            'title' => 'Edit Video Museum',
            'video' => $video,
        ]);
    }

    public function update(Request $request, $id)
    {
        $video = Video::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',

            'video_url' => 'nullable|url',

            'video_file' => 'nullable|file|mimes:mp4,mov,avi,wmv|max:51200',
        ]);

        DB::beginTransaction();

        try {

            $videoUrl = $video->video_url;
            $provider = $video->provider;

            /*
            |--------------------------------------------------------------------------
            | Jika upload video baru
            |--------------------------------------------------------------------------
            */
            if ($request->hasFile('video_file')) {

                // hapus video lama jika video upload
                if (
                    $video->provider == 'upload' &&
                    Storage::disk('public')->exists($video->video_url)
                ) {
                    Storage::disk('public')->delete($video->video_url);
                }

                $path = $request
                    ->file('video_file')
                    ->store('videos', 'public');

                $videoUrl = $path;
                $provider = 'upload';
            }

            /*
            |--------------------------------------------------------------------------
            | Jika mengganti link YouTube
            |--------------------------------------------------------------------------
            */
            elseif (! empty($request->video_url)) {

                // hapus video lama jika sebelumnya upload
                if (
                    $video->provider == 'upload' &&
                    Storage::disk('public')->exists($video->video_url)
                ) {
                    Storage::disk('public')->delete($video->video_url);
                }

                $videoUrl = $request->video_url;

                if (
                    str_contains($videoUrl, 'youtube.com') ||
                    str_contains($videoUrl, 'youtu.be')
                ) {
                    $provider = 'youtube';
                } else {
                    $provider = 'external';
                }
            }

            $video->update([
                'title' => $request->title,
                'description' => $request->description,
                'video_url' => $videoUrl,
                'provider' => $provider,
            ]);

            DB::commit();

            return redirect()
                ->route('video')
                ->with('success', 'Video berhasil diperbarui.');

        } catch (\Throwable $e) {

            DB::rollBack();

            return back()
                ->withInput()
                ->with('error', 'Gagal memperbarui video: '.$e->getMessage());
        }
    }

    public function destroy($id)
    {
        $video = Video::findOrFail($id);

        DB::beginTransaction();

        try {

            if (
                $video->provider == 'upload' &&
                Storage::disk('public')->exists($video->video_url)
            ) {
                Storage::disk('public')->delete($video->video_url);
            }

            $video->delete();

            DB::commit();

            return back()->with(
                'success',
                'Video berhasil dihapus.'
            );

        } catch (\Throwable $e) {

            DB::rollBack();

            return back()->with(
                'error',
                'Gagal menghapus video.'
            );
        }
    }
}
