<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/deals', function () {
    return view('deals');
})->name('deals');;

// Add name() to the menu route
Route::get('/menu', function () {
    return view('menu');
})->name('menu');  // This is the crucial change

Route::get('/home', function () {
    return view('home');
})->name('deal');

Route::get('/QR', function () {
    return view('qr');
});
