<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Galeri;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index()
    {
        return view('admin.galeri.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tanggal' => 'required|date',
            'judul' => 'required|string|max:255',
        ]);

        // Simpan file gambar
        $path = $request->file('foto')->store('galeri', 'public');

        // Simpan data ke database
        Galeri::create([
            'foto' => $path,
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('admin.galeri.index')->with('success', 'Data galeri berhasil ditambahkan.');
    }
}
