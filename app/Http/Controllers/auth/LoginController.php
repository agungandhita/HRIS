<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception; // Untuk menangani error tak terduga

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.Login.login', [
            'tittle' => 'login'
        ]);
    }

    public function login(Request $request)
    {
        try {
            // Validasi input
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            if (Auth::guard('web')->attempt($credentials)) {
                $request->session()->regenerate();

                if (auth()->user()->role == 'admin') {
                    return redirect()->intended('/admin')->with('success', 'Login sebagai Admin berhasil');
                } elseif (auth()->user()->role == 'manajer') {
                    return redirect()->intended('/manajer')->with('success', 'Login sebagai Manajer berhasil');
                }

                return redirect()->intended('/home')->with('success', 'Login berhasil');
            }

            if (Auth::guard('pegawai')->attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('/pegawai')->with('success', 'Login sebagai Pegawai berhasil');
            }

            return back()->withErrors(['email' => 'Email atau password salah'])->onlyInput('email');

        } catch (Exception $e) {
            return back()->with('toast_error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function logout(Request $request)
    {
        try {
            if (Auth::guard('pegawai')->check()) {
                Auth::guard('pegawai')->logout();
            } else {
                Auth::guard('web')->logout();
            }

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('/')->with('success', 'Berhasil logout');
        } catch (Exception $e) {
            return back()->with('toast_error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
