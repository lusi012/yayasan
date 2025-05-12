<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Informasi;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    public function index(){
        // return view('admin.informasi.index');
         $informasis = Informasi::all(); // atau pakai ->latest() jika mau urut terbaru
        return view('admin.informasi.index', compact('informasis'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:8048',
            'tanggal' => 'required|date',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:500',
        ]);


        $extension = $request->file('foto')->getClientOriginalExtension();


        $filename = Str::slug($request->judul) . '-' . \Carbon\Carbon::parse($request->tanggal)->format('Y-m-d') . '.' . $extension;


        $path = $request->file('foto')->storeAs('galeri', $filename, 'public');


        Informasi::create([
            'id_galeri' => Str::uuid(),
            'foto' => $path,
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
        ]);

        Alert::toast('Data Informasi berhasil ditambah', 'success');
        return redirect()->route('admin.informasi.index');
    }
    //Hapus galeri
    public function destroy($id)
    {
        $galeri = Informasi::findOrFail($id);

        // Hapus file gambar dari disk 'public'
        if ($informasi->foto && Storage::disk('public')->exists($informasi->foto)) {
            Storage::disk('public')->delete($informasi->foto);
        }

        // Hapus data dari database
        $galeri->delete();

        return redirect()->route('admin.informasi.index')->with('success', 'Data informasi berhasil dihapus.');
    }
}
