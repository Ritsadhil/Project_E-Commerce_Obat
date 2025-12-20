<?php

use App\Http\Controllers\MedicineController;
use Illuminate\Support\Facades\Route;

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

Route::get('/obat', [MedicineController::class, 'index'])->name('obat.index');
Route::get('/obat/{slug}', [MedicineController::class, 'show'])->name('obat.show');
