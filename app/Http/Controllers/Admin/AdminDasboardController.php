<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class AdminDasboardController extends Controller
{
    //
    //

    public function index()
    {
        $user = User::all()->count() - 1;
        $pengelola = User::where('role', 'pengelola')->get()->count();
        $pengunjung = $user - $pengelola;

        return view('admin.dashboard', compact('user', 'pengelola', 'pengunjung'));
    }
}
