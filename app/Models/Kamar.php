<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
 protected $table = 'kamars';
    protected $fillable = [
        'nomor_kamar',
        'tipe_kamar',
        'harga_per_malam',
        'status'
    ];   //
}
