<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\TransactionDetail;

class TransactionController extends Controller
{


    public function index()
    {
        $transactions = Transaction::with('details.medicine', 'user')
            ->latest()
            ->get();

        return view('back-pages.pesanan', compact('transactions'));
    }

    public function checkout(Request $request)
    {
        $userId = Auth::id();

        $carts = Cart::with('medicine')
            ->where('user_id', $userId)
            ->get();

        if ($carts->isEmpty()) {
            return back()->with('error', 'Keranjang masih kosong');
        }

        // Hitung total harga
        $total = $carts->sum(fn($cart) => $cart->medicine->price * $cart->quantity);

        // Buat transaksi
        $transaction = Transaction::create([
            'user_id'          => $userId,
            'transaction_date' => now(),
            'total_price'      => $total,
            'shipping_address' => $request->shipping_address ?? 'Alamat Default',
            'status'           => 'dikemas',
        ]);

        // Buat detail transaksi
        foreach ($carts as $cart) {
            TransactionDetail::create([
                'transaction_id' => $transaction->id,
                'medicine_id'    => $cart->medicine_id,
                'quantity'       => $cart->quantity,
                'price'          => $cart->medicine->price,
            ]);
        }

        // Kosongkan cart
        Cart::where('user_id', $userId)->delete();

        return redirect()->route('pesanan.index')
            ->with('success', 'Checkout berhasil');
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:dikemas,dikirim,diterima,dibatalkan'
        ]);

        $transaction = Transaction::findOrFail($id);
        $transaction->status = $request->status;
        $transaction->save();

        return redirect()->back()->with('success', 'Status pesanan berhasil diperbarui!');
    }
    public function history()
    {
        $transactions = Transaction::with('details.medicine')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('front-pages.riwayat', compact('transactions'));
    }
}
