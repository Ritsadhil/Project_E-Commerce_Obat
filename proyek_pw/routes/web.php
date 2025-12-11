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
Route::get('/login', function () {
    return view('back pages/login' , ['title' => 'Login']);
});
