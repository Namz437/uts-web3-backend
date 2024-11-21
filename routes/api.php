<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// register hit api
Route::post('/register', App\Http\Controllers\Api\RegisterController::class)->name('register');

// login hit api
Route::post('/login', App\Http\Controllers\Api\LoginController::class)->name('login');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
    
// log out hit api
Route::post('/logout', App\Http\Controllers\Api\LogoutController::class)->name('logout');

// kontrakan hit api
Route::apiResource('/kontrakan', App\Http\Controllers\Api\KontrakanController::class);

Route::resource('/pesanan', App\Http\Controllers\Api\PesananController::class);

Route::resource('/diskon', App\Http\Controllers\Api\DiskonController::class);
