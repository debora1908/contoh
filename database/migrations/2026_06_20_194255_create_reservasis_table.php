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
            $table->foreignId('kamar_id')->constrained('kamars')->onDelete('cascade');
        $table->string('nama_tamu');
        $table->string('email_tamu');
        $table->date('tanggal_checkin');
        $table->date('tanggal_checkout');
        $table->integer('total_bayar');
        $table->enum('status_pembayaran', ['Belum Bayar', 'Lunas'])->default('Belum Bayar');
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
