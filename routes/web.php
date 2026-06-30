<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\AuthController;

// Halaman Utama / Landing Page
Route::get('/', function () {
    return view('welcome'); 
})->name('home');

// Halaman Form Reservasi Kamar (Langsung panggil view karena opsi kamar sudah manual)
Route::get('/reservasi', function () {
    return view('reservasi.index'); 
})->name('reservasi.index');

// Proses Kiriman Data Form Reservasi (Tombol "Pesan Sekarang")
Route::post('/reservasi', [ReservasiController::class, 'store'])->name('reservasi.store');


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.proses');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');




// Halaman Utama Dashboard Ringkasan Hotel Admin
Route::get('/dashboard', [HotelController::class, 'dashboard'])->name('dashboard');

// Halaman Tabel Daftar Reservasi Tamu
Route::get('/reservasi/daftar', function () {
    return view('reservasi.daftar');
})->name('reservasi.daftar');

// Mengarahkan langsung ke file views/admin/dashboard.blade.php
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

// Halaman Admin Reservasi
Route::get('/admin/reservasi', [ReservasiController::class, 'adminIndex'])->name('reservasi.admin');

// Data Kamar
Route::get('/data-kamar', [HotelController::class, 'dataKamar'])->name('kamar');


Route::prefix('admin')->as('admin.')->group(function() {

    // Tampil Semua Kamar -> Berubah nama menjadi: admin.kamar.index
    Route::get('/kamar', [KamarController::class, 'index'])->name('kamar.index');

    // Form Tambah Kamar & Proses Simpan -> Berubah nama menjadi: admin.kamar.create & admin.kamar.store
    Route::get('/kamar/create', [KamarController::class, 'create'])->name('kamar.create');
    Route::post('/kamar/store', [KamarController::class, 'store'])->name('kamar.store');

    // Form Edit Kamar & Proses Update -> Berubah nama menjadi: admin.kamar.edit & admin.kamar.update
    Route::get('/kamar/{id}/edit', [KamarController::class, 'edit'])->name('kamar.edit');
    Route::put('/kamar/{id}', [KamarController::class, 'update'])->name('kamar.update');

    // Proses Hapus Kamar -> Berubah nama menjadi: admin.kamar.destroy
    Route::delete('/kamar/{id}', [KamarController::class, 'destroy'])->name('kamar.destroy');

});


Route::get('/villas', function () {
    return view('villas.index');
})->name('villas.index');

Route::get('/beach-club', function () {
    return view('beach-club.index');
})->name('beachclub.index');

Route::get('/wellness', function () {
    return view('wellness.index');
})->name('wellness.index');
Route::get('/booking/pembayaran/{id}', [BookingController::class, 'pembayaran'])->name('booking.pembayaran');

// Route untuk memproses aksi tombol "Saya Sudah Transfer"
Route::post('/booking/konfirmasi/{id}', [BookingController::class, 'konfirmasi'])->name('booking.konfirmasi');