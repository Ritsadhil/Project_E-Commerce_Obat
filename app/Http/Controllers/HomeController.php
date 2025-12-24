<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Method ini menangani logika halaman depan
    public function index(Request $request)
    {
        // 1. Query Dasar (Ambil data obat terbaru)
        $medicines = Medicine::latest();

        // 2. Logika PENCARIAN (Search)
        // Kalau user ngetik di kolom search...
        if ($request->has('search') && $request->search != '') {
            $medicines->where('name', 'like', '%' . $request->search . '%');
        }

        // 3. Ambil data (Paginate 8 item per halaman)
        $data = $medicines->paginate(8)->withQueryString();

        // === LOGIKA AJAX (UBAH DISINI) ===
        // Kalau request ini datang dari JavaScript (AJAX),
        // Kita cuma kirim potongan HTML 'list-obat' saja, bukan seluruh halaman.
        if ($request->ajax()) {
            return view('front-pages.home', ['medicines' => $data])->fragment('list-obat');
        }

        // Kalau akses biasa (buka browser), kirim halaman full
        return view('front-pages.home', ['medicines' => $data]);
    }
}
