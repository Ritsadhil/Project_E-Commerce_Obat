<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Medicine;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // sementara: user dummy
    private function userId()
    {
        return 1; // nanti tinggal ganti Auth::id()
    }

    // Tampilkan keranjang
    public function index()
    {
        $carts = Cart::where('user_id', $this->userId())
            ->with('medicine')
            ->get();

        return view('keranjang', compact('carts'));
    }

    // Tambah ke keranjang
    public function add($medicine_id)
    {
        $medicine = Medicine::findOrFail($medicine_id);

        $cart = Cart::where('user_id', $this->userId())
            ->where('medicine_id', $medicine_id)
            ->first();

        if ($cart) {
            // ✅ sudah ada → tambah qty
            $cart->increment('quantity');
        } else {
            // ✅ belum ada → buat baru
            Cart::create([
                'user_id' => $this->userId(),
                'medicine_id' => $medicine_id,
                'quantity' => 1,
            ]);
        }

        return back()->with('success', 'Produk ditambahkan ke keranjang');
    }

    // Tambah qty (+)
    public function increase($id)
    {
        $cart = Cart::findOrFail($id);
        $cart->increment('quantity');

        return back();
    }

    // Kurangi qty (-)
    public function decrease($id)
    {
        $cart = Cart::findOrFail($id);

        if ($cart->quantity > 1) {
            $cart->decrement('quantity');
        }

        return back();
    }

    // Hapus item
    public function remove($id)
    {
        Cart::destroy($id);
        return back();
    }
}
