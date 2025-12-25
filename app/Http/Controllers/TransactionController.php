<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        // Ambil transaksi + data user pemiliknya
        $transactions = Transaction::with('user')->latest()->get();

        // Pastikan path view-nya benar: 'back-pages.pesanan'
        return view('back-pages.pesanan', compact('transactions'));
    }
}
