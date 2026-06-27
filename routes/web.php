<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ReservasiController;

// 1. Halaman Utama / Landing Page (Gambar Mockup 1)
// Diubah dari 'index' ke 'reservasi.welcome' agar sesuai dengan struktur welcome baru Anda
Route::get('/', function () {
    return view('welcome'); 
})->name('home');

// 2. Halaman Form Reservasi (Gambar Mockup 2)
Route::get('/reservasi', function () {
    return view('reservasi.index'); 
})->name('reservasi.index');

// Proses Kiriman Data Form Reservasi (Tombol "Pesan Sekarang" -> Simpan ke DB -> Lempar ke Dashboard)
Route::post('/reservasi', [HotelController::class, 'simpanReservasi'])->name('reservasi.store');

// 3. Halaman Dashboard Ringkasan Hotel Admin (Gambar Mockup 3)
Route::get('/dashboard', [HotelController::class, 'dashboard'])->name('dashboard');


// --- Route Tambahan / Manajemen Intern ---

// Halaman Tabel Daftar Reservasi Tamu
Route::get('/reservasi/daftar', function () {
    return view('reservasi.daftar');
})->name('reservasi.daftar');

// Halaman Kamar
Route::get('/kamar', [KamarController::class, 'index']);
Route::get('/data-kamar', [HotelController::class, 'dataKamar'])->name('kamar');
Route::get('/admin/reservasi', [ReservasiController::class, 'adminIndex'])->name('reservasi.admin');
Route::get('/kamar/create', [KamarController::class, 'create'])->name('kamar.create');

Route::post('/kamar/store', [KamarController::class, 'store'])->name('kamar.store');
Route::get('/kamar', [KamarController::class, 'index'])->name('kamar.index');

// 2. Jalur Form Tambah & Proses Simpan (Create)
Route::get('/kamar/create', [KamarController::class, 'create'])->name('kamar.create');
Route::post('/kamar/store', [KamarController::class, 'store'])->name('kamar.store');

// 3. Jalur Form Edit & Proses Update (Update)
Route::get('/kamar/{id}/edit', [KamarController::class, 'edit'])->name('kamar.edit');
Route::put('/kamar/{id}', [KamarController::class, 'update'])->name('kamar.update');

// 4. Jalur Proses Hapus (Delete)
Route::delete('/kamar/{id}', [KamarController::class, 'destroy'])->name('kamar.destroy');