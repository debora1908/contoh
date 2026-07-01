<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;

class LaporanController extends Controller
{
    public function index()
    {
        $bookings = Booking::latest()->get();

        $totalReservasi = Booking::count();

        $kamarTerisi = Booking::count();

        $totalKamar = 150;

        $kamarTersedia = $totalKamar - $kamarTerisi;

        $pendapatan = Booking::where('status_bayar','Lunas')->sum('kode_unik');

        return view('admin.laporan', compact(
            'bookings',
            'totalReservasi',
            'kamarTerisi',
            'kamarTersedia',
            'pendapatan'
        ));
    }
}