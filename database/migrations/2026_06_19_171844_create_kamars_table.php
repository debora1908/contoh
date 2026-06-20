<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kamars', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_kamar')->unique();
            $table->string('tipe_kamar'); 
            $table->integer('harga_per_malam');
            $table->enum('status', ['Tersedia', 'Terisi', 'Kotor'])->default('Tersedia');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kamars');
    }
};