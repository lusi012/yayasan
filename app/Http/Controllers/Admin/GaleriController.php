<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Galeri;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;


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
        'foto.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:8048',
        'tanggal' => 'required|date',
        'judul' => 'required|string|max:255',
    ]);

    $uploadPath = public_path('uploads/galeri');
    if (!File::exists($uploadPath)) {
        File::makeDirectory($uploadPath, 0755, true);
    }

    foreach ($request->file('foto') as $file) {
        $extension = $file->getClientOriginalExtension();
        $filename = Str::slug($request->judul) . '-' . uniqid() . '.' . $extension;
        $file->move($uploadPath, $filename); // pindahkan file

        Galeri::create([
            'id_galeri' => Str::uuid(),
            'foto' => 'uploads/galeri/' . $filename,
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
        ]);
    }

    Alert::toast('Semua foto berhasil ditambahkan', 'success');
    return redirect()->route('admin.galeri.index');
}

   public function update(Request $request, $id)
{
    $request->validate([
        'judul' => 'required|string|max:255',
        'tanggal' => 'required|date',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:8048',
    ]);

    $galeri = Galeri::findOrFail($id);
    $galeri->judul = $request->judul;
    $galeri->tanggal = $request->tanggal;

    if ($request->hasFile('foto')) {
        // Hapus foto lama jika ada
        $oldFile = public_path($galeri->foto);
        if (File::exists($oldFile)) {
            File::delete($oldFile);
        }

        // Simpan foto baru
        $uploadPath = public_path('uploads/galeri');
        if (!File::exists($uploadPath)) {
            File::makeDirectory($uploadPath, 0755, true);
        }

        $file = $request->file('foto');
        $extension = $file->getClientOriginalExtension();
        $filename = Str::slug($request->judul) . '-' . uniqid() . '.' . $extension;
        $file->move($uploadPath, $filename);

        $galeri->foto = 'uploads/galeri/' . $filename;
    }

    $galeri->save();
    Alert::toast('Data galeri berhasil diupdate', 'success');

    return redirect()->route('admin.galeri.index');
}

    public function destroy($id_galeri)
{
    $galeri = Galeri::where('id_galeri', $id_galeri)->firstOrFail();

    // Hapus file dari public path (bukan storage)
    $filePath = public_path($galeri->foto); // contoh: public/uploads/galeri/nama.jpg
    if (File::exists($filePath)) {
        File::delete($filePath);
    }

    $galeri->delete();

    Alert::toast('Data galeri berhasil dihapus', 'success')->autoClose(3000);
    return redirect()->route('admin.galeri.index');
}

}
