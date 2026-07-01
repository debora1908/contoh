<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Kamar;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BookingController extends Controller
{

    // =====================================================
    // DASHBOARD
    // =====================================================

    public function index()
    {
        $standardBookings = Booking::where('pilihan_kamar', 'standard')->get();
        $deluxeBookings = Booking::where('pilihan_kamar', 'deluxe')->get();
        $executiveBookings = Booking::where('pilihan_kamar', 'executive')->get();

        $totalInventory = Kamar::count();
        $kamarTerisi = Kamar::where('status', 'Terisi')->count();
        $kamarTersedia = Kamar::where('status', 'Tersedia')->count();

        $totalPendapatan = 0;

        $bookingsLunas = Booking::where('status_bayar','Lunas')->get();

        foreach($bookingsLunas as $booking){

            $hari = Carbon::parse($booking->check_in)
                ->diffInDays(Carbon::parse($booking->check_out));

            if($hari==0){
                $hari=1;
            }

            switch(strtolower($booking->pilihan_kamar)){

                case 'standard':
                    $harga = 500000;
                    break;

                case 'deluxe':
                    $harga = 750000;
                    break;

                case 'executive':
                    $harga = 1500000;
                    break;

                default:
                    $harga = 0;
            }

            $totalPendapatan += ($harga * $hari);
        }

        $pendapatanFormatted = 'Rp '.number_format($totalPendapatan,0,',','.');

        return view('admin.dashboard',compact(
            'standardBookings',
            'deluxeBookings',
            'executiveBookings',
            'totalInventory',
            'kamarTerisi',
            'kamarTersedia',
            'pendapatanFormatted'
        ));
    }

    // =====================================================
    // HALAMAN ADMIN RESERVASI
    // =====================================================

    public function reservasi(Request $request)
    {

        $query = Booking::query();

        if($request->filled('search')){

            $query->where(function($q) use ($request){

                $q->where('nama_tamu','like','%'.$request->search.'%')
                  ->orWhere('email_tamu','like','%'.$request->search.'%')
                  ->orWhere('nomor_kamar','like','%'.$request->search.'%');

            });

        }

        if($request->filled('status_bayar')){
            $query->where('status_bayar',$request->status_bayar);
        }

        if($request->filled('tipe')){
            $query->where('pilihan_kamar',$request->tipe);
        }

        $bookings = $query->latest()->paginate(10);

        $totalReservasi = Booking::count();
        $pending = Booking::where('status_bayar','Pending')->count();
        $lunas = Booking::where('status_bayar','Lunas')->count();

        $hariIni = Carbon::today();

        $checkInHariIni = Booking::whereDate('check_in',$hariIni)->count();
        $checkOutHariIni = Booking::whereDate('check_out',$hariIni)->count();

        return view('admin.reservasi',compact(
            'bookings',
            'totalReservasi',
            'pending',
            'lunas',
            'checkInHariIni',
            'checkOutHariIni'
        ));

    }

    // =====================================================
    // SIMPAN BOOKING
    // =====================================================

    public function store(Request $request)
    {

        $request->validate([

            'nama_tamu'=>'required|string|max:255',
            'email_tamu'=>'required|email',
            'pilihan_kamar'=>'required',
            'check_in'=>'required|date',
            'check_out'=>'required|date|after:check_in'

        ]);

        switch ($request->pilihan_kamar) {

    case 'standard':
        $tipe = 'Standard';
        $kodeUnik = 50;
        break;

    case 'deluxe':
        $tipe = 'Deluxe Room';
        $kodeUnik = 100;
        break;

    case 'executive':
        $tipe = 'Executive Suite';
        $kodeUnik = 150;
        break;

    default:
        return back()->with('error','Tipe kamar tidak valid.');
}

        $kamar = Kamar::where('tipe_kamar',$tipe)
                    ->where('status','Tersedia')
                    ->first();

        if(!$kamar){

            return back()->with('error','Maaf kamar sudah habis.');

        }

        $booking = Booking::create([

            'nama_tamu'=>$request->nama_tamu,
            'email_tamu'=>$request->email_tamu,
            'pilihan_kamar'=>$request->pilihan_kamar,
            'nomor_kamar'=>$kamar->nomor_kamar,
            'check_in'=>$request->check_in,
            'check_out'=>$request->check_out,
            'status_bayar'=>'Pending',
            'status_menginap'=>'Belum Check In',
            'kode_unik'=>$kodeUnik

        ]);

        $kamar->status='Terisi';
        $kamar->save();

        return redirect()->route('booking.pembayaran',$booking->id);

    }
        // =====================================================
    // EDIT BOOKING
    // =====================================================

    public function edit($id)
    {
        $booking = Booking::findOrFail($id);

        return view('admin.edit', compact('booking'));
    }

    // =====================================================
    // UPDATE BOOKING
    // =====================================================

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_tamu' => 'required',
            'email_tamu' => 'required|email',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
        ]);

        $booking = Booking::findOrFail($id);

        $booking->update([
            'nama_tamu' => $request->nama_tamu,
            'email_tamu' => $request->email_tamu,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'status_bayar' => $request->status_bayar,
        ]);

        return redirect()->route('admin.reservasi.index')
            ->with('success', 'Data reservasi berhasil diperbarui.');
    }

    // =====================================================
    // HAPUS BOOKING
    // =====================================================

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);

        Kamar::where('nomor_kamar', $booking->nomor_kamar)
            ->update([
                'status' => 'Tersedia'
            ]);

        $booking->delete();

        return back()->with('success', 'Data berhasil dihapus.');
    }

    // =====================================================
    // CHECK IN
    // =====================================================

    public function checkIn($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->status_menginap = 'Check In';
        $booking->save();

        Kamar::where('nomor_kamar', $booking->nomor_kamar)
            ->update([
                'status' => 'Terisi'
            ]);

        return back()->with('success', 'Tamu berhasil Check In.');
    }

    // =====================================================
    // CHECK OUT
    // =====================================================

    public function checkOut($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->status_menginap = 'Check Out';
        $booking->save();

        Kamar::where('nomor_kamar', $booking->nomor_kamar)
            ->update([
                'status' => 'Tersedia'
            ]);

        return back()->with('success', 'Tamu berhasil Check Out.');
    }

    // =====================================================
    // HALAMAN PEMBAYARAN
    // =====================================================

    public function pembayaran($id)
    {
        $booking = Booking::findOrFail($id);

        return view('reservasi.pembayaran', compact('booking'));
    }

    // =====================================================
    // KONFIRMASI PEMBAYARAN
    // =====================================================

    public function konfirmasi(Request $request, $id)
    {
        $request->validate([
            'metode_bayar' => 'required'
        ]);

        $booking = Booking::findOrFail($id);

        $booking->status_bayar = 'Lunas';
        $booking->metode_bayar = $request->metode_bayar;
        $booking->save();

        return redirect()
            ->route('booking.pembayaran', $booking->id)
            ->with('success', 'Pembayaran berhasil.');
    }

}