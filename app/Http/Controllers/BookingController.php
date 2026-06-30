<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Kamar;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BookingController extends Controller
{
    // =======================================================
    // DASHBOARD & UTAMA
    // =======================================================
    public function index()
    {
        $standardBookings = Booking::where('pilihan_kamar', 'standard')->get();
        $deluxeBookings   = Booking::where('pilihan_kamar', 'deluxe')->get();
        $suiteBookings    = Booking::where('pilihan_kamar', 'suite')->get();

        $totalInventory = 150;
        $kamarTerisi    = Booking::count(); 
        $kamarTersedia  = $totalInventory - $kamarTerisi;

        // Logika Pendapatan
        $totalPendapatan = 0;
        $semuaBookingLunas = Booking::where('status_bayar', 'Lunas')->get();

        foreach ($semuaBookingLunas as $booking) {
            $checkIn = Carbon::parse($booking->check_in);
            $checkOut = Carbon::parse($booking->check_out);
            $durasiMalam = $checkIn->diffInDays($checkOut) ?: 1;

            $hargaPerMalam = match($booking->pilihan_kamar) {
                'standard' => 300000,
                'deluxe'   => 500000,
                'suite'    => 1000000,
                default    => 0
            };
            $totalPendapatan += ($hargaPerMalam * $durasiMalam) + ($booking->kode_unik ?? 0);
        }

        $pendapatanFormatted = $totalPendapatan >= 1000000 
            ? 'IDR ' . number_format($totalPendapatan / 1000000, 1, ',', '.') . 'M'
            : 'IDR ' . number_format($totalPendapatan, 0, ',', '.');

        return view('admin.dashboard', compact(
            'standardBookings', 'deluxeBookings', 'suiteBookings',
            'totalInventory', 'kamarTerisi', 'kamarTersedia', 'pendapatanFormatted'
        ));
    }

    // =======================================================
    // RESERVASI ADMIN
    // =======================================================
    public function reservasi(Request $request)
    {
        $query = Booking::query();

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('nama_tamu', 'like', '%' . $request->search . '%')
                  ->orWhere('email_tamu', 'like', '%' . $request->search . '%')
                  ->orWhere('nomor_kamar', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('status_bayar')) $query->where('status_bayar', $request->status_bayar);
        if ($request->filled('tipe')) $query->where('pilihan_kamar', $request->tipe);

        $bookings = $query->latest()->paginate(10);
        $totalReservasi = Booking::count();
        $pending = Booking::where('status_bayar', 'Pending')->count();
        $lunas = Booking::where('status_bayar', 'Lunas')->count();
        $hariIni = Carbon::today();
        $checkInHariIni = Booking::whereDate('check_in', $hariIni)->count();
        $checkOutHariIni = Booking::whereDate('check_out', $hariIni)->count();

        return view('admin.reservasi', compact('bookings', 'totalReservasi', 'pending', 'lunas', 'checkInHariIni', 'checkOutHariIni'));
    }

    // =======================================================
    // CRUD RESERVASI
    // =======================================================
    public function store(Request $request)
    {
        $request->validate([
            'nama_tamu' => 'required|string|max:255',
            'email_tamu' => 'required|email',
            'pilihan_kamar' => 'required',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
        ]);

        $randomRoom = match($request->pilihan_kamar) {
            'standard' => 'Room #' . rand(101, 199),
            'deluxe'   => 'Room #' . rand(201, 299),
            'suite'    => 'Suite #' . rand(1, 50),
        };
        
        $kodeUnik = match($request->pilihan_kamar) {
            'standard' => 50, 'deluxe' => 100, 'suite' => 150, default => 0
        };

        $booking = Booking::create([
            'nama_tamu' => $request->nama_tamu,
            'email_tamu' => $request->email_tamu,
            'pilihan_kamar' => $request->pilihan_kamar,
            'nomor_kamar' => $randomRoom,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'status_bayar' => 'Pending',
            'kode_unik' => $kodeUnik
        ]);

        return redirect()->route('booking.pembayaran', $booking->id);
    }

    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update($request->all());
        return redirect()->route('admin.dashboard')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Booking::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }

    // =======================================================
    // FITUR TAMBAHAN (CHECK-IN/OUT & LAINNYA)
    // =======================================================
    public function checkIn($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update(['status_menginap' => 'Check In']);
        Kamar::where('nomor_kamar', $booking->nomor_kamar)->update(['status' => 'Terisi']);
        return redirect()->back()->with('success', 'Tamu berhasil Check In.');
    }

    public function checkOut($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update(['status_menginap' => 'Check Out']);
        Kamar::where('nomor_kamar', $booking->nomor_kamar)->update(['status' => 'Kotor']);
        return redirect()->back()->with('success', 'Tamu berhasil Check Out.');
    }

    public function pembayaran($id) { return view('reservasi.pembayaran', ['booking' => Booking::findOrFail($id)]); }

    public function konfirmasi(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update(['status_bayar' => 'Lunas', 'metode_bayar' => $request->metode_bayar]);
        return redirect()->route('booking.pembayaran', $id)->with('success', 'Pembayaran Berhasil!');
    }
}