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
public function update(Request $request, $id)
{
    $pengguna = Pengguna::findOrFail($id);

    $request->validate([
        'nama'=>'required',
        'email'=>'required|email',
        'username'=>'required',
        'role'=>'required',
        'status'=>'required'
    ]);

    $pengguna->update([
        'nama'=>$request->nama,
        'email'=>$request->email,
        'username'=>$request->username,
        'role'=>$request->role,
        'status'=>$request->status
    ]);

    return back()->with('success','Data berhasil diubah');
}
public function show($id)
{
    $pengguna = Pengguna::findOrFail($id);

    return response()->json($pengguna);
}
public function destroy($id)
{
    Pengguna::findOrFail($id)->delete();

    return back()->with('success','Pengguna berhasil dihapus');
}
public function resetPassword($id)
{
    $pengguna = Pengguna::findOrFail($id);

    $pengguna->password = bcrypt('hotel123');

    $pengguna->save();

    return back()->with('success','Password berhasil direset');
}
}