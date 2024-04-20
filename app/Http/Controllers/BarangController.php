<?php

namespace App\Http\Controllers;

use App\Models\barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\http\Response
     */


    public function tampilBarangAdmin()
    {
        $data = Barang::orderBy("kode_barang", "desc")->get();
        return view('admin.daftar-barang')->with('barang', $data);
    }

    public function tampilBarangMahasiswa()
    {
        $data = Barang::orderBy("kode_barang", "desc")->get();
        return view('mahasiswa.daftar-barang-mahasiswa')->with('barang', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('kode_barang', $request->kode_barang);
        Session::flash('nama_barang', $request->nama_barang);


        $request->validate([
            'kode_barang' => 'required|unique:barang',
            'nama_barang' => 'required',
        ], [
            'kode_barang.unique' => 'Kode Sudah Ada, Masukkan Lainnya',
            'kode_barang.required' => 'Kode Barang Wajib Diisi',
            'nama_barang' => 'Nama Barang Wajib Diisi',
        ]);
        $data = [
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
        ];
        Barang::create($data);
        return redirect('daftar-barang')->with('success', 'Data Barang Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = barang::where('kode_barang', $id)->first();
        return view('admin.edit-barang')->with('barang', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_barang' => 'required',
        ], [
            'nama_barang' => 'Nama Barang Wajib Diisi',
        ]);
        $data = [
            'nama_barang' => $request->nama_barang,
        ];
        Barang::where('kode_barang', $id)->update($data);
        return redirect('/daftar-barang')->with('success', 'Data Barang Berhasil Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Barang::where('kode_barang', $id)->delete();
        return redirect('/daftar-barang')->with('success', 'Data Barang Berhasil Di Hapus');
    }
}
