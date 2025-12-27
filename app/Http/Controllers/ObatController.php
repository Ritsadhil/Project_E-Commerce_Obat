<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ObatController extends Controller
{
    public function index()
    {
        $obats = Obat::all();
        return view('back-pages.list-obat', compact('obats'));
    }

    public function create()
    {
        $obat = (object) [
            'id' => '',
            'nama_obat' => '',
            'kategori' => '',
            'harga' => '',
            'stok' => '',
            'deskripsi' => '',
            'gambar' => null,
        ];
        return view('back-pages.tambahobat', compact('obat'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_obat' => 'required|string|max:255',
            'kategori' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|numeric|min:0',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('obat', 'public');
        }

        Obat::create($data);

        return redirect()->back()->with('success', 'Obat berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $obat = Obat::findOrFail($id);
        return view('back-pages.editobat', compact('obat'));
    }

    public function update(Request $request, $id)
    {
        $obat = Obat::findOrFail($id);

        $request->validate([
            'nama_obat' => 'required|string|max:255',
            'kategori' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|numeric|min:0',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            if ($obat->gambar) {
                Storage::disk('public')->delete($obat->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('obat', 'public');
        }

        $obat->update($data);

        return redirect()->back()->with('success', 'Obat berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $obat = Obat::findOrFail($id);
        if ($obat->gambar) {
            Storage::disk('public')->delete($obat->gambar);
        }
        $obat->delete();
        return redirect()->route('obat.index')->with('success', 'Obat berhasil dihapus!');
    }
}
