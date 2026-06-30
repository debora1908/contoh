<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Kamar;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    public function index()
{
    $query = Booking::query();

    if(request('search')){
        $query->where(function($q){
            $q->where('nama_tamu','like','%'.request('search').'%')
              ->orWhere('email_tamu','like','%'.request('search').'%');
        });
    }

    if(request('status')){
        $query->where('status_bayar', request('status'));
    }

    if(request('tipe')){
        $query->where('pilihan_kamar', request('tipe'));
    }

    $bookings = $query->latest()->paginate(10)->withQueryString();

    $totalReservasi = Booking::count();
    $pending = Booking::where('status_bayar', 'Pending')->count();
    $lunas = Booking::where('status_bayar', 'Lunas')->count();
    $checkInHariIni = Booking::where('status_menginap', 'Check In')->count();
    $checkOutHariIni = Booking::where('status_menginap', 'Check Out')->count();

    return view('admin.reservasi', compact(
        'bookings',
        'totalReservasi',
        'pending',
        'lunas',
        'checkInHariIni',
        'checkOutHariIni'
    ));

}

if(request('status')){
    $query->where('status_bayar', request('status'));
}

if(request('tipe')){
    $query->where('pilihan_kamar', request('tipe'));
}

$bookings = $query->latest()->paginate(10)->withQueryString();

        $totalReservasi = Booking::count();
        $pending = Booking::where('status_bayar', 'Pending')->count();
        $lunas = Booking::where('status_bayar', 'Lunas')->count();
        $checkInHariIni = Booking::where('status_menginap', 'Check In')->count();
        $checkOutHariIni = Booking::where('status_menginap', 'Check Out')->count();

        return view('admin.reservasi', compact(
            'bookings',
            'totalReservasi',
            'pending',
            'lunas',
            'checkInHariIni',
            'checkOutHariIni'
        ));
    }
}