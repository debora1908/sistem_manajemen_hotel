<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KamarController;

// Halaman Utama
Route::get('/', function () {
    return view('welcome');
});

// Halaman Reservasi
Route::get('/reservasi', function () {
    return view('reservasi.index');
})->name('reservasi.index');

// Halaman Kamar
Route::get('/kamar', [KamarController::class, 'index']);