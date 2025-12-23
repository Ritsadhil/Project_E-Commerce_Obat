<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;
use App\Models\Cart;

class CartController extends Controller
{
    public function add(Request $request, $id)
    {
        $medicine = Medicine::findOrFail($id);

        Cart::create([
                'user_id' => 1,
                'medicine_id' => $medicine->id,
                'quantity' => 1
            ]);

         return redirect()->route('keranjang')
            ->with('success', 'Produk ditambahkan ke keranjang');
    }

    public function index()
    {
        $carts = Cart::with('medicine')->get();
        return view('keranjang', compact('carts'));
    }
}
