<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kamar;

class KamarSeeder extends Seeder
{
    public function run(): void
    {
        Kamar::create([
            'nomor_kamar' => '101',
            'tipe_kamar' => 'standard',
            'harga_per_malam' => 500000,
            'status' => 'Tersedia'
        ]);

        Kamar::create([
            'nomor_kamar' => '102',
            'tipe_kamar' => 'deluxe',
            'harga_per_malam' => 750000,
            'status' => 'Tersedia'
        ]);

        Kamar::create([
            'nomor_kamar' => '201',
            'tipe_kamar' => 'executive',
            'harga_per_malam' => 1500000,
            'status' => 'Tersedia'
        ]);
    }
}