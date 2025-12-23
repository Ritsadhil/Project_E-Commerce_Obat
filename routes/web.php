<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\MedicineController;

Route::get('/', function () {
    return view('front-pages.home');
})->name('front-pages.home');


// Auth
Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/login', [LoginController::class, 'show'])->name('login.show');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/obat', [MedicineController::class, 'index'])->name('obat.index');
Route::get('/obat/{slug}', [MedicineController::class, 'show'])->name('obat.show');
Route::get('/search', [MedicineController::class, 'search'])->name('obat.search');
