<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class MedicineController extends Controller
{
    // READ
    public function index()
    {
        $medicines = Medicine::with('category')->latest()->paginate(5);
        return view('back-pages.obat', ['medicines' => $medicines]);
    }

    // CREATE (Tampilkan Form)
    public function create()
    {
        return view('back-pages.tambahobat', [
            'medicine' => new Medicine(),
            'categories' => Category::all()
        ]);
    }

    // STORE (Simpan Data Baru)
    public function store(Request $request)
    {
        // Validasi sesuai name di form
        $request->validate([
            'name'        => 'required|max:255',
            'category_id' => 'required',
            'price'       => 'required|numeric',
            'stock'       => 'required|numeric',
            'description' => 'required',
            'image'       => 'required|image|mimes:jpeg,png,jpg|max:4096'
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img'), $fileName);
            $data['image'] = $fileName;
        }

        Medicine::create($data);

        return redirect()->route('obat.index')->with('success', 'Obat berhasil ditambahkan!');
    }

    // EDIT (Tampilkan Form Edit)
    public function edit($id)
    {
        $medicine = Medicine::findOrFail($id);
        return view('back-pages.editobat', [
            'medicine' => $medicine,
            'categories' => Category::all()
        ]);
    }

    // UPDATE (Simpan Perubahan)
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

        $medicine = Medicine::findOrFail($id);

        $medicine->name = $request->name;
        $medicine->price = $request->price;
        $medicine->stock = $request->stock;
        $medicine->description = $request->description;
        $medicine->category_id = $request->category_id;
        $medicine->slug = Str::slug($request->name);

        if ($request->hasFile('image')) {
            // Hapus gambar lama
            $oldImagePath = public_path('img/' . $medicine->image);
            if (file_exists($oldImagePath) && $medicine->image) {
                unlink($oldImagePath);
            }

            // Simpan gambar baru
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img'), $fileName);

            $medicine->image = $fileName;
        }

        $medicine->save();

        return redirect()->route('obat.index')->with('success', 'Data obat berhasil diperbarui!');
    }

    // DESTROY (Hapus)
    public function destroy($id)
    {
        $medicine = Medicine::findOrFail($id);
        if ($medicine->image) {
            $path = public_path('img/' . $medicine->image);
            if (file_exists($path)) unlink($path);
        }
        $medicine->delete();
        return redirect()->route('obat.index')->with('success', 'Obat dihapus');
    }

    // PDF reporting
    public function pdf()
    {
        $medicines = Medicine::with('category')->get();
        $mpdf = new \Mpdf\Mpdf();
        $html = view('back-pages.pdf', compact('medicines'))->render();
        $mpdf->WriteHTML($html);
        $mpdf->Output('laporan-obat.pdf', 'I');
    }
}
