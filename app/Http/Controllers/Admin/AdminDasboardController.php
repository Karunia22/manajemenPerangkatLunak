<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Koleksi;
use App\Models\PengunjungLog;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminDasboardController extends Controller
{
    //
    //

    public function index()
    {
        $user = User::count() - 1; // -1 untuk exclude akun admin
        $pengelola = User::where('role', 'pengelola')->count();
        $pengunjung = $user - $pengelola;

        // Data grafik per bulan tahun ini
        $akunBulanan = User::select(
            DB::raw('MONTH(created_at) as bulan'),
            DB::raw('SUM(CASE WHEN role = "pengelola" THEN 1 ELSE 0 END) as jumlah_pengelola'),
            DB::raw('SUM(CASE WHEN role = "pengunjung" THEN 1 ELSE 0 END) as jumlah_pengunjung')
        )
            ->whereYear('created_at', now()->year)
            ->groupBy('bulan')
            ->orderBy('bulan', 'asc')
            ->get();

        $dataPengelola = array_fill(0, 12, 0);
        $dataPengunjung = array_fill(0, 12, 0);

        foreach ($akunBulanan as $akun) {
            $dataPengelola[$akun->bulan - 1] = $akun->jumlah_pengelola;
            $dataPengunjung[$akun->bulan - 1] = $akun->jumlah_pengunjung;
        }

        return view('admin.dashboard', compact(
            'user',
            'pengelola',
            'pengunjung',
            'dataPengelola',
            'dataPengunjung'
        ));
    }

    public function getLiveStats()
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

        $totalPengunjung = PengunjungLog::count();
        $pengunjungHariIni = PengunjungLog::where('tanggal', $hariIni)->count();

        $logBulanan = PengunjungLog::select(
            DB::raw('MONTH(tanggal) as bulan'),
            DB::raw('COUNT(*) as jumlah')
        )
            ->whereYear('tanggal', now()->year)
            ->groupBy('bulan')
            ->orderBy('bulan', 'asc')
            ->get();

        $dataGrafik = array_fill(0, 12, 0);
        foreach ($logBulanan as $log) {
            $dataGrafik[$log->bulan - 1] = $log->jumlah;
        }

        return response()->json([
            'total' => number_format($totalPengunjung, 0, ',', '.'),
            'hari_ini' => number_format($pengunjungHariIni, 0, ',', '.'),
            'grafik' => $dataGrafik,
            // ✅ Tambahan untuk 3 card atas
            'total_koleksi' => Koleksi::count(),
            'total_kategori' => Kategori::count(),
            'koleksi_baru' => Koleksi::where('created_at', '>=', now()->subDays(7))->count(),
        ]);
    }
}
