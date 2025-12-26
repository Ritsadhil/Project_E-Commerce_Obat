<?php

use App\Models\Medicine;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    $medicines = Medicine::all();
    return view('front-pages.home', compact('medicines'));
})->name('home');

Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/login', [LoginController::class, 'show'])->name('login.show');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/dashboard/obat', [MedicineController::class, 'index'])->name('obat.index');
Route::get('/dashboard/obat/{slug}', [MedicineController::class, 'show'])->name('obat.show');
Route::get('/dashboard/pesanan', [TransactionController::class, 'index'])->name('pesanan.index');


Route::get('/obat/create', [MedicineController::class, 'create'])->name('obat.create');
Route::post('/obat', [MedicineController::class, 'store'])->name('obat.store');
Route::get('/obat/{id}/edit', [MedicineController::class, 'edit'])->name('obat.edit');
Route::put('/obat/{id}', [MedicineController::class, 'update'])->name('obat.update');
Route::get('/obat', [MedicineController::class, 'index'])->name('obat.index');
Route::get('/obat/{slug}', [MedicineController::class, 'show'])->name('obat.show');
Route::get('/search', [MedicineController::class, 'search'])->name('obat.search');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{medicine_id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{cart_id}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove/{cart_id}', [CartController::class, 'remove'])->name('cart.remove');


// ---------------- TRANSACTION ----------------
Route::middleware('auth')->group(function () {
    // User lihat semua transaksi
    Route::get('/dashboard/pesanan', [TransactionController::class, 'index'])->name('pesanan.index');

    // User lihat detail transaksi
    Route::get('/dashboard/pesanan/{id}', [TransactionController::class, 'show'])->name('pesanan.show');

    // Opsional: update status transaksi (admin)
    Route::post('/dashboard/pesanan/{id}/status', [TransactionController::class, 'updateStatus'])->name('pesanan.updateStatus');
});
