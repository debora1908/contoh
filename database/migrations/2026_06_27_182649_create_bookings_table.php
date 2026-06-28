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
       Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tamu');       // Nama Lengkap
            $table->string('email_tamu');      // Email Aktif
            $table->string('pilihan_kamar');   // standard, deluxe, atau suite
            $table->string('nomor_kamar');     // Generate otomatis misal Room #102
            $table->date('check_in');          // Tanggal Check In
            $table->date('check_out');         // Tanggal Check Out
            $table->string('status_bayar')->default('Pending'); // Status awal
            $table->integer('kode_unik')->nullable();
            $table->string('metode_bayar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
