<?php

use App\Http\Controllers\MedicineController;
use Illuminate\Support\Facades\Route;

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

