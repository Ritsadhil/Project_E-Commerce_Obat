<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionDetail;

class TransactionController extends Controller
{
    private function userId()
    {
        return 1;
    }

    // HALAMAN CHECKOUT
    public function checkoutPage()
    {
        $carts = Cart::with('medicine')
            ->where('user_id', $this->userId())
            ->get();

        return view('checkout', compact('carts'));
    }

    // PROSES CHECKOUT
    public function checkout(Request $request)
    {
        $userId = $this->userId();

        $carts = Cart::with('medicine')
            ->where('user_id', $userId)
            ->get();

        if ($carts->isEmpty()) {
            return back()->with('error', 'Keranjang kosong');
        }

        $totalPrice = $carts->sum(fn ($cart) =>
            $cart->medicine->price * $cart->quantity
        );

        $transaction = Transaction::create([
            'user_id'          => $userId,
            'transaction_date' => now(),
            'total_price'      => $totalPrice,
            'shipping_address' => $request->shipping_address ?? '-',
            'status'           => 'dikemas',
        ]);

        foreach ($carts as $cart) {
            TransactionDetail::create([
                'transaction_id' => $transaction->id,
                'medicine_id'    => $cart->medicine_id,
                'quantity'       => $cart->quantity,
                'price'          => $cart->medicine->price,
            ]);
        }

        Cart::where('user_id', $userId)->delete();

        return redirect()->route('pesanan.detail', $transaction->id);
    }

    // DETAIL PESANAN
    public function show($id)
    {
        $transaction = Transaction::with('details.medicine')
            ->where('id', $id)
            ->where('user_id', $this->userId())
            ->firstOrFail();

        return view('back-page.detail-pesanan', compact('transaction'));
    }
}

