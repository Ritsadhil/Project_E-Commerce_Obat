<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function(){
    return view('front-page.home');
});

Route::get('/tambahobat', function(){
    $obat = (object) [
        'id' => '',
        'nama_obat' => '',
        'kategori' => '',
        'harga' => '',
        'stok' => '',
        'deskripsi' => '',
        'gambar' => null,
    ];
    return view('back-pages.tambahobat', compact('obat'));
});

Route::get('/editobat', function(){
    $obat = (object) [
        'id' => 1,
        'nama_obat' => 'Paracetamol',
        'kategori' => 'Pil',
        'harga' => 5000,
        'stok' => 100,
        'deskripsi' => 'Obat untuk demam dan nyeri',
        'gambar' => 'paracetamol.jpg',
    ];
    return view('back-pages.editobat', compact('obat'));
});