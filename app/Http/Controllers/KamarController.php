<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KamarController extends Controller
{
    public function index()
    {
        $kamars = DB::table('kamars')->get();
        return view('kamar.index', compact('kamars'));
    }

    // 1. Fungsi untuk menampilkan halaman form tambah kamar
    public function create()
    {
        return view('kamar.create');
    }

    // 2. Fungsi untuk menerima inputan form dan menyimpannya ke database
    public function store(Request $request)
    {
        // Validasi inputan agar tidak boleh kosong
        $request->validate([
            'nomor_kamar' => 'required',
            'tipe_kamar' => 'required',
            'harga_per_malam' => 'required|numeric',
        ]);

        // Masukkan data baru ke tabel kamars
        DB::table('kamars')->insert([
            'nomor_kamar' => $request->nomor_kamar,
            'tipe_kamar' => $request->tipe_kamar,
            'harga_per_malam' => $request->harga_per_malam,
            'status' => 'Kosong', // Standar awal selalu kosong
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Kembalikan ke halaman utama manajemen kamar dengan pesan sukses
        return redirect()->route('kamar.index')->with('sukses', 'Kamar berhasil ditambahkan!');
    }
}