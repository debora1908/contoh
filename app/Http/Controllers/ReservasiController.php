<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservasiController extends Controller
{
   public function index()
    {
        $kamars = Kamar::where('status', 'Tersedia')->get(); // Hanya ambil kamar kosong
        $reservasis = Reservasi::with('kamar')->get();
        return view('reservasi.index', compact('kamars', 'reservasis'));
    }

    // Memproses data check-in tamu
    public function store(Request $request)
    {
        $request->validate([
            'kamar_id' => 'required',
            'nama_tamu' => 'required|string|max:255',
            'email_tamu' => 'required|email',
            'tanggal_checkin' => 'required|date|after_or_equal:today',
            'tanggal_checkout' => 'required|date|after:tanggal_checkin',
        ]);

        $kamar = Kamar::findOrFail($request->kamar_id);

        // Hitung durasi hari menginap menggunakan Carbon
        $checkin = Carbon::parse($request->tanggal_checkin);
        $checkout = Carbon::parse($request->tanggal_checkout);
        $durasiMalam = $checkin->diffInDays($checkout);

        // Total Bayar = Harga Kamar x Durasi Malam
        $totalBayar = $kamar->harga_per_malam * $durasiMalam;

        // 1. Simpan data reservasi
        Reservasi::create([
            'kamar_id' => $request->kamar_id,
            'nama_tamu' => $request->nama_tamu,
            'email_tamu' => $request->email_tamu,
            'tanggal_checkin' => $request->tanggal_checkin,
            'tanggal_checkout' => $request->tanggal_checkout,
            'total_bayar' => $totalBayar,
            'status_pembayaran' => 'Belum Bayar',
        ]);

        // 2. Ubah status kamar menjadi 'Terisi'
        $kamar->update(['status' => 'Terisi']);

        return redirect()->back()->with('success', 'Reservasi berhasil dibuat! Total tagihan: Rp ' . number_format($totalBayar, 0, ',', '.'));
    } //
}
