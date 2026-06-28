<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KamarSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kamars')->insert([
            [
                'nomor_kamar' => 'Room 302',
                'tipe_kamar' => 'Deluxe Room',
                'harga' => 500000,
                'status' => 'Tersedia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomor_kamar' => 'Room 303',
                'tipe_kamar' => 'Executive Club Suite',
                'harga' => 1200000,
                'status' => 'Pembersihan',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}