<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Kamar;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    public function index()
    {
        $query = Booking::query();

        if (request('search')) {
            $query->where(function ($q) {
                $q->where('nama_tamu', 'like', '%' . request('search') . '%')
                  ->orWhere('email_tamu', 'like', '%' . request('search') . '%');
            });
        }

        if (request('status')) {
            $query->where('status_bayar', request('status'));
        }

        if (request('tipe')) {
            $query->where('pilihan_kamar', request('tipe'));
        }

        $bookings = $query->latest()->paginate(10)->withQueryString();

        $totalReservasi = Booking::count();
        $pending = Booking::where('status_bayar', 'Pending')->count();
        $lunas = Booking::where('status_bayar', 'Lunas')->count();
        $checkInHariIni = Booking::where('status_menginap', 'Check In')->count();
        $checkOutHariIni = Booking::where('status_menginap', 'Check Out')->count();

        return view('admin.reservasi', compact(
            'bookings',
            'totalReservasi',
            'pending',
            'lunas',
            'checkInHariIni',
            'checkOutHariIni'
        ));
    }

    public function detail($id)
    {
        $booking = Booking::findOrFail($id);

        return view('admin.detail_reservasi', compact('booking'));
    }

    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        $booking->update($request->only([
            'status_bayar',
            'status_menginap'
        ]));

        return redirect()->route('admin.reservasi.index')
            ->with('success', 'Reservasi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);

        Kamar::where('nomor_kamar', $booking->nomor_kamar)
            ->update([
                'status' => 'Tersedia'
            ]);

        $booking->delete();

        return redirect()->route('admin.reservasi.index')
            ->with('success', 'Reservasi berhasil dihapus.');
    }

    public function checkIn($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->status_menginap = 'Check In';
        $booking->save();

        Kamar::where('nomor_kamar', $booking->nomor_kamar)
            ->update([
                'status' => 'Terisi'
            ]);

        return back()->with('success', 'Tamu berhasil Check In.');
    }

    public function checkOut($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->status_menginap = 'Check Out';
        $booking->save();

        Kamar::where('nomor_kamar', $booking->nomor_kamar)
            ->update([
                'status' => 'Kotor'
            ]);

        return back()->with('success', 'Tamu berhasil Check Out.');
    }

    public function cetak($id)
    {
        $booking = Booking::findOrFail($id);

        return view('admin.cetak_reservasi', compact('booking'));
    }

    public function store(Request $request)
    {
        if (auth()->check() && auth()->user()->role == 'manager') {
            abort(403, 'Akses Ditolak');
        }

        return back()->with('success', 'Data berhasil disimpan');
    }
}