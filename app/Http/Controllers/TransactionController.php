<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionDetail;

class TransactionController extends Controller
{
    public function __construct()
    {
        // Pastikan user harus login
        $this->middleware('auth');
    }

    /**
     * List semua transaksi user
     */
    public function index()
    {
        $transactions = Transaction::with('details.medicine')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('back-pages.pesanan', compact('transactions'));
    }

    /**
     * Detail satu transaksi
     */
    public function show($id)
    {
        $transaction = Transaction::with('details.medicine', 'user')
            ->where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('back-pages.pesanan-detail', compact('transaction'));
    }

    /**
     * Checkout cart → transaksi
     */
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
            'shipping_address' => $request->shipping_address ?? '-',
            'status'           => 'packing', // 'packing', 'shipping', 'completed', 'cancelled'
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

    /**
     * Update status transaksi (opsional, misal admin)
     */
    public function updateStatus(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->status = $request->status;
        $transaction->save();

        return back()->with('success', 'Status transaksi diperbarui');
    }
}
