<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservasiController extends Controller
{
    // 1. Tampilan Form Tamu & Tabel Riwayat Di Bawahnya
    public function index()
    {
        // Ambil data kamar untuk dropdown select
        $kamars = DB::table('kamars')->get(); 

        // Mengambil data reservasi aman (menggunakan standard Query Builder)
        // Jika tabel 'reservasis' belum ada di database, kita amankan agar tidak bikin crash halaman
        try {
            $reservasis = DB::table('reservasis')
                ->join('kamars', 'reservasis.kamar_id', '=', 'kamars.id')
                ->select('reservasis.*', 'kamars.nomor_kamar', 'kamars.tipe_kamar', 'kamars.harga_per_malam')
                ->get();
        } catch (\Exception $e) {
            // Jika database/tabel bermasalah, kirim data kosong agar tampilan form reservasi tetap muncul aman
            $reservasis = collect([]);
        }

        return view('reservasi.index', compact('kamars', 'reservasis'));
    }

    // 2. Simpan Data Reservasi ke Database
    public function store(Request $request)
    {
        $request->validate([
            'nama_tamu'        => 'required|string|max:255',
            'email'            => 'required|email', 
            'kamar_id'         => 'required',
            'tanggal_checkin'  => 'required|date',
            'tanggal_checkout' => 'required|date|after_or_equal:tanggal_checkin', 
        ]);

        DB::table('reservasis')->insert([
            'nama_tamu'        => $request->nama_tamu,
            'email_tamu'       => $request->email, 
            'kamar_id'         => $request->kamar_id,
            'tanggal_checkin'  => $request->tanggal_checkin,
            'tanggal_checkout' => $request->tanggal_checkout,
            'created_at'       => now(),
            'updated_at'       => now(),
        ]);

        return redirect()->route('reservasi.index')->with('success', 'Reservasi berhasil dibuat!');
    }

    // 3. Halaman Tampilan Riwayat Tabel Khusus Admin
    public function adminIndex()
    {
        try {
            $reservasis = DB::table('reservasis')
                ->join('kamars', 'reservasis.kamar_id', '=', 'kamars.id')
                ->select('reservasis.*', 'kamars.nomor_kamar', 'kamars.tipe_kamar', 'kamars.harga_per_malam')
                ->get();
        } catch (\Exception $e) {
            $reservasis = collect([]);
        }
        
        return view('reservasi.admin', compact('reservasis'));
    }
}