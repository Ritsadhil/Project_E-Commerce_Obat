<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class MedicineController extends Controller
{
    // Read
    public function index()
    {
        $medicines = Medicine::with('category')->latest()->paginate(5);

        return view('back-pages.obat', [
            'medicines' => $medicines
        ]);
    }

    // Create
    public function create()
    {
        return view('back-pagesobat', [
            'categories' => Category::all()
        ]);
    }

    // Proses data dari form Create
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'        => 'required|max:255',
            'category_id' => 'required',
            'price'       => 'required|numeric',
            'stock'       => 'required|numeric',
            'description' => 'required',
            'image'       => 'required|image|mimes:jpeg,png,jpg|max:4096'
        ], [
            'image.required' => 'Gambar obat wajib diupload.',
            'image.image'    => 'File yang diupload harus berupa gambar.',
            'image.mimes'    => 'Format gambar harus JPEG, PNG, atau JPG.',
            'image.max'      => 'Ukuran gambar maksimal 4MB.',
        ]);

        $validatedData['slug'] = Str::slug($request->name);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('medicine-images');
        }

        Medicine::create($validatedData);

        return redirect('/dashboard/medicines')->with('success', 'Data obat berhasil ditambahkan!');
    }

    // melihat detail medicine
    public function show(Medicine $medicine)
    {
        return view('dashboard.medicines.show', [
            'medicine' => $medicine
        ]);
    }

    // edit (form edit)
    public function edit(Medicine $medicine)
    {
        return view('dashboard.medicines.edit', [
            'medicine' => $medicine,
            'categories' => Category::all()
        ]);
    }

    // update (proses data dari form edit)
    public function update(Request $request, Medicine $medicine)
    {
        $rules = [
            'name'        => 'required|max:255',
            'category_id' => 'required',
            'price'       => 'required|numeric',
            'stock'       => 'required|numeric',
            'description' => 'required',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg|max:4096'
        ];

        $validatedData = $request->validate($rules, [
            'image.image'    => 'File yang diupload harus berupa gambar.',
            'image.mimes'    => 'Format gambar harus JPEG, PNG, atau JPG.',
            'image.max'      => 'Ukuran gambar maksimal 4MB.',
        ]);

        if ($request->name != $medicine->name) {
            $validatedData['slug'] = Str::slug($request->name);
        }

        if ($request->file('image')) {
            if ($medicine->image) {
                Storage::delete($medicine->image);
            }
            $validatedData['image'] = $request->file('image')->store('medicine-images');
        }

        Medicine::where('id', $medicine->id)->update($validatedData);

        return redirect('/dashboard/medicines')->with('success', 'Data obat berhasil diperbarui!');
    }

    // delete
    public function destroy(Medicine $medicine)
    {
        if ($medicine->image) {
            // hapus gambar di storage
            Storage::delete($medicine->image);
        }

        Medicine::destroy($medicine->id);

        return redirect('/dashboard/medicines')->with('success', 'Data obat berhasil dihapus!');
    }
}
