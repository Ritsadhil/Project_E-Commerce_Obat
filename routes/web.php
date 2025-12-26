<?php

use App\Models\Medicine;
use App\Http\Controllers\MedicineController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/produk/{slug}', [HomeController::class, 'show'])->name('front.product.show');

Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/login', [LoginController::class, 'show'])->name('login.show');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->route('obat.index');
    });
    Route::get('/dashboard/obat', [MedicineController::class, 'index'])->name('obat.index');
    Route::get('/dashboard/obat/pdf', [MedicineController::class, 'pdf'])->name('obat.pdf');
    Route::get('/dashboard/obat/{slug}', [MedicineController::class, 'show'])->name('obat.show');
    Route::get('/dashboard/pesanan', [TransactionController::class, 'index'])->name('pesanan.index');
    Route::patch('/dashboard/pesanan/{id}/update-status', [TransactionController::class, 'updateStatus'])->name('pesanan.updateStatus');

    Route::get('/obat/create', [MedicineController::class, 'create'])->name('obat.create');
    Route::post('/obat', [MedicineController::class, 'store'])->name('obat.store');
    Route::get('/obat/{id}/edit', [MedicineController::class, 'edit'])->name('obat.edit');
    Route::put('/obat/{id}', [MedicineController::class, 'update'])->name('obat.update');
    Route::delete('/obat/{id}', [MedicineController::class, 'destroy'])->name('obat.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{medicine_id}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update/{cart_id}', [CartController::class, 'update'])->name('cart.update');
    Route::post('/cart/remove/{cart_id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('/checkout', [CartController::class, 'checkoutPage'])->name('checkout.page');
    Route::post('/checkout/process', [CartController::class, 'checkoutProcess'])->name('checkout.process');
    Route::post('/checkout', [TransactionController::class, 'checkout'])->middleware('auth')->name('checkout');

    Route::put('/dashboard/pesanan/{id}/update', [TransactionController::class, 'updateStatus'])->middleware('auth')->name('pesanan.update');
});
