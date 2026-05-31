<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Koleksi;
use Illuminate\Http\Request;

class TampilanController extends Controller
{
    //
    public function index()
    {
        // `` dd(auth()->user()->role);
        $koleksi = Koleksi::with(['kategori', 'detail'])->inRandomOrder()->limit(4)->get();
        $totalKoleksi = Koleksi::all()->count();
        $totalKategori = Kategori::all()->count();

        return view('dashboard', compact(['koleksi', 'totalKoleksi', 'totalKategori']));
    }

    public function koleksi(Request $request)
    {
        // Ambil data koleksi dengan memuat relasi dan menerapkan filter pencarian & kategori
        $koleksi = Koleksi::with(['kategori', 'detail'])
            // Filter Kata Kunci (Berdasarkan Nama Koleksi atau Deskripsi di tabel Detail)
            ->when($request->search, function ($query, $search) {
                return $query->where('nama_koleksi', 'like', '%' . $search . '%')
                    ->orWhereHas('detail', function ($q) use ($search) {
                        $q->where('deskripsi', 'like', '%' . $search . '%');
                    });
            })
            // Filter Berdasarkan ID Kategori
            ->when($request->kategori, function ($query, $kategoriId) {
                return $query->where('id_kategori', $kategoriId);
            })
            ->get();

        // Ambil semua kategori untuk tombol filter di bagian bawah search bar
        $kategori = Kategori::all();

        return view('user.koleksi', compact('koleksi', 'kategori'));
    }

    public function detailKoleksi($id)
    {
        $koleksi = Koleksi::with([
            'kategori',
            'detail',
        ])->findOrFail($id);
        // dd($koleksi);
        $koleksiTerkait = Koleksi::with(['kategori', 'detail'])
            ->where('id_kategori', $koleksi->kategori_id) // Kategori harus sama
            ->where('id', '!=', $koleksi->id)             // Kecualikan koleksi utama yang sedang dibuka
            ->latest()                                    // Urutkan dari yang terbaru (bisa diganti ->inRandomOrder() jika ingin acak)
            ->take(3)                                     // Batasi hanya mengambil 3 data
            ->get();

        return view('user.detailkoleksi', compact(['koleksi', 'koleksiTerkait']));
    }
}
