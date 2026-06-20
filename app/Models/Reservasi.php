<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
  protected $fillable = ['kamar_id', 'nama_tamu', 'email_tamu', 'tanggal_checkin', 'tanggal_checkout', 'total_bayar', 'status_pembayaran'];

    public function kamar() {
        return $this->belongsTo(Kamar::class);
        }  //
}
