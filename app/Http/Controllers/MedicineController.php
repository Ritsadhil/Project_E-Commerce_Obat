<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class MedicineController extends Controller
{
    // Read (Halaman Depan Obat)
    public function index()
    {
        $medicines = Medicine::with('category')->latest()->paginate(5);

        return view('back-pages.obat', [
            'medicines' => $medicines
        ]);
    }

    // Create (Halaman Tambah)
    public function create()
    {
        return view('back-pages.tambahobat', [
            'obat' => new Medicine(), // Kirim objek kosong agar form tidak error
            'categories' => Category::all() // Kirim data kategori untuk dropdown
        ]);
    }

    // Store (Proses Simpan Data Baru)
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'        => 'required|max:255',
            'category_id' => 'required',
            'price'       => 'required|numeric',
            'stock'       => 'required|numeric',
            'description' => 'required',
            'image'       => 'required|image|mimes:jpeg,png,jpg|max:4096'
        ]);

        // Buat Slug
        $validatedData['slug'] = Str::slug($request->name);

        // Upload Gambar
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img'), $fileName);

            $validatedData['image'] = $fileName;
        }

        Medicine::create($validatedData);

        // Redirect ke route obat.index
        return redirect()->route('obat.index')->with('success', 'Data obat berhasil ditambahkan!');
    }

    // Edit (Halaman Edit)
    public function edit($id)
    {
        $obat = Medicine::findOrFail($id);

        return view('back-pages.editobat', [
            'obat' => $obat,
            'categories' => Category::all()
        ]);
    }

    // Update (Proses Simpan Perubahan)
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        $obat = Medicine::findOrFail($id);

        $obat->name = $request->name;
        $obat->price = $request->price;
        $obat->stock = $request->stock;
        $obat->description = $request->description;
        $obat->category_id = $request->category_id;
        $obat->slug = Str::slug($request->name);

        // Cek Gambar Baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama
            $oldImagePath = public_path('img/' . $obat->image);
            if (file_exists($oldImagePath) && $obat->image) {
                unlink($oldImagePath);
            }

            // Simpan baru
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img'), $fileName);

            $obat->image = $fileName;
        }

        $obat->save();

        return redirect()->route('obat.index')->with('success', 'Data obat berhasil diperbarui!');
    }

    // Destroy (Hapus Data)
    public function destroy($id)
    {
        $medicine = Medicine::findOrFail($id);

        if ($medicine->image) {
            $imagePath = public_path('img/' . $medicine->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $medicine->delete();

        return redirect()->route('obat.index')->with('success', 'Data obat berhasil dihapus!');
    }
}
