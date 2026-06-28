<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;

    // Menentukan kolom mana saja yang boleh diisi massal
    protected $fillable = [
        'nama_tamu',
        'email_tamu',
        'kamar_id',
        'tanggal_checkin',
        'tanggal_checkout'
    ];

    // Relasi: Setiap reservasi dipastikan memilih 1 Kamar
    public function kamar()
    {
        return $this->belongsTo(Kamar::class, 'kamar_id');
    }
}