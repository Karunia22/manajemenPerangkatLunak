<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminAkunController extends Controller
{
    //
    public function index()
    {
        $user = User::where('role', 'pengelola')->get();

        return view('admin.pengelola.index', compact('user'));
    }

    public function tambah()
    {
        return view('admin.pengelola.tambah');
    }

    public function edit()
    {
        return view('admin.pengelola.edit');
    }

    public function validasi(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);
        // dd($request->all());
        try {
            DB::beginTransaction();

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => 'pengelola',
            ]);
            DB::commit();

            return redirect()->route('akunA');
        } catch (Exception $e) {
            DB::rollBack();
        }
    }
}
