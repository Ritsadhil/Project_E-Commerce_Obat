<?php

use App\Http\Controllers\MedicineController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TransactionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/produk/{slug}', [MedicineController::class, 'show'])
    ->name('produk.detail');


Route::get('/keranjang', [CartController::class, 'index'])->name('keranjang');
Route::post('/keranjang/tambah/{id}', [CartController::class, 'add'])->name('keranjang.tambah');
Route::patch('/keranjang/{id}/tambah', [CartController::class, 'increase'])->name('keranjang.increase');
Route::patch('/keranjang/{id}/kurang', [CartController::class, 'decrease'])->name('keranjang.decrease');
Route::delete('/keranjang/{id}', [CartController::class, 'remove'])->name('keranjang.remove');

Route::get('/checkout', [TransactionController::class, 'checkoutPage'])
    ->name('checkout.page');

Route::post('/checkout', [TransactionController::class, 'checkout'])
    ->name('checkout');

Route::get('/pesanan/{id}', [TransactionController::class, 'show'])
    ->name('pesanan.detail');