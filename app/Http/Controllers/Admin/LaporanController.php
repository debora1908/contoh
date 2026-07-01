<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Kamar;
use Carbon\Carbon;

class LaporanController extends Controller
{
    public function index()
{

    $bookings = Booking::latest()->get();

    $totalReservasi = Booking::count();

    $kamarTerisi = Kamar::where('status','Terisi')->count();

    $kamarTersedia = Kamar::where('status','Tersedia')->count();

    $pendapatan = 0;

    $bookingLunas = Booking::where('status_bayar','Lunas')->get();

    foreach($bookingLunas as $booking){

        $hari = Carbon::parse($booking->check_in)
                ->diffInDays(Carbon::parse($booking->check_out));

        if($hari == 0){
            $hari = 1;
        }

        switch(strtolower($booking->pilihan_kamar)){

            case 'standard':
                $harga = 500000;
                break;

            case 'deluxe':
                $harga = 7500000;
                break;

            case 'suite':
                $harga = 1500000;
                break;

            default:
                $harga = 0;

        }

        $pendapatan += ($harga * $hari);

    }

    return view('admin.laporan',compact(

        'bookings',

        'totalReservasi',

        'pendapatan',

        'kamarTerisi',

        'kamarTersedia'

    ));

}}