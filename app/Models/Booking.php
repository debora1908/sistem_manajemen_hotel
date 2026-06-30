<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// TAMBAHKAN BARIS INI:
use Illuminate\Database\Eloquent\Factories\HasFactory; 

class Booking extends Model
{
    use HasFactory; // Sekarang ini tidak akan error lagi

    protected $fillable = [
        'nama_tamu',
        'email_tamu',
        'pilihan_kamar',
        'nomor_kamar',
        'check_in',
        'check_out',
        'status_bayar'
    ];
}