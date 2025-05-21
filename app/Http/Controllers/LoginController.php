<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }
    public function login(Request $request)
{
    $request->validate([
        'username' => 'required|string',
        'password' => 'required|string',
    ]);

    $user = User::where('username', $request->username)->first();

    if ($user && Hash::check($request->password, $user->password)) {
        // Simpan session manual
        session(['admin_logged_in' => true, 'admin_id' => $user->id]);

        Alert::toast('Login berhasil', 'success'); // toast harus sebelum return

        return redirect()->route('admin.dashboard');
    }

    Alert::toast('Username atau password salah', 'error');
    return back()->withInput();
}
public function logout()
{
    session()->forget(['admin_logged_in', 'admin_id']);

    // jika pakai SweetAlert
    Alert::toast('Berhasil logout', 'success');

    return redirect()->route('admin.login');
}
}
