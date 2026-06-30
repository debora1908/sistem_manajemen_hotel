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
           
            $table->string('nama_tamu');

        $table->string('email_tamu');

        $table->unsignedBigInteger('kamar_id');

        $table->date('tanggal_checkin');

        $table->date('tanggal_checkout');

        $table->string('metode_pembayaran');

        $table->integer('total_bayar')->default(0);

        $table->string('status')->default('Belum Dibayar');
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
