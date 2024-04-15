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



    public function index()
    {
        $data = barang::orderBy("kode", "desc")->get();
        return view('admin.index')->with('barang', $data);

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
        Session::flash('kode', $request->kode);
        Session::flash('nama_barang', $request->nama_barang);


        $request->validate([
            'kode' => 'required|unique:barang|max:255|numeric',
            'nama_barang' => 'required',
        ], [
            'kode.unique' => 'Kode Sudah Ada, Masukkan Kode Lainnya',
            'kode.required' => 'Kode Wajib Diisi',
            'kode.numeric' => 'Kode Harus Berupa Angka',
            'nama_barang' => 'Nama Barang Wajib Diisi',
        ]);
        $data = [
            'kode' => $request->kode,
            'nama_barang' => $request->nama_barang,
        ];
        Barang::create($data);
        return redirect('admin')->with('success', 'Data Barang Berhasil Ditambah');
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
        $data = barang::where('kode', $id)->first();
        return view('admin.edit')->with('barang', $data);
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
        Barang::where('kode', $id)->update($data);
        return redirect('admin')->with('success', 'Data Barang Berhasil Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Barang::where('kode', $id)->delete();
        return redirect('admin')->with('success', 'Data Barang Berhasil Di Hapus');
    }
}
