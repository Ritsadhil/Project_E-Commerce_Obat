<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Medicine;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Http;

class CartController extends Controller
{
    // Tampilkan semua item di keranjang user
    public function index()
    {
        $carts = Cart::where('user_id', Auth::id())
            ->with('medicine')
            ->get();

        return view('front-pages.keranjang', compact('carts'));
    }

    // Tambah produk ke keranjang
    public function add(Request $request, $medicine_id)
    {
        $medicine = Medicine::findOrFail($medicine_id);

        $cartItem = Cart::where('user_id', Auth::id())
            ->where('medicine_id', $medicine_id)
            ->first();

        if ($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'medicine_id' => $medicine_id,
                'quantity' => 1
            ]);
        }

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    // Update quantity (+/-)
    public function update(Request $request, $cart_id)
    {
        $cartItem = Cart::findOrFail($cart_id);
        $quantity = max(1, (int) $request->quantity); // minimal 1
        $cartItem->quantity = $quantity;
        $cartItem->save();

        return redirect()->back()->with('success', 'Quantity berhasil diperbarui!');
    }

    // Hapus item dari keranjang
    public function remove($cart_id)
    {
        $cartItem = Cart::findOrFail($cart_id);
        $cartItem->delete();

        return redirect()->back()->with('success', 'Produk berhasil dihapus dari keranjang!');
    }

    public function checkoutPage()
    {
        $carts = Cart::where('user_id', Auth::id())->with('medicine')->get();
        if ($carts->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Keranjang kosong!');
        }
        return view('front-pages.checkout', compact('carts'));
    }

    public function checkoutProcess(Request $request)
    {
        $carts = Cart::where('user_id', Auth::id())->with('medicine')->get();

        if ($carts->isEmpty()) {
            return redirect()->back()->with('error', 'Keranjang kosong!');
        }

        $total = 0;
        foreach ($carts as $c) {
            $total += ($c->medicine->price * $c->quantity);
        }

        $transaction = Transaction::create([
            'user_id' => Auth::id(),
            'transaction_date' => now(),
            'total_price' => $total,
            'shipping_address' => $request->shipping_address ?? 'Alamat Default',
            'status' => 'dikemas',
        ]);

        foreach ($carts as $cart) {
            TransactionDetail::create([
                'transaction_id' => $transaction->id,
                'medicine_id' => $cart->medicine_id,
                'quantity' => $cart->quantity,
                'price' => $cart->medicine->price,
            ]);
        }

        Cart::where('user_id', Auth::id())->delete();
        return redirect()->route('riwayat')->with('success', 'Checkout berhasil!');
    }
}
