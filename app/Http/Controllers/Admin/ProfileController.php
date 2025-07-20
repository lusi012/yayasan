<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class ProfileController extends Controller
{
    public function index()
{
    $user = User::find(session('id'));

    if (!$user) {
        return redirect()->route('admin.login')->with('error', 'Silakan login terlebih dahulu.');
    }

    return view('admin.pengaturan.index', compact('user'));
}

  public function update(Request $request)
{
    $user = User::find(session('id'));

    $request->validate([
        'nama' => 'required|string|max:255',
        'username' => 'required|string|max:255',
        'password' => 'nullable|string|min:6',
        'role' => 'required|string',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:8048',
    ]);

    $user->nama = $request->nama;
    $user->username = $request->username;
    $user->role = $request->role;

    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

    if ($request->hasFile('foto')) {
        // Hapus file lama jika ada
        if ($user->foto && file_exists(public_path($user->foto))) {
            unlink(public_path($user->foto));
        }

        // Buat folder jika belum ada
        $uploadPath = public_path('uploads/foto_user');
        if (!File::exists($uploadPath)) {
            File::makeDirectory($uploadPath, 0755, true);
        }

        // Simpan foto baru
        $file = $request->file('foto');
        $filename = Str::slug($request->username) . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move($uploadPath, $filename);
        $user->foto = 'uploads/foto_user/' . $filename;
    }

    $user->save();

    return redirect()->route('admin.profile.index')->with('success', 'Profil berhasil diperbarui.');
}

}
