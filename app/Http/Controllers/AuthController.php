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
        // Validasi inputan wajib diisi
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Auth::attempt otomatis memeriksa kecocokan email & password di database (sudah di-enkripsi bcrypt)
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            // Jika sukses, lempar ke halaman utama reservasi admin
            return redirect()->intended('/reservasi');
        }

        // Jika gagal (salah email/password), balikkan ke halaman login dengan pesan error
        return back()->withErrors(['email' => 'Email atau password salah!']);
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