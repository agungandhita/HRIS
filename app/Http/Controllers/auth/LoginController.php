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
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                if (auth()->user()->role == 'admin') {
                    return redirect()->intended('/admin');
                } elseif (auth()->user()->role == 'manajer') {
                    return redirect()->intended('/manajer');
                }
            }

            return back()->with('toast_succes', 'Login berhasil');
            
        } catch (Exception $e) {
            return back()->with('toast_error', 'An unexpected error occurred: ' . $e->getMessage());
        }
    }

    public function logout(Request $request)
    {
        try {
            Auth::logout(); 
        
            $request->session()->invalidate(); 
        
            $request->session()->regenerateToken(); 
        
            return redirect('/'); 

        } catch (Exception $e) {
            return back()->with('LogoutError', 'An unexpected error occurred: ' . $e->getMessage());
        }
    }
}
