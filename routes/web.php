<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| 1. ROUTE PUBLIC / TAMU HOTEL
|--------------------------------------------------------------------------
*/

// Halaman Utama / Landing Page
Route::get('/', function () {
    return view('welcome'); 
})->name('home');

// PERBAIKAN: Sekarang diarahkan ke ReservasiController agar data $kamars ikut terbawa ke View
Route::get('/reservasi', [ReservasiController::class, 'index'])->name('reservasi.index');

// PERBAIKAN: Diarahkan ke fungsi store() di ReservasiController yang tadi sudah kita rapikan
Route::post('/reservasi', [ReservasiController::class, 'store'])->name('reservasi.store');


/*
|--------------------------------------------------------------------------
| 2. ROUTE AUTENTIKASI (LOGIN & LOGOUT)
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.proses');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


/*
|--------------------------------------------------------------------------
| 3. ROUTE DASHBOARD & MANAJEMEN ADMIN
|--------------------------------------------------------------------------
*/

// Halaman Utama Dashboard Ringkasan Hotel Admin
Route::get('/dashboard', [HotelController::class, 'dashboard'])->name('dashboard');

// Halaman Tabel Daftar Reservasi Tamu
Route::get('/reservasi/daftar', function () {
    return view('reservasi.daftar');
})->name('reservasi.daftar');

// Halaman Admin Reservasi (Sudah benar mengarah ke ReservasiController)
Route::get('/admin/reservasi', [ReservasiController::class, 'adminIndex'])->name('reservasi.admin');

// Data Kamar (Route Lain dari HotelController)
Route::get('/data-kamar', [HotelController::class, 'dataKamar'])->name('kamar');


/*
|--------------------------------------------------------------------------
| 4. ROUTE CRUD KAMAR (MANAJEMEN KAMAR)
|--------------------------------------------------------------------------
*/
Route::get('/kamar', [KamarController::class, 'index'])->name('kamar.index');
Route::get('/kamar/create', [KamarController::class, 'create'])->name('kamar.create');
Route::post('/kamar/store', [KamarController::class, 'store'])->name('kamar.store');
Route::get('/kamar/{id}/edit', [KamarController::class, 'edit'])->name('kamar.edit');
Route::put('/kamar/{id}', [KamarController::class, 'update'])->name('kamar.update');
Route::delete('/kamar/{id}', [KamarController::class, 'destroy'])->name('kamar.destroy');
Route::get('/villas', function () {
    return view('villas.index');
})->name('villas.index');
Route::get('/beach-club', function () {
    return view('beach-club.index');
})->name('beachclub.index');