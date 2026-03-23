<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

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

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});