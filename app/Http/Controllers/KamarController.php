<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KamarController extends Controller
{
    public function index()
    {
        // Data simulasi kamar hotel
        $kamar = [
            ['nomor' => '101', 'tipe' => 'Standard Room', 'harga' => 'Rp 350.000'],
            ['nomor' => '102', 'tipe' => 'Deluxe Room', 'harga' => 'Rp 550.000'],
            ['nomor' => '201', 'tipe' => 'Suite Room', 'harga' => 'Rp 1.200.000'],
        ];

        return view('kamar.index', compact('kamar'));
    }
}