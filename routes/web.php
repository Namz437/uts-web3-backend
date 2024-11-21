<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SettingDiskonController;
use App\Http\Controllers\SettingKategoriKontrakanController;
use App\Http\Controllers\SettingKontrakanController;
use App\Http\Controllers\SettingPesananController;
use App\Http\Controllers\SettingUserController;

// login page admin
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');

// proses login admin
Route::post('proseslogin', [LoginController::class, 'prosesLogin'])->name('proseslogin');

// log out admin
Route::get('logout', [LoginController::class, 'proseslogout'])->name('logout')->middleware('auth');

// Dashboard Admin 
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

// All Setting resource Admin
Route::resource('/kategorikontrakan', SettingKategoriKontrakanController::class);
Route::resource('/kontrakan', SettingKontrakanController::class);
Route::resource('/pesanan', SettingPesananController::class);
Route::resource('/diskon', SettingDiskonController::class);
Route::resource('/users', SettingUserController::class);
