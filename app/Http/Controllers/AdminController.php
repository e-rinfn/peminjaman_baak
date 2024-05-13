<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    // Menampilkan daftar barang admin
    public function daftarBarang()
    {
        return view('admin.daftar-barang');
    }

    // Menampilkan daftar ruangan admin
    public function daftarRuangan()
    {
        return view('admin.daftar-ruangan');
    }
}