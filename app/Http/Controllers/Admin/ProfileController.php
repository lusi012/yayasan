<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
{
    $user = User::find(session('admin_id'));

    if (!$user) {
        return redirect()->route('admin.login')->with('error', 'Silakan login terlebih dahulu.');
    }

    return view('admin.pengaturan.index', compact('user'));
}

   public function update(Request $request)
{
        $user = User::find(session('admin_id'));

    $user->nama = $request->nama;
    $user->username = $request->username;

    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

    $user->role = $request->role;

    if ($request->hasFile('foto')) {
        if ($user->foto) {
            Storage::delete($user->foto);
        }
        $user->foto = $request->file('foto')->store('foto_user', 'public');
    }

    $user->save();

    return redirect()->route('admin.profile.index')->with('success', 'Profile berhasil diperbarui.');
}
}
