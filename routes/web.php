<?php

use App\Models\Medicine;
use App\Http\Controllers\MedicineController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\HomeController;

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
