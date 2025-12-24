<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $medicines = Medicine::latest();

        if ($request->has('search') && $request->search != '') {
            $medicines->where('name', 'like', '%' . $request->search . '%');
        }

        $data = $medicines->paginate(8)->withQueryString();

        if ($request->ajax()) {
            return view('front-pages.home', ['medicines' => $data])->fragment('list-obat');
        }

        return view('front-pages.home', ['medicines' => $data]);
    }

    public function show($slug)
    {
        // Cari obat berdasarkan slug, kalau tidak ketemu tampilkan 404
        $medicine = Medicine::where('slug', $slug)->firstOrFail();

        // Tampilkan view detail produk (Pastikan file view-nya sudah ada)
        return view('front-pages.detail_produk', ['medicine' => $medicine]);
    }
}
