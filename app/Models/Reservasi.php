<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;

    // SINKRONISASI: Nama kolom harus sesuai persis dengan file migrasi database Anda
    protected $fillable = [
        'tamu',         // <--- Sudah diperbaiki dari 'nama_tamu'
        'email',
        'kamar',
        'check_in',     // <--- Sudah diperbaiki dari 'tanggal_checkin'
        'check_out',    // <--- Sudah diperbaiki dari 'tanggal_checkout'
        'total_bayar',
        'status'
    ];

    // Hubungan relasi ke model Kamar
    public function kamar()
    {
        return $this->belongsTo(Kamar::class, 'kamar_id');
    }
}