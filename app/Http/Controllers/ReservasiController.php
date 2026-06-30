<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservasiController extends Controller
{
    // ===========================
    // FORM RESERVASI
    // ===========================
    public function index()
    {
        $kamars = DB::table('kamars')->get();

        try {
            $reservasis = DB::table('reservasis')
                ->join('kamars', 'reservasis.kamar_id', '=', 'kamars.id')
                ->select(
                    'reservasis.*',
                    'kamars.nomor_kamar',
                    'kamars.tipe_kamar',
                    'kamars.harga_per_malam'
                )
                ->get();
        } catch (\Exception $e) {
            $reservasis = collect([]);
        }

        return view('reservasi.index', compact('kamars', 'reservasis'));
    }

    // ===========================
    // SIMPAN RESERVASI
    // ===========================
    public function store(Request $request)
{
    $request->validate([
        'nama_tamu' => 'required|string|max:255',
        'email' => 'required|email',
        'kamar_id' => 'required|exists:kamars,id',
        'tanggal_checkin' => 'required|date',
        'tanggal_checkout' => 'required|date|after:tanggal_checkin',
        'metode_pembayaran' => 'required',
    ]);

    $reservasiId = DB::table('reservasis')->insertGetId([

        'nama_tamu' => $request->nama_tamu,

        'email_tamu' => $request->email,

        'kamar_id' => $request->kamar_id,

        'tanggal_checkin' => $request->tanggal_checkin,

        'tanggal_checkout' => $request->tanggal_checkout,

        'metode_pembayaran' => $request->metode_pembayaran,

        'status' => 'Belum Dibayar',

        'created_at' => now(),

        'updated_at' => now(),

    ]);

    return redirect()->route('pembayaran.halaman', $reservasiId);
}

    // ===========================
    // HALAMAN PEMBAYARAN
    // ===========================
    public function pembayaran($id)
    {
        $reservasi = DB::table('reservasis')
            ->join('kamars', 'reservasis.kamar_id', '=', 'kamars.id')
            ->select(
                'reservasis.*',
                'kamars.nomor_kamar',
                'kamars.tipe_kamar',
                'kamars.harga_per_malam'
            )
            ->where('reservasis.id', $id)
            ->first();

        if (!$reservasi) {
            return redirect()->route('reservasi.index')
                ->with('error', 'Data reservasi tidak ditemukan.');
        }

        $lamaMenginap = strtotime($reservasi->tanggal_checkout) - strtotime($reservasi->tanggal_checkin);

        $lamaMenginap = floor($lamaMenginap / 86400);

        if ($lamaMenginap <= 0) {
            $lamaMenginap = 1;
        }

        $totalBayar = $lamaMenginap * $reservasi->harga_per_malam;

        switch ($reservasi->tipe_kamar) {

            case 'Standard Room':
                $prefix = 'STD';
                break;

            case 'Deluxe Room':
                $prefix = 'DLX';
                break;

            case 'Executive Club Suite':
                $prefix = 'EXE';
                break;

            default:
                $prefix = 'HOT';
        }

        $kodePembayaran = $prefix .
            "-" .
            date('Ymd') .
            "-" .
            str_pad($reservasi->id, 4, '0', STR_PAD_LEFT);

        return view('reservasi.pembayaran', compact(
            'reservasi',
            'lamaMenginap',
            'totalBayar',
            'kodePembayaran'
        ));
    }

    // ===========================
    // ADMIN
    // ===========================
    public function adminIndex()
    {
        try {

            $reservasis = DB::table('reservasis')
                ->join('kamars', 'reservasis.kamar_id', '=', 'kamars.id')
                ->select(
                    'reservasis.*',
                    'kamars.nomor_kamar',
                    'kamars.tipe_kamar',
                    'kamars.harga_per_malam'
                )
                ->get();

        } catch (\Exception $e) {

            $reservasis = collect([]);

        }

        return view('reservasi.admin', compact('reservasis'));
    }
}