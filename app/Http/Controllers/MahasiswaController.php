<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\PinjamBarang;
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

    public function tambahPinjamBarang()
    {
        $data = Barang::all();
        return view('mahasiswa.tambah-pinjam-barang', ['barang' => $data]);
    }

    public function daftarPinjamBarangMahasiswa()
    {
        return view('mahasiswa.daftar-pinjam-barang-mahasiswa');
    }

    public function daftarBentrokBarangMahasiswa()
    {
        $pinjamBarang = PinjamBarang::all();
        return view('mahasiswa.index', ['pinjamBarang' => $pinjamBarang]);
    }
}
