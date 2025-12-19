<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObatController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function(){
    return view('front-page.home');
});

Route::get('/tambahobat', [ObatController::class, 'create']);
Route::post('/obat', [ObatController::class, 'store']);
Route::get('/obat', [ObatController::class, 'index']);
Route::get('/obat/{id}/edit', [ObatController::class, 'edit']);
Route::put('/obat/{id}', [ObatController::class, 'update']);
Route::delete('/obat/{id}', [ObatController::class, 'destroy']);