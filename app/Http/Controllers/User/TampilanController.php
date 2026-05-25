<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class TampilanController extends Controller
{
    //
    public function index()
    {
        // dd(auth()->user()->role);

        return view('dashboard');
    }

    public function koleksi()
    {
        // dd(auth()->user()->role);
        return view('user.koleksi');
    }

    public function detailKoleksi()
    {
        return view('user.detailkoleksi');
    }
}
