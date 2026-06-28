<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi; // Pastikan Anda sudah membuat Model Reservation

class HotelController extends Controller
{
    // Fungsi untuk menerima data POST dari form (Gambar 2)
    public function simpanReservasi(Request $request)
    {
        // 1. Validasi Data inputan form
        $request->validate([
            'tamu' => 'required|string',
            'kamar' => 'required|string',
            'check_in' => 'required|date',
            'check_out' => 'required|date',
        ]);

        // 2. Simpan ke Database
        // Sesuaikan nama kolomnya dengan migration tabel Anda
        Reservasi::create([
            'tamu'      => $request->tamu,
            'kamar'     => $request->kamar,
            'check_in'  => $request->check_in,
            'check_out' => $request->check_out,
            'total_bayar' => 1500000, // Nilai default sesuai mockup gambar 3
            'status'    => 'Lunas',   // Nilai default sesuai mockup gambar 3
        ]);

        // 3. Alihkan langsung ke halaman Dashboard (Gambar 3)
        return redirect()->route('dashboard')->with('success', 'Reservasi Berhasil!');
    }

    // Fungsi untuk menampilkan Dashboard Admin (Gambar 3)
    public function dashboard()
    {
        // Ambil semua data reservasi terbaru dari database
        $reservations = Reservasi::latest()->get();

        // Hitung logika angka widget box secara dinamis berdasarkan data masuk
        $totalKamar     = 50;
        $reservasiAktif = 15 + $reservations->count(); 
        $kamarTersedia  = 35 - $reservations->count();

        // Kirim data ke blade dashboard
        return view('dashboard', compact('reservations', 'kamarTersedia', 'reservasiAktif'));
    }
}