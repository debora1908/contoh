<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Booking;
class Booking extends Model
{
  use HasFactory;

    protected $fillable = [
        'nama_tamu',
    'email_tamu',
    'pilihan_kamar',
    'nomor_kamar',
    'check_in',
    'check_out',
    'status_bayar',
    'status_menginap',
    'metode_bayar',
    'kode_unik'
    ];
  //
}
