<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Reservasi; // <--- INI PENTING: Harus di-import agar tidak error lagi!

class ReservasiController extends Controller
{
    // 1. Tampilan Form Tamu & Tabel Riwayat Di Bawahnya
    public function index()
    {
        // Ambil data kamar untuk dropdown select
        $kamars = DB::table('kamars')->get(); 

        try {
            // Kita pakai standard query builder untuk mengambil data reservasi
            $reservasis = DB::table('reservasis')->orderBy('created_at', 'desc')->get();
        } catch (\Exception $e) {
            // Jika database/tabel bermasalah, kirim data kosong agar tidak crash
            $reservasis = collect([]);
        }

        return view('reservasi.index', compact('kamars', 'reservasis'));
    }

    // 2. Simpan Data Reservasi ke Database
    public function store(Request $request)
    {
        // 1. Validasi Input Form HTML
        $request->validate([
            'nama_tamu' => 'required|string|max:255',
            'email' => 'required|email',
            'kamar_id' => 'required|string', 
            'tanggal_checkin' => 'required|date',
            'tanggal_checkout' => 'required|date|after_or_equal:tanggal_checkin',
        ]);

        // 2. Logika Penentuan Harga Kamar
        if ($request->kamar_id == 'excecutif') {
            $hargaPerMalam = 1500000;
            $namaKamarTampil = 'Excecutif Room';
        } elseif ($request->kamar_id == 'deluxe') {
            $hargaPerMalam = 1000000;
            $namaKamarTampil = 'Deluxe Room';
        } else {
            $hargaPerMalam = 500000;
            $namaKamarTampil = 'Standard Room';
        }

        // 3. Hitung Durasi Menginap
        $checkin = new \DateTime($request->tanggal_checkin);
        $checkout = new \DateTime($request->tanggal_checkout);
        $durasi = $checkin->diff($checkout)->days;
        if ($durasi == 0) $durasi = 1;

        $totalBayar = $hargaPerMalam * $durasi;

        // 4. Simpan Data (Nama kolom disesuaikan persis dengan file Migrasi kamu)
        Reservasi::create([
            'tamu'          => $request->nama_tamu,       // Kolom DB: tamu
            'email'         => $request->email,          // Kolom DB: email
            'kamar'         => $namaKamarTampil,         // Kolom DB: kamar
            'check_in'      => $request->tanggal_checkin,  // Kolom DB: check_in
            'check_out'     => $request->tanggal_checkout, // Kolom DB: check_out
            'total_bayar'   => $totalBayar,              // Kolom DB: total_bayar
            'status'        => 'Pending'                 // Kolom DB: status
        ]);

        return redirect()->route('reservasi.index')->with('success', 'Reservasi berhasil dibuat!');
    }

    // 3. Halaman Tampilan Riwayat Tabel Khusus Admin
    public function adminIndex()
    {
        try {
            $reservasis = DB::table('reservasis')->orderBy('created_at', 'desc')->get();
        } catch (\Exception $e) {
            $reservasis = collect([]);
        }
        
        return view('reservasi.admin', compact('reservasis'));
    }
}