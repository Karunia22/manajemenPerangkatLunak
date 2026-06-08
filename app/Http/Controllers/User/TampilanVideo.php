<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Video;
use App\Models\VideoKategori;
use Illuminate\Http\Request;

class TampilanVideo extends Controller
{
    //
    public function index(Request $request)
    {
        $title = 'Galeri Video Budaya';
        $categories = VideoKategori::all(); // Memuat data untuk loop filter tombol 🎬

        $query = Video::with('category');

        // 1. Logika Filter Berdasarkan Kategori Tombol Klik
        if ($request->filled('kategori')) {
            $query->where('video_category_id', $request->kategori);
        }

        // 2. Logika Kolom Input Pencarian Text
        if ($request->filled('search')) {
            $query->where('title', 'like', '%'.$request->search.'%');
        }

        $videos = $query->latest()->paginate(9);

        return view('user.video', compact('title', 'categories', 'videos'));
    }

    public function show($id)
    {
        // Ambil data video berdasarkan ID beserta kategori terkaitnya
        // Jika ID tidak ditemukan, otomatis melempar error 404
        $video = Video::with('category')->findOrFail($id);
        
        $title = $video->title . " - Detail Video Budaya";

        // Mengambil video lain dari kategori yang sama sebagai rekomendasi "Video Terkait"
        $videoTerkait = Video::where('video_category_id', $video->video_category_id)
                            ->where('id', '!=', $video->id) // Agar video yang sedang diputar tidak muncul lagi
                            ->latest()
                            ->take(4) // Ambil maksimal 4 video terkait
                            ->get();

        return view('user.detailVideo', compact('title', 'video', 'videoTerkait'));
    }
}
