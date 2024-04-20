<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {

        return view('mahasiswa.index');

    }

    public function daftarBarang()
    {
        $data = Barang::orderBy("kode_barang", "desc")->get();
        return view('mahasiswa.daftar-barang-mahasiswa')->with('barang', $data);

    }
}
