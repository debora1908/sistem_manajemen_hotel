<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Pastikan ini ada agar SQLite terbaca

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Ambil data reservasi dengan nama variabel $reservations (disamakan dengan file Blade-mu)
        $reservasi = DB::table('reservasis')
            ->orderBy('created_at', 'desc')
            ->get();

        // 2. Hitung statistik untuk card di dashboard kamu
        $kamarTersedia = DB::table('kamars')->where('status', 'Tersedia')->count();
        $reservasiAktif = DB::table('reservasis')->count();

        // 3. Kirim data ke view dashboard kamu
        return view('dashboard', compact('reservasi', 'kamarTersedia', 'reservasiAktif'));
    }<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Ambil data dari SQLite ke variabel $reservasi
        $reservasi = DB::table('reservasis')
            ->orderBy('created_at', 'desc')
            ->get();

        $kamarTersedia = DB::table('kamars')->where('status', 'Tersedia')->count();
        $reservasiAktif = DB::table('reservasis')->count();

        // 2. DI SINI KUNCI UTAMANYA: Pastikan di dalam compact ada kata 'reservasi'
        return view('dashboard', compact('reservasi', 'kamarTersedia', 'reservasiAktif'));
    }
}
}