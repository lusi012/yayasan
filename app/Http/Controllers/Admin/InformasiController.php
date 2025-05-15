<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Informasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;


class InformasiController extends Controller
{
    public function index(Request $request)
    {
        // return view('admin.informasi.index');
        //$informasis = Informasi::all(); // atau pakai ->latest() jika mau urut terbaru
        //return view('admin.informasi.index', compact('informasis'));

        $search = $request->input('search');
        $query = Informasi::query();

        if ($search) {
            $query->where('judul', 'like', "%{$search}%")
                ->orWhere('deskripsi', 'like', "%{$search}%");
        }

        $informasis = $query->latest()->paginate(10);


        return view('admin.informasi.index', compact('informasis', 'search'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:8048',
            'tanggal' => 'required|date',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);


        $extension = $request->file('foto')->getClientOriginalExtension();


        $filename = Str::slug($request->judul) . '-' . \Carbon\Carbon::parse($request->tanggal)->format('Y-m-d') . '.' . $extension;


        $path = $request->file('foto')->storeAs('galeri', $filename, 'public');


        Informasi::create([
            'id_informasi' => Str::uuid(),
            'foto' => $path,
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'deskripsi' => $request->deskripsi,
        ]);

        Alert::toast('Data Informasi berhasil ditambah', 'success');
        return redirect()->route('admin.informasi.index');
    }
    //Hapus galeri
    public function destroy($id_informasi)
    {

        $informasi = Informasi::where('id_informasi', $id_informasi)->firstOrFail();


        if ($informasi->foto && Storage::disk('public')->exists($informasi->foto)) {
            Storage::disk('public')->delete($informasi->foto);
        }

        // Hapus data informasi dari database
        $informasi->delete();

        Alert::toast('Data informasi berhasil dihapus', 'success')->autoClose(3000);


        return redirect()->route('admin.informasi.index');
    }
}
