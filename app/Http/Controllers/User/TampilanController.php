<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Koleksi;
use App\Models\PengunjungLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TampilanController extends Controller
{
    //
    public function index()
    {
        $ip = request()->ip();
        $hariIni = now()->toDateString();

        if (! Auth::check() || (Auth::check() && Auth::user()->role === 'pengunjung')) {
            $sudahTercatat = PengunjungLog::where('ip_address', $ip)
                ->where('tanggal', $hariIni)
                ->exists();
            if (! $sudahTercatat) {
                PengunjungLog::create([
                    'ip_address' => $ip,
                    'tanggal' => $hariIni,
                ]);
            }
        }
        $title = 'Dashboard';
        // `` dd(auth()->user()->role);
        $koleksi = Koleksi::with(['kategori', 'detail'])->inRandomOrder()->limit(4)->get();
        $totalKoleksi = Koleksi::all()->count();
        $totalKategori = Kategori::all()->count();

        return view('dashboard', compact(['koleksi', 'totalKoleksi', 'totalKategori', 'title']));
    }

    public function koleksi(Request $request)
    {
        $title = 'Koleksi';

        // Mulai query dasar dengan eager loading relasi
        $query = Koleksi::with(['kategori', 'detail']);

        // 1. FILTER PENCARIAN (Hanya berjalan jika input 'search' tidak kosong)
        if ($request->has('search') && trim($request->search) !== '') {
            $search = trim($request->search);

            // Bungkus dalam satu 'where' besar agar menjadi satu kesatuan ( ... OR ... )
            $query->where(function ($qInner) use ($search) {
                $qInner->where('nama_koleksi', 'like', '%'.$search.'%')
                    ->orWhereHas('detail', function ($qDetail) use ($search) {
                        $qDetail->where('deskripsi', 'like', '%'.$search.'%');
                    });
            });
        }

        // 2. FILTER KATEGORI (Hanya berjalan jika input 'kategori' dipilih & tidak kosong)
        if ($request->has('kategori') && ! empty($request->kategori)) {
            $query->where('id_kategori', $request->kategori);
        }

        // Eksekusi query mendapatkan data
        $koleksi = $query->get();

        // Ambil master data kategori untuk tombol filter
        $kategori = Kategori::all();

        return view('user.koleksi', compact('koleksi', 'kategori', 'title'));
    }

    public function detailKoleksi($id)
    {
        $title = 'Detail Koleksi';
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

        return view('user.detailkoleksi', compact(['koleksi', 'koleksiTerkait', 'title']));
    }
}
