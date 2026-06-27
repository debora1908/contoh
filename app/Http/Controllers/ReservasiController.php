<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Reservasi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    public function index()
    {
        // Mengambil kamar yang 'Tersedia', lalu dikelompokkan agar Tipe Kamar tidak duplikat di pilihan drop-down
        $kamars = Kamar::where('status', 'Tersedia')
                       ->get()
                       ->unique('tipe_kamar');

        $reservasis = Reservasi::with('kamar')->get();
        
        return view('reservasi.index', compact('kamars', 'reservasis'));
    }

    // Memproses data check-in tamu
    public function store(Request $request)
    {
        $request->validate([
            'kamar_id' => 'required', // Ini membawa ID contoh dari tipe kamar yang dipilih
            'nama_tamu' => 'required|string|max:255',
            'tanggal_checkin' => 'required|date|after_or_equal:today',
            'tanggal_checkout' => 'required|date|after:tanggal_checkin',
        ]);

        // 1. Cari tahu tipe kamar apa yang dipilih tamu berdasarkan ID sampel tadi
        $kamarSampel = Kamar::findOrFail($request->kamar_id);
        $tipeYangDipilih = $kamarSampel->tipe_kamar;

        // 2. Sistem otomatis mencarikan SATU kamar acak yang tipenya sama dan statusnya masih 'Tersedia'
        $kamarTersedia = Kamar::where('tipe_kamar', $tipeYangDipilih)
                              ->where('status', 'Tersedia')
                              ->first();

        // Antisipasi jika tiba-tiba kamar dengan tipe tersebut habis
        if (!$kamarTersedia) {
            return redirect()->back()->with('error', 'Maaf, semua nomor kamar untuk tipe ' . $tipeYangDipilih . ' sudah penuh!');
        }

        // Hitung durasi hari menginap menggunakan Carbon
        $checkin = Carbon::parse($request->tanggal_checkin);
        $checkout = Carbon::parse($request->tanggal_checkout);
        $durasiMalam = $checkin->diffInDays($checkout);

        // Total Bayar = Harga Kamar x Durasi Malam
        $totalBayar = $kamarTersedia->harga_per_malam * $durasiMalam;

        // 3. Simpan data reservasi dengan ID Kamar asli yang didapatkan oleh sistem
        Reservasi::create([
            'kamar_id' => $kamarTersedia->id, // Menggunakan kamar yang kosong tadi
            'nama_tamu' => $request->nama_tamu,
            'email_tamu' => $request->email_tamu ?? $request->nama_tamu . '@example.com', // fallback jika form blade Anda tidak ada input email
            'tanggal_checkin' => $request->tanggal_checkin,
            'tanggal_checkout' => $request->tanggal_checkout,
            'total_bayar' => $totalBayar,
            'status_pembayaran' => 'Belum Bayar',
        ]);

        // 4. Ubah status nomor kamar tersebut menjadi 'Terisi' agar tidak dipakai tamu lain
        $kamarTersedia->update(['status' => 'Terisi']);

        return redirect()->back()->with('success', 'Reservasi berhasil! Anda mendapatkan ' . $kamarTersedia->tipe_kamar . ' (Nomor: ' . $kamarTersedia->nomor_kamar . '). Total tagihan: Rp ' . number_format($totalBayar, 0, ',', '.'));
    }
}