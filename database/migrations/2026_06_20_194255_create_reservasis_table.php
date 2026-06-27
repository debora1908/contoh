<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reservasis', function (Blueprint $table) {
            $table->id();
            // Membuat relasi ke tabel kamars (asumsi kamu punya model Kamar)
            $table->foreignId('kamar_id')->constrained('kamars')->onDelete('cascade');
            $table->string('nama_tamu');
            $table->date('tanggal_checkin');
            $table->date('tanggal_checkout');
            $table->string('status_pembayaran')->default('Belum Bayar');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservasis');
    }
};