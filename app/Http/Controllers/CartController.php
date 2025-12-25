<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use App\Models\Medicine;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Tampilkan semua item di keranjang user
    public function index()
    {
        $carts = TransactionDetail::where('user_id', Auth::id())
            ->whereNull('transaction_id') // hanya item yang belum checkout
            ->with('medicine')
            ->get();

        return view('cart', compact('carts'));
    }

    // Tambah produk ke keranjang
    public function add(Request $request, $medicine_id)
    {
        $medicine = Medicine::findOrFail($medicine_id);

        // cek apakah sudah ada di keranjang
        $cartItem = TransactionDetail::where('user_id', Auth::id())
            ->where('medicine_id', $medicine_id)
            ->whereNull('transaction_id')
            ->first();

        if ($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            TransactionDetail::create([
                'user_id' => Auth::id(),
                'medicine_id' => $medicine_id,
                'quantity' => 1,
                'price' => $medicine->price,
            ]);
        }

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    // Update quantity (+/-)
    public function update(Request $request, $cart_id)
    {
        $cartItem = TransactionDetail::findOrFail($cart_id);
        $quantity = max(1, (int) $request->quantity); // minimal 1
        $cartItem->quantity = $quantity;
        $cartItem->save();

        return redirect()->back()->with('success', 'Quantity berhasil diperbarui!');
    }

    // Hapus item dari keranjang
    public function remove(Request $request, $cart_id)
    {
        $cartItem = TransactionDetail::findOrFail($cart_id);
        $cartItem->delete();

        return redirect()->back()->with('success', 'Produk berhasil dihapus dari keranjang!');
    }

    // Checkout semua item
    public function checkout(Request $request)
    {
        $user_id = Auth::id();

        $carts = TransactionDetail::where('user_id', $user_id)
            ->whereNull('transaction_id')
            ->get();

        if ($carts->isEmpty()) {
            return redirect()->back()->with('error', 'Keranjang kosong!');
        }

        $total = $carts->sum(fn($cart) => $cart->price * $cart->quantity);

        $transaction = Transaction::create([
            'user_id' => $user_id,
            'transaction_date' => now(),
            'total_price' => $total,
            'shipping_address' => $request->shipping_address ?? '-',
            'status' => 'dikemas',
        ]);

        // tandai cart item menjadi bagian transaksi
        foreach ($carts as $cart) {
            $cart->transaction_id = $transaction->id;
            $cart->save();
        }

        return redirect()->route('cart.index')->with('success', 'Checkout berhasil! Transaksi dibuat.');
    }
}
