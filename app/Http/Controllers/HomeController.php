<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;
use App\Models\Category;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $medicines = Medicine::latest();
        $categories = Category::all();

        if ($request->has('search') && $request->search != '') {
            $medicines->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->has('category') && $request->category != 'all') {
            $medicines->where('category_id', $request->category);
        }

        $data = $medicines->paginate(8)->withQueryString();

        if ($request->ajax()) {
            return view('front-pages.home', ['medicines' => $data])->fragment('list-obat');
        }

        return view('front-pages.home', [
            'medicines' => $data,
            'categories' => $categories
        ]);
    }

    public function show($slug)
    {
        // Cari obat berdasarkan slug, kalau tidak ketemu tampilkan 404
        $medicine = Medicine::where('slug', $slug)->firstOrFail();

        return view('front-pages.detail_produk', ['medicine' => $medicine]);
    }
}
