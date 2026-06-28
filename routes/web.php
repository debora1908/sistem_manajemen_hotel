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

// Halaman Form Reservasi Kamar (Tampilan isi data)
Route::get('/reservasi', function () {
    return view('reservasi.index'); 
})->name('reservasi.index');

// Proses Kiriman Data Form Reservasi (Tombol "Pesan Sekarang")
Route::post('/reservasi', [HotelController::class, 'simpanReservasi'])->name('reservasi.store');


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
| 3. ROUTE DASHBOARD & MANAJEMEN ADMIN (Bisa ditambahkan Middleware Auth nanti)
|--------------------------------------------------------------------------
*/

// Halaman Utama Dashboard Ringkasan Hotel Admin
Route::get('/dashboard', [HotelController::class, 'dashboard'])->name('dashboard');

// Halaman Tabel Daftar Reservasi Tamu
Route::get('/reservasi/daftar', function () {
    return view('reservasi.daftar');
})->name('reservasi.daftar');

// Halaman Admin Reservasi (Melalui Controller)
Route::get('/admin/reservasi', [ReservasiController::class, 'adminIndex'])->name('reservasi.admin');

// Data Kamar (Route Lain dari HotelController)
Route::get('/data-kamar', [HotelController::class, 'dataKamar'])->name('kamar');


/*
|--------------------------------------------------------------------------
| 4. ROUTE CRUD KAMAR (MANAJEMEN KAMAR)
|--------------------------------------------------------------------------
*/
// Tampil Semua Kamar
Route::get('/kamar', [KamarController::class, 'index'])->name('kamar.index');

// Form Tambah Kamar & Proses Simpan
Route::get('/kamar/create', [KamarController::class, 'create'])->name('kamar.create');
Route::post('/kamar/store', [KamarController::class, 'store'])->name('kamar.store');

// Form Edit Kamar & Proses Update
Route::get('/kamar/{id}/edit', [KamarController::class, 'edit'])->name('kamar.edit');
Route::put('/kamar/{id}', [KamarController::class, 'update'])->name('kamar.update');

// Proses Hapus Kamar
Route::delete('/kamar/{id}', [KamarController::class, 'destroy'])->name('kamar.destroy');