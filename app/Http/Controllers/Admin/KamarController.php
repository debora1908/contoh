<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kamar; // Sesuaikan dengan nama Model Kamar Anda
use Illuminate\Http\Request;

class KamarController extends Controller
{
    // 1. READ: Menampilkan data kamar yang sudah ada ke halaman admin
    public function index()
    {
        $kamars = Kamar::latest()->get();
        return view('admin.kamar.index', compact('kamars'));
    }

    // 2. CREATE: Menampilkan form tambah kamar
    public function create()
    {
        return view('admin.kamar.create');
    }

    // 3. STORE: Memproses simpan kamar baru
    public function store(Request $request)
    {
        $request->validate([
            'nomor_kamar' => 'required|unique:kamars,nomor_kamar',
            'tipe_kamar' => 'required',
            'harga_per_malam' => 'required|numeric',
        ]);

        Kamar::create($request->all());

        return redirect()->route('admin.kamar.index')->with('success', 'Kamar baru berhasil ditambahkan!');
    }

    // 4. EDIT: Menampilkan form edit kamar lama
    public function edit($id)
    {
        $kamar = Kamar::findOrFail($id);
        return view('admin.kamar.edit', compact('kamar'));
    }

    // 5. UPDATE: Memproses perubahan data kamar
    public function update(Request $request, $id)
    {
        $kamar = Kamar::findOrFail($id);

        $request->validate([
            'nomor_kamar' => 'required|unique:kamars,nomor_kamar,' . $kamar->id,
            'tipe_kamar' => 'required',
            'harga_per_malam' => 'required|numeric',
        ]);

        $kamar->update($request->all());

        return redirect()->route('admin.kamar.index')->with('success', 'Data kamar berhasil diperbarui!');
    }

    // 6. DELETE: Menghapus data kamar
    public function destroy($id)
    {
        $kamar = Kamar::findOrFail($id);
        $kamar->delete();

        return redirect()->route('admin.kamar.index')->with('success', 'Kamar berhasil dihapus!');
    }
}