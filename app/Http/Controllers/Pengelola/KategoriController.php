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
        $kategori = Kategori::all();

        return view('pengelolah.kategori.tambah', compact('kategori'));
    }

    public function edit()
    {
        return view('pengelolah.kategori.edit');
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

            return redirect()->route('indexK')->with('status', 'Berhasil menambahkan kategori');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()->back()->withErrors('Gagal menambahkan kategori');
        }
    }
}
