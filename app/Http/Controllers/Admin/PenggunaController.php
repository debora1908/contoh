<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
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
    public function store(Request $request)
{
    $request->validate([
        'nama' => 'required',
        'email' => 'required|email|unique:penggunas',
        'username' => 'required|unique:penggunas',
        'password' => 'required|min:6',
        'role' => 'required',
        'status' => 'required'
    ]);

    Pengguna::create([
        'nama' => $request->nama,
        'email' => $request->email,
        'username' => $request->username,
        'password' => bcrypt($request->password),
        'role' => $request->role,
        'status' => $request->status
    ]);

    return redirect()->back()->with('success','Pengguna berhasil ditambahkan.');
}
}