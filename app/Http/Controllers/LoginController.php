<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Session;

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
        // Simpan session
        Session::put('admin_logged_in', true);
        Session::put('id', $user->id);
        Session::put('username', $user->username); // tambahan jika dibutuhkan

        Alert::toast('Login berhasil', 'success');
        return redirect()->route('admin.dashboard');
    }

    Alert::toast('Username atau password salah', 'error');
    return back()->withInput();
}
public function logout()
{
    session()->forget(['admin_logged_in', 'id']);

    // jika pakai SweetAlert
    Alert::toast('Berhasil logout', 'success');

    return redirect()->route('admin.login');
}
}