<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservasiController extends Controller
{
    // 1. Tampilan Form Tamu
    public function index()
    {
        $kamars = DB::table('kamars')->get(); 
        return view('reservasi.index', compact('kamars'));
    }

    // 2. Simpan Data Reservasi ke Database
    public function store(Request $request)
    {
        $request->validate([
            'nama_tamu' => 'required|string',
            'email_tamu' => 'required|email',
            'kamar_id' => 'required',
            'tanggal_checkin' => 'required|date',
            'tanggal_checkout' => 'required|date',
        ]);

        DB::table('reservasis')->insert([
            'nama_tamu' => $request->nama_tamu,
            'email_tamu' => $request->email_tamu,
            'kamar_id' => $request->kamar_id,
            'tanggal_checkin' => $request->tanggal_checkin,
            'tanggal_checkout' => $request->tanggal_checkout,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('reservasi.admin')->with('success', 'Reservasi berhasil dibuat!');
    }

    // 3. Halaman Tampilan Riwayat Tabel untuk Admin
    public function adminIndex()
    {
        $reservasis = DB::table('reservasis')
            ->join('kamars', 'reservasis.kamar_id', '=', 'kamars.id')
            ->select('reservasis.*', 'kamars.nomor_kamar', 'kamars.tipe_kamar', 'kamars.harga_per_malam')
            ->get();

        return view('reservasi.admin', compact('reservasis'));
    }
}