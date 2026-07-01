<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Reservasi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    // Menampilkan halaman reservasi
    public function index()
    {
        // Mengambil kamar yang masih tersedia lalu menghilangkan tipe yang sama
        $kamars = Kamar::where('status', 'Tersedia')
            ->get()
            ->unique('tipe_kamar');

        // Menampilkan seluruh data reservasi
        $reservasis = Reservasi::with('kamar')->get();

        return view('reservasi.index', compact('kamars', 'reservasis'));
    }

    // Menyimpan reservasi
    public function store(Request $request)
    {
        $request->validate([
            'kamar_id' => 'required',
            'nama_tamu' => 'required|string|max:255',
            'tanggal_checkin' => 'required|date|after_or_equal:today',
            'tanggal_checkout' => 'required|date|after:tanggal_checkin',
        ]);

        // Cari tipe kamar yang dipilih
        $kamarSampel = Kamar::findOrFail($request->kamar_id);
        $tipeYangDipilih = $kamarSampel->tipe_kamar;

        // Cari kamar kosong sesuai tipe
        $kamarTersedia = Kamar::where('tipe_kamar', $tipeYangDipilih)
            ->where('status', 'Tersedia')
            ->first();

        if (!$kamarTersedia) {
            return back()->with('error', 'Maaf, semua kamar tipe '.$tipeYangDipilih.' sudah penuh.');
        }

        // Hitung lama menginap
        $checkin = Carbon::parse($request->tanggal_checkin);
        $checkout = Carbon::parse($request->tanggal_checkout);
        $durasiMalam = $checkin->diffInDays($checkout);

        // Hitung total bayar
        $totalBayar = $kamarTersedia->harga_per_malam * $durasiMalam;

        // Simpan reservasi
        Reservasi::create([
            'kamar_id' => $kamarTersedia->id,
            'nama_tamu' => $request->nama_tamu,
            'email_tamu' => $request->email_tamu ?? $request->nama_tamu.'@example.com',
            'tanggal_checkin' => $request->tanggal_checkin,
            'tanggal_checkout' => $request->tanggal_checkout,
            'total_bayar' => $totalBayar,
            'status_pembayaran' => 'Belum Bayar',
        ]);

        // Update status kamar
        $kamarTersedia->update([
            'status' => 'Terisi'
        ]);

        return redirect()->route('reservasi.index')
            ->with('success', 'Reservasi berhasil! Nomor kamar: '.$kamarTersedia->nomor_kamar.'. Total bayar Rp '.number_format($totalBayar,0,',','.'));
    }
}