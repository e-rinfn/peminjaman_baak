<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\http\Response
     */


    public function tampilRuanganAdmin()
    {
        $data = Ruangan::orderBy("kode_ruangan", "desc")->get();
        return view('admin.daftar-ruangan')->with('ruangan', $data);
    }

    public function tampilRuanganMahasiswa()
    {
        $data = Ruangan::orderBy("kode_ruangan", "desc")->get();
        return view('mahasiswa.daftar-ruangan-mahasiswa')->with('ruangan', $data);
    }

    public function tambahPinjamRuangan()
    {
        $ruangan = Ruangan::all();
        $tags = $ruangan->pluck('nama')->toArray();
        return view('mahasiswa.tambah-pinjam-ruangan', ['tags' => $tags]);
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
        Session::flash('kode_ruangan', $request->kode_ruangan);
        Session::flash('nama_ruangan', $request->nama_ruangan);


        $request->validate([
            'kode_ruangan' => 'required|unique:ruangan',
            'nama_ruangan' => 'required',
        ], [
            'kode_ruangan.unique' => 'Kode Sudah Ada, Masukkan Lainnya',
            'kode_ruangan.required' => 'Kode Ruangan Wajib Diisi',
            'nama_ruangan' => 'Nama Ruangan Wajib Diisi',
        ]);
        $data = [
            'kode_ruangan' => $request->kode_ruangan,
            'nama_ruangan' => $request->nama_ruangan,
        ];
        Ruangan::create($data);
        return redirect('daftar-ruangan')->with('success', 'Data Ruangan Berhasil Ditambah');
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
        $data = Ruangan::where('kode_ruangan', $id)->first();
        return view('admin.edit-ruangan')->with('ruangan', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_ruangan' => 'required',
            'nama_ruangan' => 'required',
        ], [
            'kode_ruangan' => 'Kode Ruangan Wajib Diisi',
            'nama_ruangan' => 'Nama Ruangan Wajib Diisi',
        ]);
        $data = [
            'kode_ruangan' => $request->kode_ruangan,
            'nama_ruangan' => $request->nama_ruangan,
        ];
        Ruangan::where('kode_ruangan', $id)->update($data);
        return redirect('/daftar-ruangan')->with('success', 'Data Ruangan Berhasil Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Ruangan::where('kode_ruangan', $id)->delete();
        return redirect('/daftar-ruangan')->with('success', 'Data Ruangan Berhasil Di Hapus');
    }
}

