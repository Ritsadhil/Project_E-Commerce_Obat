<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('user', 'details.medicine')->latest()->get();
        return view('back-pages.pesanan', compact('transactions'));
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
        $transactions = Transaction::where('user_id', auth()->id())->with('details.medicine')->latest()->get();
        return view('front-pages.riwayat', compact('transactions'));
    }

    public function cancel(Request $request, $id)
    {
        $transaction = Transaction::where('user_id', auth()->id())->findOrFail($id);
        if ($transaction->status !== 'dikemas') {
            return redirect()->back()->with('error', 'Pesanan tidak dapat dibatalkan.');
        }
        $transaction->status = 'dibatalkan';
        $transaction->save();

        return redirect()->back()->with('success', 'Pesanan berhasil dibatalkan.');
    }
}
