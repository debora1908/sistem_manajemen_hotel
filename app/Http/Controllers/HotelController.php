<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi; // Pastikan model ini sudah di-import

class HotelController extends Controller
{
    public function dashboard()
    {
    // 1. Ambil semua data reservasi terbaru untuk tabel log
    $reservasis = Reservasi::orderBy('created_at', 'desc')->get();

    // 2. Hitung statistik untuk data di info card dashboard
    $totalKamar = 50; // Angka total kamar hotel kamu
    $reservasiAktif = Reservasi::where('status', 'Pending')->count(); 
    $kamarTersedia = $totalKamar - $reservasiAktif;

    
    return view('dashboard', compact('reservasis', 'totalKamar', 'kamarTersedia', 'reservasiAktif'));
}
}