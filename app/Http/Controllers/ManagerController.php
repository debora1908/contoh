<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use App\Models\Kamar;

class ManagerController extends Controller
{
    public function index()
    {
        $pendapatan = Reservasi::sum('total_bayar');

        $totalReservasi = Reservasi::count();

        $totalKamar = Kamar::count();

        $kamarTersedia = Kamar::where('status','Tersedia')->count();

        $reservasiTerbaru = Reservasi::latest()->take(5)->get();

        return view('manager.dashboard', compact(
            'pendapatan',
            'totalReservasi',
            'totalKamar',
            'kamarTersedia',
            'reservasiTerbaru'
        ));
    }
}