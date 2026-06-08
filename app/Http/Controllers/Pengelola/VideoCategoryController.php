<?php

namespace App\Http\Controllers\Pengelola;

use App\Http\Controllers\Controller;
use App\Models\VideoKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VideoCategoryController extends Controller
{
    public function index()
    {
        $categories = VideoKategori::latest()->get();

        return view('pengelolah.video-kategori.index', [
            'title' => 'Kategori Video',
            'categories' => $categories,
        ]);
    }


    public function simpan(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:video_categories,nama_kategori',
        ]);


        DB::beginTransaction();

        try {

            VideoKategori::create([
                'nama_kategori' => $request->nama_kategori,
            ]);

            DB::commit();

            return redirect()
                ->route('videoKategori')
                ->with('success', 'Kategori video berhasil ditambahkan.');

        } catch (\Throwable $e) {

            DB::rollBack();

            return back()
                ->withInput()
                ->with('error', 'Gagal menambahkan kategori video.');
        }
    }

    public function edit($id)
    {
        $category = VideoKategori::findOrFail($id);

        return view('pengelolah.video-kategori.edit', [
            'title' => 'Edit Kategori Video',
            'category' => $category,
        ]);
    }

    public function update(Request $request, $id)
    {
        $category = VideoKategori::findOrFail($id);

        $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:video_categories,nama_kategori,'.$id,
        ]);

        DB::beginTransaction();

        try {

            $category->update([
                'nama_kategori' => $request->nama_kategori,
            ]);

            DB::commit();

            return redirect()
                ->route('videoKategori')
                ->with('success', 'Kategori video berhasil diperbarui.');

        } catch (\Throwable $e) {

            DB::rollBack();

            return back()
                ->withInput()
                ->with('error', 'Gagal memperbarui kategori video.');
        }
    }

    public function destroy($id)
    {
        $category = VideoKategori::findOrFail($id);

        DB::beginTransaction();

        try {

            $category->delete();

            DB::commit();

            return back()->with(
                'success',
                'Kategori video berhasil dihapus.'
            );

        } catch (\Throwable $e) {

            DB::rollBack();

            return back()->with(
                'error',
                'Kategori video gagal dihapus.'
            );
        }
    }
}
