<?php

namespace App\Http\Controllers\Userumum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Galeri;

class GambarController extends Controller
{
    public function index()
    {
        $galleries = Galeri::orderBy('tanggal', 'desc')->get();
        return view('pengguna_umum.gambar', compact('galleries'));
    }
}
