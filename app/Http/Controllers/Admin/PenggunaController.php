<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengguna;

class PenggunaController extends Controller
{
    public function index()
    {
        $penggunas = Pengguna::latest()->paginate(10);

        $totalPengguna = Pengguna::count();

        $admin = Pengguna::where('role','Admin')->count();

        $resepsionis = Pengguna::where('role','Resepsionis')->count();

        $housekeeping = Pengguna::where('role','Housekeeping')->count();

        return view('admin.pengguna', compact(
            'penggunas',
            'totalPengguna',
            'admin',
            'resepsionis',
            'housekeeping'
        ));
    }
}