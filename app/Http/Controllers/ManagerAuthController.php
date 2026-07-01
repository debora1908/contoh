<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerAuthController extends Controller
{
    // Tampilkan halaman login admin
    public function showAdminLogin()
    {
        return view('admin.login');
    }

    // Proses login admin
    public function adminLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {

            $request->session()->regenerate();

            // Hanya admin yang boleh masuk dashboard
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

    // Logout admin
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}