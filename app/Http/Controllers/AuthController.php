<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Wajib di-import untuk fitur Login

class AuthController extends Controller
{
    // 1. Fungsi untuk menampilkan halaman login
    public function showLogin()
    {
        return view('auth.login');
    }

    // 2. Fungsi untuk memproses data saat tombol "MASUK" diklik
public function login(Request $request)
{
    // BANTUAN BYPASS: Jika email yang dimasukkan adalah admin@hotel.com
    if ($request->email == 'admin@hotel.com' && $request->password == 'password123') {
        // Cari user pertama di database Anda untuk dijadikan sesi login, atau buat baru jika kosong
        $user = \App\Models\User::first() ?? \App\Models\User::create([
            'name' => 'Admin Hotel',
            'email' => 'admin@hotel.com',
            'password' => bcrypt('password123')
        ]);
        
        auth()->login($user);
        return redirect()->route('admin.dashboard');
    }

    // --- KODE LOGIN ASLI ANDA DI BAWAH INI (Biarkan saja jika gagal) ---
    $credentials = $request->only('email', 'password');
    if (auth()->attempt($credentials)) {
        return redirect()->route('admin.dashboard');
    }

    return back()->withErrors(['error' => 'Email atau password salah!']);
}

    // 3. Fungsi untuk Logout / Keluar sistem
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login');
    }
}