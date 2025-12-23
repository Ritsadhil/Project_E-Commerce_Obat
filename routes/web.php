<?php

use App\Http\Controllers\MedicineController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;

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

Route::get('/keranjang', [CartController::class, 'index'])
    ->name('keranjang');

Route::post('/keranjang/tambah/{id}', [CartController::class, 'add'])
    ->name('keranjang.tambah');
