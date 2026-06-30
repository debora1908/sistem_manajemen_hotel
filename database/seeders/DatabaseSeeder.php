<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::create([
            'name' => 'Admin Hotel',
            'email' => 'hotel@admin.com',
            'password' => bcrypt('hotel123'),
        ]);

        // Jalankan seeder kamar
        $this->call([
            KamarSeeder::class,
        ]);
    }
}