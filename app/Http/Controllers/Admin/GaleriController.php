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
    public function index(Request $request)
    {

        // $galeris = Galeri::all(); // atau pakai ->latest() jika mau urut terbaru
        // return view('admin.galeri.index', compact('galeris'));

        $search = $request->input('search');
        $query = Galeri::query();

        if ($search) {
            $query->where('judul', 'like', "%{$search}%");
        }

        $galeris = $query->latest()->paginate(10);
        return view('admin.galeri.index', compact('galeris', 'search'));
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


    public function destroy($id_galeri)
    {

        $galeri = Galeri::where('id_galeri', $id_galeri)->firstOrFail();

        if ($galeri->foto && Storage::disk('public')->exists($galeri->foto)) {
            Storage::disk('public')->delete($galeri->foto);
        }


        // if ($galeri->foto && Storage::disk('public')->exists($galeri->foto)) {
        //     Storage::disk('public')->delete($galeri->foto);
        // }

        // Hapus data galeri dari database
        $galeri->delete();

        Alert::toast('Data galeri berhasil dihapus', 'success')->autoClose(3000);


        return redirect()->route('admin.galeri.index');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
        ]);

        $galeri = Galeri::findOrFail($id);
        $galeri->judul = $request->judul;
        $galeri->tanggal = $request->tanggal;

        // Jika kamu ingin memperbolehkan update gambar:
        if ($request->hasFile('foto')) {
            // Hapus gambar lama
            Storage::delete('public/storage/' . $galeri->foto);

            // Simpan gambar baru
            $galeri->foto = $request->file('foto')->store('galeri', 'public');
        }

        $galeri->save();
Alert::toast('Data galeri berhasil diupdate', 'success');

        return redirect()->route('admin.galeri.index');
    }
}
