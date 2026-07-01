<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerAuthController extends Controller
{
    /**
     * Menampilkan form login yang berada di resources/views/manager/login.blade.php
     */
    public function showLoginForm() 
    { 
        // Mengarahkan ke folder 'manager' dan file 'login'
        return view('manager.login'); 
    }

    /**
     * Memproses logika login
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            
            // Pengecekan Role
           // Di dalam ManagerAuthController.php
if ($user && $user->role === 'admin') {
    return redirect('/admin/dashboard');
} elseif ($user && $user->role === 'manager') {
    return redirect('/manager/dashboard');
}
            
            // Jika user berhasil login tapi role tidak terdaftar, logout paksa
            Auth::logout();
            return back()->withErrors(['email' => 'Akun tidak memiliki akses.']);
        }

        return back()->withErrors(['email' => 'Login gagal.']);
    }
    public function showAdminLogin()
{
    return view('admin.login');
}public function adminLogin(Request $request)
{
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {

        $request->session()->regenerate();

        if (Auth::user()->role == 'admin') {

            return redirect()->route('admin.dashboard');

        }

        Auth::logout();

        return back()->withErrors([
            'email' => 'Akun ini bukan Admin.'
        ]);

    }

    return back()->withErrors([
        'email' => 'Email atau Password salah.'
    ]);
}
}