<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Informasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;


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


        return view('admin.informasi.Index', compact('informasis', 'search'));
    }
 public function store(Request $request)
{
    $request->validate([
        'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:8048',
        'tanggal' => 'required|date',
        'judul' => 'required|string|max:255',
        'deskripsi' => 'required|string',
    ]);

    $uploadPath = public_path('uploads/informasi');
    if (!File::exists($uploadPath)) {
        File::makeDirectory($uploadPath, 0755, true);
    }

    $file = $request->file('foto');
    $extension = $file->getClientOriginalExtension();
    $filename = Str::slug($request->judul) . '-' . \Carbon\Carbon::parse($request->tanggal)->format('Y-m-d') . '.' . $extension;
    $file->move($uploadPath, $filename);

    Informasi::create([
        'id_informasi' => Str::uuid(),
        'foto' => 'uploads/informasi/' . $filename,
        'judul' => $request->judul,
        'tanggal' => $request->tanggal,
        'deskripsi' => $request->deskripsi,
    ]);

    Alert::toast('Data Informasi berhasil ditambah', 'success');
    return redirect()->route('admin.informasi.index');
}


public function update(Request $request, $id)
{
    $request->validate([
        'judul' => 'required|string|max:255',
        'tanggal' => 'required|date',
        'deskripsi' => 'required|string',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:8048',
    ]);

    $informasi = Informasi::findOrFail($id);
    $informasi->judul = $request->judul;
    $informasi->tanggal = $request->tanggal;
    $informasi->deskripsi = $request->deskripsi;

    if ($request->hasFile('foto')) {
        // Hapus file lama
        $oldPath = public_path($informasi->foto);
        if (File::exists($oldPath)) {
            File::delete($oldPath);
        }

        // Simpan file baru
        $uploadPath = public_path('uploads/informasi');
        if (!File::exists($uploadPath)) {
            File::makeDirectory($uploadPath, 0755, true);
        }

        $file = $request->file('foto');
        $extension = $file->getClientOriginalExtension();
        $filename = Str::slug($request->judul) . '-' . \Carbon\Carbon::parse($request->tanggal)->format('Y-m-d') . '.' . $extension;
        $file->move($uploadPath, $filename);

        $informasi->foto = 'uploads/informasi/' . $filename;
    }

    $informasi->save();

    Alert::toast('Data Informasi berhasil diupdate', 'success');
    return redirect()->route('admin.informasi.index');
}

public function destroy($id_informasi)
{
    $informasi = Informasi::where('id_informasi', $id_informasi)->firstOrFail();

    $filePath = public_path($informasi->foto);
    if (File::exists($filePath)) {
        File::delete($filePath);
    }

    $informasi->delete();

    Alert::toast('Data informasi berhasil dihapus', 'success')->autoClose(3000);
    return redirect()->route('admin.informasi.index');
}


}
