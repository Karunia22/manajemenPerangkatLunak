<?php

namespace App\Http\Controllers\Pengelola;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Koleksi;
use App\Models\PengunjungLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $title = "Dashboard";
        $totalKoleksi = Koleksi::count();
        $totalKategori = Kategori::count();

        $koleksiBaru = Koleksi::where('created_at', '>=', now()->subDays(7))->count();
        $ip = request()->ip();
        $hariIni = now()->toDateString();

        // --------------------------------------------------------
        // SEMENTARA: MATIKAN FILTER ROLE UNTUK TESTING
        // --------------------------------------------------------
        // Kita hanya cek apakah IP ini sudah masuk hari ini atau belum
        if (Auth::check() && Auth::user()->role === 'pengunjung') {
           $sudahTercatat = PengunjungLog::where('ip_address', $ip)
              ->where('tanggal', today())
                ->exists();

            if (! $sudahTercatat) {
                PengunjungLog::create([
                    'ip_address' => $ip,
                ]);
            }
        }
        // --------------------------------------------------------
        $totalPengunjung = PengunjungLog::count();
        $pengunjungHariIni = PengunjungLog::whereDate('created_at', today())->count();

        $logBulanan = PengunjungLog::select(
            DB::raw('MONTH(created_at) as bulan'),
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

        return view('pengelolah.dashboard', compact('totalPengunjung', 'pengunjungHariIni', 'dataGrafik', 'totalKoleksi', 'totalKategori', 'koleksiBaru', 'title'));
    }

    public function getLiveStats()
    {
        $ip = request()->ip();
        $hariIni = now()->toDateString();

        // --------------------------------------------------------
        // FILTERING DI SINI JUGA (Untuk Request Real-time / Polling)
        // --------------------------------------------------------
        // Mencegah background request dari admin/pengelola ikut tersimpan setiap 5 detik
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

        // ========================================================
        // KEMBALIKAN DATA TERBARU UNTUK JAVASCRIPT
        // ========================================================
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
        ]);
    }
}
