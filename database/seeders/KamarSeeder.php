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
                'nomor_kamar' => 'Room 301',
                'tipe_kamar' => 'Standard Room',
                'harga_per_malam' => 500000,
                'status' => 'Kosong',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'nomor_kamar' => 'Room 302',
                'tipe_kamar' => 'Deluxe Room',
                'harga_per_malam' => 1000000,
                'status' => 'Kosong',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'nomor_kamar' => 'Room 303',
                'tipe_kamar' => 'Executive Club Suite',
                'harga_per_malam' => 1500000,
                'status' => 'Kosong',
                'created_at' => now(),
                'updated_at' => now(),
            ]

        ]);
    }
}