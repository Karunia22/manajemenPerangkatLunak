<?php

namespace App\Http\Controllers\Pengelola;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KoleksiController extends Controller
{
    //
    public function index()
    {
        return view('pengelolah.koleksi.index');
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
        $request->validate([

            'nama' => 'required|string|max:255',

            'tempat' => 'required|string|max:255',

            'kategori' => 'required',

            'foto' => 'required|image|mimes:jpg,jpeg,png|max:5120',
            'id_pengelolah' => 'required|exists:pengelolah,id',
        ], [

            // NAMA
            'nama.required' => 'Nama koleksi wajib diisi.',
            'nama.string' => 'Nama koleksi harus berupa teks.',
            'nama.max' => 'Nama koleksi maksimal 255 karakter.',

            // TEMPAT
            'tempat.required' => 'Tempat asal koleksi wajib diisi.',
            'tempat.string' => 'Tempat asal harus berupa teks.',
            'tempat.max' => 'Tempat asal maksimal 255 karakter.',

            // KATEGORI
            'kategori.required' => 'Kategori wajib dipilih.',

            // FOTO
            'foto.required' => 'Gambar koleksi wajib diupload.',
            'foto.image' => 'File harus berupa gambar.',
            'foto.mimes' => 'Format gambar harus JPG, JPEG, atau PNG.',
            'foto.max' => 'Ukuran gambar maksimal 5MB.',

        ]);
    }
}
