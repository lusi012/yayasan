<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Galeri;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;


class GaleriController extends Controller
{
    public function index()
    {

        $galeris = Galeri::all(); // atau pakai ->latest() jika mau urut terbaru
        return view('admin.galeri.index', compact('galeris'));
    }

    public function store(Request $request)
{
    $request->validate([
        'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:8048',
        'tanggal' => 'required|date',
        'judul' => 'required|string|max:255',
    ]);


    $extension = $request->file('foto')->getClientOriginalExtension();


    $filename = Str::slug($request->judul) . '-' . \Carbon\Carbon::parse($request->tanggal)->format('Y-m-d') . '.' . $extension;


    $path = $request->file('foto')->storeAs('galeri', $filename, 'public');


    Galeri::create([
        'id_galeri' => Str::uuid(),
        'foto' => $path,
        'judul' => $request->judul,
        'tanggal' => $request->tanggal,
    ]);

    Alert::toast('Data Galeri berhasil ditambah', 'success');
    return redirect()->route('admin.galeri.index');
}
}
