<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    // PASTI KAN FUNGSI INDEX INI ADA DAN SUDAH DITULIS:
    public function index()
    {
        $kamars = Kamar::all();
        return view('kamar.index', compact('kamars'));
    }

    // Fungsi untuk menyimpan data kamar
    public function store(Request $request)
    {
        $request->validate([
            'nomor_kamar' => 'required|unique:kamars',
            'tipe_kamar' => 'required',
            'harga_per_malam' => 'required|numeric',
        ]);

        Kamar::create([
            'nomor_kamar' => $request->nomor_kamar,
            'tipe_kamar' => $request->tipe_kamar,
            'harga_per_malam' => $request->harga_per_malam,
            'status' => 'Tersedia',
        ]);

        return redirect()->back()->with('success', 'Kamar berhasil ditambahkan!');
    }
}