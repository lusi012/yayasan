<?php

namespace App\Http\Controllers\Userumum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Informasi;

class HomeController extends Controller
{
    public function index()
    {
        return view('pengguna_umum.home');
    }
    public function gambar()
    {
        return view('pengguna_umum.gambar');
    }
    public function informasi()
    {
        // return view('pengguna_umum.informasi');
        $informasis = Informasi::latest()->paginate(6);
        return view('pengguna_umum.informasi', compact('informasis'));
    }
    public function contact()
    {
        return view('pengguna_umum.contact');
    }
    // public function detail($id)
    // {
    //     $informasi = Informasi::findOrFail($id);
    //     return view('pengguna_umum.informasi_detail', compact('informasi'));
    // }
}
