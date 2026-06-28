<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservasis', function (Blueprint $table) {
            $table->id();
            $table->string('tamu'); // Nama tamu
            $table->string('email'); // Tambahkan kolom email jika belum ada agar form tidak error
            $table->string('kamar'); // Tipe Kamar
            $table->date('check_in'); // Tanggal Check In
            $table->date('check_out'); // Tanggal Check Out
            $table->integer('total_bayar'); // Total Bayar (Dihitung otomatis di Controller)
            $table->string('status')->default('Pending'); // Default awal 'Pending' sebelum dikonfirmasi Admin
            $table->timestamps();
        });
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservasis');
    }
};
