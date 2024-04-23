<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * jika user dengan role id 1 maka masuk ke halaman admin, 
 * jika user dengan role id 2 maka masuk ke halaman pimpinan,
 * jika user dengan role_id 3 maka masuk ke halaman mahasiswa.
 */
class RedirectController extends Controller
{
    public function cek()
    {
        if (auth()->user()->role_id === 1) {
            return redirect('/admin');
        } elseif (auth()->user()->role_id === 2) {
            return redirect('/pimpinan');
        } elseif (auth()->user()->role_id === 3) {
            return redirect('/mahasiswa');
        }
    }
}