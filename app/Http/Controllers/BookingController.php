<?php

namespace App\Http\Controllers;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    // Menampilkan Dashboard beserta data terpisah per tipe kamar
    public function index()
    {
        // Mengambil data dari database dan mengelompokkannya sesuai gambar image_9a5580.png
        $standardBookings = Booking::where('pilihan_kamar', 'standard')->get();
        $deluxeBookings   = Booking::where('pilihan_kamar', 'deluxe')->get();
        $suiteBookings    = Booking::where('pilihan_kamar', 'suite')->get();

        return view('admin.dashboard', compact('standardBookings', 'deluxeBookings', 'suiteBookings'));
    }

    // Memproses input manual dari Form Check-In
    public function store(Request $request)
    {
        // 1. Validasi Input Data
        $request->validate([
            'nama_tamu' => 'required|string|max:255',
            'email_tamu' => 'required|email',
            'pilihan_kamar' => 'required',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
        ]);

        // 2. Logika acak nomor kamar otomatis sebagai contoh simulasi HMS
        $randomRoom = match($request->pilihan_kamar) {
            'standard' => 'Room #' . rand(101, 199),
            'deluxe'   => 'Room #' . rand(201, 299),
            'suite'    => 'Suite #' . rand(1, 50),
        };

        // 3. Simpan data baru ke database table bookings
        Booking::create([
            'nama_tamu' => $request->nama_tamu,
            'email_tamu' => $request->email_tamu,
            'pilihan_kamar' => $request->pilihan_kamar,
            'nomor_kamar' => $randomRoom,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'status_bayar' => 'Pending' // Default awal input manual
        ]);

        return redirect()->back()->with('success', 'Data tamu berhasil diinput ke ledger database!');
    }

}
