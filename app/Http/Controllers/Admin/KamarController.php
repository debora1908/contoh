<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kamar;
use Illuminate\Http\Request;

class KamarController extends Controller
{
 public function index() {
    $kamars = \App\Models\Kamar::all(); // Mengambil 150 data kamar
    $totalKamar = $kamars->count();
    return view('admin.manajemen', compact('kamars', 'totalKamar'));
}

    public function store(Request $request) {
        Kamar::create([
            'nomor_kamar' => $request->nomor_kamar,
            'tipe_kamar' => $request->tipe_kamar,
            'harga_per_malam' => $request->harga_per_malam,
            'status' => 'Tersedia' // Default
        ]);
        return redirect()->back()->with('success', 'Kamar ditambahkan');
    }

    public function update(Request $request, $id) {
        $kamar = Kamar::findOrFail($id);
        $kamar->update(['status' => $request->status]);
        return redirect()->back();
    }
}