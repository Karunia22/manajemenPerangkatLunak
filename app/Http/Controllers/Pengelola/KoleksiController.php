<?php

namespace App\Http\Controllers\Pengelola;

use App\Http\Controllers\Controller;
use App\Models\DetailKoleksi;
use App\Models\Kategori;
use App\Models\Koleksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class KoleksiController extends Controller
{
    //
    public function index()
    {

        $koleksi = Koleksi::with([
            'user',
            'kategori',
        ])->latest()->get();
        $totalKoleksi = Koleksi::all()->count();

        return view('pengelolah.koleksi.index', compact(['koleksi', 'totalKoleksi']));
    }

    public function tambah()
    {
        $kategori = Kategori::all();

        return view('pengelolah.koleksi.tambahKoleksi', compact('kategori'));
    }

    public function edit()
    {
        return view('pengelolah.koleksi.edit');
    }

    public function validasi(Request $request)
    {
        // 1. Validasi DULU sebelum apapun
        $request->validate([
            'nama_koleksi' => 'required|string|max:255',
            'kategori' => 'required',
            'asal_daerah' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'sejarah' => 'required|string',
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:5120',
        ], [
            'nama_koleksi.required' => 'Nama koleksi wajib diisi.',
            'kategori.required' => 'Kategori wajib dipilih.',
            'asal_daerah.required' => 'Asal daerah wajib diisi.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'sejarah.required' => 'Sejarah wajib diisi.',
            'gambar.required' => 'Gambar koleksi wajib diunggah.',
            'gambar.image' => 'File harus berupa gambar.',
            'gambar.mimes' => 'Format gambar harus JPG, JPEG, atau PNG.',
            'gambar.max' => 'Ukuran gambar maksimal 5 MB.',
        ]);

        // 2. Setelah validasi lolos, baru proses
        $path = null;

        try {
            DB::beginTransaction();

            // Upload gambar SEKALI saja
            if ($request->hasFile('gambar')) {
                $path = $request->file('gambar')
                    ->store('koleksi', 'public');
            }

            $koleksi = Koleksi::create([
                'nama_koleksi' => $request->nama_koleksi,
                'gambar' => $path,
                'id_kategori' => $request->kategori,
                'id_user' => Auth::id(),
            ]);

            DetailKoleksi::create([
                'id_koleksi' => $koleksi->id,
                'asal_daerah' => $request->asal_daerah,
                'deskripsi' => $request->deskripsi,
                'sejarah' => $request->sejarah,
            ]);

            DB::commit();

            return redirect()
                ->route('indexP')
                ->with('success', 'Koleksi berhasil ditambahkan');

        } catch (\Exception $e) {
            DB::rollBack();

            if ($path && Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
            }

            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }

    public function destroy($id)
    {
        // 1. Cari data koleksi beserta detailnya
        $koleksi = Koleksi::with('detail')->findOrFail($id);
        $gambarDihapus = $koleksi->gambar;

        try {
            DB::beginTransaction();

            // 2. Hapus detail koleksi terlebih dahulu jika menggunakan relasi model terpisah
            if ($koleksi->detail) {
                $koleksi->detail->delete();
            }

            // 3. Hapus data utama koleksi
            $koleksi->delete();

            // Jika semua proses hapus di database lancar, simpan perubahan permanen
            DB::commit();

            // 4. Hapus fisik berkas gambar dari folder storage agar tidak menumpuk jadi sampah
            if ($gambarDihapus && Storage::disk('public')->exists($gambarDihapus)) {
                Storage::disk('public')->delete($gambarDihapus);
            }

            // Kembali dengan pesan sukses (menyesuaikan session 'success' di layout detail sebelumnya)
            return redirect()->back()->with('success', 'Koleksi berhasil dihapus dari sistem');

        } catch (\Exception $e) {
            // Batalkan penghapusan di database jika ada error sistem
            DB::rollBack();

            return redirect()->back()->with('error', 'Gagal menghapus koleksi: ' . $e->getMessage());
        }
    }
}
