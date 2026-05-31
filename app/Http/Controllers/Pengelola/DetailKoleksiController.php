<?php

namespace App\Http\Controllers\Pengelola;

use App\Http\Controllers\Controller;
use App\Models\Koleksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DetailKoleksiController extends Controller
{
    //
    public function detail($id)
    {
        $koleksi = Koleksi::with([
            'kategori',
            'detail',
        ])->findOrFail($id);

        return view('pengelolah.detailKoleksi.index', compact('koleksi'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all(), $id);
        $request->validate([
            'nama_koleksi' => 'required|string|max:255',
            'asal_daerah' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'sejarah' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        $koleksi = Koleksi::with('detail')->findOrFail($id);
        // dd($koleksi->kategori);
        $gambarLama = $koleksi->gambar;

        try {

            DB::beginTransaction();

            // upload gambar baru jika ada
            if ($request->hasFile('gambar')) {

                $pathBaru = $request->file('gambar')
                    ->store('koleksi', 'public');

                $koleksi->gambar = $pathBaru;
            }

            // update tabel koleksi
            $koleksi->update([
                'nama_koleksi' => $request->nama_koleksi,
                'gambar' => $koleksi->gambar,
            ]);

            // update tabel detail_koleksi
            $koleksi->detail->update([
                'asal_daerah' => $request->asal_daerah,
                'deskripsi' => $request->deskripsi,
                'sejarah' => $request->sejarah,
            ]);

            DB::commit();

            // hapus gambar lama setelah semua berhasil
            if (
                $request->hasFile('gambar')
                && $gambarLama
                && Storage::disk('public')->exists($gambarLama)
            ) {

                Storage::disk('public')->delete($gambarLama);
            }

            return redirect()
                ->back()
                ->with('success', 'Data koleksi berhasil diperbarui');

        } catch (\Exception $e) {
            // echo $e->getMessage();
            DB::rollBack();

            // hapus gambar baru jika gagal
            if (
                isset($pathBaru)
                && Storage::disk('public')->exists($pathBaru)
            ) {

                Storage::disk('public')->delete($pathBaru);
            }

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Gagal memperbarui data');
        }
    }
}
