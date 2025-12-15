<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

//front pages
Route::get('/home', function () {
    return view('front pages/home' , ['title' => 'Home']);
});

//back pages

