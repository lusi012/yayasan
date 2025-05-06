<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Galeri;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index(){
        return view('admin.galeri.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tanggal' => 'required|date',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        // Simpan file gambar
        $path = $request->file('image')->store('galeri', 'public');

        // Simpan data ke database
        Galeri::create([
            'image' => $path,
            'tanggal' => $request->tanggal,
            'judul' => $request->judul,
            'status' => 'Proses', // default
        ]);

        return redirect()->route('galeri.index')->with('success', 'Data galeri berhasil ditambahkan.');
    }
}
