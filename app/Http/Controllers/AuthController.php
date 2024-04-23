<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function dologin(Request $request) // fungsi untuk melakukan login
    {
        // validasi login
        $credentials = $request->validate([
            'email' => 'required|email', // validasi email
            'password' => 'required' // validasi passowrd
        ]);

        if (auth()->attempt($credentials)) {

            // buat ulang session login
            $request->session()->regenerate();

            if (auth()->user()->role_id === 1) {
                // jika user admin
                return redirect()->intended('/admin'); // menuju ke halaman admin
            } elseif (auth()->user()->role_id === 2) {
                // jika user pimpinan
                return redirect()->intended('/pimpinan'); // menuju ke halaman pimpinan
            } elseif (auth()->user()->role_id === 3) {
                // jika user mahasiswa
                return redirect()->intended('/mahasiswa'); // menuju ke halaman mahasiswa
            }
        }

        // jika email atau password salah
        // kirimkan session error
        return back()->with('error', 'email atau password salah');
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}