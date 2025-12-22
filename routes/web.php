<?php

use App\Http\Controllers\MedicineController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;

Route::get('/', function () {
    return view('front-pages.home');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/home', function () {
    return view('front-pages.home');
});

Route::get('/dashboard/obat', [MedicineController::class, 'index'])->name('obat.index');
Route::get('/dashboard/obat/{slug}', [MedicineController::class, 'show'])->name('obat.show');
Route::get('/dashboard/pesanan', [TransactionController::class, 'index'])->name('pesanan.index');


Route::get('/obat/create', [MedicineController::class, 'create'])->name('obat.create');
Route::post('/obat', [MedicineController::class, 'store'])->name('obat.store');
Route::get('/obat/{id}/edit', [MedicineController::class, 'edit'])->name('obat.edit');
Route::put('/obat/{id}', [MedicineController::class, 'update'])->name('obat.update');
