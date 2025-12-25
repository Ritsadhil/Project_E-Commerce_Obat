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
}
