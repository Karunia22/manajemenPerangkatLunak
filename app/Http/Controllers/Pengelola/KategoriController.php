<?php

namespace App\Http\Controllers\Pengelola;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    //
    public function tambahKategori()
    {
        $title = "Kategori";
        $kategori = Kategori::all();

        return view('pengelolah.kategori.tambah', compact('kategori','title'));
    }

    public function edit($id)
    {
        // Cari data kategori berdasarkan ID, jika tidak ada tampilkan 404
        $title = "Edit kategori";
        $kategori = Kategori::findOrFail($id);

        // Lempar data kategori ke file blade form edit tadi
        return view('pengelolah.kategori.edit', compact('kategori', 'title'));
    }

    public function validasi(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'jenis_kategori' => 'required|unique:kategori,jenis_kategori',
        ], ['jenis_kategori.required' => 'Kategori wajib diisi', 'jenis_kategori.unique' => 'Kategori sudah ada']);

        DB::beginTransaction();
        try {
            Kategori::create([
                'jenis_kategori' => $request->jenis_kategori,
            ]);
            DB::commit();

            return redirect()->back()->with('status', 'Berhasil menambahkan kategori');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()->back()->withErrors('Gagal menambahkan kategori');
        }
    }

    public function update(Request $request, $id)
    {
        // 1. Validasi input, jenis_kategori wajib unik kecuali untuk ID kategori ini sendiri
        $request->validate([
            'jenis_kategori' => 'required|string|max:255|unique:kategori,jenis_kategori,' . $id,
        ], [
            'jenis_kategori.required' => 'Kategori wajib diisi',
            'jenis_kategori.unique' => 'Kategori sudah ada',
        ]);

        // 2. Mulai DB Transaction untuk mengamankan proses update
        DB::beginTransaction();
        try {
            // Cari datanya
            $kategori = Kategori::findOrFail($id);

            // Update datanya
            $kategori->update([
                'jenis_kategori' => $request->jenis_kategori,
            ]);

            // Jika berhasil, simpan perubahan secara permanen
            DB::commit();

            // Redirect kembali dengan pesan sukses
            return redirect()->route('indexK')->with('status', 'Kategori berhasil diperbarui!');

        } catch (Exception $e) {
            // Jika terjadi error di database, batalkan semua perubahan
            DB::rollBack();

            // Kembalikan ke halaman edit dengan membawa error validasi ke Blade
            return redirect()->back()->withErrors(['jenis_kategori' => 'Gagal memperbarui kategori: ' . $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        // Cari data kategori berdasarkan ID, kirim 404 jika tidak ditemukan
        $kategori = Kategori::findOrFail($id);

        // Eksekusi penghapusan data
        $kategori->delete();

        // Kembali ke halaman sebelumnya dengan membawa pesan sukses
        return redirect()->back()->with('status', 'Kategori berhasil dihapus!');
    }
}
