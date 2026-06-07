<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminAkunController extends Controller
{
    //
    public function index()
    {
        $title = "Akun pengelolah";
        $user = User::where('role', 'pengelola')->get();

        return view('admin.pengelola.index', compact('user', 'title'));
    }

    public function tambah()
    {
        $title = "Tambah akun";
        return view('admin.pengelola.tambah', compact('title'));
    }

    public function edit($id)
    {
        $title = "Edit akun";
        $user = User::findOrFail($id);

        return view('admin.pengelola.edit', compact('user', 'title'));
    }

    public function validasi(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'nullable|min:8|confirmed',
        ], [
            'name.required' => 'Username wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
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

            return redirect()->route('akunA')->with('success', 'Berhasil membuat akun');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()->back()->withErrors('error', 'Gagal membuat akun');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:8|confirmed',
        ], [
            'name.required' => 'Username wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->email = $request->email;

        // hanya update password jika diisi
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()
            ->route('akunA')
            ->with('success', 'Data akun berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // cegah admin menghapus dirinya sendiri
        if ($user->id == auth()->id()) {
            return redirect()
                ->back()
                ->with('error', 'Anda tidak dapat menghapus akun sendiri.');
        }

        $user->delete();

        return redirect()
            ->back()
            ->with('success', 'Akun berhasil dihapus.');
    }
}
